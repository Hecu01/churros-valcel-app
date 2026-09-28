@extends('layouts.main')

@section('title')
    Registrar nueva venta
@endsection

@section('content')

<div class="container">

    <form action="{{ route('venta.store') }}" method="POST">
        @csrf

        <div class="container py-4">

            <div class="row justify-content-center">

                <div class="col-lg-9">

                    {{-- Título --}}
                    <div class="mb-4">

                        <h2 class="fw-bold mb-1">
                            Registrar venta
                        </h2>

                        <p class="text-muted mb-0">
                            Cargá los productos y los datos de la venta.
                        </p>

                    </div>


                    {{-- ========================= --}}
                    {{-- DATOS DE LA VENTA --}}
                    {{-- ========================= --}}

                    <div class="card shadow-sm border-0 mb-4">

                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 fw-semibold">
                                Datos de la venta
                            </h5>
                        </div>

                        <div class="card-body">

                            <div class="row g-3">

                                {{-- Cliente --}}
                                <div class="col-md-6">

                                    <label for="cliente_id"
                                           class="form-label fw-semibold">
                                        Cliente
                                    </label>

                                    <select name="cliente_id"
                                            id="cliente_id"
                                            class="form-select">

                                        <option value="">
                                            Consumidor final
                                        </option>

                                        @foreach ($clientes as $cliente)

                                            <option value="{{ $cliente->id }}">
                                                {{ $cliente->nombre }} {{ $cliente->apellido }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>


                                {{-- Medio de pago --}}
                                <div class="col-md-6">

                                    <label for="medio_pago"
                                           class="form-label fw-semibold">
                                        Medio de pago
                                    </label>

                                    <select name="medio_pago"
                                            id="medio_pago"
                                            class="form-select">

                                        <option value="efectivo">
                                            Efectivo
                                        </option>

                                        <option value="transferencia">
                                            Transferencia
                                        </option>

                                    </select>

                                </div>


                                {{-- Estado --}}
                                <input type="hidden"
                                       name="estado"
                                       value="completada">


                                {{-- Costo de envío --}}
                                <div class="col-md-3">

                                    <label for="costo_envio"
                                           class="form-label fw-semibold">
                                        Costo de envío
                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            $
                                        </span>

                                        <input type="number"
                                               name="costo_envio"
                                               id="costo_envio"
                                               class="form-control"
                                               value="{{ old('costo_envio', 0) }}"
                                               min="0"
                                               step="0.01">

                                    </div>

                                </div>


                                {{-- Descuento --}}
                                <div class="col-md-3">

                                    <label for="descuento"
                                           class="form-label fw-semibold">
                                        Descuento
                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            $
                                        </span>

                                        <input type="number"
                                               name="descuento"
                                               id="descuento"
                                               class="form-control"
                                               value="{{ old('descuento', 0) }}"
                                               min="0"
                                               step="0.01">

                                    </div>

                                </div>


                                {{-- Observaciones --}}
                                <div class="col-md-6">

                                    <label for="observaciones"
                                           class="form-label fw-semibold">
                                        Observaciones
                                    </label>

                                    <input type="text"
                                           name="observaciones"
                                           id="observaciones"
                                           class="form-control"
                                           placeholder="Ej: entregar en domicilio...">

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ========================= --}}
                    {{-- AGREGAR PRODUCTOS --}}
                    {{-- ========================= --}}

                    <div class="card shadow-sm border-0 mb-4">

                        <div class="card-header bg-white py-3">

                            <h5 class="mb-0 fw-semibold">
                                Agregar productos
                            </h5>

                        </div>

                        <div class="card-body">

                            <div class="row g-3 align-items-end">

                                <div class="col-md-8">

                                    <label for="producto"
                                           class="form-label">
                                        Producto
                                    </label>

                                    <select id="producto"
                                            class="form-select">

                                        @foreach ($productos as $producto)

                                            <option value="{{ $producto->id }}"
                                                    data-precio="{{ $producto->precio }}">

                                                {{ $producto->nombre }} - ${{ number_format($producto->precio, 2, ',', '.') }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>


                                <div class="col-md-2">

                                    <label for="cantidad"
                                           class="form-label">
                                        Cantidad
                                    </label>

                                    <input type="number"
                                           id="cantidad"
                                           class="form-control"
                                           value="1"
                                           min="1">

                                </div>


                                <div class="col-md-2">

                                    <button type="button"
                                            id="agregar"
                                            class="btn btn-primary w-100">

                                        + Agregar

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ========================= --}}
                    {{-- DETALLE DE LA VENTA --}}
                    {{-- ========================= --}}

                    <div class="card shadow-sm border-0 mb-4">

                        <div class="card-header bg-white py-3">

                            <h5 class="mb-0 fw-semibold">
                                Detalle de venta
                            </h5>

                        </div>

                        <div class="card-body">

                            <div id="sin-productos"
                                 class="text-center text-muted py-4">

                                <p class="mb-0">
                                    No hay productos agregados.
                                </p>

                            </div>


                            <div id="detalles"
                                 class="d-flex flex-column gap-2">
                            </div>


                            <hr class="my-4">


                            {{-- RESUMEN DE LA VENTA --}}

                            <div class="row justify-content-center align-items-center">

                                <div class="col-md-6">

                                    <div class="row g-3">

                                        {{-- Fecha --}}
                                        <div class="col-7">

                                            <label for="fecha"
                                                class="form-label fw-semibold">
                                                Fecha de la venta
                                            </label>

                                            <input type="date"
                                                name="fecha"
                                                id="fecha"
                                                class="form-control"
                                                value="{{ old('fecha', now()->format('Y-m-d')) }}"
                                                required>

                                        </div>


                                        {{-- Hora --}}
                                        <div class="col-5">

                                            <label for="hora"
                                                class="form-label fw-semibold">
                                                Hora
                                            </label>

                                            <input type="time"
                                                name="hora"
                                                id="hora"
                                                class="form-control"
                                                value="{{ old('hora', now()->format('H:i')) }}"
                                                required>

                                        </div>

                                    </div>

                                </div>


                                <div class="col-md-6 col-lg-5">

                                    <div class="resumen-venta">

                                        {{-- Subtotal --}}
                                        <div class="d-flex justify-content-between mb-2">

                                            <span class="text-muted">
                                                Subtotal
                                            </span>

                                            <strong>
                                                $<span id="subtotal">0.00</span>
                                            </strong>

                                        </div>


                                        {{-- Envío --}}
                                        <div class="d-flex justify-content-between mb-2">

                                            <span class="text-muted">
                                                Costo de envío
                                            </span>

                                            <strong>
                                                $<span id="envio-total">0.00</span>
                                            </strong>

                                        </div>


                                        {{-- Descuento --}}
                                        <div class="d-flex justify-content-between mb-3">

                                            <span class="text-muted">
                                                Descuento
                                            </span>

                                            <strong class="text-danger">
                                                - $<span id="descuento-total">0.00</span>
                                            </strong>

                                        </div>


                                        <hr>


                                        {{-- Total --}}
                                        <div class="d-flex justify-content-between align-items-center pt-2">

                                            <span class="fs-5 fw-semibold">
                                                Total
                                            </span>

                                            <strong class="fs-2"
                                                    style="color: #7d1f24;">

                                                $<span id="total">
                                                    0.00
                                                </span>

                                            </strong>

                                        </div>

                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>


                    {{-- ========================= --}}
                    {{-- BOTONES --}}
                    {{-- ========================= --}}

                    <div class="d-flex justify-content-end gap-2">

                        <a href="{{ route('venta.index') }}"
                           class="btn btn-outline-secondary">

                            Cancelar

                        </a>

                        <button type="submit"
                                class="btn btn-success px-4">

                            Registrar venta

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>


<style>

    .resumen-venta {
        background: #fafafa;
        border-radius: 12px;
        padding: 20px;
    }

</style>


<script>

    const agregarBtn = document.getElementById('agregar');

    const detallesDiv = document.getElementById('detalles');

    const subtotalSpan = document.getElementById('subtotal');

    const envioTotalSpan = document.getElementById('envio-total');

    const descuentoTotalSpan =
        document.getElementById('descuento-total');

    const totalSpan = document.getElementById('total');

    const sinProductos =
        document.getElementById('sin-productos');

    const costoEnvioInput =
        document.getElementById('costo_envio');

    const descuentoInput =
        document.getElementById('descuento');


    let carrito = {};


    // ==========================================
    // ACTUALIZAR VISTA
    // ==========================================

    function actualizarVista() {

        detallesDiv.innerHTML = '';

        let subtotal = 0;

        const productos = Object.values(carrito);


        // ------------------------------------------
        // SIN PRODUCTOS
        // ------------------------------------------

        if (productos.length === 0) {

            sinProductos.style.display = 'block';

        } else {

            sinProductos.style.display = 'none';


            productos.forEach((producto) => {

                const subtotalProducto =
                    producto.precio * producto.cantidad;

                subtotal += subtotalProducto;


                const detalleDiv =
                    document.createElement('div');

                detalleDiv.className =
                    'border rounded p-3';


                detalleDiv.innerHTML = `

                    <div class="row align-items-center">

                        <div class="col-md-4">

                            <strong>
                                ${producto.nombre}
                            </strong>

                            <div class="text-muted small">
                                $${producto.precio.toFixed(2)} c/u
                            </div>

                        </div>


                        <div class="col-md-3">

                            <div class="input-group input-group-sm">

                                <button
                                    type="button"
                                    class="btn btn-outline-secondary btn-restar">
                                    −
                                </button>

                                <input
                                    type="text"
                                    class="form-control text-center"
                                    value="${producto.cantidad}"
                                    readonly
                                >

                                <button
                                    type="button"
                                    class="btn btn-outline-secondary btn-sumar">
                                    +
                                </button>

                            </div>

                        </div>


                        <div class="col-md-3 text-md-end mt-2 mt-md-0">

                            <small class="text-muted d-block">
                                Subtotal
                            </small>

                            <strong>
                                $${subtotalProducto.toFixed(2)}
                            </strong>

                        </div>


                        <div class="col-md-2 text-md-end mt-2 mt-md-0">

                            <button
                                type="button"
                                class="btn btn-outline-danger btn-sm btn-eliminar">

                                Eliminar

                            </button>

                        </div>

                    </div>


                    <input
                        type="hidden"
                        name="detalles[${producto.id}][producto_id]"
                        value="${producto.id}"
                    >

                    <input
                        type="hidden"
                        name="detalles[${producto.id}][cantidad]"
                        value="${producto.cantidad}"
                    >

                `;


                // ------------------------------------------
                // SUMAR
                // ------------------------------------------

                detalleDiv
                    .querySelector('.btn-sumar')
                    .addEventListener('click', () => {

                        carrito[producto.id].cantidad++;

                        actualizarVista();

                    });


                // ------------------------------------------
                // RESTAR
                // ------------------------------------------

                detalleDiv
                    .querySelector('.btn-restar')
                    .addEventListener('click', () => {

                        carrito[producto.id].cantidad--;

                        if (carrito[producto.id].cantidad <= 0) {

                            delete carrito[producto.id];

                        }

                        actualizarVista();

                    });


                // ------------------------------------------
                // ELIMINAR
                // ------------------------------------------

                detalleDiv
                    .querySelector('.btn-eliminar')
                    .addEventListener('click', () => {

                        delete carrito[producto.id];

                        actualizarVista();

                    });


                detallesDiv.appendChild(detalleDiv);

            });

        }


        // ==========================================
        // CALCULAR TOTALES
        // ==========================================

        const costoEnvio =
            parseFloat(costoEnvioInput.value) || 0;

        const descuento =
            parseFloat(descuentoInput.value) || 0;


        let total =
            subtotal + costoEnvio - descuento;


        // Evitar total negativo

        if (total < 0) {
            total = 0;
        }


        // Mostrar valores

        subtotalSpan.textContent =
            subtotal.toFixed(2);

        envioTotalSpan.textContent =
            costoEnvio.toFixed(2);

        descuentoTotalSpan.textContent =
            descuento.toFixed(2);

        totalSpan.textContent =
            total.toFixed(2);

    }


    // ==========================================
    // AGREGAR PRODUCTO
    // ==========================================

    agregarBtn.addEventListener('click', () => {

        const productoSelect =
            document.getElementById('producto');

        const cantidadInput =
            document.getElementById('cantidad');


        const productoId =
            productoSelect.value;

        const option =
            productoSelect.options[
                productoSelect.selectedIndex
            ];


        const productoNombre =
            option.text.split(' - $')[0].trim();


        const precio =
            parseFloat(option.dataset.precio);


        const cantidad =
            parseInt(cantidadInput.value);


        if (!productoId || cantidad <= 0) {
            return;
        }


        // Si ya existe

        if (carrito[productoId]) {

            carrito[productoId].cantidad += cantidad;

        }


        // Si no existe

        else {

            carrito[productoId] = {

                id: productoId,

                nombre: productoNombre,

                precio: precio,

                cantidad: cantidad

            };

        }


        actualizarVista();


        // Reiniciar cantidad

        cantidadInput.value = 1;

    });


    // ==========================================
    // ACTUALIZAR TOTAL AL CAMBIAR ENVÍO/DESCUENTO
    // ==========================================

    costoEnvioInput.addEventListener(
        'input',
        actualizarVista
    );

    descuentoInput.addEventListener(
        'input',
        actualizarVista
    );


    // ==========================================
    // ESTADO INICIAL
    // ==========================================

    actualizarVista();

</script>

@endsection

