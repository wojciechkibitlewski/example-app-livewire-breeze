<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

use App\Models\Leads;
use App\Models\LeadProduct;
use App\Models\Product;
use App\Models\Client;
use App\Models\Salessource;
use App\Models\Salestype;
use App\Models\Activity;

class LeadController extends Controller
{
    public function index():View
    {
        return view('leads.index');    
    }

    public function currentMonth():View
    {
        return view('leads.search');
    }

    public function create()
    {
        $sources = Salessource::where('user_id',Auth::user()->id)
                ->orderBy('source')
                ->get();
        $types = Salestype::where('user_id',Auth::user()->id)
                ->orWhere('user_id', 4) 
                ->orderBy('order')
                ->get();
       
        return view('leads.create',[
            'sources'=> $sources,
            'types' => $types,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'source_id' => 'required',
            'type_id' => 'required',
            'executionDate' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect('leads/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $lead = new Leads;
        $lead->prefix = Str::random(18);  
        $lead->title = $request->title;
        $lead->note = $request->note;
        $lead->noteForClient = $request->noteForClient;
        $lead->source_id = $request->source_id;
        $lead->type_id = $request->type_id;
        $lead->executionDate = $request->executionDate;

        $executionTime = $request->executionTime;
        $lead->executionTime = date("H:i", strtotime($executionTime));

        $lead->user_id = $request->user()->id;
        $lead->save();
            
        // activity 
        $activity = new Activity;
        $activity->user_id = Auth::user()->id;
        $activity->action = 'Add ';
        $activity->ip_address = request()->ip();
        $activity->what =  'new leads '.$lead->title.' ('.$lead->id.') to Zamówienia';
        $activity->save();
            
        
        return redirect()
                ->route('leads.add-client', $lead->prefix)
                ->with('success','Order created successfully. Add client.');

    }

    public function addClient(Request $request, string $prefix)
    {
        return view('leads.add-client',[
            'lead_prefix' => $prefix,
        ]);
    }

    public function storeClient(Request $request)
    {
        //dd('storeClient');

        $validator = Validator::make($request->all(), [
            'client_name' => 'required|max:255',
            'client_email' => 'nullable|email',
            'client_phone' => 'nullable|max:12',
            'client_social' => 'nullable|max:255',
            'client_firm' => 'nullable|max:255',
            'client_note' => 'nullable',

        ]);

        if ($validator->fails()) {
            return redirect('leads/add-client/'.$request->lead_prefix)
                        ->withErrors($validator)
                        ->withInput();
        }

        //add client
        if(empty($request->client_id)) {
            $client= new Client;
            $client->prefix = Str::random(18); 

        } else {
            $client = Client::where('user_id',Auth::user()->id)->where('id',$request->client_id)->first();
        }
        $client->name = $request->client_name;
        $client->phone = $request->client_phone;
        $client->email = $request->client_email;
        $client->social = $request->client_social;
        $client->firm = $request->client_firm;
        $client->note = $request->client_note;
        $client->user_id = Auth::user()->id;
        $client->save();
        
        if(empty($request->client_id)) {
            // activity 
            $activity = new Activity;
            $activity->user_id = Auth::user()->id;
            $activity->action = 'Add ';
            $activity->ip_address = request()->ip();
            $activity->what =  'new Client '.$client->name.' ('.$client->id.') to Klienci';
            $activity->save();
        }
        // update leads
        $lead = Leads::where('user_id',Auth::user()->id)->where('prefix',$request->lead_prefix)->first();
        $lead->client_id = $client->id;
        $lead->client_prefix = $client->prefix;
        $lead->save();

        return redirect()
                ->route('leads.add-product', $request->lead_prefix)
                ->with('success','Client saved successfully. Add products.');
    }

    public function addProduct(Request $request, string $prefix)
    {
        return view('leads.add-product',[
            'lead_prefix' => $prefix,
        ]);
    }
    public function storeProduct(Request $request)
    {
        $inputs = $request->all();
        if(!empty($inputs['product_id'])){
            $lead = Leads::where('user_id',Auth::user()->id)->where('prefix',$request->lead_prefix)->first();
        
            foreach ($inputs['product_id'] as $key=>$value) {
                $leadproduct = new LeadProduct;
                $leadproduct->lead_id = $lead->id;
                $leadproduct->product_id = $inputs['product_id'][$key];
                $leadproduct->quant =$inputs['product_quant'][$key];
                $leadproduct->product_price =$inputs['product_price'][$key];
                $leadproduct->user_id =  $request->user()->id;
                $leadproduct->product_value = $leadproduct->quant * $leadproduct->product_price;
                $leadproduct->product_name = $inputs['product_name'][$key];
                $leadproduct->product_prefix =  Str::random(18); 
                $leadproduct->save();
            }
            
            $lead->leadValue = isset($inputs['leadValue']) ? $inputs['leadValue'] : '';
            if($lead->type_id == 3) {
                $lead->advanceValue = $lead->leadValue;
            } else {
                $lead->advanceValue = isset($inputs['advanceValue']) ? $inputs['advanceValue'] : 0;
            }
            $lead->save();
            
            return redirect()
                    ->route('leads.show',$request->lead_prefix)
                    ->with('success','Order created successfully.');            

        }
    }

    public function show(Request $request, string $prefix)
    {
        $lead = Leads::where('user_id',Auth::user()->id)->where('prefix', $prefix)->first();
        
         
        return view('leads.show',
            [
                'lead' => $lead,                
            ]);
    }


}
