<?php

namespace App\Livewire\Products;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\ProductCategory;

class ProductsIndex extends Component
{
    use WithPagination;

    public $perPage = 10;

    #[Url(history:true)]
    public $search = '';

    public $product_prefix; 

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function delete($productPrefix)
    {
        $this->product_prefix = $productPrefix;
        $this->dispatch('open-modal', name: 'removeProduct');
    }

    public function remove($product_prefix)
    {
        try {
            Product::where('user_id',auth()->id())->where('prefix', $product_prefix)->delete();
            $this->dispatch('close-modal');

            session()->flash('success', 'Product deleted successfully.');

        } catch(Exception $e) {
            session()->flash('error', 'Failed to delete product!');
            return;
        }

    }

    public function render()
    {
        $products = Product::search($this->search)->where('user_id',Auth::user()->id)->orderBy('name','asc')->paginate($this->perPage);
        $productcategory = ProductCategory::where('user_id',Auth::user()->id)->orderBy('id','asc')->get();
        
        return view('livewire.products.products-index',[
            'products' => $products,
            'productcategory' => $productcategory,
        ]);
    }
}
