<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\LeadProduct;
use App\Models\Activity;

class ProductController extends Controller
{
    public function index():View
    {
        return view('products.index');
    }

    public function create()
    {
        $productcategory = ProductCategory::where('user_id',Auth::user()->id)->orderBy('id','asc')->get();
        return view('products.create', [
            'productcategory' => $productcategory,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ]);
        $inputs = $request->all();

        if(!empty($inputs)){
            $product = new Product;
            $product->prefix = Str::random(18);
            $product->name = isset($inputs['name']) ? $inputs['name'] : '';
            $product->sku = slugify($product->name );
            $product->desc = isset($inputs['desc']) ? $inputs['desc'] : '';
            $product->price = isset($inputs['price']) ? $inputs['price'] : '';
            $product->quant = isset($inputs['quant']) ? $inputs['quant'] : '';
            $product->category_id = isset($inputs['category_id']) ? $inputs['category_id'] : '';
            $product->user_id = $request->user()->id;

            // activity 
            $activity = new Activity;
            $activity->user_id = Auth::user()->id;
            $activity->action = 'Add ';
            $activity->ip_address = request()->ip();
            $activity->what =  'new '.$product->name.' to Produkty';
            $activity->save();

            try {
                if ($product->save()) {
                    return redirect()
                        ->route('products.index')
                        ->with('success', 'Product created successfully.');
                }
            } catch (\Exception $e) {
                return $e->getMessage();
                                
            }
        }
    }

    public function show(Request $request, string $prefix)
    {
        $product = Product::where('user_id',Auth::user()->id)->where('prefix',$prefix)->first();
        // $productLeadsValue = LeadProduct::where('user_id',Auth::user()->id)->where('product_id', $product->id)
        //     ->sum('product_price'); // Sumowanie cen produktów dla danego produktu

        // $productLeadsCount = LeadProduct::where('user_id',Auth::user()->id)->where('product_id', $product->id)
        //     ->count(); // Ilość sprzedanych produktów danego produktu

        return view('products.show',[
            'product' => $product,
            'productLeadsValue' => 0,
            'productLeadsCount' => 0

        ]);
    }

    public function edit(Request $request, string $prefix)
    {
        $productcategory = ProductCategory::where('user_id',Auth::user()->id)->orderBy('id','asc')->get();
        $product = Product::where('user_id',Auth::user()->id)->where('prefix',$prefix)->first();
        
        return view('products.edit', [
            'product' => $product,
            'productcategory' => $productcategory,
        ]);        
    }

    public function update(Request $request)
    {
        $product = Product::where('user_id',Auth::user()->id)->where('prefix',$request['prefix'])->first();

        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ]);

        Product::whereId($product->id)->where('user_id',Auth::user()->id)->update([
            'name' => $request->name,
            'sku' => slugify($product->name ),
            'desc' => isset($request->desc) ? $request->desc : ' ',
            'price' => $request->price,
            'quant' => isset($request->quant) ? $request->quant : ' ',
            'category_id' => $request->category_id
        ]);
        
        // activity 
        $activity = new Activity;
        $activity->user_id = Auth::user()->id;
        $activity->action = 'Update  ';
        $activity->ip_address = request()->ip();
        $activity->what =  ''.$product->name.' in Produkty';
        $activity->save();

        return redirect()
                ->route('products.index')
                ->with('success','Produkt updated successfully.');


    }
}
