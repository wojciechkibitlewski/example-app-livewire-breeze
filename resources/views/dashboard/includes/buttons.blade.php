<div class="w-full grid grid-cols-2 md:grid-cols-4 gap-8 p-6 text-center ">
        

        <a href="{{route('leads.create')}}" title="{{__('dashboard.button_01')}}" class="inline-block">
            <div class="flex flex-row justify-center p-2 py-4 md:p-4 border border-neutral-400 rounded-2xl text-center items-center drop-shadow 
             bg-white dark:bg-neutral-700 dark:text-neutral-100">
                <div class="rounded-full w-14 h-14 md:w-20 md:h-20 p-2 md:p-3 drop-shadow-lg border 
                bg-orange-500 text-neutral-100 border-gray-300  
                dark:bg-orange-600 dark:text-neutral-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                    stroke="currentColor" class="w-10 h-10 md:w-14 md:h-14">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                    </svg>

                </div>
                <div class="w-full text-xs md:text-base font-bold">{{__('dashboard.button_01')}}</div>
            </div>
            
        </a>

        <a href="{{route('clients.create')}}" title="{{__('dashboard.button_02')}}" class="inline-block">
        <div class="flex flex-row justify-center p-2 py-4 md:p-4 border border-neutral-400 rounded-2xl text-center items-center drop-shadow 
             bg-white dark:bg-neutral-700 dark:text-neutral-100">
                <div class="rounded-full w-14 h-14 md:w-20 md:h-20 p-2 md:p-3 drop-shadow-lg border 
                bg-orange-500 text-neutral-100 border-gray-300  
                dark:bg-orange-600 dark:text-neutral-100">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                    class="w-10 h-10 md:w-14 md:h-14">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                </div>
                <div class="w-full text-xs md:text-base font-bold">{{__('dashboard.button_02')}}</div>
            </div>
        </a>

        <a href="{{route('todo')}}" title="{{__('dashboard.button_04')}}" class="inline-block">
        <div class="flex flex-row justify-center p-2 py-4 md:p-4 border border-neutral-400 rounded-2xl text-center items-center drop-shadow 
             bg-white dark:bg-neutral-700 dark:text-neutral-100">
                <div class="rounded-full w-14 h-14 md:w-20 md:h-20 p-2 md:p-3 drop-shadow-lg border 
                bg-orange-500 text-neutral-100 border-gray-300  
                dark:bg-orange-600 dark:text-neutral-100">  
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                    stroke="currentColor" class="w-10 h-10 md:w-14 md:h-14">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>

                </div>
                <div class="w-full text-xs md:text-base font-bold">{{__('dashboard.button_04')}}</div>
            </div>
        </a>

        <a href="{{route('calendar.schelude')}}#{{ date('Y-m-d') }}" title="{{__('dashboard.button_05')}}" class="inline-block">
        <div class="flex flex-row justify-center p-2 py-4 md:p-4 border border-neutral-400 rounded-2xl text-center items-center drop-shadow 
             bg-white dark:bg-neutral-700 dark:text-neutral-100">
                <div class="rounded-full w-14 h-14 md:w-20 md:h-20 p-2 md:p-3 drop-shadow-lg border 
                bg-orange-500 text-neutral-100 border-gray-300  
                dark:bg-orange-600 dark:text-neutral-100">    
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                    stroke="currentColor" class="w-10 h-10 md:w-14 md:h-14">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                    </svg>
                </div>
                <div class="w-full text-xs md:text-base font-bold">{{__('dashboard.button_05')}}</div>
            </div>
        </a>
        
        <a href="{{route('reports')}}" title="{{__('dashboard.button_06')}}" class="inline-block">
        <div class="flex flex-row justify-center p-2 py-4 md:p-4 border border-neutral-400 rounded-2xl text-center items-center drop-shadow 
             bg-white dark:bg-neutral-700 dark:text-neutral-100">
                <div class="rounded-full w-14 h-14 md:w-20 md:h-20 p-2 md:p-3 drop-shadow-lg border 
                bg-orange-500 text-neutral-100 border-gray-300  
                dark:bg-orange-600 dark:text-neutral-100">   
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                    stroke="currentColor" class="w-10 h-10 md:w-14 md:h-14">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                    </svg>

                </div>
                <div class="w-full text-xs md:text-base font-bold">{{__('dashboard.button_06')}}</div>
            </div>
            
        </a>

        <a href="{{route('reports.sales-year-to-year')}}" title="{{__('dashboard.button_07')}}" class="inline-block">
        <div class="flex flex-row justify-center p-2 py-4 md:p-4 border border-neutral-400 rounded-2xl text-center items-center drop-shadow 
             bg-white dark:bg-neutral-700 dark:text-neutral-100">
                <div class="rounded-full w-14 h-14 md:w-20 md:h-20 p-2 md:p-3 drop-shadow-lg border 
                bg-orange-500 text-neutral-100 border-gray-300  
                dark:bg-orange-600 dark:text-neutral-100">   
                    <svg xmlns="http://www.w3.org/2000/svg" 
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 md:w-14 md:h-14">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                    </svg>
                </div>
                <div class="w-full text-xs md:text-base font-bold">{{__('dashboard.button_07')}}</div>
            </div>
            
        </a>



    </div>