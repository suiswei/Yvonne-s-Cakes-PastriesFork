@extends('layouts.admin')

@section('title', 'Inventory')

@section('content')
<div class="px-10 py-8">

    {{-- Page Header --}}
    <h1 class="text-3xl font-bold text-gray-800">Inventory Management</h1>
    <p class="text-gray-500 -mt-1 mb-8">Monitor and manage product stock levels</p>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">

        {{-- Total Products --}}
        <div class="border border-pink-200 bg-pink-50 p-6 rounded-xl">
            <p class="text-gray-600 font-semibold">Total Products</p>
            <div class="flex items-center justify-between mt-2">
                <p class="text-3xl font-bold">0</p>
                {{-- Your original icon --}}
                <img src="{{ asset('icons/box.svg') }}" class="w-8 h-8 opacity-70">
            </div>
        </div>

        {{-- Available Ingredients --}}
        <div class="border border-pink-200 bg-pink-50 p-6 rounded-xl">
            <p class="text-gray-600 font-semibold">Available Ingredients</p>
            <div class="flex items-center justify-between mt-2">
                <p class="text-3xl font-bold">0</p>
                <img src="{{ asset('icons/up-arrow.svg') }}" class="w-8 h-8 opacity-70">
            </div>
        </div>

        {{-- Low Stock --}}
        <div class="border border-pink-200 bg-pink-50 p-6 rounded-xl">
            <p class="text-gray-600 font-semibold">Low Stock</p>
            <div class="flex items-center justify-between mt-2">
                <p class="text-3xl font-bold">₱0</p>
                <img src="{{ asset('icons/warning.svg') }}" class="w-8 h-8 opacity-70">
            </div>
        </div>

        {{-- Out of Stock --}}
        <div class="border border-pink-200 bg-pink-50 p-6 rounded-xl">
            <p class="text-gray-600 font-semibold">Out of Stock</p>
            <div class="flex items-center justify-between mt-2">
                <p class="text-3xl font-bold">0</p>
                <img src="{{ asset('icons/down-arrow.svg') }}" class="w-8 h-8 opacity-70">
            </div>
        </div>

    </div>

        {{-- Search + Filters --}}
    <div class="border rounded-xl border-pink-200 p-5">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            {{-- Search Bar --}}
            <div class="flex items-center border border-gray-300 rounded-lg px-3 py-2 w-full md:w-1/2">
                <span class="text-blue-500 mr-2">🔍</span>
                <input type="text" class="w-full outline-none" placeholder="Search products">
            </div>

            {{-- Categories --}}
            <div class="flex flex-wrap md:flex-nowrap gap-3">
                <button class="px-4 py-2 bg-black text-white rounded-lg whitespace-nowrap">All (0)</button>
                <button class="px-4 py-2 border border-pink-300 rounded-lg whitespace-nowrap">Dairy</button>
                <button class="px-4 py-2 border border-pink-300 rounded-lg whitespace-nowrap">Flavorings</button>
                <button class="px-4 py-2 border border-pink-300 rounded-lg whitespace-nowrap">Meat</button>
                <button class="px-4 py-2 border border-pink-300 rounded-lg whitespace-nowrap">Fats/Oils</button>
                <button class="px-4 py-2 border border-pink-300 rounded-lg whitespace-nowrap">Produce</button>
            </div>

        </div>
    </div>

    {{-- Ingredients Table --}}
    <div class="border border-pink-200 mt-8 rounded-xl p-6">

        <h2 class="text-lg font-semibold text-gray-800">Ingredients</h2>
        <p class="text-gray-500 text-sm mb-4">0 ingredient found</p>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-b text-gray-600">
                    <tr>
                        <th class="py-2">Ingredient</th>
                        <th class="py-2">Total In</th>
                        <th class="py-2">Total Used</th>
                        <th class="py-2">Available Stock</th>
                        <th class="py-2">Reorder Level</th>
                        <th class="py-2">Status</th>
                        <th class="py-2">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- Empty State --}}
                    <tr>
                        <td colspan="7" class="py-10 text-center text-gray-400">
                            <div class="flex flex-col items-center">
                                <img src="{{ asset('icons/empty.svg') }}" class="w-10 h-10 mb-2 opacity-50">
                                No ingredient found
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection
