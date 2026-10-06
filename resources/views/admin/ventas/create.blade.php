@extends('layouts.admin')

@section('title')
    Nueva venta - Churros Valcel
@endsection

@section('content')

<div class="admin-page">

    {{-- =====================================================
         ENCABEZADO
    ====================================================== --}}

    <div class="page-header">

        <div>
            <div class="page-eyebrow">
                VENTAS
            </div>

            <h1>
                Registrar venta
            </h1>

            <p>
                Cargá los productos y los datos de la venta.
            </p>
        </div>

        <div class="page-header-action">

            <a href="{{ route('venta.index') }}"
               class="btn-admin-primary"
               style="background:#687791;">

                <i class="fa-solid fa-arrow-left"></i>

                Volver a ventas

            </a>

        </div>

    </div>


    <form action="{{ route('venta.store') }}" method="POST">

        @csrf


        {{-- =====================================================
             DATOS DE LA VENTA
        ====================================================== --}}

        <div class="admin-panel mb-4">

            <div class="section-title">

                <div class="section-icon section-icon-blue">
                    <i class="fa-solid fa-file-invoice"></i>
                </div>

                <div>
                    <h5>Datos de la venta</h5>

                    <span>
                        Información general del pedido.
                    </span>
                </div>

            </div>


            <div class="row g-4 mt-1">

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

                            <option value="{{ $cliente->id }}"
                                {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>

                                {{ $cliente->nombre }}
                                {{ $cliente->apellido }}

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

                        <option value="efectivo"
                            {{ old('medio_pago', 'efectivo') === 'efectivo' ? 'selected' : '' }}>

                            Efectivo

                        </option>

                        <option value="transferencia"
                            {{ old('medio_pago') === 'transferencia' ? 'selected' : '' }}>

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
                           value="{{ old('observaciones') }}"
                           placeholder="Ej: entregar en domicilio...">

                </div>

            </div>

        </div>


        {{-- =====================================================
             AGREGAR PRODUCTOS
        ====================================================== --}}

        <div class="admin-panel mb-4">

            <div class="section-title">

                <div class="section-icon section-icon-green">
                    <i class="fa-solid fa-box"></i>
                </div>

                <div>
                    <h5>Agregar productos</h5>

                    <span>
                        Seleccioná un producto y la cantidad.
                    </span>
                </div>

            </div>


            <div class="row g-3 align-items-end mt-1">

                {{-- Producto --}}

                <div class="col-md-8">

                    <label for="producto"
                           class="form-label fw-semibold">

                        Producto

                    </label>

                    <select id="producto"
                            class="form-select">

                        @forelse ($productos as $producto)

                            <option value="{{ $producto->id }}"
                                    data-precio="{{ $producto->precio }}">

                                {{ $producto->nombre }}

                                -
                                ${{ number_format($producto->precio, 2, ',', '.') }}

                            </option>

                        @empty

                            <option value="">
                                No hay productos disponibles
                            </option>

                        @endforelse

                    </select>

                </div>


                {{-- Cantidad --}}

                <div class="col-md-2">

                    <label for="cantidad"
                           class="form-label fw-semibold">

                        Cantidad

                    </label>

                    <input type="number"
                           id="cantidad"
                           class="form-control"
                           value="1"
                           min="1">

                </div>


                {{-- Agregar --}}

                <div class="col-md-2">

                    <button type="button"
                            id="agregar"
                            class="btn-admin-primary w-100">

                        <i class="fa-solid fa-plus"></i>

                        Agregar

                    </button>

                </div>

            </div>

        </div>


        {{-- =====================================================
             DETALLE DE LA VENTA
        ====================================================== --}}

        <div class="admin-panel mb-4">

            <div class="section-title">

                <div class="section-icon section-icon-orange">
                    <i class="fa-solid fa-receipt"></i>
                </div>

                <div>
                    <h5>Detalle de venta</h5>

                    <span>
                        Productos incluidos en el pedido.
                    </span>
                </div>

            </div>


            <div id="sin-productos"
                 class="empty-products">

                <div class="empty-products-icon">

                    <i class="fa-solid fa-cart-shopping"></i>

                </div>

                <strong>
                    No hay productos agregados
                </strong>

                <span>
                    Seleccioná un producto arriba para comenzar.
                </span>

            </div>


            <div id="detalles"
                 class="d-flex flex-column gap-2 mt-4">
            </div>


            <hr class="my-4">


            {{-- =================================================
                 FECHA + RESUMEN
            ================================================== --}}

            <div class="row g-4 align-items-start">


                {{-- FECHA Y HORA --}}

                <div class="col-lg-6">

                    <div class="date-card">

                        <div class="date-card-title">

                            <i class="fa-regular fa-calendar"></i>

                            <span>
                                Fecha y hora de la venta
                            </span>

                        </div>


                        <div class="row g-3 mt-1">

                            <div class="col-7">

                                <label for="fecha"
                                       class="form-label fw-semibold">

                                    Fecha

                                </label>

                                <input type="date"
                                       name="fecha"
                                       id="fecha"
                                       class="form-control"
                                       value="{{ old('fecha', now()->format('Y-m-d')) }}"
                                       required>

                            </div>


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

                </div>


                {{-- RESUMEN --}}

                <div class="col-lg-6">

                    <div class="resumen-venta">

                        <div class="resumen-title">

                            <span>
                                Resumen de venta
                            </span>

                            <i class="fa-solid fa-calculator"></i>

                        </div>


                        <div class="summary-line">

                            <span>
                                Subtotal
                            </span>

                            <strong>
                                $<span id="subtotal">0.00</span>
                            </strong>

                        </div>


                        <div class="summary-line">

                            <span>
                                Costo de envío
                            </span>

                            <strong>
                                $<span id="envio-total">0.00</span>
                            </strong>

                        </div>


                        <div class="summary-line discount-line">

                            <span>
                                Descuento
                            </span>

                            <strong>
                                - $<span id="descuento-total">0.00</span>
                            </strong>

                        </div>


                        <hr>


                        <div class="summary-total">

                            <span>
                                Total
                            </span>

                            <strong>
                                $<span id="total">0.00</span>
                            </strong>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             BOTONES
        ====================================================== --}}

        <div class="d-flex flex-column flex-sm-row justify-content-end gap-2">

            <a href="{{ route('venta.index') }}"
               class="btn btn-outline-secondary px-4 d-inline-flex align-items-center justify-content-center"
               style="border-radius:10px;">

                <i class="fa-solid fa-xmark me-1"></i>

                Cancelar

            </a>


            <button type="submit"
                    class="btn-admin-primary px-4">

                <i class="fa-solid fa-check"></i>

                Registrar venta

            </button>

        </div>

    </form>


    <div class="admin-page-footer">

        <span>Nueva venta</span>

        <span>·</span>

        <span>Churros Valcel</span>

    </div>

</div>

@endsection


@push('styles')

<style>

    /* =====================================================
       SECCIONES
    ====================================================== */

    .section-title {

        display: flex;
        align-items: center;
        gap: 14px;

        margin-bottom: 20px;

    }


    .section-title h5 {

        margin: 0 0 3px;

        color: var(--valcel-text);

        font-weight: 800;

    }


    .section-title span {

        color: var(--valcel-muted);

        font-size: 13px;

    }


    .section-icon {

        width: 44px;
        height: 44px;

        border-radius: 12px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 18px;

        flex-shrink: 0;

    }


    .section-icon-blue {

        background: var(--valcel-blue-light);

        color: var(--valcel-blue);

    }


    .section-icon-green {

        background: var(--valcel-green-light);

        color: var(--valcel-green);

    }


    .section-icon-orange {

        background: var(--valcel-orange-light);

        color: var(--valcel-orange);

    }


    /* =====================================================
       FORMULARIOS
    ====================================================== */

    .form-label {

        color: var(--valcel-text);

    }


    .form-control,
    .form-select {

        min-height: 46px;

        border-color: #dfe5ee;

        border-radius: 10px;

        color: var(--valcel-text);

        box-shadow: none;

    }


    .form-control:focus,
    .form-select:focus {

        border-color: #9db4ee;

        box-shadow:
            0 0 0 3px rgba(49,91,214,.08);

    }


    .input-group-text {

        background: #f7f9fc;

        border-color: #dfe5ee;

        color: var(--valcel-muted);

        border-radius: 10px 0 0 10px;

    }


    /* =====================================================
       PRODUCTOS VACÍOS
    ====================================================== */

    .empty-products {

        display: flex;

        flex-direction: column;

        align-items: center;

        justify-content: center;

        padding: 35px 20px;

        border: 1px dashed #dfe5ee;

        border-radius: 14px;

        background: #fafbfe;

        color: var(--valcel-muted);

        text-align: center;

    }


    .empty-products-icon {

        width: 52px;
        height: 52px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-bottom: 12px;

        border-radius: 14px;

        background: var(--valcel-blue-light);

        color: var(--valcel-blue);

        font-size: 21px;

    }


    .empty-products strong {

        color: var(--valcel-text);

        margin-bottom: 4px;

    }


    .empty-products span {

        font-size: 13px;

    }


    /* =====================================================
       PRODUCTOS AGREGADOS
    ====================================================== */

    #detalles > div {

        border: 1px solid #e9edf4 !important;

        border-radius: 14px !important;

        padding: 16px !important;

        background: #fff;

        box-shadow:
            0 4px 15px rgba(27,43,71,.03);

    }


    #detalles .btn-outline-secondary {

        border-color: #dfe5ee;

        color: var(--valcel-muted);

    }


    #detalles .btn-outline-secondary:hover {

        background: var(--valcel-blue-light);

        border-color: #b9c8ee;

        color: var(--valcel-blue);

    }


    #detalles .btn-outline-danger {

        border-color: #ffd5da;

        color: #d93649;

    }


    /* =====================================================
       FECHA
    ====================================================== */

    .date-card {

        padding: 20px;

        border: 1px solid #e9edf4;

        border-radius: 14px;

        background: #fafbfe;

    }


    .date-card-title {

        display: flex;

        align-items: center;

        gap: 9px;

        color: var(--valcel-text);

        font-weight: 700;

        margin-bottom: 5px;

    }


    .date-card-title i {

        color: var(--valcel-blue);

    }


    /* =====================================================
       RESUMEN
    ====================================================== */

    .resumen-venta {

        padding: 20px;

        border-radius: 14px;

        background: var(--valcel-dark);

        color: white;

        box-shadow:
            0 10px 25px rgba(23,41,68,.12);

    }


    .resumen-title {

        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-bottom: 18px;

        color: rgba(255,255,255,.85);

        font-size: 13px;

        font-weight: 600;

        text-transform: uppercase;

        letter-spacing: .5px;

    }


    .resumen-title i {

        color: #8fa9ef;

    }


    .summary-line {

        display: flex;

        justify-content: space-between;

        align-items: center;

        gap: 15px;

        margin-bottom: 12px;

        color: rgba(255,255,255,.65);

        font-size: 14px;

    }


    .summary-line strong {

        color: white;

    }


    .discount-line strong {

        color: #ff9ba8;

    }


    .resumen-venta hr {

        border-color: rgba(255,255,255,.15);

        margin: 18px 0;

    }


    .summary-total {

        display: flex;

        justify-content: space-between;

        align-items: center;

        gap: 15px;

    }


    .summary-total span {

        color: white;

        font-size: 17px;

        font-weight: 600;

    }


    .summary-total strong {

        color: #7ee0b5;

        font-size: 28px;

        font-weight: 800;

    }


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media (max-width: 767px) {

        .section-title {

            align-items: flex-start;

        }


        .section-icon {

            width: 40px;
            height: 40px;

            font-size: 16px;

        }


        .admin-panel {

            padding: 18px;

        }


        .date-card,
        .resumen-venta {

            padding: 16px;

        }


        .summary-total strong {

            font-size: 24px;

        }

    }

</style>

@endpush


@push('scripts')

<script>

    const agregarBtn =
        document.getElementById('agregar');

    const detallesDiv =
        document.getElementById('detalles');

    const subtotalSpan =
        document.getElementById('subtotal');

    const envioTotalSpan =
        document.getElementById('envio-total');

    const descuentoTotalSpan =
        document.getElementById('descuento-total');

    const totalSpan =
        document.getElementById('total');

    const sinProductos =
        document.getElementById('sin-productos');

    const costoEnvioInput =
        document.getElementById('costo_envio');

    const descuentoInput =
        document.getElementById('descuento');


    let carrito = {};


    // =====================================================
    // ACTUALIZAR VISTA
    // =====================================================

    function actualizarVista() {

        detallesDiv.innerHTML = '';

        let subtotal = 0;

        const productos =
            Object.values(carrito);


        if (productos.length === 0) {

            sinProductos.style.display = 'flex';

        } else {

            sinProductos.style.display = 'none';


            productos.forEach((producto) => {

                const subtotalProducto =
                    producto.precio * producto.cantidad;

                subtotal += subtotalProducto;


                const detalleDiv =
                    document.createElement('div');


                detalleDiv.innerHTML = `

                    <div class="row align-items-center">

                        <div class="col-md-4">

                            <strong style="color:var(--valcel-text);">
                                ${producto.nombre}
                            </strong>

                            <div class="text-muted small">
                                $${producto.precio.toFixed(2)} c/u
                            </div>

                        </div>


                        <div class="col-md-3 mt-3 mt-md-0">

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


                        <div class="col-md-3 text-md-end mt-3 mt-md-0">

                            <small class="text-muted d-block">
                                Subtotal
                            </small>

                            <strong style="color:var(--valcel-green);">
                                $${subtotalProducto.toFixed(2)}
                            </strong>

                        </div>


                        <div class="col-md-2 text-md-end mt-3 mt-md-0">

                            <button
                                type="button"
                                class="btn btn-outline-danger btn-sm btn-eliminar">

                                <i class="fa-solid fa-trash"></i>

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


                // SUMAR

                detalleDiv
                    .querySelector('.btn-sumar')
                    .addEventListener('click', () => {

                        carrito[producto.id].cantidad++;

                        actualizarVista();

                    });


                // RESTAR

                detalleDiv
                    .querySelector('.btn-restar')
                    .addEventListener('click', () => {

                        carrito[producto.id].cantidad--;

                        if (carrito[producto.id].cantidad <= 0) {

                            delete carrito[producto.id];

                        }

                        actualizarVista();

                    });


                // ELIMINAR

                detalleDiv
                    .querySelector('.btn-eliminar')
                    .addEventListener('click', () => {

                        delete carrito[producto.id];

                        actualizarVista();

                    });


                detallesDiv.appendChild(detalleDiv);

            });

        }


        // =================================================
        // TOTALES
        // =================================================

        const costoEnvio =
            parseFloat(costoEnvioInput.value) || 0;

        const descuento =
            parseFloat(descuentoInput.value) || 0;


        let total =
            subtotal + costoEnvio - descuento;


        if (total < 0) {

            total = 0;

        }


        subtotalSpan.textContent =
            subtotal.toFixed(2);

        envioTotalSpan.textContent =
            costoEnvio.toFixed(2);

        descuentoTotalSpan.textContent =
            descuento.toFixed(2);

        totalSpan.textContent =
            total.toFixed(2);

    }


    // =====================================================
    // AGREGAR PRODUCTO
    // =====================================================

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


        if (!productoId || !option) {

            return;

        }


        const productoNombre =
            option.text.split(' - $')[0].trim();


        const precio =
            parseFloat(option.dataset.precio);


        const cantidad =
            parseInt(cantidadInput.value);


        if (!cantidad || cantidad <= 0) {

            return;

        }


        if (carrito[productoId]) {

            carrito[productoId].cantidad += cantidad;

        } else {

            carrito[productoId] = {

                id: productoId,

                nombre: productoNombre,

                precio: precio,

                cantidad: cantidad

            };

        }


        actualizarVista();


        cantidadInput.value = 1;

    });


    // =====================================================
    // ENVÍO / DESCUENTO
    // =====================================================

    costoEnvioInput.addEventListener(
        'input',
        actualizarVista
    );


    descuentoInput.addEventListener(
        'input',
        actualizarVista
    );


    // =====================================================
    // ESTADO INICIAL
    // =====================================================

    actualizarVista();

</script>

@endpush