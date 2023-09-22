<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

use Carbon\Carbon;
use App\Models\Calendar;

class CalendarController extends Controller
{
    public function schelude():View
    {        
        return view('calendar.schelude');

    } 
}
