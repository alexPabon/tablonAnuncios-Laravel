@extends('layouts.master')
@section('titulo','Ver detalles del anuncio')

    @section('contenido') 
        <div class="bg-light p-3">
			<p>Ultima Actualizacion: {{$anuncio->updated_at->format('d/m/Y')}}</p>			
			<h3><b>{{ucfirst($anuncio->titulo)}}</b></h3>
			<p><b>Precio: </b>{{e($anuncio->precio)}}€</p>
			{{-- Para escribir un texto con saltos de linea debe usar'{!! nl2br() !!}'
				como en la siguiente instruccion --}}
			<p>{!! nl2br(e($anuncio->descripcion)) !!}</p>			
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
    		@if(Auth::user()->id===$anuncio->user_id || Auth::user()->email=='admin@bcn.cat')   		
            	@includeif('anuncios.subView.linkEditar')
        		@includeif('anuncios.subView.linkBorrar')
    		@endif        	
    	@endauth    	        	
	@endsection

        
      
      