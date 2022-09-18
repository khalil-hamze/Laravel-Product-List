<x-blayout>
    <x-card class="p-10 max-w-lg mx-auto mt-24 mb-20">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Editing a Product...
            </h2>
            <p class="mb-4">Edit: {{ $product->name }}</p>
        </header>

        <form method="POST" action="/admin/{{$product->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Product Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{ $product->name }}"/>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="price" class="inline-block text-lg mb-2">Product price</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="price"
                    placeholder="" value="{{ $product->price }}"/>
                @error('price')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="path" class="inline-block text-lg mb-2">
                    Image
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="path" />
                @error('path')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Product Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="Include functionality, features, options, etc">{{$product->description}}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 bg-black hover:bg-pink-400">
                    Update Product
                </button>
                <a href="/admin" class="text-black ml-4"> Cancel </a>
            </div>
        </form>
    </x-card>
</x-blayout>
