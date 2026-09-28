@extends('layouts.main')

@section('title') Actualizar datos cliente @endsection

@section('content')
    <div class="container">

        <form class="row g-3" style="margin-top: 20px; margin-bottom: 20px; width: 400px" method="POST" action="{{ route('cliente.update', $cliente->id) }}">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="inputEmail4" value="{{ $cliente->nombre }}">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="inputPassword4" value="{{ $cliente->apellido }}">
            </div>
            <div class="col-md-6">
                <label for="inputAddress" class="form-label">Telefono</label>
                <input type="number" class="form-control" name="telefono" id="inputAddress" placeholder="(336) 41-2345" value="{{ $cliente->telefono }}">
            </div>
            <div class="col-md-6">
                <label for="inputAddress2" class="form-label">Compras hechas</label>
                <input type="number" class="form-control" name="compras_realizadas" id="inputAddress2" value="{{ $cliente->compras_realizadas }}">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Direccion</label>
                <input type="text" class="form-control" name="direccion" id="inputAddress2" placeholder="Apartment, studio, or floor" value="{{ $cliente->direccion }}">
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">Barrio</label>
                <input type="text" class="form-control" name="barrio" id="inputCity" value="{{ $cliente->barrio }}">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Zona</label>
                <input type="text" class="form-control" name="zona" id="inputCity" value="{{ $cliente->zona }}">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Regresar</a>
            </div>
        </form>
    </div>
@endsection