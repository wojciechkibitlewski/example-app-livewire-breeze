@if ($message = Session::get('success'))
    <div class="bg-gray-200 rounded-xl p-4 dark:bg-gray-700 my-4">
        <p>{{ $message }}</p>
    </div>
@endif

@if ($errors->any())
    <div class="rounded-xl p-4 my-4 bg-red-600 text-white dark:bg-red-800 dark:text-white">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif