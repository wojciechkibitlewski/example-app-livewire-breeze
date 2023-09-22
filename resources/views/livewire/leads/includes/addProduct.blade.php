<div>
    <form>
        <input type="hidden" 
        wire:model='editingLeadId' 
        name='editingLeadId' 
        id="editingLeadId" 
        >
        
        <div class="relative flex-auto">
            @include('livewire.products.search-product-modal')
        </div>


                          
        <!--Submit button-->
        <x-button
        type="submit"
        wire:click.prevent="updateProduct"
        >
        {{__('leads.update')}}
        </x-button>
    </form>
</div>
