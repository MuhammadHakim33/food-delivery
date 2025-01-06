@php
    $isCartEmpty = count($carts) > 0 ? true : false ;
@endphp


<header class="bg-white sticky top-0 inset-x-0 border-b shadow-sm z-10">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <div class="flex items-center">
            <img alt="Selera Panca Logo" class="h-14 rounded-xl" src="{{ asset('images/Logo RM. Selera Panca.png') }}" />
        </div>
        <div class="flex items-center gap-x-4">
            @auth
            <div class="hs-dropdown relative inline-flex">
                <button id="hs-dropdown-unstyled" type="button" class="text-sm py-2 px-3 hs-dropdown-toggle inline-flex justify-center items-center gap-x-2 border border-gray-200 text-gray-500 hover:border-blue-600 hover:text-blue-600 focus:outline-none focus:border-blue-600 focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none" aria-expanded="false" aria-label="Menu">
                    {{Auth::user()->name}}
                </button>
                <div class="py-2 px-3 hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-56 hidden hs-dropdown-open:flex flex-col z-10 mt-2 min-w-60 border border-gray-200 bg-white divide-y divide-gray-200" role="menu" aria-labelledby="hs-dropdown-unstyled">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-medium text-gray-600 hover:text-blue-600" href="#">Logout</button>
                    </form>
                </div>
            </div>
            @endauth
            @guest
            <a href="{{ route('login') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded border border-transparent disabled:pointer-events-none hover:bg-gray-100 focus:bg-gray-100">
                Log in
            </a>
            <a href="{{ route('register') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded border border-transparent bg-gray-200 hover:bg-gray-300 focus:outline-none focus:bg-gray-300 disabled:pointer-events-none">
                Register
            </a>
            @endguest
            <button type="button" @class(['flex','shrink-0','justify-center','items-center','gap-2','size-[38px]','text-sm','font-medium','rounded-lg','border', 'border-green-700' => $isCartEmpty, 'hover:bg-gray-100','focus:bg-gray-100']) aria-haspopup="dialog" aria-expanded="false" aria-controls="modal-cart" data-hs-overlay="#modal-cart">
                <i @class(['ri-shopping-basket-line', 'ri-lg', 'text-green-700' => $isCartEmpty])></i>
            </button>
        </div>
    </div>
</header>

<div id="modal-cart" class="hs-overlay hidden size-full fixed top-0 start-0 z-[60] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="modal-cart-label">
    <div class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all sm:max-w-md sm:w-full m-3 sm:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-sm pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4 border-b">
                <h3 id="modal-cart-label" class="font-medium text-gray-800">Keranjang</h3>
                <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" aria-label="Close" data-hs-overlay="#modal-cart">
                    <i class="ri-close-large-fill"></i>
                </button>
            </div>
            <div class="p-4 overflow-y-auto">
                @auth
                <ul class="flex flex-col divide-y divide-gray-200">
                    @if($carts->count())
                    @foreach ($carts as $item)
                    <li class="inline-flex items-center gap-x-2 py-3 text-sm text-gray-800">
                        <div class="inline-block bg-white mr-1" data-hs-input-number='{"min":1}'>
                            <div class="flex items-center gap-x-1.5">
                                <!-- DELETE -->
                                <form action="/cart/{{ $item->rowId }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="size-7 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                        <i class="ri-delete-bin-7-line"></i>
                                    </button>
                                </form>
                                <!-- DECREASE -->
                                <form action="/cart/{{ $item->rowId }}/decrease" method="post">
                                    @method('PUT')
                                    @csrf
                                    <input type="text" name="qty" value="{{ $item->qty }}" readonly hidden>
                                    <button type="submit" class="size-7 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" @disabled($item->qty == 1)>
                                        <i class="ri-subtract-fill ri-lg"></i>
                                    </button>
                                </form>
                                <!-- QUANTITY -->
                                <input class="p-0 w-4 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none" style="-moz-appearance: textfield;" type="number" value="{{ $item->qty }}">
                                <!-- INCREASE -->
                                <form action="/cart/{{ $item->rowId }}/increase" method="post">
                                    @method('PUT')
                                    @csrf
                                    <input type="text" name="qty" value="{{ $item->qty }}" readonly hidden>
                                    <button type="submit" class="size-7 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                        <i class="ri-add-fill ri-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <p>{{ $item->name }}</p>
                        <p class="ml-auto">{{ number_format($item->total) }}</p>
                    </li>
                    @endforeach
                    @else
                    <li class="mx-auto italic text-gray-500">Pilih Menu</li>
                    @endif
                </ul>
                @endauth
                @guest
                <p class="text-center italic text-gray-500">Login untuk melihat isi keranjang</p>
                @endguest
            </div>
            @auth
            @if($carts->count())
            <div class="bg-gray-50 py-3 px-4 border-t">
                <div class="flex justify-between mb-4">
                    <h3 class="font-medium">Total Harga</h3>
                    <p class="font-medium">Rp {{ number_format($total) }}</p>
                </div>
                <a class="block py-2 px-3 w-full text-sm text-center font-medium rounded border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="/checkout">Pesan</a>
            </div>
            @endif
            @endauth
        </div>
    </div>
</div>