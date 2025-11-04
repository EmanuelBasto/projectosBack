<div class="flex items-center space-x-2">
    <a href="{{ route('admin.roles.edit', $role) }}" 
       class="inline-flex items-center justify-center px-2 py-1 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>

    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="inline">
        @csrf 
        @method('DELETE')
        <x-wire-button type="submit" red xs>
            <i class="fa-solid fa-trash"></i>
        </x-wire-button>
    </form>
</div>