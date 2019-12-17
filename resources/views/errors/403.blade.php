@extends('layouts.master')
@section('titulo','Tablon de anuncios')       
    	
	@section('contenido')
    	<h1><b>Error 403</b></h1>    	
    	<h3>{{$exception->getMessage()}}</h3>
    	<img height="500" src="{{ asset('/svg/403.svg') }}">
    	
    @endsection 
