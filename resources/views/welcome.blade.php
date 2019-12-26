@extends('layouts.master')
@section('titulo','PORTADA')

@section('cabecera')
     @include('presentacion.cabecera')
@endsection

@section('contenido')
<div class="portada">
	<p class="text-justify">
	    Esta aplicación consiste en publicar nuestros anuncios ofreciendo los artículos que no  usemos a un precio razonable para que otras personas puedan alargar la vida de estos productos y así fomentemos el consumo responsable, creando una nueva forma de consumir llena de beneficios.<br><br>

          <b>Como funciona:</b><br>
          Para crear nuestros anuncios, es necesario estar registrado o haber iniciado sesión, solo podremos editar o eliminar nuestros anuncios, y solo el usuario que tiene privilegios de administrador podrá editar o eliminar cualquier anuncio.<br><br>

          Todos los anuncios nuevos y actualizados se pondrán primeros en la lista.     
	</p>
</div>	

@endsection  