<!-- Sidenav -->
<nav
  class="hidden md:block fixed left-0 top-[80px] z-[100] h-screen !w-72 overflow-hidden
  border-r border-gray-400
  dark:bg-grayDark dark:text-gray-100 dark:border-gray-600"
  data-te-sidenav-init
  >
    <div class="relative h-full pt-4 ">
    <ul class="relative overflow-y-auto overflow-x-hidden p-4 py-0 z-[9]" data-te-sidenav-menu-ref>
            
            <li class="relative mb-2" >
                @include('layouts.nav.link-dashboard')         
            </li>
            <li class="relative mb-2">
                @include('layouts.nav.link-sales')  
                <ul class="!visible relative m-0 hidden list-none p-0 data-[te-collapse-show]:block"
                data-te-sidenav-collapse-ref>
                    
                    <li class="relative pl-3 mb-2">
                        @include('layouts.nav.link-sales-currentMonth')
                    </li>
                    <li class="relative pl-3 mb-2">
                        @include('layouts.nav.link-sales-create')
                    </li>
                    <li class="relative pl-3 mb-2">
                        @include('layouts.nav.link-sales-index')
                    </li>
                </ul>
            </li>

            <li class="relative mb-2">
                 @include('layouts.nav.link-clients')
                <ul class="!visible relative m-0 hidden list-none p-0 data-[te-collapse-show]:block "
                data-te-sidenav-collapse-ref>
                    <li class="relative pl-3 mb-2">
                        @include('layouts.nav.link-clients-index')
                    </li>
                    
                    <li class="relative pl-3 mb-2">
                        @include('layouts.nav.link-clients-create')
                    </li>
                </ul>
            </li>
            <li class="relative mb-2">
                @include('layouts.nav.link-products')
                <ul class="!visible relative m-0 hidden list-none p-0 data-[te-collapse-show]:block "
                data-te-sidenav-collapse-ref>
                    <li class="relative pl-3 mb-2">
                        @include('layouts.nav.link-products-index')
                    </li>
                    <li class="relative pl-3 mb-2">
                        @include('layouts.nav.link-products-create')
                    </li>
                </ul>
            </li>
            <li class="relative mb-2" >
                @include('layouts.nav.link-todo')         
            </li>
            <li class="relative mb-2">
                @include('layouts.nav.link-calendar')
                <ul class="!visible relative m-0 hidden list-none p-0 data-[te-collapse-show]:block "
                data-te-sidenav-collapse-ref>
                    
                    <li class="relative pl-3 mb-2">
                        @include('layouts.nav.link-calendar-timetable')
                    </li>
                   
                </ul>
            </li>
            <li class="relative mb-2" >
                @include('layouts.nav.link-reports')         
            </li>
            <li class="relative mb-2">
                @include('layouts.nav.link-settings')
                <ul class="!visible relative m-0 hidden list-none p-0 data-[te-collapse-show]:block "
                data-te-sidenav-collapse-ref>
                    
                    <li class="relative ml-3 mb-2">
                        @include('layouts.nav.link-settings-sources')
                    </li>
                    <li class="relative ml-3 mb-2">
                        @include('layouts.nav.link-settings-types')
                    </li>
                    <li class="relative ml-3 mb-2">
                        @include('layouts.nav.link-settings-categories')
                    </li>
                </ul>
            </li>
        </ul>  
    </div>
</nav>
<!-- Sidenav -->