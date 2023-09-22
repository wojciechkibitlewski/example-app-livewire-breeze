<?php

namespace App\Livewire\Sales;

use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Leads;

class SalesMonthTable extends Component
{
    use WithPagination;

    public $currentYear;
    public $currentMonth;

    public function mount()
    {
        // $this->currentMonth = date('m');
        $this->currentMonth = date('m');
        $this->currentYear = date('Y');
    }

    public function render()
    {
        
        $data = Leads::select(
                DB::raw('SUM(leadValue) as sumLeadValue'),
                DB::raw('SUM(advanceValue) as sumAdvanceValue')
            )
            ->where('user_id', Auth::user()->id)
            ->whereYear('executionDate', $this->currentYear)
            ->whereMonth('executionDate', $this->currentMonth)
            ->first();
        
        $leads = Leads::where('user_id', Auth::user()->id)
            ->whereYear('executionDate', $this->currentYear)
            ->whereMonth('executionDate', $this->currentMonth)
            ->orderBy('executionDate', 'asc')
            ->get();   

        return view('livewire.sales.sales-month-table',[
            'leads' => $leads,
            'data' => $data,
        ]);
    }
}
