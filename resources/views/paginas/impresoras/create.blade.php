
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
              <h3 class="card-title">Registrar Impresora</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('impresoras.store')}}" method="POST">
              @csrf
              

              <div class="card-body">
                <div class="form-group">
                    <label for="orden">Orden:</label>
                    <input type="text" name="orden" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="serie">Serie:</label>
                    <input type="text" name="serie" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="toner_id">Toner:</label>
                    <select name="toner_id" class="form-control" required >
                      <option value="">Seleccionar modelo de toner</option>
                        @foreach ($toners as $toner)
                            <option value="{{ $toner->id }}">{{ $toner->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="ubicacion_id">Ubicación:</label>
                    <select name="ubicacion_id" class="form-control" required>
                      <option value="">Seleccionar ubicación</option>
                        @foreach ($ubicaciones as $ubicacion)
                            <option value="{{ $ubicacion->id }}">{{ $ubicacion->nombreRed }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <input type="text" name="estado" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" class="form-control"></textarea>
                </div>
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a href="{{route('impresoras.index')}}" class="btn btn-info"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
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