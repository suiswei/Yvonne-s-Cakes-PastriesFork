@extends('layouts.admin')

@section('title', 'Inventory')

@section('content')

<div x-data="{ showAddModal: false }">

<div class="px-3 sm:px-6 md:px-10 py-6 md:py-8">

    {{-- Page Header --}}
    <div>
        <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800">
            Inventory Management
        </h1>
        <p class="text-gray-500 mt-1 text-xs sm:text-sm md:text-base">
            Monitor and manage product stock levels
        </p>
    </div>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 md:gap-5 mt-6 mb-8">

        {{-- Card Template --}}
        @foreach ([
            ['title' => 'Total Products', 'value' => '0', 'icon' => 'box.svg'],
            ['title' => 'Available Ingredients', 'value' => '0', 'icon' => 'up-arrow.svg'],
            ['title' => 'Low Stock', 'value' => '₱0', 'icon' => 'warning.svg'],
            ['title' => 'Out of Stock', 'value' => '0', 'icon' => 'down-arrow.svg'],
        ] as $card)
        <div class="border border-pink-200 bg-pink-50 p-3 sm:p-4 md:p-6 rounded-xl">
            <p class="text-gray-600 font-semibold text-xs sm:text-sm md:text-base">{{ $card['title'] }}</p>
            <div class="flex items-center justify-between mt-2">
                <p class="text-lg sm:text-xl md:text-3xl font-bold">{{ $card['value'] }}</p>
                <img src="{{ asset('icons/' . $card['icon']) }}" class="w-5 h-5 sm:w-6 sm:h-6 md:w-8 md:h-8 opacity-70">
            </div>
        </div>
        @endforeach

    </div>

    {{-- Search + Filters --}}
    <div class="border rounded-xl border-pink-200 p-4 md:p-5">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            {{-- Search Bar --}}
            <div class="flex items-center border border-gray-300 rounded-lg px-3 py-2 w-full md:w-1/2">
                <span class="mr-2">🔍</span>
                <input type="text" class="w-full outline-none text-sm md:text-base" placeholder="Search products...">
            </div>

            {{-- Categories --}}
            <div class="flex flex-wrap gap-2 sm:gap-3">
                <button class="px-3 sm:px-4 py-2 bg-black text-white rounded-lg text-xs sm:text-sm">
                    All (0)
                </button>

                @foreach (['Dairy', 'Flavorings', 'Meat', 'Fats/Oils', 'Produce'] as $cat)
                <button class="px-3 sm:px-4 py-2 border border-pink-300 rounded-lg text-xs sm:text-sm">
                    {{ $cat }}
                </button>
                @endforeach
            </div>

        </div>
    </div>

    {{-- Ingredients Table --}}
    <div class="border border-pink-200 mt-8 rounded-xl p-4 md:p-6">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-3">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-800">Ingredients</h2>

            <button 
                @click="showAddModal = true"
                class="flex items-center justify-center space-x-2 px-4 py-2 bg-pink-500 text-white rounded-lg shadow text-xs sm:text-sm md:text-base"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" 
                     stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" 
                          d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span>Add Ingredient</span>
            </button>
        </div>

        <p class="text-gray-500 text-xs sm:text-sm mb-4">0 ingredient found</p>

        {{-- Mobile Scroll Wrapper --}}
        <div class="overflow-x-auto -mx-2 sm:mx-0">
            <table class="min-w-full text-left text-xs sm:text-sm">
                <thead class="border-b text-gray-600 whitespace-nowrap">
                    <tr>
                        <th class="py-2">Ingredient</th>
                        <th class="py-2">Total In</th>
                        <th class="py-2">Total Used</th>
                        <th class="py-2">Available</th>
                        <th class="py-2">Reorder</th>
                        <th class="py-2">Status</th>
                        <th class="py-2">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td colspan="7" class="py-10 text-center text-gray-400">
                            <div class="flex flex-col items-center">
                                <img src="{{ asset('icons/empty.svg') }}" class="w-8 h-8 md:w-10 md:h-10 mb-2 opacity-50">
                                No ingredient found
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</div>

{{-- Add Ingredient Modal --}}
<div 
    x-cloak 
    x-show="showAddModal" 
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50 px-4 sm:px-6"
>

    <div 
        @click.away="showAddModal = false"
        class="bg-white w-full max-w-xs sm:max-w-md md:max-w-lg rounded-2xl shadow-lg p-6"
    >
        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="text-lg sm:text-xl font-semibold text-gray-800">Add Ingredient</h2>
                <p class="text-gray-500 text-xs sm:text-sm">Add a new ingredient to the inventory</p>
            </div>

            <button @click="showAddModal = false" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
        </div>

        <form>
            <div class="space-y-3">

                {{-- Name --}}
                <div>
                    <label class="text-sm font-medium block mb-1">Name</label>
                    <input type="text" class="w-full px-3 py-2 bg-gray-100 rounded-lg text-sm" required>
                </div>

                {{-- Unit --}}
                <div>
                    <label class="text-sm font-medium block mb-1">Unit</label>
                    <input type="text" class="w-full px-3 py-2 bg-gray-100 rounded-lg text-sm" required>
                </div>

                {{-- Category --}}
                <div>
                    <label class="text-sm font-medium block mb-1">Category</label>
                    <select class="w-full px-3 py-2 bg-gray-100 rounded-lg text-sm">
                        <option>Dairy</option>
                        <option>Dry Goods</option>
                        <option>Flour</option>
                        <option>Sugar</option>
                        <option>Toppings</option>
                        <option>Other</option>
                    </select>
                </div>

                {{-- Stock --}}
                <div>
                    <label class="text-sm font-medium block mb-1">Stock</label>
                    <input type="number" class="w-full px-3 py-2 bg-gray-100 rounded-lg text-sm" value="0">
                </div>

                {{-- Min Stock --}}
                <div>
                    <label class="text-sm font-medium block mb-1">Min Stock</label>
                    <input type="number" class="w-full px-3 py-2 bg-gray-100 rounded-lg text-sm" value="0">
                </div>
            </div>

            {{-- Footer --}}
            <div class="flex justify-end space-x-2 sm:space-x-3 mt-6">
                <button 
                    type="button" 
                    @click="showAddModal = false"
                    class="px-4 py-2 rounded-lg border text-sm"
                >
                    Cancel
                </button>

                <button 
                    type="submit"
                    class="px-6 py-2 rounded-lg bg-pink-500 text-white font-semibold text-sm"
                >
                    Add
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
