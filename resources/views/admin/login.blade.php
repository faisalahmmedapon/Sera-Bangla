<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> Auth Admin Login </title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="{{asset('admin')}}/style.css" rel="stylesheet">

</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">

            @if(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
        </div>

        <div class="col-md-6 mx-auto">
            <div class="text"> Auth Admin Login</div>
            <form action="" method="POST">
                @csrf
                <div class="">
                    <label class="label_text"> Email: </label>
                    <div class="field">
                        {{--            <label>Email</label>--}}
                        <i class="fa fa-envelope-o"></i>
                        <input type="email" name="email">
                    </div>
                </div>
                <div>
                    <label> Password: </label>
                    <div class="field">
                        {{--            <label>Password</label>--}}
                        <i class="fa fa-key"></i>
                        <input type="password" name="password">
                    </div>
                </div>
                <button type="submit" class="login_btn">Login</button>
            </form>

            <div class="social-buttons">
                <button class="neo-button"><i class="fa fa-facebook fa-1x"></i></button>
                <button class="neo-button"><i class="fa fa-linkedin fa-1x"></i></button>
                <button class="neo-button"><i class="fa fa-google fa-1x"></i></button>
                <button class="neo-button"><i class="fa fa-youtube fa-1x"></i></button>
                <button class="neo-button"><i class="fa fa-twitter fa-1x"></i></button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>
