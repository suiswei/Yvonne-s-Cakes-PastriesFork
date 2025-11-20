@extends('layouts.admin')

@section('title', 'User Management')

@section('content')
<div x-data="{ showDetails:false, showAdd:false }" class="px-10 py-6">

    {{-- Header --}}
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">User Management</h1>
            <p class="text-gray-500">0 registered customers</p>
        </div>

        <button 
            @click="showAdd = true"
            class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800">
            Add Admin
        </button>
    </div>

    {{-- Search Bar --}}
    <div class="mt-6">
        <input 
            type="text"
            placeholder="Search users by name, email, or username..."
            class="w-full border border-pink-200 rounded-lg py-2 px-4 focus:ring-pink-300 focus:outline-none"
        >
    </div>

    {{-- Sample User Card --}}
    <div class="mt-6 bg-white border border-pink-200 rounded-xl p-4 flex items-center justify-between">
        <div class="flex gap-4">
            <div>
                <p class="font-semibold text-gray-800">jas</p>
                <p class="text-gray-600">@dsd</p>
                <p class="text-gray-600">jasjas@gmail.com</p>
                <p class="text-gray-600">street</p>

                <div class="flex gap-4 mt-2 text-sm">
                    <span>🛍️ 0 orders</span>
                    <span>✔️ 0 completed</span>
                    <span>💰 ₱0 total spent</span>
                </div>
            </div>
        </div>

        <button 
            @click="showDetails = true"
            class="px-4 py-2 border border-gray-400 rounded-lg hover:bg-gray-100">
            View Details
        </button>
    </div>


    <!-- ===================================================== -->
    <!-- USER DETAILS MODAL -->
    <!-- ===================================================== -->
    <div 
        x-show="showDetails"
        class="fixed inset-0 bg-black/40 flex items-center justify-center z-50"
        x-cloak
    >
        <div class="bg-white rounded-xl w-[600px] p-6 relative">

            <button 
                @click="showDetails = false"
                class="absolute top-3 right-3 text-gray-500 hover:text-black">
                ✕
            </button>

            <h2 class="text-2xl font-semibold mb-1">User Details</h2>
            <p class="text-gray-500 mb-6">Complete information about jas</p>

            <div class="grid grid-cols-2 gap-4">

                <div>
                    <p class="font-semibold">User ID</p>
                    <p class="text-gray-700">10110022100</p>
                </div>

                <div>
                    <p class="font-semibold">Username</p>
                    <p class="text-gray-700">@dsd</p>
                </div>

                <div>
                    <p class="font-semibold">Full Name</p>
                    <p class="text-gray-700">jas</p>
                </div>

                <div>
                    <p class="font-semibold">Email</p>
                    <p class="text-gray-700">jasjas@gmail.com</p>
                </div>

                <div>
                    <p class="font-semibold">Contact</p>
                    <p class="text-gray-700">1212121212</p>
                </div>

                <div>
                    <p class="font-semibold">Status</p>
                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">
                        Active
                    </span>
                </div>

                <div class="col-span-2">
                    <p class="font-semibold">Address</p>
                    <p class="text-gray-700">street</p>
                </div>
            </div>
        </div>
    </div>


    <!-- ===================================================== -->
    <!-- ADD ADMIN MODAL -->
    <!-- ===================================================== -->
    <div 
        x-show="showAdd"
        class="fixed inset-0 bg-black/40 flex items-center justify-center z-50"
        x-cloak
    >
        <div class="bg-white rounded-xl w-[700px] p-6 relative">

            <button 
                @click="showAdd = false"
                class="absolute top-3 right-3 text-gray-500 hover:text-black">
                ✕
            </button>

            <h2 class="text-2xl font-semibold">Add Admin</h2>
            <p class="text-gray-500 mb-6">Please fill in input fields</p>

            <form action="#" method="POST" class="grid grid-cols-2 gap-4">

                @csrf

                <div>
                    <label class="font-medium">Last Name</label>
                    <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter your lastname">
                </div>

                <div>
                    <label class="font-medium">First Name</label>
                    <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter your firstname">
                </div>

                <div>
                    <label class="font-medium">Middle Name</label>
                    <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter your middle initial">
                </div>

                <div>
                    <label class="font-medium">Username</label>
                    <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter desired username">
                </div>

                <div class="col-span-2">
                    <label class="font-medium">Email Address</label>
                    <input type="email" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="jasmemes00@gmail.com">
                </div>

                <div class="col-span-2">
                    <label class="font-medium">Select Role</label>
                    <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        <option>Admin</option>
                        <option>Super Admin</option>
                    </select>
                </div>

                <div>
                    <label class="font-medium">Password</label>
                    <input type="password" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter password">
                </div>

                <div>
                    <label class="font-medium">Confirm Password</label>
                    <input type="password" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Confirm password">
                </div>

                <div class="col-span-2 flex justify-end gap-2 mt-4">
                    <button 
                        type="button"
                        @click="showAdd = false"
                        class="px-5 py-2 bg-red-500 text-white rounded-lg">
                        Cancel
                    </button>

                    <button 
                        type="submit"
                        class="px-5 py-2 bg-yellow-500 text-white rounded-lg">
                        Create Account
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
