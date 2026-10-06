@extends('layouts.admin')

@section('title')
    Clientes - Churros Valcel
@endsection

@section('content')

    <div class="admin-page">

        {{-- ENCABEZADO --}}
        <div class="page-header">

            <div>

                <div class="page-eyebrow">
                    GESTIÓN DE CLIENTES
                </div>

                <h1>
                    Clientes
                </h1>

                <p>
                    Administrá la información de los clientes
                    registrados en Churros Valcel.
                </p>

            </div>


            <div class="page-header-action">

                <a href="{{ route('cliente.create') }}"
                class="btn-admin-primary">

                    <i class="fa-solid fa-plus"></i>

                    Nuevo cliente

                </a>

            </div>

        </div>


        {{-- BUSCADOR --}}
        <div class="admin-panel mb-4">

            <div class="search-header">

                <div>

                    <h5>
                        Base de clientes
                    </h5>

                    <span>
                        Buscá por nombre, apellido o teléfono.
                    </span>

                </div>


                <div class="client-counter">

                    <strong id="total-clientes">
                        {{ $clientes->total() }}
                    </strong>

                    <span>
                        clientes
                    </span>

                </div>

            </div>


            <div class="search-box">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    id="buscarCliente"
                    class="form-control"
                    placeholder="Buscar cliente..."
                    autocomplete="off">

            </div>

        </div>


        {{-- TABLA --}}
        <div id="tabla-clientes">

            @include('admin.clientes.partials.tabla')

        </div>


        {{-- FOOTER --}}
        <div class="admin-page-footer">

            <span>
                Churros Valcel
            </span>

            <span>·</span>

            Gestión de clientes

        </div>

    </div>


    {{-- =====================================================
        AJAX BUSQUEDA
    ===================================================== --}}

    @push('scripts')

        <script>

            const inputBuscar = document.getElementById('buscarCliente');
            const tablaClientes = document.getElementById('tabla-clientes');
            const totalClientes = document.getElementById('total-clientes');

            let temporizador;


            /*
            |--------------------------------------------------------------------------
            | Buscar clientes
            |--------------------------------------------------------------------------
            */

            inputBuscar.addEventListener('input', function () {

                clearTimeout(temporizador);

                const busqueda = this.value;


                temporizador = setTimeout(() => {

                    buscarClientes(
                        `{{ route('cliente.index') }}?buscar=${encodeURIComponent(busqueda)}`
                    );

                }, 300);

            });


            /*
            |--------------------------------------------------------------------------
            | Ejecutar búsqueda
            |--------------------------------------------------------------------------
            */

            function buscarClientes(url) {

                fetch(url, {

                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }

                })

                .then(response => response.json())

                .then(data => {

                    tablaClientes.innerHTML = data.html;

                    totalClientes.textContent = data.total;

                })

                .catch(error => {

                    console.error(
                        'Error al buscar clientes:',
                        error
                    );

                });

            }


            /*
            |--------------------------------------------------------------------------
            | Paginación AJAX
            |--------------------------------------------------------------------------
            */

            tablaClientes.addEventListener('click', function (event) {

                const link = event.target.closest('.pagination a');

                if (!link) {
                    return;
                }

                event.preventDefault();

                buscarClientes(link.href);

            });

        </script>

    @endpush

@endsection