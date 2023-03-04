<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste de congés:  ') }} {{$user->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        @include('leaves.partials.list-leaves')
    </div>
</x-app-layout>