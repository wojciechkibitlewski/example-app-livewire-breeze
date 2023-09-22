<div>
    <form >
        <div class="flex justify-between my-4" >
            <select 
            wire:model="currentYear" 
            id="currentYear" name="currentYear" 
            class="w-[30%] border-gray-300 rounded-md dark:bg-gray-300 dark:text-black p-1 px-6" 
            >
            @for ($x=2018; $x<2028; $x++)
                <option value="{{$x}}">{{$x}}</option>
            @endfor
            </select>

            <select 
            wire:model="currentMonth" 
            id="current_month" name="current_month" 
            class="w-[65%] border-gray-300 rounded-md dark:bg-gray-300 dark:text-black p-1 px-6" 
            
            >
                <option value="01">{{__('calendar.January')}}</option>
                <option value="02">{{__('calendar.February')}}</option>
                <option value="03">{{__('calendar.March')}}</option>
                <option value="04">{{__('calendar.April')}}</option>
                <option value="05">{{__('calendar.May')}}</option>
                <option value="06">{{__('calendar.June')}}</option>
                <option value="07">{{__('calendar.July')}}</option>
                <option value="08">{{__('calendar.August')}}</option>
                <option value="09">{{__('calendar.September')}}</option>
                <option value="10">{{__('calendar.October')}}</option>
                <option value="11">{{__('calendar.November')}}</option>
                <option value="12">{{__('calendar.December')}}</option>
            </select>
        </div>
        <!--Submit button-->
        <x-button
            type="submit"
            wire:click.prevent="changeMonth"
            >
            {{__('calendar.select')}}
        </x-button>
    </form>
</div>
