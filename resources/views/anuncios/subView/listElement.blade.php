<div class="contenedor">
	<a href="{{route('anuncios.show',$anuncio->id).$pagina}}">
		<div class="contenido">
			<p>Publicado: {{$anuncio->created_at}}</p>
			<h3><b>{{$anuncio->titulo}}</b></h3>
			<p><b>Precio: </b>{{$anuncio->precio}}€</p>
			<div class="imagenes">
    			@if(!empty($anuncio->imagen))
    				<img height="50px" class="miniaturas" src="{{asset(config('filesystems.anunciosImageDir').$anuncio->imagen)}}" alt="fotos" title="fotos">
				@else
					<p>No hay imagenes que mostrar</p>
    			@endif
			</div>
		</div>
	</a>
	@auth
		@if(Auth::user()->id===$anuncio->user_id)
            @includeif('anuncios.subView.linkEditar')
            @includeif('anuncios.subView.linkBorrar')
        @endif
    @endauth
</div>
    
    
    