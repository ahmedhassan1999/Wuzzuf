<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>applied employee</title>
  </head>
  <body>
    <div class="name">
       <h5>  allpied  employee for    {{$user->name}}<h5>

    </div>

    <table  class="table table-dark">
        <thead>
          <tr>
            <th>Name</th>
            <th >Age</th>
            <th>Post</th>
            <th >specialization</th>
            <th >picuter</th>
            <th> Accept </th>
            <th>Reject</th>
          </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            @foreach($post->cvs as $cv)
             <tr>

             <td>{{$cv->name}}</td>
             <td>{{$cv->age}}</td>
             <td>{{$post->id}}</td>
             <td> {{$cv->specialization}} </td>
             <td><img  class="rounded-circle" alt="not loaded yet" width="50" height="50"    src="{{$cv->post_image}}"></td>
              <td>
                <form method="POST" action="{{route('Accept',[$post,$cv])}}" >
                    @csrf
                    @method('POST')
                         <button type="submit" class="btn btn-success">Accept</button>
                </form>
                </td>
              <td><button type="button" class="btn btn-danger">Reject</button></td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
      </table>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
  <script src="./index.js"></script>
</html>
