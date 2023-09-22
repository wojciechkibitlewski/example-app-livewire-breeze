<a href="{{route('todo')}}" 
class="flex flex-nowrap items-center gap-1 p-2 rounded-md text-black dark:text-white   
hover:bg-gray-100
dark:hover:bg-gray-800" 
title="{{__('sidenav.todo')}}"
data-te-sidenav-link-ref >
    <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
        class="w-5 h-5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
        </svg>

        <span class="pl-4">{{__('sidenav.todo')}}</span>
    </div>
</a> 