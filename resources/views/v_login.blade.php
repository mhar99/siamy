<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="source/fonts/icomoon/style.css">

    <link rel="stylesheet" href="source/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="source/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="source/css/style.css">

    <title>Login</title>
  </head>
  <body>
  

  <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('source/images/bg_1.jpeg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
              <h3>Silakan Login</h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              @if(session()->has('gagal'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('gagal') }}
              </div>
            @endif

              <form action="/postlogin" method="post">
                @csrf
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" placeholder="Masukan username" id="username" name="username" value="{{ old('username')}}">
                  <div class="text-danger">
                    @error('username')
                    {{ $message}}
                    @enderror
                </div>
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Masukan password" id="password" name="password">
                  <div class="text-danger">
                    @error('password')
                    {{ $message}}
                    @enderror
                </div>
                </div>
                
                <!-- <div class="d-sm-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
                </div> -->

                <input type="submit" value="Log In" class="btn btn-block" style="background-color: #57B657; color:#ffff;">

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="source/js/jquery-3.3.1.min.js"></script>
    <script src="source/js/popper.min.js"></script>
    <script src="source/js/bootstrap.min.js"></script>
    <script src="source/js/main.js"></script>
  </body>
</html>