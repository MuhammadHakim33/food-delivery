<header class="flex items-center justify-between px-6 py-4 bg-white border-b-4 border-indigo-600">
    <div class="flex items-center">
        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>

    <div class="flex items-center">
        <div x-data="{ dropdownOpen: false }" class="relative">
            <div class=" inline-flex items-center px-3 py-2 border border-indigo-600 text-sm leading-4 font-bold rounded-md text-white dark:text-gray-400 bg-indigo-600 dark:bg-gray-800 focus:outline-none">
                <span>{{ Auth::user()->name }}</span>
            </div>
   `     </div>

    </div>
</header>