<?php

namespace App\Livewire\Settings\ProductCategory;


use Livewire\Component;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Exception;

use App\Models\ProductCategory;
use App\Models\Activity;
class ProductCategoryIndex extends Component
{
    use WithPagination;

    public $category = '';
    public $s;

    public $category_id;

    public $activity;

    public $editingCategoryId;
    public $editingCategoryCategory;
    
    protected $listeners = ['refreshComponent' => '$refresh'];


    public function add()
    {
        $this->dispatch('open-modal', name: 'addCategory');
    }

    public function create()
    {
        try 
         {
            sleep(1);

            $validated = $this->validate([ 
                'category' => 'required|min:3|max:50',
            ]);

            $s = new ProductCategory;
            $s->category = $this->category;
            $s->user_id = Auth::user()->id;
            $s->save();
            
            // activity 
            $activity = new Activity;
            $activity->user_id = Auth::user()->id;
            $activity->action = 'Add ';
            $activity->ip_address = request()->ip();
            $activity->what =  $s->source.' to ProductCategory';
            $activity->save();
            
            $this->reset('category');
            $this->dispatch('close-modal');
            session()->flash('success', 'Category created successfully.');
            return redirect()->to('/settings/productcategory/index');
         }
         catch(Exception $e) 
         {
             session()->flash('error', 'Failed to created category!');
             return;
         }   
    }

    public function edit($id)
    {
        $sCategory = ProductCategory::where('user_id',auth()->id())->where('id', $id)->first();
        
        $this->editingCategoryId = $sCategory->id;
        $this->editingCategoryCategory = $sCategory->category;
        
        $this->dispatch('open-modal', name: 'editCategory');
    }

    public function update()
    {
        try 
        {
            $sType = ProductCategory::findOrFail($this->editingCategoryId) -> update(
                [
                    'category' => $this->editingCategoryCategory,                    
                ] 
            );
            $this->reset('editingCategoryId', 'editingCategoryCategory',); 
            session()->flash('success', 'Category updated successfully.');
            $this->dispatch('close-modal');

          
        }
        catch(Exception $e) 
        {
            session()->flash('error', 'Failed to edit category!');
            return;
        } 

    }

    public function delete($categoryId)
    {
        $this->category_id = $categoryId;
        $this->dispatch('open-modal', name: 'removeCategory');
    }

    public function remove($category_id)
    {
        try {
            ProductCategory::where('user_id',auth()->id())->where('id', $category_id)->delete();
            $this->dispatch('close-modal');

            session()->flash('success', 'Category deleted successfully.');

        } catch(Exception $e) {
            session()->flash('error', 'Failed to delete Category!');
            return;
        }

    }

    public function render()
    {
        $categories = ProductCategory::where('user_id',auth()->id())
        ->orderBy('category','asc')
        ->paginate(10);
        return view('livewire.settings.product-category.product-category-index',
        [
            'categories' => $categories,
        ]);
    }
}
