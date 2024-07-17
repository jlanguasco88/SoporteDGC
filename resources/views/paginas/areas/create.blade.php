
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
              <h3 class="card-title">Nueva Area</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('areas.store')}}" method="POST">
              @csrf
              

              <div class="card-body">
                <div class="form-group">
                  <label for="nombre">Nombre:</label>
                  <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese nombre del area" required>
                </div>
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a href="{{route('areas.index')}}" class="btn btn-info"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
                <button type="submit" class="btn btn-primary"><i class="fa-sharp fa-solid fa-floppy-disk"></i> Guardar</button>
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