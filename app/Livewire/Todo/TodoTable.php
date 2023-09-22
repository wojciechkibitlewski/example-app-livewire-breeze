<?php

namespace App\Livewire\Todo;


use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Models\Lead;
use App\Models\Todo;
use Exception;


class TodoTable extends Component
{
    use WithPagination;


    #[Rule('required|min:3|max:50')]
    public $name;

    public $date;

    public $kaban;
    public $note;

    public $editingTodoId;

    #[Rule('required|min:3|max:50')]
    public $editingTodoName;
    
    public $editingTodoDate;

    public $editingTodoNote;
    public $orderedIds;
    public $boxIds;
    public $fromKaban;
    public $toKaban;

    public $currentDate;
    public $endWeekDate;

    public $showIdeaAllModal;
    public $showThisWeekAllModal;
    public $showWaitingAllModal;
    public $showWorkingAllModal;
    public $showDoneAllModal;


    ///////////////////
    // sortowanie i zapisywanie danych po przesunięciu elementów
    public function reorderWithinDiv($boxIds)
    {
        foreach ($boxIds as $key => $id) {
            Todo::where('id', $id)->update([
                'order' => $key + 1, // Aktualizuj nową kolejność
            ]);
        }
    }

    public function reorder($orderedIds, $toKaban)
    {
        foreach ($orderedIds as $key => $id) {
            Todo::where('id', $id)->update([
                'kaban' => $toKaban,
                'order' => $key + 1, // Aktualizuj nową kolejność
            ]);
            
        }


        
    }
    
    ///////////

    public function edit($todoId)
    {
         try 
         {
             $todo = Todo::findOrFail($todoId);
             $this->editingTodoId = $todo->id;
             $this->editingTodoName = $todo->name;
             $this->editingTodoDate = $todo->date;
             $this->editingTodoNote = $todo->note;
         
         } 
         catch(Exception $e) 
         {
             session()->flash('error', 'Failed to edit todo!');
             return;
         }    
    }

    public function cancelEdit()
   {
        $this->reset('editingTodoId', 'editingTodoName', 'editingTodoDate', 'editingTodoNote');
   }
    
    public function update()
    {
         try 
         {
             $todo = Todo::findOrFail($this->editingTodoId) -> update(
                 [
                     'name' => $this->editingTodoName,
                     'date' => $this->editingTodoDate,
                     'note' => $this->editingTodoNote,
                 ] 
             );
             $this->cancelEdit();
         } 
         catch(Exception $e) 
         {
             session()->flash('error', 'Failed to update todo!');
             return;
         }    
    }    
    public function create()
    {
        //$validated = $this->validateOnly('name');
        $maxOrder = Todo::where('kaban', 'idea')->max('order');
        if ($maxOrder === null) {
            $order = 1;
        } else {
            $order = $maxOrder + 1;
        }

        $todo = new Todo();
        $todo->name = $this->name;

        $todo->date = $this->date;

        $todo->kaban = 'idea';
        $todo->note = '';
        $todo->order = $order;
        $todo->user_id = Auth::user()->id;
        $todo->save();

        $this->reset('name', 'date');
    }

    public function delete($todoId)
    {
            try {
                Todo::findOrFail($todoId)->delete();
            
            } catch(Exception $e) {
                session()->flash('error', 'Failed to delete todo!');
                return;
            }
            
    }


    public function showIdeaAll(){
        $this->dispatch('open-modal', name: 'showIdeaAllModal');
    }
    public function showDoneAll(){
        $this->dispatch('open-modal', name: 'showDoneAllModal');
    }
    public function showWorkingAll(){
        $this->dispatch('open-modal', name: 'showWorkingAllModal');
    }
    public function showWaitingAll(){
        $this->dispatch('open-modal', name: 'showWaitingAllModal');
    }
    public function showThisWeekAll(){
        $this->dispatch('open-modal', name: 'showThisWeekAllModal');
    }
    
    public function render()
    {
      
        $ideaList = Todo::where('user_id',Auth::user()->id)
            ->where('kaban','idea')
            ->orderBy('order','asc')
            ->take(20)
            ->get();
        
        $ideaListAll = Todo::where('user_id',Auth::user()->id)
            ->where('kaban','idea')
            ->orderBy('order','asc')
            ->get();

        $thisWeekList = Todo::where('user_id',Auth::user()->id)
            ->where('kaban','thisWeek')
            ->orderBy('order','asc')
            ->take(20)
            ->get();
        $thisWeekListAll = Todo::where('user_id',Auth::user()->id)
            ->where('kaban','thisWeek')
            ->orderBy('order','asc')
            ->get();
        
        $waitingList = Todo::where('user_id',Auth::user()->id)
            ->where('kaban','waiting')
            ->orderBy('order','asc')
            ->take(20)
            ->get();
        $waitingListAll = Todo::where('user_id',Auth::user()->id)
            ->where('kaban','waiting')
            ->orderBy('order','asc')
            ->get();

        $workingList = Todo::where('user_id',Auth::user()->id)
            ->where('kaban','working')
            ->orderBy('order','asc')
            ->take(20)
            ->get();
        $workingListAll = Todo::where('user_id',Auth::user()->id)
            ->where('kaban','working')
            ->orderBy('order','asc')
            ->get(); 

        $doneList = Todo::where('user_id',Auth::user()->id)
            ->where('kaban','done')
            ->orderBy('order','asc')
            ->take(20)
            ->get();
        $doneListAll = Todo::where('user_id',Auth::user()->id)
            ->where('kaban','done')
            ->orderBy('order','asc')
            ->get();            

        //dd($ideaList);
        return view('livewire.todo.todo-table', [
            'ideaList' =>  $ideaList,
            'ideaListAll' =>  $ideaListAll,
            
            'thisWeekList' =>  $thisWeekList,
            'waitingList' =>  $waitingList,
            'workingList' =>  $workingList,
            'doneList' =>  $doneList,

            'thisWeekListAll' =>  $thisWeekListAll,
            'waitingListAll' =>  $waitingListAll,
            'workingListAll' =>  $workingListAll,
            'doneListAll' =>  $doneListAll,
        ]);
    }
    
}
