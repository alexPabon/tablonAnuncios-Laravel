@extends('layouts.master')
@section('titulo','Mis anuncios')       
    	
	@section('contenido')
		@if($total>0)
			@includeif('anuncios.subView.listado')			
		@else
			<h2>Todavia No has publicado un anuncio.</h2>
		@endif
    @endsection       