@extends('layout.plantilla')
@section('titulo','Lista de Toners')

@section('contenido')

    
    <section class="content">
        <div class="box">
            <div class="box-body">
                
                <div>
                  <a href="{{route('toners.create')}}" type="button" class="btn btn-success"><i class="fa-sharp fa-solid fa-building"></i>  Agregar Toner</a>
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
                    <th>Modelo</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Fecha de Compra</th>
                    <th>Stock</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($toners as $toner)
                    <tr>
                        <td>{{ $toner->id }}</td>
                        <td>{{ $toner->nombre }}</td>
                        <td>{{ $toner->tipo }}</td>
                        <td>{{ $toner->estado }}</td>
                        <td>{{ $toner->fecha_compra }}</td>
                        <td align="center">
                        @if($toner->stock > 3 )  
                            <span style="display: inline-block;width:40px;height:40px;padding: 10px;background-color:green;border-radius: 10px; color:white;font-weight: bold;">{{ $toner->stock }}</span></td>
                        @elseif($toner->stock < 3 ) 
                            <span style="display: inline-block;width:40px;height:40px;padding: 10px;background-color:red;border-radius: 10px; color:white;font-weight: bold;">{{ $toner->stock }}</span></td>
                        @else 
                        <span style="display: inline-block;width:40px;height:40px;padding: 10px;background-color:orange;border-radius: 10px; color:white;font-weight: bold;">{{ $toner->stock }}</span></td>
                        @endif
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