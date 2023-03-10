<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if (session('error'))
    <p class="flex justify-center mt-2 font-medium text-sm text-red-600">
        {{session('error')}}
    </p>
    @endif
    <div class="py-12">
        @include('leaves.partials.list-leaves')
    </div>
</x-app-layout>