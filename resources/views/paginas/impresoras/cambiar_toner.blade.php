@extends('layout.plantilla')


@section('contenido')

<div class="container">
    <h2>Cambiar Toner - {{ $impresora->nombre }} - {{ $impresora->ubicacion->nombreRed}}</h2>
    <form method="post" action="{{ route('impresoras.guardarCambioToner', $impresora->id) }}">
        @csrf
        <div class="form-group">
            <label for="toner_id">Selecciona un nuevo Toner:</label>
            <select name="toner_id" class="form-control" required>
                <option value="{{ $impresora->toner->id }}">{{ $impresora->toner->nombre }}</option>
                @foreach ($toners as $toner)
                    <option value="{{ $toner->id }}">{{ $toner->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
                <label for="fecha_cambio">Fecha de Cambio:</label>
                <input type="date" name="fecha_cambio" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contador_impresora">Contador de Páginas:</label>
                <input type="number" name="contador_impresora" class="form-control" required>
            </div>
        <div class="form-group">
            <label for="motivo">Motivo del Cambio:</label>
            <textarea name="motivo" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Realizar Cambio</button>
    </form>
</div>
@endsection