<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;


class SearchProduct extends Component
{
    public $products;
    public $records;
    public $selectedProductId;
    public $quant = 1;
    public $leadValue = 0;
    public $selectedProducts = [];
    public $selectedProductID;
    public $selProd = [];

    
    public function addProductList()
    {
        $product = $this->records->firstWhere('id', $this->selectedProductID);
        $selProd = ['product_id'=> $product['id'], 'name'=> $product['name'],'quant'=> $this->quant, 'product_price'=>$product['price'], 'productValue'=> ($product['price']*$this->quant) ];
        
        $this->leadValue += ($product['price']*$this->quant);
        $this->selectedProducts[] = $selProd;
    }

    public function removeProduct($index)
    {
        $product = $this->selectedProducts[$index];
        $this->leadValue -= $product['productValue'];
        array_splice($this->selectedProducts, $index, 1);
    }

    public function render()
    {
        $this->records = Product::where('user_id',Auth::user()->id)
                    ->select('*')
                    ->get();
        return view('livewire.products.search-product');
    }
}
