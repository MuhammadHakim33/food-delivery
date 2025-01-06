<x-user-layout>
    <div class="bg-white rounded p-6 w-full max-w-3xl mt-10 mx-auto">
        @if($order->status == 'pending')
        <div class="mb-6 bg-yellow-50 border border-yellow-200 text-yellow-800 rounded-lg p-4" role="alert" tabindex="-1" aria-labelledby="hs-actions-label">
            <div class="flex">
                <div class="shrink-0">
                    <i class="ri-information-line ri-lg"></i>
                </div>
                <div class="ms-3">
                    <h3 id="hs-actions-label" class="font-semibold">Kamu Belum Melakukan Pemabayaran</h3>
                    <div class="mt-1 text-sm text-yellow-800">Segera selesaikan pembayaran agar pesanan bisa di proses.</div>
                    <div class="mt-4">
                        <a href="/payment/{{ $order->snap_token }}" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-yellow-600 hover:text-yellow-800 focus:outline-none focus:text-yellow-800 disabled:opacity-50 disabled:pointer-events-none">Bayar</a>
                    </div>
                </div>
            </div>
        </div>
        @elseif($order->status == 'success')
        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 rounded-lg p-4" role="alert" tabindex="-1" aria-labelledby="hs-actions-label">
            <div class="flex">
                <div class="shrink-0">
                    <i class="ri-checkbox-circle-line ri-lg"></i>
                </div>
                <div class="ms-3">
                    <h3 id="hs-actions-label" class="font-semibold">Pembayaran Selesai</h3>
                    <div class="mt-1 text-sm text-green-800">Pesananmu akan segera kami proses, mohon tunggu</div>
                </div>
            </div>
        </div>
        @elseif($order->status == 'failed')
        <div class="mb-6 bg-red-50 border border-red-200 text-red-800 rounded-lg p-4" role="alert" tabindex="-1" aria-labelledby="hs-actions-label">
            <div class="flex">
                <div class="shrink-0">
                    <i class="ri-close-circle-line ri-lg"></i>
                </div>
                <div class="ms-3">
                    <h3 id="hs-actions-label" class="font-semibold">Gagal Memesan</h3>
                    <div class="mt-1 text-sm text-red-800">Mohon hubungi kami atau ulangi proses pemesanan</div>
                </div>
            </div>
        </div>
        @endif
        <div class="mb-4 text-center">
            <h1 class="text-2xl font-semibold">{{ $order->id }}</h1>
            <p class="text-gray-500">{{ $order->created_at }}</p>
        </div>
        <!-- Stepper -->
        <ul class="relative flex flex-row gap-x-2 max-w-xl mx-auto my-10">
            <!-- Item -->
            <li class="shrink basis-0 flex-1 group">
                <div class="min-w-7 min-h-7 w-full inline-flex items-center text-xs align-middle">
                    <span class="size-7 flex justify-center items-center shrink-0 bg-blue-500 font-medium text-white rounded-full">1</span>
                    <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
                </div>
                <div class="mt-3">
                    <span class="block text-sm font-medium text-gray-800">Pending</span>
                </div>
            </li>
            <!-- End Item -->
            <!-- Item -->
            <li class="shrink basis-0 flex-1 group">
                <div class="min-w-7 min-h-7 w-full inline-flex items-center text-xs align-middle">
                    <span class="size-7 flex justify-center items-center shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full">2</span>
                    <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
                </div>
                <div class="mt-3">
                    <span class="block text-sm font-medium text-gray-800">Proses</span>
                </div>
            </li>
            <!-- End Item -->
            <!-- Item -->
            <li class="shrink basis-0 flex-1 group">
                <div class="min-w-7 min-h-7 w-full inline-flex items-center text-xs align-middle">
                    <span class="size-7 flex justify-center items-center shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full">3</span>
                    <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
                </div>
                <div class="mt-3">
                    <span class="block text-sm font-medium text-gray-800">Pengiriman</span>
                </div>
            </li>
            <!-- End Item -->
            <!-- Item -->
            <li class="shrink basis-0 flex-0 group">
                <div class="min-w-7 min-h-7 w-full inline-flex items-center text-xs align-middle">
                    <span class="size-7 flex justify-center items-center shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full">4</span>
                    <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
                </div>
                <div class="mt-3">
                    <span class="block text-sm font-medium text-gray-800">Selesai</span>
                </div>
            </li>
            <!-- End Item -->
        </ul>
        <!-- End Stepper -->
        <div class="border-t border-gray-200 py-4">
            <h2 class="text-gray-700 font-semibold mb-2">Order Detail</h2>
            @foreach ($order->items as $item)
                <div class="flex items-center mb-2">
                    <h3 class="text-gray-500 font-medium flex-1">{{ '('.$item->qty.') '.$item->menu->name }}</h3>
                    <p class="text-gray-500 font-medium">Rp {{ number_format($item->price) }}</p>
                </div>
            @endforeach
        </div>
        <div class="border-t border-gray-200 pt-4">
            <h2 class="text-gray-700 font-semibold mb-2">Rincian Pembayaran</h2>
            <div class="flex justify-between mb-2">
                <span class="text-gray-500">Metode Pembayaran</span>
                <span class="text-gray-700">COD</span>
            </div>
            <div class="flex justify-between mb-2">
                <span class="text-gray-500">Subtotal</span>
                <span class="text-gray-700">Rp {{ number_format($order->total) }}</span>
            </div>
            <div class="border-t border-gray-200 my-2"></div>
            <div class="flex justify-between mt-4">
                <span class="text-gray-700 font-semibold">Total</span>
                <span class="text-gray-700 font-semibold">Rp {{ number_format($order->total) }}</span>
            </div>
        </div>
    </div>
</x-user-layout>
