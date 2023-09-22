<?php

namespace App\Livewire\Sales;

use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Leads;

class ClientsTop extends Component
{
    use WithPagination;

    public $currentYear;

    public function mount()
    {
        $this->currentYear = date('Y');
    }
    public function render()
    {
        $clients = Leads::select('clients.id as client_id','clients.name as name', 'clients.phone as phone', 'clients.email as email')
            ->join('clients', 'leads.client_id', '=', 'clients.id')
            ->where('leads.user_id', Auth::user()->id)
            ->whereYear('leads.executionDate', $this->currentYear)
            ->groupBy('clients.id')
            ->get();

        return view('livewire.sales.clients-top',[
            'clients' => $clients,
        ]);
    }
}
