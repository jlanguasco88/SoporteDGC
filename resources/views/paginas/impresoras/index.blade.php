@extends('layout.plantilla')
@section('titulo','Lista de Impresoras')

@section('contenido')

    
    <section class="content">
        <div class="box">
            <div class="box-body">
                
                <div>
                  <a href="{{route('impresoras.create')}}" type="button" class="btn btn-success"><i class="fa-sharp fa-solid fa-print"></i>  Agregar Impresora</a>
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
                                <th>Orden</th>
                                <th>Serie</th>
                                <th>Nombre</th>
                                <th>Toner</th>
                                <th>Ubicación</th>
                                <th>Estado</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($impresoras as $impresora)
                                <tr>
                                    <td>{{ $impresora->id }}</td>
                                    <td>{{ $impresora->orden }}</td>
                                    <td>{{ $impresora->serie }}</td>
                                    <td>{{ $impresora->nombre }}</td>
                                    <td>{{ $impresora->toner->nombre }}</td>
                                    <td>{{ $impresora->ubicacion->nombreRed }}</td>
                                    <td>{{ $impresora->estado }}</td>
                                    <td>{{ $impresora->descripcion }}</td>
                                    <td>
                                      <td>
                                        <a href="{{ route('impresoras.cambiarToner', $impresora->id) }}" class="btn btn-danger" title="Cambiar Toner"><i class="fa-solid fa-tint" style="display:inline"></i></a>
                                        <a href="{{ route('historial.mostrar', $impresora->id) }}" class="btn btn-warning" title="Historial cambios"></title><i class="fa-solid fa-list" style="display:inline"></i> </a>
                                    </td>
                                    </td>
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