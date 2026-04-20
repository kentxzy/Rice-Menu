<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <div style="margin-top: 20px;">
                        <a href="{{ route('menus.index') }}" style="background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin-right: 10px;">Go to Rice Menu</a>
                        <a href="{{ route('orders.index') }}" style="background-color: #28a745; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin-right: 10px;">Manage Orders</a>
                        <a href="{{ route('payments.index') }}" style="background-color: #ffc107; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin-right: 10px;">View Payments</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
