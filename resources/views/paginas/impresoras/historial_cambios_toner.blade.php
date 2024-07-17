@extends('layout.plantilla')

@section('contenido')
<div class="card">
    <div class="card-body">
        <h2>Historial de Cambios de Toner - {{ $impresora->nombre }} - {{ $impresora->ubicacion->nombreRed}}</h2>
        
            <table table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha de Cambio</th>
                        <th>Contador de Páginas</th>
                        <th>Días desde el último cambio</th>
                        <th>Impresiones desde el último cambio</th>
                        <th>Motivo</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($impresora->historialCambioToner as $historial)
                        <tr>
                            <td>{{ $historial->toner->nombre }}</td>
                            <td>{{ $historial->fecha_cambio }}</td>
                            <td>{{ $historial->contador_impresora }}</td>
                            <td>{{ $historial->diasDesdeUltimoCambio() }}</td>
                            <td>{{ $impresora->impresionesDesdeUltimoCambio() }}</td>
                            <td>{{ $historial->motivo }}</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay cambios de tóner registrados para esta impresora.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
    </div>
</div>
@endsection