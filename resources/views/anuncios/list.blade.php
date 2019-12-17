@extends('layouts.master')
@section('titulo','Tablon de anuncios')       
    	
	@section('contenido')
    	@includeif('anuncios.subView.listado')
    @endsection       