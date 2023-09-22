<div>
    <form>
        <input type="hidden" 
        wire:model='editingProductId' 
        name='editingProductId' 
        id="editingProductId" 
        >
        <input type="hidden" 
        wire:model='editingLeadId' 
        name='editingLeadId' 
        id="editingLeadId" 
        >
        <div class="relative flex-auto p-4" data-te-modal-body-ref>
            {{__('leads.delete_product_more')}}
        </div>
                          
        <!--Submit button-->
        <x-button
        type="submit"
        wire:click.prevent="removeProduct"
        >
        {{__('leads.delete')}}
        </x-button>
    </form>
</div>
