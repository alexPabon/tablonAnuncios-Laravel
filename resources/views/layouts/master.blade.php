<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Aplicacion tablon de anuncios">
        <title>{{config('app.name')}} -@yield('titulo')</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script> 
        <script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/cargarImagen.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/validarFormEmail.js')}}"></script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- CSS de Bootstrap y Laravel -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">        
        <link rel="stylesheet" type="text/css" href="{{asset('css/anuncios.css?version=1.0')}}"> 
        <link rel="stylesheet" type="text/css" href="{{asset('css/cabecera.css')}}"> 
        <link href="https://fonts.googleapis.com/css?family=Merienda+One&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Courgette|El+Messiri&display=swap" rel="stylesheet">       
    </head>    
    <body class="bg-light">    
    
@yield('cabecera')
@section('navegacion')
   <!-- PARTE SUPERIOR -->
        @if(url()->current()!="http://venderdetodo.local")
    	   <div class="fixed-top">@include('auth.userMenu')</div>
    	   <div class="p-4 mt-3 bg-dark"></div>
       @else
           @include('auth.userMenu')
           <div class="p-1 bg-dark"></div>
       @endif
@show
<div class="container p-3 ">	
    <!-- PARTE CENTRAL -->
    <h1 class="my-2 text-center">
    	<strong>Vende todo lo que quieras</strong>
	</h1>
    <h2>
    	<strong>@yield('titulo')</strong>
	</h2> 
@if(old('miEmail'))
    <div>
        <p class="alert alert-danger">Para enviar el <b>Email</b>, debes de completar los campos que estan en rojo</p>
    </div>
@else	        
    @includeWhen($errors->any(),'layouts.error')
@endif

@includeWhen(Session::has('success'),'layouts.success')
	
@yield('contenido')
	
    <div class="text-right my-3">
        <div class="btn-group mx-2">        			
			@yield('opciones')    			     
        </div>
    </div>

<div class="form-group row" role="group" aria-label="links">
@section('enlaces')
   <a href="{{url('/')}}" class="btn btn-primary mr-2">Inicio</a>
   <a href="{{route('anuncios.index').$pagina}}" class="btn btn-primary mr-2">Regresar a los anuncios</a>
@show 
</div>
</div>
    
<!-- PARTE INFERIOR -->
@section('pie')
	@include('anuncios.subView.footer',['autor'=>'Alexander, el footer esta con INCLUDE sub-vistas'])
@show
    </body>    
</html>