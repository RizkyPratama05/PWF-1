<x-app-layout>
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                <div class="flex items-center gap-2 mb-6">
                    <a href="{{ route('product.show', $product) }}"
                       class="p-1.5 rounded-md text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 tracking-tight">Edit Product</h2>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Update details for <span class="font-medium text-gray-700 dark:text-gray-300">{{ $product->name }}</span></p>

                <form id="delete-product-form" action="{{ route('product.destroy', $product) }}" method="POST">
                    @csrf
                    @method('DELETE')
                </form>

                <form action="{{ route('product.update', $product) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div>
                        <label for="name"
                               class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Product Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name"
                               value="{{ old('name', $product->name) }}" placeholder="e.g. Wireless Headphones"
                               class="w-full px-4 py-2.5 rounded-lg border text-sm
                               {{ $errors->has('name') ? 'border-red-400 bg-red-50 dark:bg-red-900/20' : 'border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700' }}
                               text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500
                               focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        @error('name')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Quantity & Price --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="quantity"
                                   class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Quantity <span class="text-red-500">*</span>
                            </label>
                            <input type="number" id="quantity" name="quantity"
                                   value="{{ old('quantity', $product->quantity) }}" placeholder="0" min="0"
                                   class="w-full px-4 py-2.5 rounded-lg border text-sm
                                   {{ $errors->has('quantity') ? 'border-red-400 bg-red-50 dark:bg-red-900/20' : 'border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700' }}
                                   text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                            @error('quantity')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="price"
                                   class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Price (Rp) <span class="text-red-500">*</span>
                            </label>
                            <input type="number" id="price" name="price"
                                   value="{{ old('price', $product->price) }}" placeholder="0" min="0" step="0.01"
                                   class="w-full px-4 py-2.5 rounded-lg border text-sm
                                   {{ $errors->has('price') ? 'border-red-400 bg-red-50 dark:bg-red-900/20' : 'border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700' }}
                                   text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                            @error('price')
                            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- User --}}
                    <div>
                        <label for="user_id"
                               class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            User <span class="text-red-500">*</span>
                        </label>
                        <select id="user_id" name="user_id"
                                class="w-full px-4 py-2.5 rounded-lg border text-sm
                                {{ $errors->has('user_id') ? 'border-red-400 bg-red-50 dark:bg-red-900/20' : 'border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700' }}
                                text-gray-900 dark:text-gray-100
                                focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id', $product->user_id) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center justify-between pt-2">
                        <button type="submit" form="delete-product-form"
                                onclick="return confirm('Are you sure you want to delete this product?')"
                                class="inline-flex items-center gap-1.5 px-4 py-2.5 text-sm font-medium rounded-lg text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            Delete Product
                        </button>
                        <div class="flex items-center gap-3">
                            <a href="{{ route('product.show', $product) }}"
                               class="px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 text-sm font-medium text-gray-600 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow-sm transition">
                                Save Product
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>