<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Ticket #{{ $venta->id }} - Churros Valcel
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 20px;
            background: #f1f1f1;
            font-family: Arial, Helvetica, sans-serif;
            color: #222;
        }

        .ticket {
            width: 380px;
            max-width: 100%;
            margin: 0 auto;
            background: white;
            padding: 25px 22px;
            box-shadow: 0 4px 20px rgba(0,0,0,.08);
        }

        .logo {
            width: 85px;
            height: 85px;
            object-fit: cover;
            border-radius: 50%;
            display: block;
            margin: 0 auto 10px;
        }

        .brand {
            text-align: center;
            color: #7d1f24;
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 3px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            font-size: 13px;
        }

        .address {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 5px;
        }

        .line {
            border-top: 1px dashed #999;
            margin: 18px 0;
        }

        .ticket-info {
            font-size: 13px;
            line-height: 1.7;
        }

        .ticket-info strong {
            color: #333;
        }

        .products {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .products th {
            text-align: left;
            padding-bottom: 8px;
            border-bottom: 1px solid #ddd;
        }

        .products td {
            padding: 8px 0;
            vertical-align: top;
        }

        .products .quantity {
            text-align: center;
            width: 45px;
        }

        .products .price {
            text-align: right;
            white-space: nowrap;
        }

        .summary {
            font-size: 14px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .total {
            display: flex;
            justify-content: space-between;
            font-size: 21px;
            font-weight: bold;
            color: #7d1f24;
            margin-top: 12px;
        }

        .payment {
            text-align: center;
            margin-top: 18px;
            padding: 10px;
            border-radius: 8px;
            background: #f5f5f5;
            font-size: 13px;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
            color: #666;
        }

        .footer strong {
            display: block;
            color: #7d1f24;
            margin-top: 5px;
        }

        .print-button {
            display: block;
            margin: 20px auto;
            padding: 10px 18px;
            border: 0;
            border-radius: 8px;
            background: #7d1f24;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        @media print {

            body {
                background: white;
                padding: 0;
            }

            .ticket {
                width: 80mm;
                max-width: 80mm;
                box-shadow: none;
                padding: 10px;
            }

            .print-button {
                display: none;
            }

        }

    </style>

</head>

<body>

    <div class="ticket">

        {{-- Logo --}}
        <img src="{{ asset('images/logo-valcel.png') }}"
             alt="Churros Valcel"
             class="logo">


        <div class="brand">
            CHURROS VALCEL
        </div>

        <div class="subtitle">
            Sistema de gestión
        </div>

        <div class="address">
            Gutemberg 7 Bis · San Nicolás de los Arroyos
        </div>


        <div class="line"></div>


        {{-- Información de venta --}}
        <div class="ticket-info">

            <div>
                <strong>Venta:</strong>
                #{{ str_pad($venta->id, 5, '0', STR_PAD_LEFT) }}
            </div>

            <div>
                <strong>Fecha:</strong>
                {{ date('d/m/Y', strtotime($venta->fecha)) }}
            </div>

            <div>
                <strong>Hora:</strong>
                {{ date('H:i', strtotime($venta->fecha)) }}
            </div>

            <div>
                <strong>Cliente:</strong>
                {{ $venta->cliente->nombre }}
                {{ $venta->cliente->apellido }}
            </div>

        </div>


        <div class="line"></div>


        {{-- Productos --}}
        <table class="products">

            <thead>

                <tr>

                    <th>
                        Producto
                    </th>

                    <th class="quantity">
                        Cant.
                    </th>

                    <th class="price">
                        Importe
                    </th>

                </tr>

            </thead>


            <tbody>

                @foreach ($venta->detalles as $detalle)

                    <tr>

                        <td>
                            {{ $detalle->producto->nombre }}
                        </td>

                        <td class="quantity">
                            {{ $detalle->cantidad }}
                        </td>

                        <td class="price">
                            ${{ number_format($detalle->subtotal, 2, ',', '.') }}
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>


        <div class="line"></div>


        {{-- Totales --}}
        <div class="summary">

            <div class="summary-row">
                <span>Subtotal</span>

                <span>
                    ${{ number_format($venta->total + ($venta->costo_envio ?? 0) - ($venta->descuento ?? 0), 2, ',', '.') }}
                </span>
            </div>


            @if (($venta->costo_envio ?? 0) > 0)

                <div class="summary-row">

                    <span>
                        Envío
                    </span>

                    <span>
                        ${{ number_format($venta->costo_envio, 2, ',', '.') }}
                    </span>

                </div>

            @endif


            @if (($venta->descuento ?? 0) > 0)

                <div class="summary-row">

                    <span>
                        Descuento
                    </span>

                    <span>
                        - ${{ number_format($venta->descuento, 2, ',', '.') }}
                    </span>

                </div>

            @endif


            <div class="total">

                <span>
                    TOTAL
                </span>

                <span>
                    ${{ number_format($venta->total, 2, ',', '.') }}
                </span>

            </div>

        </div>


        {{-- Medio de pago --}}
        <div class="payment">

            <strong>
                Medio de pago
            </strong>

            <br>

            {{ ucfirst($venta->medio_pago) }}

        </div>


        {{-- Observaciones --}}
        @if ($venta->observaciones)

            <div class="ticket-info" style="margin-top: 15px;">

                <strong>
                    Observaciones:
                </strong>

                <br>

                {{ $venta->observaciones }}

            </div>

        @endif


        {{-- Footer --}}
        <div class="footer">

            ¡Gracias por tu compra!

            <strong>
                Churros Valcel 🍩
            </strong>

        </div>

    </div>


    {{-- Botón imprimir --}}
    <button onclick="window.print()" class="print-button">
        🖨️ Imprimir ticket
    </button>

</body>

</html>