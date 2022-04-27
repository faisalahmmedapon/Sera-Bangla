@extends('frontend.layouts.master')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-4 mt-md-0">
                <div class="card flex-grow-1 mb-0">
                    <div class="card-body">
                        <h3 class="card-title">Register</h3>
                        <form action="{{route('auth.user.register')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label> Name </label>
                                <input name="name" type="text" value="{{old('name')}}"  class="form-control" placeholder="Enter Full Name">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('name'))?($errors->first('name')):''}}</div>

                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input name="email" type="email" value="{{old('email')}}"  class="form-control" placeholder="Enter email">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>

                            </div>
                            <div class="form-group"><label>Password</label>
                                <input name="password" type="password" value="{{old('password')}}" class="form-control" placeholder="Password">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('password'))?($errors->first('password')):''}}</div>

                            </div>
{{--                            <div class="form-group"><label>Repeat Password</label>--}}
{{--                                <input type="password" class="form-control" placeholder="Password">--}}
{{--                            </div>--}}
                            <button type="submit"
                                                                                                                                                    class="btn btn-primary mt-4">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
