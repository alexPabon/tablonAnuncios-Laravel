@extends('layouts.master')
@section('titulo','Crear anuncio')
 
@section('contenido')
    <form class="my-2 border p-5 bg-light" method="post" action="{{route('anuncios.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}        
        <div class="form-group row">
            <label for="inputTitulo" class="col-sm-2 col-form-label">Titulo</label>
            <input type="text" name="titulo" class="up form-control col-sm-10" id="inputTitulo" placeholder="Titulo" maxlength="255"  value="{{old('titulo')}}">
        </div>                
        <div class="form-group row">
            <label for="inputPrecio" class="col-sm-2 col-form-label">Precio</label>
            <input type="number" name="precio" class="up form-control col-sm-4" id="inputPrecio" maxlength="11"  value="{{old('precio')}}">
        </div>                
         <div class="form-group row">
            <label for="inputColor" class="col-sm-2 col-form-label">Descripción</label>
            <textarea class="form-control" rows="7" id="inputColor" name="descripcion" placeholder="Maximo 500 caracteres" maxlength="500" >{{old('descripcion')}}</textarea>
        </div>
        <div class="form-group row">
            <figure class="row mt2 mb-2 col-10 offset-1">
    			<img height=250 class="fotos" id="user-img" src="">
			</figure>
			<p id="error_img"></p>
        </div>
        <div class="form-group row">
            <label for="user-img-file" class="btn btn-primary active">Cargar Imagen</label>
            <input type="file" name="imagen" class="up form-control-file col-sm-10" id="user-img-file">
        </div>
        <div class="form-group row">
          <button type="submit" class="btn btn-success mx-2">Guardar</button>
          <button type="reset" id="borrar" class="btn btn-secundary">Borrar</button>
        </div>
    </form>
@endsection
