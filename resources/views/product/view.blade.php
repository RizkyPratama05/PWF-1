<x-app-layout>
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('product.index') }}"
                           class="p-1.5 rounded-md text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 19l-7-7 7-7"/>
                            </svg>
                        </a>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 tracking-tight">Product</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">Viewing product</p>
                        </div>
                    </div>

                    {{-- Action buttons --}}
                    <div class="flex items-center gap-2">
                        <x-edit-button :url="route('product.edit', $product)">Edit</x-edit-button>
                        <x-delete-button :action="route('product.delete', $product->id)">Delete</x-delete-button>
                    </div>
                </div>

                {{-- Detail List --}}
                <div class="rounded-lg border border-gray-200 dark:border-gray-700 divide-y divide-gray-200 dark:divide-gray-700">

                    {{-- Name --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-5 py-4 items-center">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Product Name</div>
                        <div class="text-sm font-semibold text-gray-900 dark:text-gray-100 md:col-span-2">{{ $product->name }}</div>
                    </div>

                    {{-- Category --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-5 py-4 items-center">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Category</div>
                        <div class="text-sm font-semibold text-gray-900 dark:text-gray-100 md:col-span-2 italic">{{ $product->category->name ?? '-' }}</div>
                    </div>

                    {{-- Quantity --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-5 py-4 items-center">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Quantity</div>
                        <div class="md:col-span-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $product->quantity > 0
                                    ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400'
                                    : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400' }}">
                                {{ $product->quantity }} {{ $product->quantity > 0 ? 'In Stock' : 'Out Stock' }}
                            </span>
                        </div>
                    </div>

                    {{-- Price --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-5 py-4 items-center">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Price</div>
                        <div class="text-sm font-semibold text-gray-900 dark:text-gray-100 md:col-span-2">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                    </div>

                    {{-- Owner --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-5 py-4 items-center">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Owner</div>
                        <div class="md:col-span-2 flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-800 dark:text-indigo-300 text-xs font-bold uppercase">
                                {{ substr($product->user->name ?? '?', 0, 1) }}
                            </div>
                            <span class="text-sm text-gray-800 dark:text-gray-100">{{ $product->user->name ?? 'N/A' }}</span>
                        </div>
                    </div>

                    {{-- Created At --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-5 py-4 items-center">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Created At</div>
                        <div class="text-sm text-gray-600 dark:text-gray-300 md:col-span-2">
                            {{ $product->created_at->format('d M Y, H:i') }}
                        </div>
                    </div>

                    {{-- Updated At --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-5 py-4 items-center">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Updated At</div>
                        <div class="text-sm text-gray-600 dark:text-gray-300 md:col-span-2">
                            {{ $product->updated_at->format('d M Y, H:i') }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>