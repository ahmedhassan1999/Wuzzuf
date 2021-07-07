<x-main>
  @section('content')
  <h1> welcome   {{$user->name}} {{--{{$user->id}}--}}</h1>
  <h2>  {{$specialization}}   </h2>
  @if(Session::has('applay'))
  <div class=" container alert alert-info " role="alert">
    {{Session::get('applay')}}
  </div>
    @endif
    @if(Session::has('comment'))
  <div class=" container alert alert-info " role="alert">
    {{Session::get('comment')}}
  </div>
    @endif
  @section('image')
  <img   class="rounded-circle" alt="not loaded yet" width="50" height="50"  src="{{$image}}">
  @endsection


@foreach($posts as $post)
<div class="container">
<div class="card" style="width: 30rem;">
  <h5 class="card-title"> Company : {{$post->nameofcompany}}</h5>
  <p class="datepost" > {{$post->created_at->format('d M') }} </p>
<img class="card-img-top" src="{{$post->post_image}}" alt="you did not choose picuter yet ">
    <div class="card-body">
    <h5 class="card-title"> spspecialization: {{$post->title}}</h5>

    <p class="card-text"> descrip:{{$post->body}}</p>

    @if($appear==1)
    <div class="visible" >
        <form method="POST" action="{{route('applay' , $post)}}">
            @csrf



            <button name="applay" type="submit" class="btn btn-success" id="applay" > Applay </button>
        </form>


    @endif

        @foreach ($post->comments as $comment )

         <div>
             <h5 class="username" > {{$comment->user->name}}  </h5>
             <img class="rounded-circle" src="{{$comment->image}}"  alt="not loaded yet" width="50" height="50" ">
       <span  class="comment"> {{$comment->body}}</span>
       <p class="date" > {{$comment->created_at->format('d M') }} </p>
         </div>
         @endforeach
         <form method="POST" action="{{route('write-comment',$post->id)}}">
            @csrf
            <div class=" container form-group">
                <label for="comment">Write-Comment</label>
                    <input type="text"
                           name="write_comment"
                           class="form-control"
                           id="write-comment"
                           aria-describedby=""
                           placeholder="Write-comment">
            </div>

            <button name="write-comment" type="submit" class="btn btn-success" id="applay" > Comment </button>
        </form>


    </div>

  </div>
</div>


@endforeach

  @endsection
</x-main>
