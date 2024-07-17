@extends('layout.plantilla')


@section('contenido')

        <form method="post" action="{{ route('insumos.asignar', ['insumo' => $insumo->id]) }}">
                    @csrf

                    <div class="form-group">
                        <label for="ubicacion_id">Seleccionar Puesto de Trabajo:</label>
                        <select class="form-control" id="ubicacion_id" name="ubicacion_id" required>
                            @foreach ($ubicaciones as $ubicacion)
                                <option value="{{ $ubicacion->id }}">{{ $ubicacion->nombreRed }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="fecha_instalacion">Fecha de Instalación:</label>
                        <input type="date" class="form-control" id="fecha_instalacion" name="fecha_instalacion" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Asignar</button>
        </form>
@endsection