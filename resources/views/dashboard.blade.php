<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-6 text-gray-900">
    <p class="text-lg font-semibold">
        Bonjour {{ auth()->user()->prenom }} {{ auth()->user()->name }},
    </p>
    <p class="mt-2 text-sm text-gray-600">
        Vous êtes : <span class="font-bold text-emerald-700">{{ auth()->user()->roles_label }}</span>
    </p>
</div>

</x-app-layout>
