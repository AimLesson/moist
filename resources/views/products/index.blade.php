<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (Auth::user()->role == 'admin')
            <a class="mb-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{ route('products.create') }}">Create New Product</a>
            @endif
            <div class="grid gap-6 mb-6 md:grid-cols-2 lg:grid-cols-4 mt-3">
                @foreach ($products as $pr)
                    <div class="room-card max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <img class="rounded-t-lg" src="{{ asset('storage/' . $pr->image) }}"
                                alt="{{ $pr->name }}" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $pr->name }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700">Harga : Rp {{ number_format($pr->price, 0, ',', '.') }}</p>
                            <p class="mb-3 font-normal text-gray-700">Stok : {{ $pr->stock }} pcs</p>
                            @if (Auth::user()->role == 'admin')
                            <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{ route('products.edit', $pr->id) }}">Edit</a>
                            <form action="{{ route('products.destroy', $pr->id) }}" method="POST" style="display:inline;" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                            </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
