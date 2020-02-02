<div class="contPadre">
<div class="contenedor">
	<a href="{{route('anuncios.show',$anuncio->id).$pagina}}" style="text-decoration: none">
		<div class="contenido">
			<p>Publicado: {{$anuncio->created_at->format('d/m/Y')}}</p>
			<h3><b>{{ucfirst($anuncio->titulo)}}</b></h3>
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
		@if(Auth::user()->id===$anuncio->user_id || Auth::user()->email=='admin@bcn.cat')
            @includeif('anuncios.subView.linkEditar')
            @includeif('anuncios.subView.linkBorrar')
        @endif
    @endauth
</div>
</div>
    
    
    