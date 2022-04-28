@extends('frontend.layouts.master')


@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 mx-auto">

                @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
            </div>


            <div class="col-md-8 mx-auto">
                <div class="card flex-grow-1 mb-md-0">
                    <div class="card-body">
                        <h3 class="card-title">Login</h3>
                        <form action="{{route('auth.user.login')}}" method="POST">
                            @csrf
{{--                            <div class="form-group"><label>Email address</label>--}}
{{--                                <input name="email" type="email" value="{{old('email')}}" class="form-control" placeholder="Enter email">--}}
{{--                                <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>--}}

{{--                            </div>--}}
                            <div class="form-group"><label> Phone</label>
                                <input name="phone" type="number" value="+88013" class="form-control" placeholder="Enter Your Login Phone Number">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('phone'))?($errors->first('phone')):''}}</div>

                            </div>
                            <div class="form-group"><label>Password</label>
                                <input name="password" type="password" value="{{old('password')}}" class="form-control" placeholder="Password">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('password'))?($errors->first('password')):''}}</div>

                                <small class="form-text text-muted"><a href="#">Forgotten Password</a></small>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <span class="form-check-input input-check">
                                        <span class="input-check__body">
                                            <input class="input-check__input" type="checkbox" id="login-remember">
                                            <span class="input-check__box">

                                            </span>
                                            <svg class="input-check__icon" width="9px" height="7px">
                                                            <use xlink:href="{{asset('frontend')}}/images/sprite.svg#check-9x7"></use>
                                                        </svg>
                                        </span></span><label class="form-check-label" for="login-remember">Remember Me</label></div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
