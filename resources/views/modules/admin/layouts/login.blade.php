<!DOCTYPE html>
<html>
<head>
  <title>
    
  </title>
  <style type="text/css">
    body {
  background: url("{{asset('public/themes/admin/images/secure.jpg')}}") no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  font-family: "Roboto";
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
body::before {
  z-index: -1;
  content: '';
  position: fixed;
  top: 0;
  left: 0;
  background: ;
  /* IE Fallback */
  background: ;
  width: 100%;
  height: 100%;
}
.form {
  position: absolute;
  top: 50%;
  left: 50%;
  background: ;
  width: 358px;
  margin: -140px 0 0 -182px;
  padding: 40px;
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
}
.form h2 {
  margin: 0 0 20px;
  line-height: 1;
  color: #44c4e7;
  font-size: 18px;
  font-weight: 400;
}
.form input {
  outline: none;
  display: block;
  width: 100%;
  margin: 0 0 20px;
  padding: 10px 15px;
  border: 1px solid #ccc;
  color: #ccc;
  font-family: "Roboto";
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  font-size: 14px;
  font-wieght: 400;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  -webkit-transition: 0.2s linear;
  -moz-transition: 0.2s linear;
  -ms-transition: 0.2s linear;
  -o-transition: 0.2s linear;
  transition: 0.2s linear;
}
.form input:focus {
  color: #333;
  border: 1px solid #44c4e7;
}
.form button {
  cursor: pointer;
  background: #44c4e7;
  width: 100%;
  padding: 10px 15px;
  border: 0;
  color: #fff;
  font-family: "Roboto";
  font-size: 14px;
  font-weight: 400;

}
.form button:hover {
  background: #369cb8;
}
.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url(../../loader/Cube-1s-200px.gif) 50% 50% no-repeat rgb(249,249,249);
}
 </style>

  <link rel="stylesheet" href='{{ asset("public/themes/admin/")}}/css/bootstrap.min.css'>
  <link rel="stylesheet" type="text/css" href="{{asset('public/toaster/toastr.css')}}">
  <script src='{{ asset("public/themes/admin/plugins/")}}/jQuery/jquery-2.2.3.min.js'></script>
  <script src="{{asset('public/toaster/toastr.min.js')}}"></script>
  <script src='{{ asset("public/themes/admin/")}}/js/bootstrap.min.js'></script>
  <script src="{{asset('public/validation/jquery.validate.js')}}"></script>
  <script src="{{asset('public/validation/additional-methods.js')}}"></script>

</head>
<body>
  <div class="loader"></div>
<div class="form animated flipInX">
  <h2 style="text-align: center;">Admin Login</h2>
    {{ Form::open([
        'id'=>'ajaxLoginnFormSubmit',
        'method'=>'POST',
        'url'=>route('admin.login'),
        'redirect_url'=>route('admin.dashboard'),
        'redirect_back'=>route('admin.login.main'),
        'name'=>'',
         'autocomplete'=>'off'
      ])
    }}
    {{ Form::text('email',null,['placeholder' => 'Your Email Address','id'=>'email','class'=>'']) }}
    <p style="color: red">@if($errors->has('email')) {{$errors->first('email')}} @endif</p>
    {{ Form::password('password',['placeholder' => 'Your Password','id'=>'password','class'=>'']) }}
    <p style="color: red">@if($errors->has('password')) {{$errors->first('password')}} @endif</p>
    <button>Login</button>
{{ Form::close() }}
</div>
<script type="text/javascript" src="{{asset('public/tooltip/jquery-validate.bootstrap-tooltip.js')}}"></script>
<script type="text/javascript" src="{{asset('public/tooltip/jquery-validate.bootstrap-tooltip.min.js')}}"></script>
@include('admin::layouts.include.flashmessage')
<script type="text/javascript">
  $(document).ready(function(){
  
    $("#ajaxLoginnFormSubmit").validate({
        rules: {
           email: { required: true,email:true },
           password :{ required:true}
        },
        messages:{
          email:{ required:'Email field is required'},
          password:{ required:'Password field is required '},
        },
        tooltip_options: {
           email: { placement: 'left' },
           password:{placement:'left'},
        }
    
    });
});

  $(document).ready(function () {
 
    var form = $('#ajaxLoginnFormSubmit');
 
    form.submit(function(e) {
        
        var redirectUrl=form.attr('redirect_url');
        var redirectBack=form.attr('redirect_back');
        e.preventDefault();
        $.ajax({
            url     : form.attr('action'),
            type    : form.attr('method'),
            data    : form.serialize(),
            dataType: 'json',
            success : function ( json )
            {
              if (json.status == 1) {
                console.log(json.status);
                window.location = redirectUrl;
                // flash('Login Successfully Done')->success()->important();
              }else{
                window.location = redirectBack;
              }
            }
        });
    });
});

</script>
<script type="text/javascript">
  $(window).load(function(){
     $('.loader').fadeOut();
});
</script>
</body>
</html>