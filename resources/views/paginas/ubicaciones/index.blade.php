@extends('layout.plantilla')
@section('titulo','Lista de Ubicaciones')

@section('contenido')

    
    <section class="content">
        <div class="box">
            <div class="box-body">
                
                <div>
                  <a href="{{route('ubicaciones.create')}}" type="button" class="btn btn-success"><i class="fa-sharp fa-solid fa-sitemap"></i>  Agregar Ubicación</a>
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
                        <!-- <th>ID</th> -->
                        <th>Area</th> 
                        <th>Puesto</th>
                        <th>Usuario</th>
                        <th>Nombre Red</th>
                        <th>Grupo Red</th>
                        <th>IP</th>
                        <th>Piso</th>
                        
                          
                          <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($ubicaciones as $ubicacion)
                              
                          
                          <tr>

                          <!-- <td>{{ $ubicacion->idPosicion }}</td> -->
                          <td>{{ $ubicacion->area ? $ubicacion->area->area : 'N/A' }}</td>
                          <td>{{ $ubicacion->puesto }}</td>
                          <td>{{ $ubicacion->usuario }}</td>
                          <td>{{ $ubicacion->nombreRed }}</td>
                          <td>{{ $ubicacion->grupoRed }}</td>
                          <td>{{ $ubicacion->ip }}</td>
                          <td>{{ $ubicacion->piso }}</td>
                          
                            
                            <td>
                              <a href="">
                                <button class="btn btn-warning" title="Editar"><i class="fa-solid fa-pen-to-square" style="display:inline"></i></button>
                              </a>
                           
                              
                                <button class="btn btn-danger" title="Eliminar"><i class="fa-solid fa-trash" style="display:inline"></i> </a></button>
                             
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