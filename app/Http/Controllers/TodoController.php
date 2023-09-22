<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\View\View;
use Carbon\Carbon;

use App\Models\Lead;
use App\Models\Todo;

use App\Models\Activity;

class TodoController extends Controller
{
    public function index():View
    {        
        return view('todo.index');

    } 
}
