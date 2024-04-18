@extends('layout')

@section('title','Terminos y Condiciones')

@section('contend')
    <h1>Protección de Datos Personales</h1>

    <p align="left">
        Al aceptar la  <b>Politica de datos  personales</b>, entendemos que confías en nosotros con tu información personal. 
        En cumplimiento de la normativa de Habeas Data, te informamos cómo gestionamos y protegemos tus datos:
        <br><br>

        <b>1.</b>Recopilación de Datos: Para participar, requerimos cierta información personal, como nombre, dirección de correo 
        electrónico y datos de contacto. Estos datos se recopilan de manera voluntaria y con tu consentimiento explícito.
        <br>

        <b>2.</b>Uso de la Información: La información recopilada se utiliza exclusivamente para fines relacionados con la getion de los usuario, 
        incluyendo la notificaciónes . No compartiremos tus datos con terceros sin tu consentimiento previo.
        <br>

        <b>3.</b>Seguridad de los Datos: Implementamos medidas de seguridad adecuadas para proteger tus datos personales contra accesos no autorizados,
         alteraciones, divulgaciones o destrucciones no autorizadas.
        <br>

        <b>4.</b>Conservación de Datos: Conservaremos tus datos personales el tiempo necesario para cumplir con los fines para los cuales fueron recopilados,
         a menos que se requiera una conservación más prolongada por obligaciones legales o reglamentarias.
        <br>

        <b>5.</b>Derechos de los Usuarios: Tienes derecho a acceder, corregir, actualizar o eliminar tus datos personales en cualquier momento. 
        También puedes ejercer tu derecho a objetar o restringir el procesamiento de tus datos. Para ejercer estos derechos o para 
        cualquier pregunta relacionada con tus datos personales, contáctanos a través de los medios proporcionados en este sitio.
        <br><br>

        Consentimiento: Al participar en nuestra plataforma sorteos y proporcionar tus datos personales, aceptas expresamente 
        los términos y condiciones establecidos en esta política de Habeas Data.
        <br><br>

        Al participar, aceptas y consientes el procesamiento de tus datos personales de acuerdo con estos términos y condiciones.
         Te recomendamos leer detenidamente esta política antes de proporcionar cualquier información personal.

    </p>

    <a href="{{route('index')}}" class="mt-3 mb-3"><button type="submit" class="btn btn-dark">Regresar</button></a>

        
@endsection