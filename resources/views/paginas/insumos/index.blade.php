@extends('layout.plantilla')
@section('titulo','Lista de Insumos')

@section('contenido')

    
    <section class="content">
        <div class="box">
            <div class="box-body">
                
                <div>
                  <a href="{{route('insumos.create')}}" type="button" class="btn btn-success"><i class="fa-sharp fa-solid fa-box"></i>  Agregar Insumo</a>
                </div>
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
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Tipo de Insumo</th>
                    <th>Fecha de Compra</th>
                    <th>Estado</th>
                    <th>Stock</th>
                    <th>Ubicacion</th>
                    <th>Acciones</th>
                    <!-- Puedes agregar más columnas según tus necesidades -->
                </tr>
            </thead>
            <tbody>
                @foreach ($insumos as $insumo)
                    <tr>
                        <td>{{ $insumo->id }}</td>
                        <td>{{ $insumo->nombre }}</td>
                        <td>{{ $insumo->descripcion }}</td>
                        <td>{{ $insumo->tipo_insumo }}</td>
                        <td>{{ $insumo->fecha_compra }}</td>
                        <td>{{ $insumo->estado }}</td>
                        <td>{{ $insumo->stock }}</td>
                        <td>{{ $insumo->ubicacion->nombreRed ?? 'Sin ubicación' }}</td> <!-- Asumiendo que 'ubicacion' es el nombre de la relación -->
                        <td><a href="{{ route('insumos.asignar', ['insumo' => $insumo->id]) }}" class="btn btn-primary" title="Asignar">Asignar</a>
                            <!-- Botón para ver el historial -->
                            <a href="{{ route('insumos.historial', ['insumo' => $insumo->id]) }}" class="btn btn-info" title="Historial"><i class="fa fa-list"></i></a>
                        </td>
                        <!-- Puedes agregar más celdas según tus necesidades -->
                    </tr>
                @endforeach
            </tbody>
                        
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
        </div>
    </section>

@endsection