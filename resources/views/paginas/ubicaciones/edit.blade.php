
@extends('layout.plantilla')


@section('contenido')
    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Modificar Area</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            
            <form action="{{route('areas.update', $area->id)}}" method="POST">
              @csrf
              @method('put')
              <div class="card-body">
                

                <div class="form-group">
                  <label for="nombre">Nombre:</label>
                  <input type="text" name="nombre" class="form-control" id="nombre" value="{{$area->nombre}}">
                </div>
                <div class="form-group">
                    <label for="id_sit">Id Cipol:</label>
                    <input type="text" name="id_sit" class="form-control" id="id_sit" value="{{$area->id_sit}}">
                </div>
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a href="{{route('areas.index')}}" class="btn btn-info"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Actualizar</button>
              </div>
            </form>

            
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  @endsection