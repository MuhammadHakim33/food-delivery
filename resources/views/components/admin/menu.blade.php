<form action="/cart" method="post" class="menu-item">
    @csrf
    <input type="text" name="menu_id" value="{{ $item->id }}" readonly hidden>
    <input type="text" name="menu_name" value="{{ $item->name }}" readonly hidden>
    <input type="text" name="menu_price" value="{{ $item->price }}" readonly hidden>
    <button type="submit" class="bg-white p-3 rounded shadow gap-4 border border-transparent hover:border hover:border-blue-500 hover:bg-blue-50/20 relative min-h-[140px]">
        <img class="w-28 aspect-square object-cover rounded" src="{{ $item->path_img }}" />

        <div class="text-left h-full">
            <h3 class="mt-2 font-bold capitalize">{{ $item->name }}</h3>
            <p class="text-gray-600 line-clamp-3">{{ str($item->desc)->limit(50) }}</p>
            <p class="mt-2 font-medium">Rp {{ number_format($item->price) }}</p>
        </div>
    </button>
</form>