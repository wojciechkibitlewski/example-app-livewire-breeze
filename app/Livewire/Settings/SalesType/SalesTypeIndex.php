<?php
namespace App\Livewire\Settings\SalesType;

use Livewire\Component;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Exception;

use App\Models\Salestype;
use App\Models\Activity;

class SalesTypeIndex extends Component
{
    use WithPagination;

    public $type = '';
    public $order = '';
    public $s;

    public $type_id;

    public $editingTypeId;
    public $editingTypeType;
    public $editingTypeOrder;

    public $activity;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function add()
    {
        $this->dispatch('open-modal', name: 'addType');
    }

    public function create()
    {
        try 
         {
            sleep(1);

            $validated = $this->validate([ 
                'type' => 'required|min:3|max:50',
                'order' => 'required|integer',
            ]);

            $s = new Salestype;
            $s->type = $this->type;
            $s->order = $this->order;
            $s->user_id = Auth::user()->id;
            $s->save();
            
            // activity 
            $activity = new Activity;
            $activity->user_id = Auth::user()->id;
            $activity->action = 'Add ';
            $activity->ip_address = request()->ip();
            $activity->what =  $s->source.' to Stany realizacji zamówienia';
            $activity->save();
            
            $this->reset('type','order');
            $this->dispatch('close-modal');
            session()->flash('success', 'Type created successfully.');
            return redirect()->to('/settings/salestype/index');
         }
         catch(Exception $e) 
         {
             session()->flash('error', 'Failed to created type!');
             return;
         }   
    }

    public function edit($id)
    {
        // $this->source_id = $sourceId;
        $sType = Salestype::where('user_id',auth()->id())->where('id', $id)->first();
        
        $this->editingTypeId = $sType->id;
        $this->editingTypeType = $sType->type;
        $this->editingTypeOrder = $sType->order;
        
        $this->dispatch('open-modal', name: 'editType');
    }

    public function update()
    {
        try 
        {
            $sType = Salestype::findOrFail($this->editingTypeId) -> update(
                [
                    'type' => $this->editingTypeType,                    
                    'order' => $this->editingTypeOrder,                    
                ] 
            );
            $this->reset('editingTypeId', 'editingTypeType', 'editingTypeOrder'); 
            session()->flash('success', 'Source updated successfully.');
            $this->dispatch('close-modal');

          
        }
        catch(Exception $e) 
        {
            session()->flash('error', 'Failed to edit todo!');
            return;
        } 

    }

    public function delete($typeId)
    {
        $this->type_id = $typeId;
        $this->dispatch('open-modal', name: 'removeType');
    }

    public function remove($type_id)
    {
        try {
            Salestype::where('user_id',auth()->id())->where('id', $type_id)->delete();
            $this->dispatch('close-modal');

            session()->flash('success', 'Type deleted successfully.');

        } catch(Exception $e) {
            session()->flash('error', 'Failed to delete type!');
            return;
        }

    }

    public function render()
    {
        $types = Salestype::where('user_id',auth()->id())
        ->orWhere('user_id', 4) 
        ->orderBy('id','asc')
        ->paginate(10);

        return view('livewire.settings.sales-type.sales-type-index',
        [
            'types' => $types,
        ]);
    }
}
