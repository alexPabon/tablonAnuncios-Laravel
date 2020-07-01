@extends('layouts.master')
@section('titulo','Editar Anuncio')

@section('contenido')
	   <form class="my-2 border p-5 bg-light" method="post" action="{{route('anuncios.update',$anuncio->id)}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input name="_method"  type="hidden" value="PUT">
                
        <div class="form-group row">
            <label for="inputTitulo" class="col-sm-2 col-form-label">Titulo</label>
            <input type="text" name="titulo" class="up form-control col-sm-10" id="inputTitulo" placeholder="Titulo" maxlength="255"  value="{{$anuncio->titulo}}">
        </div>                
        <div class="form-group row">
            <label for="inputPrecio" class="col-sm-2 col-form-label">Precio</label>
            <input type="number" name="precio" class="up form-control col-sm-4" id="inputPrecio" maxlength="11"  value="{{$anuncio->precio}}">
        </div>                
         <div class="form-group row">
            <label for="inputColor" class="col-sm-2 col-form-label">Descripción</label>
            <textarea class="form-control" rows="7" id="inputColor" name="descripcion" placeholder="Maximo 500 caracteres" maxlength="500" >{{$anuncio->descripcion}}</textarea>
        </div>
        @if(!empty($anuncio->imagen))
            <div class="form-group row">
                <figure class="row mt2 mb-2 col-10 offset-1">
        			<img height=250 class="fotos" id="user-img1" src="{{asset(config('filesystems.anunciosImageDir').$anuncio->imagen)}}">
    			</figure>
    			<p id="error_img1"></p>
            </div>
        @else
        	<div class="form-group row">
                <figure class="row mt2 mb-2 col-10 offset-1">
        			<img height=250 class="fotos" id="user-img1" src="">
    			</figure>
    			<p id="error_img1"></p>
            </div>
        @endif
        <div class="form-group row">
            <label for="user-img-file1" class="btn btn-primary active">Cambiar Imagen</label>
            <input type="file" name="imagen" class="up form-control-file col-sm-10" id="user-img-file1">
        </div>
        <div class="form-group row">
          <button type="submit" class="btn btn-success mx-2">Guardar</button>
          <button type="reset" class="btn btn-secundary" id="borrar1">Borrar</button>
        </div>
    </form>
@endsection
    
@section('opciones')
	@auth
		@if(Auth::user()->id===$anuncio->user_id)
        	@includeif('anuncios.subView.linkVer')
        	@includeif('anuncios.subView.linkBorrar')
    	@endif
	@endauth
@endsection
      