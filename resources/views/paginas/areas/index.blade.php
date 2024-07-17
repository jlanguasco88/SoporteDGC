@extends('layout.plantilla')
@section('titulo','Lista de Areas')

@section('contenido')

    
    <section class="content">
        <div class="box">
            <div class="box-body">
             
              <div>
                <a href="{{ route('areas.create') }}" type="button" class="btn btn-success"><i class="fa-sharp fa-solid fa-building"></i>  Agregar Area</a>
              </div>    
              <br>        
            <div class="card">
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          
                          <th>Area</th>
                          <th>Acciones</th>
                          
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($areas as $area)
                              
                          
                          <tr>
                            
                            <td>{{$area->area}}</td>
                            <td>
                              <a href="{{ route('areas.edit', $area->idarea) }}">
                                <button class="btn btn-warning" title="Editar"><i class="fa-solid fa-pen-to-square" style="display:inline"></i></button>
                              </a>
                           
                              <a href="{{ route('areas.destroy', $area->idarea) }}">
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