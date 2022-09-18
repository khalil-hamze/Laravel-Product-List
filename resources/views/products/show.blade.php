<x-flayout>
    @include('partials._search')
    <a href="/" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6"
                    src="{{ $product->path ? asset('storage/' . $product->path) : asset('/images/es-no-image.png') }}"
                    alt="" />

                <h3 class="text-2xl mb-2">{{ $product->name }} {{ $product->price }} $</h3>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Product Description
                    </h3>
                    <div class="text-lg space-y-6">
                        {{ $product->description }}
                    </div>
                </div>
            </div>
        </x-card>
</x-flayout>
