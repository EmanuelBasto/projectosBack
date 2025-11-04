<x-admin-layout title="Roles | Simify" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Roles',
    ],
]">

    <x-slot name="actions">
        <a href="{{ route('admin.roles.create') }}" 
           class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
            <i class="fa-solid fa-plus mr-2"></i> Nuevo
        </a>
    </x-slot>

@livewire('admin.datatables.role-table')

</x-admin-layout>