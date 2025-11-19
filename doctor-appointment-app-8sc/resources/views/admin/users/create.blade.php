    <x-admin-layout title="Users | Simify"   :breadcrumbs="[
        [
            'name' => 'Dashboard',
            'href' => route('admin.dashboard'),
        ],
        [
            'name' => 'Users',
            'href' => route('admin.users.index'),
        ],
        [
            'name' => 'Nuevo Usuario',
        ],
    ]">

    <x-wire-card>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <x-wire-input label="Nombre" name="name" placeholder="Nombre del rol" value="{{ old('name') }}" ol>
                
            </x-wire-input>
            <div class="flex justify-end mt-4">
                <x-wire-button  blue type="submit">Guardar</x-wire-button>
            </div>
        </form>
    </x-wire-card>

</x-admin-layout>