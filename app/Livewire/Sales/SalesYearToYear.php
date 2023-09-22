<?php

namespace App\Livewire\Sales;

use Livewire\Component;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Lead;
use App\Models\LeadProduct;
use App\Models\Product;
use App\Models\Client;
use App\Models\Salessource;
use App\Models\Salestype;
use App\Models\Activity;
use App\Models\Chart;

class SalesYearToYear extends Component
{
    public function render()
    {
        $monthNames = [
            0 => 'January',
            1 => 'February',
            2 => 'March',
            3 => 'April',
            4 => 'May',
            5 => 'June',
            6 => 'July',
            7 => 'August',
            8 => 'September',
            9 => 'October',
            10 => 'November',
            11 => 'December',
        ];

        $currentYear = Carbon::now()->year;
        $lastYear = Carbon::now()->subYear()->year;

        $zeroValues = array_fill(1, 12, 0);

        $salesThisYear = DB::table('leads')
        ->select(DB::raw('SUM(leadValue) as total_leadValue'), DB::raw('MONTH(executionDate) as month'))
        ->where('user_id', Auth::user()->id)
        ->whereYear('executionDate', $currentYear)
        ->groupBy(DB::raw('MONTH(executionDate)'))
        ->orderBy(DB::raw('MONTH(executionDate)'))
        ->get();

        $salesLastYear = DB::table('leads')
        ->select(DB::raw('SUM(leadValue) as total_leadValue'), DB::raw('MONTH(executionDate) as month'))
        ->where('user_id', Auth::user()->id)
        ->whereYear('executionDate', $lastYear)
        ->groupBy(DB::raw('MONTH(executionDate)'))
        ->orderBy(DB::raw('MONTH(executionDate)'))
        ->get();
        
        for ($i=0; $i<=count($monthNames); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }
        
        $results = $zeroValues;
        $resultsLast = $zeroValues;

        $labels = [];
        foreach ($salesThisYear as $sale) {
            $month = $sale->month;
            $results[$month] = $sale->total_leadValue;
        }
        foreach ($salesLastYear as $sale) {
            $month = $sale->month;
            $resultsLast[$month] = $sale->total_leadValue;
        }
        
        $labels = $monthNames;
        $dataset = array_values($results);
        $datasetLast = array_values($resultsLast);

        $chartData = [
            'labels' => json_encode($labels),
            'dataset' => json_encode($dataset),
            'datasetLast' => json_encode($datasetLast),
            'colours' => json_encode($colours),
        ];

        return view('livewire.sales.sales-year-to-year',[
            'currentYear' => $currentYear,
            'lastYear' => $lastYear,
            'chartData' => $chartData,
        ]);
    }
}
