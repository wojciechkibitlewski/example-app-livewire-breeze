<?php

namespace App\Http\Controllers;

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
// use App\Models\Chart;

class ReportsController extends Controller
{
    //
    public function index():View
    {
        return view('reports.index');
    }

    public function salesCategory():View
    {
        return view('reports.sales-category');
    }

    public function salesYearToYear():View
    {
        return view('reports.sales-year-to-year');
    }

    public function clientsTop():View
    {
        $currentYear = date('Y');

        return view('reports.clients-top',[
            'currentYear' => $currentYear,
        ]);
    }
}
