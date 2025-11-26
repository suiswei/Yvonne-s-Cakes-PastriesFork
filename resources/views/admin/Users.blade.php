@extends('layouts.admin')

@section('title', 'User Management')

@section('content')
<div 
    x-data="{ 
        showDetails:false, 
        showAdd:false,
        user: {} 
    }" 
    class="px-4 md:px-10 py-6"
>

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-3">
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800">User Management</h1>
            <p class="text-gray-500 text-sm md:text-base">0 registered customers</p>
        </div>

        <button 
            @click="showAdd = true"
            class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 w-full md:w-auto">
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
    <div class="mt-6 bg-white border border-pink-200 rounded-xl p-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        
        <div>
            <p class="font-semibold text-gray-800">jas</p>
            <p class="text-gray-600">@dsd</p>
            <p class="text-gray-600">jasjas@gmail.com</p>
            <p class="text-gray-600">street</p>

            <div class="flex flex-wrap gap-4 mt-2 text-sm">
                <span>🛍️ 0 orders</span>
                <span>✔️ 0 completed</span>
                <span>💰 ₱0 total spent</span>
            </div>
        </div>

        <button 
            @click="showDetails = true"
            class="px-4 py-2 border border-gray-400 rounded-lg hover:bg-gray-100 w-full md:w-auto">
            View Details
        </button>
    </div>


    <!-- USER DETAILS MODAL -->
    <div 
        x-show="showDetails"
        class="fixed inset-0 bg-black/40 flex items-center justify-center z-50 p-3"
        x-cloak
    >
        <div class="bg-white rounded-xl w-full md:w-[600px] p-6 relative">

            <button 
                @click="showDetails = false"
                class="absolute top-3 right-3 text-gray-500 hover:text-black">
                ✕
            </button>

            <h2 class="text-xl md:text-2xl font-semibold mb-1">User Details</h2>
            <p class="text-gray-500 mb-6 text-sm md:text-base">
                Complete information about <span x-text="user.name"></span>
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <p class="font-semibold">User ID</p>
                    <p x-text="user.id" class="text-gray-700"></p>
                </div>

                <div>
                    <p class="font-semibold">Username</p>
                    <p x-text="user.username" class="text-gray-700"></p>
                </div>

                <div>
                    <p class="font-semibold">Full Name</p>
                    <p x-text="user.name ?? (user.first_name + ' ' + user.last_name)" class="text-gray-700"></p>
                </div>

                <div>
                    <p class="font-semibold">Email</p>
                    <p x-text="user.email" class="text-gray-700"></p>
                </div>

                <div>
                    <p class="font-semibold">Contact</p>
                    <p x-text="user.contact ?? 'N/A'" class="text-gray-700"></p>
                </div>

                <div>
                    <p class="font-semibold">Status</p>
                    <span 
                        class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm"
                        x-text="user.status ?? 'Active'">
                    </span>
                </div>

                <div class="md:col-span-2">
                    <p class="font-semibold">Address</p>
                    <p x-text="user.address ?? 'No address provided'" class="text-gray-700"></p>
                </div>
            </div>
        </div>
    </div>


    <!-- ADD ADMIN MODAL -->
    <div 
        x-show="showAdd"
        class="fixed inset-0 bg-black/40 flex items-center justify-center z-50 p-3"
        x-cloak
    >
        <div class="bg-white rounded-xl w-full md:w-[700px] p-6 relative">

            <button 
                @click="showAdd = false"
                class="absolute top-3 right-3 text-gray-500 hover:text-black">
                ✕
            </button>

            <h2 class="text-xl md:text-2xl font-semibold">Add Admin</h2>
            <p class="text-gray-500 mb-6 text-sm md:text-base">Please fill in input fields</p>

            <form action="{{ route('admin.users.storeAdmin') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @csrf

                <div>
                    <label class="font-medium">Last Name</label>
                    <input name="last_name" type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="font-medium">First Name</label>
                    <input name="first_name" type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="font-medium">Middle Name</label>
                    <input name="middle_name" type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="font-medium">Username</label>
                    <input name="username" type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="font-medium">Email Address</label>
                    <input name="email" type="email" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="font-medium">Select Role</label>
                    <select name="role" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        <option>Admin</option>
                        <option>Super Admin</option>
                    </select>
                </div>

                <div>
                    <label class="font-medium">Password</label>
                    <input name="password" type="password" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="font-medium">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>

                <div class="col-span-1 md:col-span-2 flex flex-col md:flex-row justify-end gap-2 mt-4">
                    <button 
                        type="button"
                        @click="showAdd = false"
                        class="px-5 py-2 bg-red-500 text-white rounded-lg w-full md:w-auto">
                        Cancel
                    </button>

                    <button 
                        type="submit"
                        class="px-5 py-2 bg-yellow-500 text-white rounded-lg w-full md:w-auto">
                        Create Account
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
