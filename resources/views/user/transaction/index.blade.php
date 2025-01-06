<x-user-layout>
    <form action="/checkout" method="post" class="container mx-auto max-w-xl p-4 mt-8 space-y-6">
        @csrf
        <div class="bg-white p-6 rounded border">
            <div class="flex content-center items-baseline gap-x-2 divide-x divide-gray-700 mb-4">
                <h3 class="text-base font-bold mb-4">PENGIRIMAN</h3>
                <p class="ps-2 opacity-80 text-sm uppercase">Penerima - {{ $user->name }}</p>
            </div>
            <div class="mb-4">
                <label for="kecamatan" class="block text-sm mb-2">Kecamatan</label>
                <input type="text" id="kecamatan" name="kecamatan" class="py-3 px-4 block w-full border-gray-200 rounded text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
            </div>
            <div class="mb-4">
                <label for="kelurahan" class="block text-sm mb-2">Kelurahan</label>
                <input type="text" id="kelurahan" name="kelurahan" class="py-3 px-4 block w-full border-gray-200 rounded text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
            </div>
            <div class="mb-4">
                <label for="detail" class="block text-sm mb-2">Alamat Detail</label>
                <input type="text" id="detail" name="detail" class="py-3 px-4 block w-full border-gray-200 rounded text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
            </div>
        </div>
        <div class="bg-white gap-y-4 p-6 rounded border flex flex-col">
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
                    <p>Rp {{ number_format($total_price) }}</p>
                </div>
            </div>
            <div class="flex justify-between items-center text-lg">
                <h3>Total Bayar</h3>
                <p class="font-semibold">Rp {{ number_format($total_pay) }}</p>
            </div>
            <button type="submit" class="py-3 px-4 text-sm font-medium rounded border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                Pesan & Bayar
            </button>
        </div>
    </form>

    <!-- TOAST -->
    @if(session('failed'))
    <div class="fixed bottom-0 end-0 max-w-md p-6">
        <div id="dismiss-toast" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-red-100 border border-red-800 rounded shadow-lg" role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
            <div class="flex gap-x-4 p-4 text-red-800">
                <p id="hs-toast-dismiss-button-label" class="text-sm">
                    {{ session('failed') }}
                </p>
                <div class="ms-auto">
                    <button type="button" class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100" aria-label="Close" data-hs-remove-element="#dismiss-toast">
                        <span class="sr-only">Close</span>
                        <i class="ri-close-large-line"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-user-layout>