<?php

namespace App\Livewire\Leads;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Exception;

use App\Models\Leads;
use App\Models\Client;
use App\Models\Product;
use App\Models\LeadProduct;
use App\Models\SalesType;
use App\Models\Activity;
use App\Models\Todo;


class ShowLead extends Component
{
    use WithPagination;

    public $prefix;
    public $editingLeadId;
    public $editingExecutionDate;
    public $editingExecutionTime;
    public $editingTypeId;
    public $editingNote;
    public $editingAdvanceValue;
    public $editingProductId;

    public $records;
    public $selectedProductId;
    public $quant = 1;
    public $leadValue = 0;
    public $selectedProducts = [];
    public $selectedProductID;
    public $selProd = [];

    public function mount($prefix)
    {
        $this->prefix = $prefix;
    }

    public function addTodo($prefix)
    {

        $lead = Leads::where('user_id',Auth::user()->id)->where('prefix', $prefix)->first();

        $maxOrder = Todo::where('kaban', 'thisWeek')->max('order');
        if ($maxOrder === null) {
            $order = 1;
        } else {
            $order = $maxOrder + 1;
        }

        $todo = new Todo();
        $todo->name = $lead->title;
        $todo->date = $lead->executionDate;
        $todo->kaban = 'thisWeek';
        $todo->note = __('todo.this_week');
        $todo->order = $order;
        $todo->user_id = Auth::user()->id;
        $todo->lead_prefix = $lead->prefix;
        $todo->save();

        session()->flash('success', 'Added to Todo list.');
        return;
    }

    public function deleteLead($lead_id)
    {
        $lead = Leads::where('user_id',Auth::user()->id)->where('id', $lead_id)->first();

        $this->editingLeadId = $lead->id;
        $this->dispatch('open-modal', name: 'deleteLead');
    }

    public function removeLead()
    {
        $lead = Leads::where('user_id',Auth::user()->id)->where('id', $this->editingLeadId)->first();
        
        LeadProduct::where('lead_id',$lead->id)->delete();
        Leads::whereId($lead->id)->delete();
        
        $activity = new Activity;
        $activity->user_id = Auth::user()->id;
        $activity->action = 'Remove ';
        $activity->ip_address = request()->ip();
        $activity->what =  ''.$lead->title.' ('.$lead->id.') from Zamówienia';
        $activity->save();

        $this->dispatch('close-modal');
        return redirect()
                ->route('leads.index')
                ->with('success','Lead deleted successfully.');
    }

    public function addProductList()
    {
        $product = $this->records->firstWhere('id', $this->selectedProductID);
        $selProd = ['product_id'=> $product['id'], 'name'=> $product['name'],'quant'=> $this->quant, 'product_price'=>$product['price'], 'productValue'=> ($product['price']*$this->quant) ];
        
        $this->leadValue += ($product['price']*$this->quant);
        $this->selectedProducts[] = $selProd;
    }

    public function removeProductModal($index)
    {
        $product = $this->selectedProducts[$index];
        $this->leadValue -= $product['productValue'];
        array_splice($this->selectedProducts, $index, 1);
    }

    public function addProduct($id)
    {
        $lead = Leads::where('user_id',Auth::user()->id)->where('id', $id)->first();
        
        $this->editingLeadId = $lead->id;
        
        $this->dispatch('open-modal', name: 'addProduct');
    }

    public function updateProduct()
    {
        try 
        {
            sleep(1);
            $lead = Leads::where('user_id',Auth::user()->id)->where('id',$this->editingLeadId)->first();
            
            foreach ($this->selectedProducts as $item) {
                
                $leadproduct = new LeadProduct;
                $leadproduct->lead_id = $lead->id;
                $leadproduct->product_id = $item['product_id'];
                $leadproduct->quant =  $item['quant'];
                $leadproduct->product_price = $item['product_price'];
                $leadproduct->product_value = $leadproduct->quant * $leadproduct->product_price;
                $leadproduct->product_name = $item['name'];
                $leadproduct->product_prefix = Str::random(18);
                $leadproduct->user_id =  Auth::user()->id;
                $leadproduct->save();
            }
            $lead->leadValue += isset($this->leadValue) ? $this->leadValue : '';
            $lead->save();

            $this->reset('selectedProducts','leadValue'); 
            $this->dispatch('close-modal');
            session()->flash('success', 'Product added successfully.');
        }
        catch(Exception $e) 
        {
            session()->flash('error', 'Failed!');
            return;
        } 

    }

    public function deleteProduct($id, $lead_id)
    {
        $leadProduct = LeadProduct::where('user_id',Auth::user()->id)->where('id', $id)->first();
        $lead = Leads::where('user_id',Auth::user()->id)->where('id', $lead_id)->first();

        $this->editingProductId = $leadProduct->id;
        $this->editingLeadId = $lead->id;
        $this->dispatch('open-modal', name: 'deleteProduct');
    }

    public function removeProduct()
    {
        try 
        {
            $leadProduct = LeadProduct::where('user_id',Auth::user()->id)->where('id', $this->editingProductId)->first();
            $lead = Leads::where('user_id',Auth::user()->id)->where('id', $this->editingLeadId)->first();

            $quant = $leadProduct->quant;
            $price = $leadProduct->product_price;
            $value = $quant * $price;
            
            $lead->leadValue -= $value;
            //$lead->advanceValue -= $value;
            $lead->save();

            LeadProduct::whereId($leadProduct->id)->delete();

            $activity = new Activity;
            $activity->user_id = Auth::user()->id;
            $activity->action = 'Remove ';
            $activity->ip_address = request()->ip();
            $activity->what =  'product ('.$leadProduct->id.') from Zamówienie';
            $activity->save();
            
            
            $this->dispatch('close-modal');
            session()->flash('success', 'Product deleted successfully.');
        }
        catch(Exception $e) 
        {
            session()->flash('error', 'Failed!');
            return;
        } 

    }

    public function editPayment($id)
    {
        $lead = Leads::where('user_id',Auth::user()->id)->where('id', $id)->first();
        
        $this->editingLeadId = $lead->id;
        $this->editingAdvanceValue = $lead->advanceValue;
        
        $this->dispatch('open-modal', name: 'editPayment');
    }

    public function updatePayment()
    {
        try 
        {
            $lead = Leads::where('user_id',Auth::user()->id)->where('id', $this->editingLeadId)->first();
            $lead->advanceValue += $this->editingAdvanceValue;
            if($lead->advanceValue<=0){
                $lead->advanceValue = 0;
            }
            $lead->save();

            $this->reset('editingLeadId', 'editingAdvanceValue'); 
            session()->flash('success', 'AdvanceValue updated successfully.');
            $this->dispatch('close-modal');

          
        }
        catch(Exception $e) 
        {
            session()->flash('error', 'Failed to edit!');
            return;
        } 

    }

    public function editNote($id)
    {
        $lead = Leads::where('user_id',Auth::user()->id)->where('id', $id)->first();
        
        $this->editingLeadId = $lead->id;
        $this->editingNote = $lead->note;
        
        $this->dispatch('open-modal', name: 'editNote');
    }

    public function updateNote()
    {
        try 
        {
            $lead = Leads::findOrFail($this->editingLeadId) -> update(
                [
                    'note' => $this->editingNote,                    
                ] 
            );
            $this->reset('editingLeadId', 'editingNote'); 
            session()->flash('success', 'Note updated successfully.');
            $this->dispatch('close-modal');

          
        }
        catch(Exception $e) 
        {
            session()->flash('error', 'Failed to edit!');
            return;
        } 

    }

    public function editState($id)
    {
        $lead = Leads::where('user_id',Auth::user()->id)->where('id', $id)->first();
        
        $this->editingLeadId = $lead->id;
        $this->editingTypeId = $lead->type_id;
        
        $this->dispatch('open-modal', name: 'editState');
    }

    public function updateState()
    {
        try 
        {
            $lead = Leads::findOrFail($this->editingLeadId) -> update(
                [
                    'type_id' => $this->editingTypeId,                    
                ] 
            );
                       
            if($this->editingTypeId == 3){
                /// przenoszenie w Todo
                $lead = Leads::where('user_id',Auth::user()->id)->where('id',$this->editingLeadId)->first();
                $todo = Todo::where('user_id',Auth::user()->id)->where('lead_prefix', $lead->prefix)->first();
                if($todo->id){
                    $maxOrder = Todo::where('kaban', 'done')->max('order');
                    if ($maxOrder === null) {
                        $order = 1;
                    } else {
                        $order = $maxOrder + 1;
                    }
                    $todo = Todo::findOrFail($todo->id) -> update(
                        [
                            'kaban' => 'done',
                            'order' => $order,                    
                        ] 
                    );

                }
            }
            $this->reset('editingLeadId', 'editingTypeId'); 
            session()->flash('success', 'State updated successfully.');
            $this->dispatch('close-modal');
            
          
        }
        catch(Exception $e) 
        {
            session()->flash('error', 'Failed to edit todo!');
            return;
        } 

    }

    public function editDate($id)
    {
        // $this->source_id = $sourceId;
        $lead = Leads::where('user_id',Auth::user()->id)->where('id', $id)->first();
        
        $this->editingLeadId = $lead->id;
        $this->editingExecutionDate = $lead->executionDate;
        $this->editingExecutionTime = $lead->executionTime;
        
        $this->dispatch('open-modal', name: 'editDate');
    }

    public function updateDate()
    {
        try 
        {
            $lead = Leads::findOrFail($this->editingLeadId) -> update(
                [
                    'executionDate' => $this->editingExecutionDate,                    
                    'executionTime' => $this->editingExecutionTime,                    
                ] 
            );
            $this->reset('editingLeadId', 'editingExecutionDate', 'editingExecutionTime'); 
            session()->flash('success', 'Date updated successfully.');
            $this->dispatch('close-modal');

          
        }
        catch(Exception $e) 
        {
            session()->flash('error', 'Failed to edit todo!');
            return;
        } 

    }

    public function render()
    {
        $lead = Leads::where('user_id',Auth::user()->id)->where('prefix', $this->prefix)->first();
        $client = Client::where('user_id',Auth::user()->id)->where('id', $lead->client_id)->first();
        $leadProduct = LeadProduct::where('user_id',Auth::user()->id)->where('lead_id', $lead->id)->orderBy('product_id')->get();
        $types = Salestype::where('user_id',Auth::user()->id)->orWhere('user_id', 4)->orderBy('order')->get();
        $products = Product::where('user_id',Auth::user()->id)->get();
        $this->records = Product::where('user_id',Auth::user()->id)
        ->select('*')
        ->get();
        $todo = Todo::where('user_id',Auth::user()->id)->where('lead_prefix', $this->prefix)->first();
        return view('livewire.leads.show-lead',
            [
                'lead' => $lead,
                'client' => $client,
                'leadProduct' => $leadProduct,
                'types' => $types,
                'products' => $products,
                'todo' => $todo,
            ]);
    }
}

