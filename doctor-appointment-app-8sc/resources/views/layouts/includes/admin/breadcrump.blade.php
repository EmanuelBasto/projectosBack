{{-- verificar  --}}
@if(count($breadcrumbs))
    <nav class="mb-2 block">
        <ol class="flex flex-wrap text-slate-700 text-sm">
            {{-- Recorrer el elementos de breadcrumb --}}
            @foreach ($breadcrumbs as $item)
            <li class="flex items-center">
                {{-- si no es el primer elemento ponle separador --}}
               @unless ($loop->first)
                <span class="px-2 text-gray-400">/</span>
                @endunless
                {{-- Revise si tiene un href --}}
                @isset($item['href'])
                <a href="{{ $item['href'] }}" class="opacity-60 hover:opacity-100 transition">
                    {{ $item['name'] }}
                </a>
                @else
                {{ $item['name'] }}
                @endisset
            </li>
            @endforeach

        </ol>
        {{-- ultimo elemento en negritas --}}
        @if (count($breadcrumbs) > 1 )
        {{-- MT es margin top --}}
            <h6 class="font-bolt mt-2">
                {{ end($breadcrumbs['name']) }}
            </h6>
        @endif
    </nav>
@endif