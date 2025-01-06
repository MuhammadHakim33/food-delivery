<x-user-layout>
    <div id="snap-container" class="p-4 [&>iframe]:mx-auto"></div>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>
    
    <script type="text/javascript">
        window.snap.embed('{{ $order->snap_token }}', {
            embedId: 'snap-container',
            onSuccess: function (result) {
                fetch("{{ config('app.url') }}order/{{ $order->id }}/approve", {
                    method: "PUT",
                    headers: {
                        "Content-type": "application/json; charset=UTF-8",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                .then(function(response) {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    window.location.replace("http://rmselerapanca.test/order/{{ $order->id }}/detail");
                })
                .catch(function(error) {
                    alert('PEMBAYARAN ERROR');
                    window.location.replace("http://rmselerapanca.test/");
                });
            },
            onPending: function (result) {
                alert("SEGERA LAKUKAN PEMBAYARAN"); 
                window.location.replace("http://rmselerapanca.test/order/{{ $order->id }}/detail");
            },
            onError: function (result) {
                fetch("{{ config('app.url') }}order/{{ $order->id }}/failed", {
                    method: "PUT",
                    headers: {
                        "Content-type": "application/json; charset=UTF-8",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                .then(function(response) {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    alert("PEMBAYARAN GAGAL");
                    window.location.replace("http://rmselerapanca.test/order/{{ $order->id }}/detail");
                })
                .catch(function(error) {
                    alert('PEMBAYARAN ERROR');
                    window.location.replace("http://rmselerapanca.test/");
                });
            },
            onClose: function () {
                alert('KAMU MENUTUP HALAMAN INI TANPA MELAKUKAN PEMBAYARAN');
                window.location.replace("http://rmselerapanca.test/order/{{ $order->id }}/detail");
            }
        });
    </script>
</x-user-layout>