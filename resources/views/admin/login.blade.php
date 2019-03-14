<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Đăng Nhập Website</title>
  <base href="{{asset('')}}" target="_blank, _self, _parent, _top">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>

  <link rel="stylesheet" href="admin_asset/style.css">

  
</head>

<body>

  <div class="container">
    <div class="tree">
      <img src="img/tour/tree.png">
      <div class="name-app">
        <h2>Tree
          <span>Life.</span>
        </h2>
      </div>
    </div>
    <section class="contact" id="contact">
      <div class="col-xs-12">
      </div>
      @if (count($errors)>0) 
      <div class="alert alert-danger">
        @foreach ($errors -> all() as $err)
        {{$err}}<br>
        @endforeach
      </div>

      @endif

      @if(session('thongbao'))
      <div class="alert alert-success">
        {{session('thongbao')}}
      </div>
      @endif
      <form action="admin/dangnhap" method="POST" name="contactform" id="contactform" >

        <div class="col-xs-12">
          <fieldset>
          </i>{{-- <input name="uname" type="text" id="nome" size="30" placeholder="Username" required> --}}
          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
          <input name="email" type="email" id="email" size="30" placeholder="Email" required>
          <input name="pws" type="password" id="password" size="30" placeholder="Password" required>
        </fieldset>
      </div>
      <div class="col-xs-12">
        <fieldset>
          <button type="submit" class="btn btn-lg" id="submit" size="30" value="submit">Go</button>
        </fieldset>
      </form>
    </div>
  </div>
</div>
</section>



</body>

</html>
