<div>
    <form>
        <input type="hidden" 
        wire:model='editingLeadId' 
        name='editingLeadId' 
        id="editingLeadId" 
        >
        <div class="relative flex-auto p-4" data-te-modal-body-ref>
            {{__('leads.delete_lead_more')}}
        </div>
                          
        <!--Submit button-->
        <x-button
        type="submit"
        wire:click.prevent="removeLead"
        >
        {{__('leads.delete')}}
        </x-button>
    </form>
</div>
