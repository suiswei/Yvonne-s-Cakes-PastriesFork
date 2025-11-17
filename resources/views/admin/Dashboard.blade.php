@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="bg-white min-h-screen flex m-6 px-2">

  <!-- Main -->
  <main class="flex-1">


    <h2 class="text-3xl font-bold mb-2">Dashboard Overview</h2>
    <p class="text-gray-600 mb-8">Welcome to your Admin Dashboard</p>

    <!-- Cards Row -->
    <div class="grid grid-cols-4 gap-6 mb-10">
      <div class="bg-[#FFF7F7] border border-pink-200 p-5 rounded-lg shadow-sm">
        <p class="text-gray-600">Total Revenue</p>
        <h3 class="text-2xl font-bold">₱{{ $totalRevenue ?? 0 }}</h3>
        <p class="text-gray-500 text-sm">From {{ $completedOrders ?? 0 }} completed orders</p>
      </div>

      <div class="bg-[#FFF7F7] border border-pink-200 p-5 rounded-lg shadow-sm">
        <p class="text-gray-600">Pending Orders</p>
        <h3 class="text-2xl font-bold">{{ $pendingOrders ?? 0 }}</h3>
        <p class="text-gray-500 text-sm">{{ $pendingOrders ?? 0 }} orders in progress</p>
      </div>

      <div class="bg-[#FFF7F7] border border-pink-200 p-5 rounded-lg shadow-sm">
        <p class="text-gray-600">Active Paluwagan</p>
        <h3 class="text-2xl font-bold">₱{{ $activePaluwagan ?? 0 }}</h3>
        <p class="text-gray-500 text-sm">{{ $collected ?? 0 }} collected</p>
      </div>

      <div class="bg-[#FFF7F7] border border-pink-200 p-5 rounded-lg shadow-sm">
        <p class="text-gray-600">Low Stock Items</p>
        <h3 class="text-2xl font-bold">{{ $lowStock ?? 0 }}</h3>
        <p class="text-gray-500 text-sm">Requires attention</p>
      </div>
    </div>

    <div class="grid grid-cols-3 gap-6">
      <div class="col-span-2 bg-white border border-pink-200 p-8 rounded-lg h-80 flex flex-col justify-center items-center text-gray-400">
        <h3 class="text-2xl font-bold text-gray-700 mb-2">Recent Orders</h3>
        <p class="text-gray-500 mb-4">Latest customer orders</p>
        <p>No orders yet</p>
      </div>

      <div class="bg-white border border-pink-200 p-8 rounded-lg">
        <h3 class="text-xl font-bold mb-2">Quick Actions</h3>
        <p class="text-gray-500 mb-5">Common administrative task</p>

        <div class="space-y-4">
          <div class="flex justify-between items-center p-3 border border-pink-200 rounded-lg">
            <span>Pending Orders</span><span class="font-bold">{{ $pendingOrders ?? 0 }}</span>
          </div>
          <div class="flex justify-between items-center p-3 border border-pink-200 rounded-lg">
            <span>Low Stock Products</span><span class="font-bold">{{ $lowStock ?? 0 }}</span>
          </div>
          <div class="flex justify-between items-center p-3 border border-pink-200 rounded-lg">
            <span>Total Customers</span><span class="font-bold">{{ $totalCustomers ?? 0 }}</span>
          </div>
          <div class="flex justify-between items-center p-3 border border-pink-200 rounded-lg">
            <span>Total Products</span><span class="font-bold">{{ $totalProducts ?? 0 }}</span>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
@endsection
