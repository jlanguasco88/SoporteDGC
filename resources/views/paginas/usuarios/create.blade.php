
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
              <h3 class="card-title">Nuevo Usuario</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="POST">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control input-lg" name="name" required="" value="{{old('name')}}">
                  </div>  
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control input-lg" name="username" required="" value="{{old('username')}}">
                  </div>
                  <div class="form-group">
                    <label>Rol:</label>
                    <select class="form-control input-lg" name="area_idarea" required="">
                        <option value="">Seleccionar Rol</option>
                        @foreach($roles as $rol)
                        <option value="{{$rol}}">{{$rol}}</option>
                        @endforeach
                    </select>
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
</div>
</section>
@endsection