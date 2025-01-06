<x-user-layout>
    <div class="w-full max-w-xl mt-10 mx-auto px-2">

        @if($order->status == 'pending')
            <x-payment-alert class="bg-yellow-50 border-yellow-800 text-yellow-800">
                <x-payment-alert.icon>
                    <i class="ri-information-line ri-xl"></i>
                </x-payment-alert.icon>
                <x-payment-alert.message>
                    <x-payment-alert.message.title>
                        Kamu Belum Melakukan Pemabayaran
                    </x-payment-alert.message.title>
                    <x-payment-alert.message.sub-title>
                        Segera selesaikan pembayaran agar pesanan bisa di proses.
                    </x-payment-alert.message.sub-title>
                </x-payment-alert.message>
                <x-payment-alert.button class="bg-yellow-700 text-white hover:bg-yellow-800 focus:bg-yellow-700">
                    Bayar
                </x-payment-alert.button>
            </x-payment-alert>
        @elseif($order->status == 'success')
            <x-payment-alert class="bg-green-50 border-green-800 text-green-800">
                <x-payment-alert.icon>
                    <i class="ri-checkbox-circle-line ri-xl"></i>
                </x-payment-alert.icon>
                <x-payment-alert.message>
                    <x-payment-alert.message.title>
                        Pembayaran Selesai
                    </x-payment-alert.message.title>
                    <x-payment-alert.message.sub-title>
                        Pesananmu akan segera kami proses, mohon tunggu
                    </x-payment-alert.message.sub-title>
                </x-payment-alert.message>
            </x-payment-alert>
        @elseif($order->status == 'failed')
            <x-payment-alert class="bg-red-50 border-red-800 text-red-800">
                <x-payment-alert.icon>
                    <i class="ri-close-circle-line ri-xl"></i>
                </x-payment-alert.icon>
                <x-payment-alert.message>
                    <x-payment-alert.message.title>
                        Pembayaran Gagal
                    </x-payment-alert.message.title>
                    <x-payment-alert.message.sub-title>
                        Mohon hubungi kami atau ulangi proses pemesanan
                    </x-payment-alert.message.sub-title>
                </x-payment-alert.message>
            </x-payment-alert>
        @endif

        <div class="bg-white rounded p-6 my-6">
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

        <a href="/" type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Kembali</a>
    </div>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        
        payButton.addEventListener('click', function () {
            window.snap.pay('{{ $order->snap_token }}', {
                onSuccess: function(result){
                    window.location.reload();
                },
                onPending: function(result){
                    window.location.reload();
                },
                onError: function(result){
                    window.location.reload();
                },
            });
        });
    </script>
</x-user-layout>
