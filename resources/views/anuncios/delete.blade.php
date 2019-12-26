@extends('layouts.master')
@section('titulo','Eliminar anuncio')
      
@section('contenido')
    <h3>{{"Titulo: $anuncio->titulo"}}<br>{{"Precio: $anuncio->precio"}}€</h3>      
    
    <form class="my-2 border p-5" method="POST" action="{{URL::temporarySignedRoute('anuncios.destroy',now()->addMinutes(1),$anuncio->id)}}">
    {{csrf_field()}}
    <input name="_method"  type="hidden" value="DELETE">
    
    <label for="confirmdelete">Confirmar el borrado de <b>{{"$anuncio->titulo"}}</b> </label>        
    <input type="submit" alt="Borrar" title="Borrar" value="Borrar" class="btn btn-danger mx-2" id="confirmdelete">        
    </form>
@endsection 

@section('opciones')
	@auth
		@if(Auth::user()->id===$anuncio->user_id)
        	@includeif('anuncios.subView.linkVer')
        	@includeif('anuncios.subView.linkEditar')
		@endif
	@endauth
@endsection  
