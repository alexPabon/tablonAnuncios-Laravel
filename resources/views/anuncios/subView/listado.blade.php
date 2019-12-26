<?php $contador = 0;?>
<p>Mostrando {{sizeof($anuncios)}} de {{$total}} Anuncios</p>
<div class="row">
  <div class="col-6 text-left">{{$anuncios->links()}}</div>
  <div class="col-6 text-right">
    <p>
      Añadir Anuncio <a href="{{route('anuncios.create')}}" class="btn btn-success">+</a>
    </p>
  </div>
</div>
<div class="contGeneral">
	@each('anuncios.subView.listElement',$anuncios,'anuncio')
</div>
