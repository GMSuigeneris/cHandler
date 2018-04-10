<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>pMANAGER</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image:url('/image/use.jpg');
                background-repeat:no-repeat;
                background-position:center;
                background-size:100% 100%;
                color: #000;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

             .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 14px;
                font-weight: 800;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
        <div class="top-left links" style="background-color:#000; padding:5px;">
            <a href="/about" >ABOUT</a>
            <a href="/values">OUR VALUES</a>
            <a href="/team">OUR PEOPLE</a>
            <a href="#" type="button" data-toggle="modal" data-target="#myModal">CONTACT US</a>
        </div>
            @if (Route::has('login'))
                <div class="top-right links" style="background-color:#000; padding:5px;">
                    @auth
                        <a href="{{ url('/home') }}" class="links">Home</a>
                    @else
                        <a href="{{ route('login') }}"  class="links">Login</a>
                        <a href="{{ route('register') }}"  class="links">Register</a>
                    @endauth
                </div>
            @endif
           
           <!--  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="Close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times; </span>
                </button>
                <h4 class="modal-title" id="myModalLabel">CONTACT DETAILS</h4>
            </div>
        </div>
        <div class="modal-body">
            <input type="text">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">SEND</button>
        </div>
    </div>
</div> -->

            <div class="content">
                <div class="title m-b-md">
                   <b>pMANAGER</b> 
                </div>
                <h2 style="margin-top:20%; color:white;"><b> Manage your projects with ease...</b></h2>
            </div>
        </div>
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">       
       /*  $('h2').click(function(){
        if($('h2').css('color') =='white'){
            $('h2').animate({
                height:'200px',
                width:'200px'},2000,function(){
                    $('h2').css('color','yellow');
		    });
        }  
    }); */
    $(document).ready(function(){
       
         setTimeout(() => {
            $('h2').animate({
                marginLeft:'200px',
                fontSize:"50px",
                height:'100px',
                width:'800px'},2000,function(){
                    $('h2').css('color','red');
		    });
         }, 2000);  
       
    });
   
</script>
    </body>
</html>



