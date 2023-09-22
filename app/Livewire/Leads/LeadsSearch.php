<?php

namespace App\Livewire\Leads;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

use App\Models\Leads;
use App\Models\SalesSource;
use App\Models\SalesType;

class LeadsSearch extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $startDate;
    public $endDate;
    public $t = [];
    public $test;
    public $type_id;
    public $source_id;
    public $value;

    #[Url(history:true)]
    public $search = '';

    public function mount()
    {
        $this->startDate = date("Y-m-01");
        $this->endDate = date("Y-m-t");

    }

    public function clearStartDate()
    {
        //dd('clear startDate');
        $this->startDate = ''; 
    }

    public function clearEndDate()
    {
        //dd('clear startDate');
        $this->endDate = ''; 
    }

    public function clearType()
    {
        //dd('clear startDate');
        $this->type_id = ''; 
    }
    public function clearSource()
    {
        //dd('clear startDate');
        $this->source_id = ''; 
    }
    public function clearValue()
    {
        //dd('clear startDate');
        $this->value = ''; 
    }


    public function showCriteria()
    {
        $this->dispatch('open-modal', name: 'showCriteria');
    }

    public function searchLeads()
    {
        $this->startDate = $this->startDate;
        
        $this->dispatch('close-modal');
    }
    


    public function render()
    {
        
        $leadsQuery = Leads::search($this->search);
        
        $require = [
            ['user_id', Auth::user()->id]
        ];
        

        // stan zamówienia 
        if($this->type_id){
            $require[] = ['type_id', $this->type_id];
        }
        // źródło
        if($this->source_id){
            $require[] = ['source_id', $this->source_id];
        }
        $this->test =$require;
        // zamówienia opłacone / nieopłacone
        if($this->value == 2){ //opłacone
            $leadsQuery->whereColumn('leadValue', '=', 'advanceValue');
        } elseif ($this->value == 1) { //nieopłacone
            $leadsQuery->whereColumn('leadValue', '>', 'advanceValue');
        } else {
            
        }

        $sd= $this->startDate;
        $ed = $this->endDate;
        // $this->test = 'wynik: ';     
        if($sd AND $ed) {
            $t[]=['1',$sd, $ed];
            // $this->test = 'jest AND jest';    
            $leadsQuery->whereBetween('executionDate', [$sd, $ed ]);
        } elseif (!$sd AND $ed){
            $t[]=['2',$sd, $ed];
            $leadsQuery->whereDate('executionDate','<=', $ed);
            // $this->test = 'nie ma AND jest'; 
        } elseif ($sd AND !$ed){
            $t[]=['3',$sd, $ed];
            $leadsQuery->whereDate('executionDate','>=', $sd);
            // $this->test = 'jest AND nie ma'; 
        } else {
            $t[]=['4',$sd, $ed];

            // $this->test = 'nie ma AND nie ma'; 
        }        

       
        $leadsQuery->where($require);
        $leadsQuery->orderBy('executionDate', 'desc');

        $leads =  $leadsQuery->paginate($this->perPage);
        
        //dd($leadsQuery);

        // $leads = Leads::search($this->search)
        //     ->where($require)
        //     ->where('leadValue','>',0)
        //     ->whereBetween('executionDate', [ $this->startDate, $this->endDate ])
        //     ->orderBy('executionDate', 'desc')
        //     ->paginate($this->perPage);
        $sources = Salessource::where('user_id',Auth::user()->id)->orderBy('source')->get();
        $types = Salestype::where('user_id',Auth::user()->id)->orWhere('user_id', 4)->orderBy('order')->get();

        return view('livewire.leads.leads-search',[
            'leads' => $leads, 
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'sources' => $sources,
            'types' => $types,
            'test'=>$this->test,

        ]);
    }
}
