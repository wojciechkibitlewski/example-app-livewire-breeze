<div>
    <form>
        {{__('clients.delete_p')}}                   
        <!--Submit button-->
        <x-button
        type="submit"
        wire:click.prevent="remove('{{ $client_prefix }}')"
        >
        {{__('clients.delete')}}
        </x-button>
    </form>
</div>
