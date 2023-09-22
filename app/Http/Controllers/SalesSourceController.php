<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SalesSourceController extends Controller
{
    public function index()
    {
        return view('settings.salessource.index');
    }
}

