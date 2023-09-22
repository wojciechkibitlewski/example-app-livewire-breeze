<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Salessource;
use App\Models\ProductCategory;
use App\Models\Product;


class DashboardController extends Controller
{
    public function index():View
    {
        $progress = 0;
        $tasks = 3;
        $salessource = Salessource::where('user_id',Auth::user()->id)->get();
        if(count($salessource) != 0) {
            $progress += 33;
            $tasks -= 1;
        }
        $productcategory = ProductCategory::where('user_id',Auth::user()->id)->get();
        if(count($productcategory) != 0) {
            $progress += 33;
            $tasks -= 1;
        }
        $products = Product::where('user_id',Auth::user()->id)->get();
        if(count($products) != 0) {
            $progress += 34;
            $tasks -= 1;
        }

        return view('dashboard.index',[
            'salessource' => $salessource,
            'productcategory' => $productcategory,
            'products' => $products,
            'progress' => $progress,
            'tasks' => $tasks,
        ]);
    }
}
