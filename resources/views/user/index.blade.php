@extends('layout')

@section('title','Participante')

@section('styles')
    <!-- Data tables -->
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('libs/datatables/responsive.bootstrap5.css')}}">
@endsection

@section('contend')

    <a href="{{route('user.download')}}"><button type="button" class="btn btn-success">Descargar</button></a>
    <a href="{{route('index')}}"><button type="button" class="btn btn-dark">Regresar</button></a>
    <a href="{{route('user.winer')}}"><button type="button" class="btn btn-secondary">Sortear</button></a>

    
    <table class="table table-striped nowrap mt-3" style="width:100%" id="example">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Departamento</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Telefono</th>
                <th scope="col">Correo</th>
                <th scope="col">Documento</th>
                <th scope="col">Registro</th>
            </tr>
        </thead>
        <tbody>            
            @foreach ($users as $user)
                <tr @if ($user->winer) class="table-dark" @endif>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name . ' ' . $user->lastname}}</td>
                    <td>{{$user->city->departament->name}}</td>
                    <td>{{$user->city->name}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->document}}</td>
                    <td>{{$user->created_at}}</td>
                </tr>
            @endforeach            
        </tbody>
    </table>

@endsection

@section('js')

    <!-- DataTables-->
    <script src="{{asset('libs/datatables/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('libs/datatables/dataTables.js')}}"></script>
    <script src="{{asset('libs/datatables/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('libs/datatables/dataTables.responsive.js')}}"></script>
    <script src="{{asset('libs/datatables/responsive.bootstrap5.js')}}"></script>

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                responsive: true,
                //searching: false,
                info: false,
                ordering: false,
                paging: false,

                columnDefs: [
                    // centra las columnas
                    { className: "dt-center", targets: [ 0, 1, 2 , 3, 4, 5 , 6, 7] }
                ]
            } );
        } );
    </script>
@endsection