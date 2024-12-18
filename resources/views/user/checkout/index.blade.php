@extends('user.layout')

@section('content')

<header class="bg-white sticky top-0 inset-x-0 border-b shadow-sm z-10">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <div class="flex items-center">
            <img alt="GrabFood Logo" class="h-10" src="https://storage.googleapis.com/a1aa/image/NN1CHnKtSlYvN51XTHLoMARLXbwgGqCSTKUrZw7FDcH1S75E.jpg"/>
        </div>
    </div>
</header>

<main class="container mx-auto p-4 mt-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Part 1: Delivery Form and Payment Method -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded shadow-md">
                <h3 class="text-base font-bold mb-4">PENGIRIMAN</h3>
                <div class="opacity-80 flex content-center items-baseline gap-x-2 mb-4">
                    <i class="ri-map-pin-line"></i>
                    <div>
                        <p class="font-medium">Penerima - {{ $user->name }}</p>
                        <p class="">{{ $user->address->detail }}, Kel. {{ $user->address->kelurahan }}, Kec. {{ $user->address->kecamatan }}</p>
                    </div>
                </div>

                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded border border-gray-200 bg-white text-gray-500 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal">
                    Ganti Alamat
                </button>
                <!-- MODAL GANTI ALAMAT -->
                <div id="hs-scale-animation-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
                    <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                        <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                        <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                            <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800 dark:text-white">
                            Modal title
                            </h3>
                            <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-scale-animation-modal">
                            <span class="sr-only">Close</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                            </button>
                        </div>
                        <div class="p-4 overflow-y-auto">
                            <p class="mt-1 text-gray-800 dark:text-neutral-400">
                            This is a wider card with supporting text below as a natural lead-in to additional content.
                            </p>
                        </div>
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-scale-animation-modal">
                            Close
                            </button>
                            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Save changes
                            </button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- END MODAL GANTI ALAMAT -->
            </div>
            <div class="bg-white p-6 rounded shadow-md">
                <h3 class="text-base font-bold mb-4">METODE PEMBAYARAN</h3>
                <div class="grid sm:grid-cols-2 gap-2">
                    <label for="cod" class="flex p-3 w-full bg-white border border-gray-200 rounded text-sm focus:border-blue-500 focus:ring-blue-500">
                        <input type="radio" name="method_payment" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" id="cod">
                        <span class="text-sm font-medium text-gray-600 ms-3">Tunai</span>
                    </label>

                    <label for="transfer" class="flex p-3 w-full bg-white border border-gray-200 rounded text-sm focus:border-blue-500 focus:ring-blue-500">
                        <input type="radio" name="method_payment" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" id="transfer" checked="">
                        <span class="text-sm font-medium text-gray-600 ms-3">Transfer Bank</span>
                    </label>
                </div>
            </div>
        </div>
        <!-- Part 2: Selected Menu -->
        <div class="bg-white gap-y-4 p-6 rounded shadow-md flex flex-col">
            <h3 class="text-base font-bold">RINGKASAN PESANAN</h3>
            <div class="space-y-4 grow">
                @foreach ($carts as $menu)
                <div class="flex items-center gap-x-4">
                    <img class="w-14 h-14 rounded aspect-square object-cover" src="{{ $menu->model->path_img }}" />
                    <div class="grow">
                        <h3 class="text-lg font-medium">{{ $menu->name }}</h3>
                        <p>({{ $menu->qty }}x) Rp{{ number_format($menu->price) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <hr>
            <div class="space-y-1">
                <div class="flex justify-between items-center text-base text-gray-500">
                    <h5>Total Harga</h5>
                    <p>Rp{{ $total_price }}</p>
                </div>
            </div>
            <div class="flex justify-between items-center text-lg">
                <h3>Total Bayar</h3>
                <p class="font-semibold">Rp{{ $total_pay }}</p>
            </div>
            <button type="button" class="py-3 px-4 text-sm font-medium rounded border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                Pesan
            </button>
        </div>
    </div>
</main>

<!-- FOOTER -->
@include('user.partials.footer')
@endsection