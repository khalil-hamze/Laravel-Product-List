<x-blayout>
    @include('partials._manage_search')
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Products
            </h1>
        </header>

        <table class="w-full whitespace-nowrap">
            <thead>
                <tr class="text-left font-bold">
                    <td class="border px-6 py-4">ID</td>
                    <td class="border px-6 py-4">Name</td>
                    <td class="border px-6 py-4">Price</td>
                    <td class="border px-6 py-4 text-center">Actions</td>
                </tr>
            </thead>
            <tbody>
                @unless($products->isEmpty())
                    @foreach ($products as $product)
                        <tr class="border-gray-300">
                            <td class="border px-6 py-4">
                                {{ $product->id }}
                            </td>
                            <td class="border px-6 py-4">
                                <a href="show.html">
                                    {{ $product->name }}
                                </a>
                            </td>
                            <td class="border px-6 py-4">
                                {{ $product->price }}
                            </td>
                            <td class="border px-6 py-4 text-center">
                                <a href="/admin/{{ $product->id }}/edit" class="text-blue-400 px-6 rounded-xl"><i
                                    class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </a>
                                <form method="POST" action="/admin/{{ $product->id }}" class="px-4 ">
                                    @csrf
                                    @method('Delete')
                                    <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">
                                No Products found
                            </p>
                        </td>
                    </tr>
                @endunless
            </tbody>
            <div class=" w-full mt-6 p-4">
                {{$products->links()}}
            </div>
        </table>
    </div>
</x-blayout>
