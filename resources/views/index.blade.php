@extends('layout')

@section('title','Inicio')

@section('contend')
    <img src="{{secure_asset('img\\car.png')}}" alt="Auto" id="imgCar">
    <h2 >Gana con AutoCom </h2>
    <p id="paragraphIndex" >
        Se parte de nuestra familia y disfruta de nuestro gran lanzamiento en el cual podras participar en el 
        concurso para ganar un espectacular premio.
    </p>
    <small >Aplican terminos y condiciones.</small>
    
    
    <div class="mt-3">
        <a href="{{route('user.create')}}"><button type="submit" class="btn btn-dark">Participar</button></a>
    </div>

@endsection

@section('js')
    <script>
        $.ajax({
            type: 'GET',
            url: 'user/find/winer',
            dataType: 'JSON'
        }).done(function(response){
            if(response != null){
                boxAlert(`Felicitaciones a ${response.name} ${response.lastname} por hacer parte de nuestra familia, ha sido seleccionado como ganador.`)
            }
        });
    </script>
@endsection