<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;


class SalesTypeController extends Controller
{
    public function index()
    {
        return view('settings.salestype.index');
    }
}
