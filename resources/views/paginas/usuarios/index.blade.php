@extends('layout.plantilla')
@section('titulo','Lista de Usuarios')

@section('contenido')

    
    <section class="content">
        <div class="box">
            <div class="box-body">
             
              <div>
                <a href="{{route('usuarios.create')}}" type="button" class="btn btn-success"><i class="fa-sharp fa-solid fa-user"></i>  Agregar Usuario</a>
              </div>    
              <br>        
            <div class="card">
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          
                          <th>Nombre</th>
                          <th>Username</th>
                          <th>Rol</th>
                          <th>Area</th>
                          <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($usuarios as $usuario)
                              
                          
                          <tr>
                            
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->username}}</td>
                            <td>{{$usuario->rol}}</td>
                            <td>{{ $usuario->area ? $usuario->area->area : 'N/A' }}</td>

                            <td>
                              <a href="">
                                <button class="btn btn-warning" title="Editar"><i class="fa-solid fa-pen-to-square" style="display:inline"></i></button>
                              </a>
                           
                              <a href="">
                                  <button class="btn btn-danger" title="Eliminar"  onclick="return confirm('Está seguro de eliminar el area?')"><i class="fa-solid fa-trash" style="display:inline"></i></button>
                              </a>
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