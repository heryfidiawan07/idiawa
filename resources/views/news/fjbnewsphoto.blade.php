<div class="marketing">

  @if($jualsphotos->count())
      <h4 class="text-center">terbaru di fjb</h4>
      <hr>
  @endif

  @foreach($jualsphotos as $jualsphoto)
    <div class="col-md-4">
      <div class="media">
        <a href="/{{$jualsphoto->user->getName()}}" class="pull-left">
            <img src=" {{$jualsphoto->user->getAvatar()}}" class="media-object img-circle" onerror="this.style.display='none'">
            <img src="{{asset('/img/users/'.$jualsphoto->user->getAvatar() )}}" class="media-object img-circle" onerror="this.style.display='none'">
        </a>        
        <a href="/{{$jualsphoto->user->getName()}}"> {{$jualsphoto->user->getName()}} </a><br>
        <a href="/kategory/{{$jualsphoto->tag->name}}" class="pull-left btn btn-danger btn-xs" style="color: white !important;"><img id="icon" src="/background/tag.svg">{{$jualsphoto->tag->name}}</a>
        <small class="pull-right">{{$jualsphoto->created_at->diffForHumans()}}</small>
      </div>

        <div class="media">
          @if(count($jualsphoto->galery) > 0)
          <!-- ===== Photo Slide ===== -->
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              @foreach($jualsphoto->galery as $galery)
                @if($galery->img == $jualsphoto->getNameImg()->img)
                  <div class="item active">
                    <img src="{{ asset('/img/fjb/'.$jualsphoto->getNameImg()->img ) }}" alt="{{$jualsphoto->tag->name}}" class="img-responsive">
                  </div>
                  @continue
                @endif
                  <div class="item">
                      <img src="{{ asset('/img/fjb/'.$galery->img ) }}" alt="{{$jualsphoto->tag->name}}" class="img-responsive">
                  </div>
              @endforeach
            </div>
          </div>
          <style>.carousel-inner > .item > img,.carousel-inner > .item > a > img { width: auto; margin: auto;} </style>
          <!-- ===== End Photo SLide == -->
          @endif
        </div>
      <div class="title_show"><b><a href="/fjb/{{$jualsphoto->slug}} ">{!!nl2br($jualsphoto->title)!!}</a></b></div>
      <div class="panel-footer"><a href="/fjb/{{$jualsphoto->slug}} ">{{$jualsphoto->countComments()}} comment</a></div>
    </div>
  @endforeach
</div>
