<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mt-8 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mt-8  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Exam name") }}
                </div>
            </div>
            <div class="bg-white mt-8 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Subject Name") }}
                </div>
            </div>
            <div class="bg-white mt-8  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Time session") }}
                </div>
            </div>
            <div class="bg-white mt-8  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Block Name") }}
                </div>
            </div>
            <div class="bg-white mt-8  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Floor No") }}
                </div>
            </div>
            <div class="bg-white mt-8  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Room No") }}
                </div>
            </div>
            <div class="bg-white mt-8  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Seat No") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>