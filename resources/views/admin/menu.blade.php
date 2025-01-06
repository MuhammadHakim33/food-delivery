<x-admin-layout>
    <h2 class="text-gray-700 text-3xl font-medium font-bold">Manajemen Menu</h2>
    <div class="flex flex-col mt-8">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">Nama Menu</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Tambah Menu</a>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @if(isset($foods))
                        @foreach($foods as $item)
                        <tr>
                            <!-- Kolom Gambar -->
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <img src="{{ $item->path_img }}" alt="{{ $item->name }}" class="h-16 w-16 object-cover rounded-lg">
                            </td>

                            <!-- Kolom Nama Menu -->
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 font-semibold">{{ $item->name }}</td>

                            <!-- Kolom Deskripsi -->
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $item->description }}</td>

                            <!-- Kolom Harga -->
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">Rp {{ number_format($item->price, 0, ',', '.') }}</td>

                            <!-- Kolom Aksi -->
                            <td class="px-4 py-2 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                        @endif

                        @if(isset($drinks))
                        @foreach($drinks as $item)
                        <tr>
                            <!-- Kolom Gambar -->
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <img src="{{ $item->path_img }}" alt="{{ $item->name }}" class="h-16 w-16 object-cover rounded-lg">
                            </td>

                            <!-- Kolom Nama Menu -->
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 font-semibold">{{ $item->name }}</td>

                            <!-- Kolom Deskripsi -->
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $item->description }}</td>

                            <!-- Kolom Harga -->
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">Rp {{ number_format($item->price, 0, ',', '.') }}</td>

                            <!-- Kolom Edit -->
                            <td class="px-4 py-2 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>