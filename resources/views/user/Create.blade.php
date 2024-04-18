@extends('layout')

@section('title','Participar')

@section('contend')

    <h1>Registro</h1>

    <form class="row g-3" align="left" method="POST" action="{{route('user.store')}}">
        @csrf
        <div class="col-md-4">
            <label  class="form-label">Nombre @error('name')<small class="errorInput">*{{$message}}</small>@enderror</label>
            <input type="taxt" class="form-control" id="name" name="name" value="{{old('name')}}">
        </div>
        <div class="col-md-4">
            <label  class="form-label">Apellido @error('lastname')<small class="errorInput">*{{$message}}</small>@enderror</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{old('lastname')}}">
        </div>
        <div class="col-4">
            <label class="form-label">Cedula @error('document')<small class="errorInput">*{{$message}}</small>@enderror</label>
            <input type="number" class="form-control" id="document" name="document" value="{{old('document')}}">
        </div>

        <div class="col-6">
            <label  class="form-label">Departamento</label>
            <select id="departament" name="departament" class="form-select">
                @foreach($departaments as $departament)
                    <option value="{{$departament->id}}">{{$departament->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Ciudad @error('city')<small class="errorInput">*{{$message}}@enderror</small></label>
            <select id="city" name="city" class="form-select">
                <option value="0">Seleccione una ciudad</option>
                @foreach($citys as $city)
                    <option value="{{$city->id}}" class="departament{{$city->id_departament}} city"
                    @if(old('city') && old('city') == $city->id)
                        selected
                    @endisset
                    >{{$city->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label f class="form-label">Celular @error('phone')<small class="errorInput">*{{$message}}</small>@enderror</label>
            <input type="number" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
        </div>
        <div class="col-md-6">
            <label f class="form-label">Correo @error('email')<small class="errorInput">*{{$message}}</small>@enderror</label>
            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
        </div>

        <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" required>
            <label class="form-check-label" for="gridCheck">
                Autorizo el tratamiento de mis datos deacuerdo con la finalidad establecida en la 
                <a href="{{route('habeasData')}}" target="_blank">Politica de proteccion de datos personales</a>.
            </label>
        </div>
        </div>

        <div class="col-12" align='center'>
            <button type="submit" class="btn btn-primary">Participar</button>
            <a href="{{route('index')}}" ><button type="button" class="btn btn-dark">Regresar</button></a>
        </div>
    </form>
@endsection

@section('js')
    @foreach ($errors->all() as $error)
        <script>
            boxAlert('Los campos marcados(*) no cumplen con nuestras politicas, por favor reviselos.','danger')    
        </script> 
        @break    
    @endforeach

    @vite(['resources/js/user.js'])
@endsection