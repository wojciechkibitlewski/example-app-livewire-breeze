<div class="bg-white rounded-xl p-4 dark:bg-neutral-800 mt-6">
    <form action="{{ route('products.update') }}" method="POST" >
    @csrf
        <input type="hidden" name="prefix" value="{{ $product->prefix }}" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PATCH">

        
        <div class="w-full mb-4 ">
            <label for="name" class="">{{__('products.form_name')}}<span class="text-red-600"> (*)</span></label>
            <x-input id="name" name="name" value="{{ $product->name }}" required />
            <x-input-error for="name" />
        </div> 

        <div class="relative mb-6">
        <label for="category_id" class="block mb-2 ">{{__('products.form_category')}}<span class="text-red-600"> (*)</span></label>
            <select
            class="block mt-2 w-full border-gray-300 rounded-md text-black"
            id="category_id" name="category_id" value="old('category_id')"
            >   
                @foreach ($productcategory as $item)
                <option value="{{$item['id']}}" {{ $product->category_id == $item['id'] ? 'selected' : '' }} >{{$item['category']}}</option> 
                @endforeach
            </select>
            <x-input-error for="category_id" />

        </div>
        <div class="mb-4">
        <label for="desc" class="">{{__('products.form_desc')}}</label>
            <textarea id="desc" class="block mt-1 rounded-md w-full border-gray-300  text-black" rows="13"
            name="desc">{{$product->desc}}</textarea>
            <x-input-error for="desc" />
        </div>
        <div class="w-full mb-4 ">
        <label for="price" class="">{{__('products.form_price')}}<span class="text-red-600"> (*)</span></label>
            <x-input id="price" name="price" value="{{ $product->price }}" class="md:w-[50%]" required />
            <x-input-error for="price" />
        </div>

        <!--Submit button-->
        <x-button
        type="submit"
        >
        {{__('products.form_edit')}}
        </x-button>
    </form>
</div>