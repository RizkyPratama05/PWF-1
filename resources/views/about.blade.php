<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tampilan /about') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p><strong>Nama:</strong> Rizky Pratama Putra</p>
                <p><strong>NIM:</strong> 20230140005</p>
                <p><strong>Program Studi:</strong> Teknologi Informasi</p>
                <p><strong>Hobi:</strong> Ngoding sambil ngopi</p>
            </div>
        </div>
    </div>
</x-app-layout>