<li>
    <div class="widget-post-thumb">
        <a href="{{ route('programs.show',$program->id) }}"><img src="{{ asset('storage/'.$program->image) }}" alt="" class="img-fluid img-square"></a>
    </div>
    <div class="widget-post-body">
        <h6> <a href="{{ route('programs.show',$program->id) }}">{{ $program->title }}</a></h6>
        <h5>{{ config('app.currency'). $program->price }}</h5>
    </div>
</li>