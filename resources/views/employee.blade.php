<x-main>
  @section('content')
  <h1> welcome   {{$user->name}} {{--{{$user->id}}--}}</h1>
  <h2>  {{$specialization}}   </h2>
  @if(Session::has('applay'))
  <div class=" container alert alert-info " role="alert">
    {{Session::get('applay')}}
  </div>

    @endif
  @section('image')
  <img   class="rounded-circle" alt="not loaded yet" width="50" height="50"  src="{{$image}}">
  @endsection


@foreach($posts as $post)
<div class="container">
<div class="card" style="width: 30rem;">
<img class="card-img-top" src="{{$post->post_image}}" alt="you did not choose picuter yet ">
    <div class="card-body">
    <h5 class="card-title">{{$post->title}}</h5>
    <h5 class="card-title"> Company : {{$post->nameofcompany}}</h5>
    <p class="card-text">{{$post->body}}</p>
    @if($appear==1)
    <div class="visible">
        <form method="POST" action="{{route('applay' , $post)}}">
            @csrf



            <button name="applay" type="submit" class="btn btn-success"  > Applay </button>
        </form>

    </div>
    @endif

    <input class="btn btn-secondary" type="submit" value="save">
    </div>
  </div>
</div>
@endforeach

  @endsection
</x-main>
