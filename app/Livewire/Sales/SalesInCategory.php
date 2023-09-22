<?php

namespace App\Livewire\Sales;

use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Leads;
use App\Models\ProductLead;

class SalesInCategory extends Component
{
    use WithPagination;

    public $currentYear;
    public $currentMonth;

    public function mount()
    {
        $this->currentMonth = date('m');
        $this->currentYear = date('Y');
    }
    
    public function render()
    {
        $data = DB::table('lead_products')
            ->join('leads', 'leads.id', '=', 'lead_products.lead_id')
            ->join('products', 'lead_products.product_id', '=', 'products.id')
            ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
            ->select(
                DB::raw('SUM(lead_products.product_price * lead_products.quant) as sumLeadValue'),
            )
            ->where('leads.user_id', Auth::user()->id)
            ->whereYear('leads.executionDate', $this->currentYear)
            ->whereMonth('leads.executionDate', $this->currentMonth)
            ->first(); 

            
        $leads = DB::table('lead_products')
            ->join('leads', 'leads.id', '=', 'lead_products.lead_id')
            ->join('products', 'lead_products.product_id', '=', 'products.id')
            ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
            ->select(
                DB::raw('SUM(lead_products.product_price * lead_products.quant) as totalValue'),
                DB::raw('product_categories.category as category'),
            )
            ->where('lead_products.user_id', Auth::user()->id)
            ->whereYear('leads.executionDate', $this->currentYear)
            ->whereMonth('leads.executionDate', $this->currentMonth)
            ->groupBy('products.category_id')
            ->orderBy('product_categories.category', 'asc')
            ->get(); 

        return view('livewire.sales.sales-in-category',[
            'leads' => $leads,
            'data' => $data,
        ]);
    }
}
