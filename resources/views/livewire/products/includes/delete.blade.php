<div>
    <form>
        {{__('products.delete_lead_more')}}                   
        <!--Submit button-->
        <x-button
        type="submit"
        wire:click.prevent="remove('{{ $product_prefix }}')"
        >
        {{__('settings.form_delete')}}
        </x-button>
    </form>
</div>
