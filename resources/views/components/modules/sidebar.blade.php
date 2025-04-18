<div class="flex overflow-x-auto border-b border-gray-900/5 py-4 lg:block lg:w-64 lg:flex-none lg:border-0">
    <nav class="flex-none px-4 sm:px-6 lg:px-0">
        <ul role="list" class="flex gap-x-3 gap-y-1 whitespace-nowrap lg:flex-col">
            {{-- Lists of routes --}}
            <li>
                <a href="{{ route('Transactions') }}"
                    class="sidebar-main {{ Route::currentRouteName() === 'Transactions' ? 'sidebar-active' : '' }}">
                    <div class="h-6 w-6 rounded-md bg-gray-300"> </div>
                    Transactions
                </a>
            </li>
            <li>
                <a href="{{ route('Settings') }}"
                    class="sidebar-main {{ Route::currentRouteName() === 'Settings' ? 'sidebar-active' : '' }}">
                    <div class="h-6 w-6 rounded-md bg-gray-300"> </div>
                    Settings
                </a>
            </li>
            <li>
                <a href="{{ route('User Settings') }}"
                    class="sidebar-main sidebar-indent {{ Route::currentRouteName() === 'User Settings' ? 'sidebar-active' : '' }}">
                    <div class="h-6 w-6 rounded-md bg-gray-300"> </div>
                    User Management
                </a>
            </li>
            <li>
                <a href="{{ route('ATM Settings') }}"
                    class="sidebar-main sidebar-indent {{ Route::currentRouteName() === 'ATM Settings' ? 'sidebar-active' : '' }}">
                    <div class="h-6 w-6 rounded-md bg-gray-300"> </div>
                    ATM Management
                </a>
            </li>
            <li>
                <a href="{{ route('My Settings') }}"
                    class="sidebar-main sidebar-indent {{ Route::currentRouteName() === 'My Settings' ? 'sidebar-active' : '' }}">
                    <div class="h-6 w-6 rounded-md bg-gray-300"> </div>
                    My Account
                </a>
            </li>
        </ul>
    </nav>
</div>
