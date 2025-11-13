{{--Toma los parametros del dashboard--}}
@props([
  'title' => config('app.name', 'Laravel'),
    'breadcrumbs' => []])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- Fontawesome --}}
        <script src="https://kit.fontawesome.com/f05834f7d2.js" crossorigin="anonymous"></script>
        {{-- Sweet lert 2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{-- Wire UI --}}
        <wireui:scripts/>

        <!-- Styles -->
        @livewireStyles


    </head>
    <body class="font-sans antialiased bg-gray-50">

        @include('layouts.includes.admin.navigation')

        @include('layouts.includes.admin.sidebar')
        <div class="p-4 sm:ml-64">


<!-- añadir margen superior -->
        <div class="mt-14 flex items-center justify-between w-full">
            {{--Incluir breadcrumb--}}
            @include('Layouts.includes.admin.breadcrumb')
            
            {{--Slot de acciones (botones en la parte superior derecha)--}}
            <div class="flex items-center">
                {{ $actions ?? '' }}
            </div>
        </div>
        {{$slot}}
        </div>
        @stack('modals')

        @livewireScripts

        @yield('content')

        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
        
        {{-- Mostrar Sweet Alert --}}
        @if (session('swal'))
            <script>
                Swal.fire(@json(session('swal')));
            </script>
            
        @endif
           
       <script>
            //buscar todos los elementos con la clase especifica
            forms = document.querySelectorAll('.delete-form');
            forms.forEach(form => {
                //se pone al pendiente de cualquier accion submit
                form.addEventListener('submit', function(e) {
                    //evita que se envie el formulario
                    e.preventDefault(); // Prevenir el envío del formulario
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, eliminarlo',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                          (result.isConfirmed) {
                            form.submit(); // Enviar el formulario si se confirma
                        }
                    });
                });
            });
        </script>
    </body>
</html>