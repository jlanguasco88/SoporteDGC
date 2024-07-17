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
              <h3 class="card-title">Nuevo Toner</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('toners.store')}}" method="POST">
              @csrf
              

              <div class="card-body">
                <div class="form-group">
                    <label for="nombre">Modelo Toner</label>
                    <select name="nombre" class="form-control" required>
                        <option value="105A">105A</option>
                        <option value="12A">12A</option>
                        <option value="17A">17A</option>
                        <option value="78A">78A</option>
                        <option value="79A">79A</option>
                        <option value="80A">80A</option>
                        <option value="85A">85A</option>
                        <option value="NT101S">NT101S</option>
                        <option value="PB219">PB219</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <select name="tipo" class="form-control" required>
                        <option value="original">Original</option>
                        <option value="alternativo" selected>Alternativo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" class="form-control" required>
                        <option value="cargado">cargado</option>
                        <option value="vacio">vacio</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha_compra">Fecha de Compra:</label>
                    <input type="date" name="fecha_compra" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" name="stock" class="form-control" required>
                </div>
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a href="{{route('toners.index')}}" class="btn btn-info"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
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