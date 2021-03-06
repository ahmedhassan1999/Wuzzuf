<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>welcome employee</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">WUZZF</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <form  action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success"  > logout </button>
                </form>
            </li>

            <li class="nav-item">
                <form  method="GET"  action="{{ route('post') }}" >
                    @csrf
                    @method('GET')

                    <button type="submit" class="btn btn-danger"  > Create a Post </button>
                </form>
            </li>
            <li class="nav-item">
            <form  method="GET"  action="{{route('showapplaied')}}" enctype="multipart/form-data" >
                    @csrf
                    @method('GET')

                    <button type="submit" class="btn btn-info"  > Show Employee applayed </button>
                </form>
            </li>
          </ul>

        <div>




            <br>
            @if(Auth::check())
            {{auth()->user()->name}}
            @endif



        </div>


        </div>
      </nav>
      <div class="container" >
        <div class="alert alert-success" role="alert">
            @if(Auth::check())
           Done! {{ auth()->user()->name}}
            @endif
          </div>
      </div>
      <div class="container">
        <div class="alert alert-secondary" role="alert">
      you can offer your jop for employee
          </div>
      </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
