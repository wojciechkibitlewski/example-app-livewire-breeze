<?php

namespace App\Livewire\Leads;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

use App\Models\Leads;

class LeadsIndex extends Component
{
    use WithPagination;

    public $perPage = 10;

    #[Url(history:true)]
    public $search = '';
    
    public function render()
    {
        $leads = Leads::search($this->search)
            ->where('user_id',Auth::user()->id)
            ->where('leadValue','>',0)
            ->orderBy('title','asc')
            ->paginate($this->perPage);

        return view('livewire.leads.leads-index',[
            'leads' => $leads, 
        ]);
    }
}
