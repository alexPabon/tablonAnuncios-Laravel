<li class="nav-item m-1">
   <a href="{{route('anuncios.index')}}" class="col-12 btn btn-light">Listado de anuncios</a>
</li>
@if(!empty(Auth::user()))
   <li class="nav-item m-1">
       <a href="{{route('anuncios.create')}}" class="col-12 btn btn-light">Publicar anuncio</a>
   </li>
   <li class="nav-item m-1">
       <a href="{{route('publicacion.lomio')}}" class="col-12 btn btn-light">Mis publicaciones</a>
   </li>
@endif