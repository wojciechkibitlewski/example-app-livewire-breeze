<?php

namespace App\Livewire\Settings\SalesSource;

use Livewire\Component;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Exception;

use App\Models\Salessource;
use App\Models\Activity;

class SalesSourceIndex extends Component
{
    use WithPagination;

    public $source = '';
    public $s;

    public $id;
    public $editingSourceId;
    public $editingSourceSource;
   
    
    public $source_id;

    public $activity;
    //public $validated;
        
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function add()
    {
        $this->dispatch('open-modal', name: 'addSource');
    }

    public function create()
    {
        try 
         {
            sleep(1);

            $validated = $this->validate([ 
                'source' => 'required|min:3|max:50',
            ]);

            $s = new Salessource;
            $s->source = isset($this->source) ? $this->source : '';
            $s->user_id = Auth::user()->id;
            $s->save();
            
            // activity 
            $activity = new Activity;
            $activity->user_id = Auth::user()->id;
            $activity->action = 'Add ';
            $activity->ip_address = request()->ip();
            $activity->what =  $s->source.' to Źródła pozyskiwania klientów';
            $activity->save();
            
            $this->reset('source');
            $this->dispatch('close-modal');
            session()->flash('success', 'Source created successfully.');
            return redirect()->to('/settings/salessource/index');
         }
         catch(Exception $e) 
         {
             session()->flash('error', 'Failed to edit todo!');
             return;
         }   
    }

    public function edit($id)
    {
        // $this->source_id = $sourceId;
        $sSource = Salessource::where('user_id',auth()->id())->where('id', $id)->first();
        
        $this->editingSourceId = $sSource->id;
        $this->editingSourceSource = $sSource->source;
        
        $this->dispatch('open-modal', name: 'editSource');
    }

    public function cancelEdit()
    {
         $this->reset('editingSourceId', 'editingSourceSource');
    }

    public function update()
    {
        try 
        {
            $sSource = Salessource::findOrFail($this->editingSourceId) -> update(
                [
                    'source' => $this->editingSourceSource,                    
                ] 
            );
            $this->reset('editingSourceId', 'editingSourceSource'); 
            session()->flash('success', 'Source updated successfully.');
            $this->dispatch('close-modal');

          
        }
        catch(Exception $e) 
        {
            session()->flash('error', 'Failed to edit todo!');
            return;
        } 

    }

    public function delete($sourceId)
    {
        $this->source_id = $sourceId;
        $this->dispatch('open-modal', name: 'removeSource');
    }

    public function remove($source_id)
    {
        try {
            Salessource::where('user_id',auth()->id())->where('id', $source_id)->delete();
            $this->dispatch('close-modal');

            session()->flash('success', 'Source deleted successfully.');

        } catch(Exception $e) {
            session()->flash('error', 'Failed to delete todo!');
            return;
        }

    }
    

    public function render()
    {
        $sources = Salessource::where('user_id',auth()->id())
                ->orderBy('source','asc')
                ->paginate(10);

        return view('livewire.settings.sales-source.sales-source-index',
        [
            'sources' => $sources,
        ]);
    }
}
