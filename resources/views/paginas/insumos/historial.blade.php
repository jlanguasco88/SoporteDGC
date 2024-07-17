@extends('layout.plantilla')
@section('titulo','Historial de Instalaciones')

@section('contenido')

    
    <section class="content">
        <div class="box">
            <div class="box-body">
                
                
                <br>
                <div>
                  <div>
                    @if ($mensaje = Session::get('success')) 
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <div class="alert alert-success" role="alert">
                        <h5><i class="icon fas fa-check"></i> {{$mensaje}}</h5>
                      </div>
                    @endif
                    </div>
                  </div>
                </div>
                
                <div class="card">
                  
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                      <thead>
                <tr>
                    <th>ID</th>
                    <th>Insumo</th>
                    <th>Ubicación</th>
                    <th>Fecha de Instalación</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($historial as $detalle)
                    <tr>
                        <td>{{ $detalle->id }}</td>
                        <td>{{ $detalle->insumo->nombre }}</td>
                        <td>{{ $detalle->ubicacion->nombreRed ?? 'Sin ubicación' }}</td>
                        <td>{{ $detalle->fecha_instalacion }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No hay historial disponible.</td>
                    </tr>
                @endforelse
            </tbody>
                        
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
        </div>
    </section>

@endsection