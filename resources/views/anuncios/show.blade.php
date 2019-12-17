@extends('layouts.master')
@section('titulo','Ver detalles del anuncio')

    @section('contenido') 
        <div>
			<p>Publicado: {{$anuncio->created_at}}</p>
			<h3><b>{{$anuncio->titulo}}</b></h3>
			<p><b>Precio: </b>{{$anuncio->precio}}€</p>
			<p>{{$anuncio->descripcion}}</p>
			<div>
    			@if($anuncio->imagen)   				
                    <figure class="row mt2 mb-2 col-10 offset-1">
            			<img height=250 class="fotos" src="{{asset(config('filesystems.anunciosImageDir').$anuncio->imagen)}}">
        			</figure>                           
    			@endif    			
			</div>
		</div>
    @endsection
    
    @section('opciones')    	
    	@auth    		
        	@includeif('anuncios.subView.linkEditar')
    		@includeif('anuncios.subView.linkBorrar')        	
    	@endauth    	        	
	@endsection

        
      
      