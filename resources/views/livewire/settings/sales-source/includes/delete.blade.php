<div>
    <form>
        <input type="hidden" name="" value="">
        {{__('settings.source_delete_more')}}                   
        <!--Submit button-->
        <x-button
        type="submit"
        wire:click.prevent="remove({{ $source_id }})"
        >
        {{__('settings.form_delete')}}
        </x-button>
    </form>
</div>
