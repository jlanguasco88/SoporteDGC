
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
              <h3 class="card-title">Nueva Ubicación</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('ubicaciones.store')}}" method="POST">
              @csrf
              

              <div class="card-body">
                  <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" class="form-control input-lg" name="usuario" required="" value="{{old('usuario')}}">
                  </div>  
                  <div class="form-group">
                  <label>Area:</label>
                  <select class="form-control input-lg" name="area_idarea" required="">
                    <option value="">Seleccionar Area</option>
                    @foreach($areas as $area)
                      <option value="{{$area->idarea}}">{{$area->area}}</option>
                    @endforeach
                  </select>
                  </div>  
                  <div class="form-group">
                    <label>Puesto:</label>
                    <input type="number" class="form-control input-lg" name="puesto" required="" value="{{old('puesto')}}">
                  </div>
                  <div class="form-group">
                    <label>Piso:</label>
                    <select class="form-control input-lg" name="piso" required="">
                    <option value="">Seleccionar piso</option>
                    <option value="PB">PB</option>
                    <option value="1ro">1ro</option>
                    <option value="2do">2do</option>
                    <option value="3ro">3ro</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label>Dirección de Ip:</label>
                    <input type="text" class="form-control input-lg" name="ip"  required="" value="192.168.0.">
                  </div>
                  <div class="form-group">
                    <label>Nombre de Red:</label>
                    <input type="text" class="form-control input-lg" name="nombreRed" required="" value="{{old('nombreRed')}}">
                  </div>
                  <div class="form-group">
                    <label>Grupo de Red</label>
                    <select class="form-control input-lg" name="grupoRed" required="">
                      <option value="">Seleccionar Grupo de Red</option>
                      @foreach($gruposRed as $grupoRed)
                        <option value="{{$grupoRed}}">{{$grupoRed}}</option>
                      @endforeach
                    </select>
                  <div class="form-group">
                    <label>Observaciones:</label>
                    <input type="text" class="form-control input-lg" name="observaciones"  value="{{old('observaciones')}}">
                  </div>
                  
               </div>
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a href="{{route('ubicaciones.index')}}" class="btn btn-info"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
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