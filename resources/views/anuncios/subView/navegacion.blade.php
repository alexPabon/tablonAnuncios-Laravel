<li class="nav-item mr-2">
   <a href="{{route('anuncios.index')}}" class="btn btn-light">Listado de anuncios</a>
</li>
@if(!empty(Auth::user()))
   <li class="nav-item mr-2">
       <a href="{{route('anuncios.create')}}" class="btn btn-light">Publicar anuncio</a>
   </li>
   <li class="nav-item mr-2">
       <a href="{{route('publicacion.lomio')}}" class="btn btn-light">Mis publicaciones</a>
   </li>
@endif