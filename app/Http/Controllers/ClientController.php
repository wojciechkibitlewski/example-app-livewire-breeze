<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

use Illuminate\View\View;
use Carbon\Carbon;

use App\Models\Client;
use App\Models\Leads;

use App\Models\Activity;

class ClientController extends Controller
{
    public function index():View
    {
        return view('clients.index');
    }

    public function create():View
    {
        return view('clients.create');
    }
   
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
    
        if ($validator->fails()) {
            return redirect('clients/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $inputs = $request->all();
        //dd($inputs);
        if(!empty($inputs)){
            $client = new Client;
            $client->prefix = Str::random(18); 
            $client->name = isset($inputs['name']) ? $inputs['name'] : '';
            $client->email = isset($inputs['email']) ? $inputs['email'] : '';
            $client->phone = isset($inputs['phone']) ? $inputs['phone'] : '';
            $client->social = isset($inputs['social']) ? $inputs['social'] : '';
            $client->firm = isset($inputs['firm']) ? $inputs['firm'] : '';
            $client->note= isset($inputs['note']) ? $inputs['note'] : '';
            $client->user_id = $request->user()->id;

            // activity 
            $activity = new Activity;
            $activity->user_id = Auth::user()->id;
            $activity->action = 'Add ';
            $activity->ip_address = request()->ip();
            $activity->what =  'new '.$client->name.' to Klienci';
            $activity->save();
            //dd($client);
            try {
                if ($client->save()) {
                    return redirect('clients/show/'.$client->prefix)
                        ->with('success', 'Clients created successfully.');
                }
            } catch (\Exception $e) {
                //dd($e);
                return redirect('clients/create')
                        ->withErrors($e->getMessage())
                        ->withInput();
                                
            }
        }
    }

    public function show(Request $request, string $prefix)
    {
        $client = Client::where('user_id',Auth::user()->id)->where('prefix',$prefix)->first();
        $leads = Leads::where('client_id', $client->id)->get();
        $leadsValue = Leads::where('client_id', $client->id)->sum(DB::raw('leadValue'));
        $advanceValue = Leads::where('client_id',$client->id)->sum(DB::raw('advanceValue'));

        return view('clients.show',[
            'client' => $client,
            'leadsValue' => $leadsValue,
            'advanceValue' => $advanceValue,
            'leads' => $leads,
        ]);
    }

    public function edit(Request $request, string $prefix)
    {
        $client = Client::where('user_id',Auth::user()->id)->where('prefix',$prefix)->first();
        
        return view('clients.edit',compact('client'));        
    }

    public function update(Request $request)
    {
        $client = Client::where('user_id',Auth::user()->id)->where('prefix',$request['prefix'])->first();

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
    
        if ($validator->fails()) {
            return redirect('clients/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        Client::where('prefix', $client->prefix)->where('user_id',Auth::user()->id)->update([
            'name' => $request->name,
            'email' => isset($request->email) ? $request->email : ' ',
            'phone' => isset($request->phone) ? $request->phone : ' ',
            'social' => isset($request->social) ? $request->social : ' ',
            'firm' => isset($request->firm) ? $request->firm : ' ',
            'note' => isset($request->note) ? $request->note : ' ',
        ]);
        
        // activity 
        $activity = new Activity;
        $activity->user_id = Auth::user()->id;
        $activity->action = 'Update  ';
        $activity->ip_address = request()->ip();
        $activity->what =  ''.$client->name.' in Klienci';
        $activity->save();

        return redirect('clients/show/'.$client->prefix)
                        ->with('success', 'Client updated successfully.');

    }
}
