<p class="uppercase text-xs text-gray-400">{{__('leads.table_updated_at')}}</p>
<div class="flex flex-row w-full justify-between items-center">
    <p class="text-lg md:text-2xl">{{ date("Y-m-d", strtotime($lead->updated_at)) }}</p>
</div>