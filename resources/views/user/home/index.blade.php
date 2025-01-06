<x-user-layout>
    <x-user.header :$carts :$total />

    <section class="bg-white py-8 rounded shadow-sm">
        <div class="container mx-auto px-4 flex flex-wrap justify-between items-end gap-4">
            <div class="lg:max-w-lg">
                <h1 class="text-4xl font-bold">Rumah Makan Selera Panca</h1>
                <p class="text-gray-600 mt-2">Makanan Asli Indonesia</p>
                <div class="flex mt-2 text-gray-600">
                    <i class="ri-map-pin-2-fill mr-2"></i>
                    <p>Jl. IKPN Bintaro, RT.4/RW.10, Bintaro, Kec. Pesanggrahan Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta</p>
                </div>
                <div class="flex mt-2 text-gray-600">
                    <i class="ri-time-fill mr-2"></i>
                    <p>Jam Buka : 17.00 - 23.59</p>
                </div>
            </div>
        </div>
    </section>

    <main class="container mx-auto px-4 mt-8 space-y-6">
        @if(isset($foods))
        <h2 class="text-xl font-bold mb-4">ANEKA MAKANAN</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($foods as $item)
                <x-user.menu :$item />
            @endforeach
        </div>
        @endif
        
        @if(isset($drinks))
        <h2 class="text-xl font-bold mb-4">ANEKA MINUMAN</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($drinks as $item)
                <x-user.menu :$item />
            @endforeach
        </div>
        @endif
    </main>
</x-user-layout>