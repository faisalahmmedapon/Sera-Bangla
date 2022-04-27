@extends('frontend.layouts.master')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.partials.dashboard_siteber')
            </div>
            <div class="col-md-8">
                <div class="d-flex justify-content-between">
                    <h3> {{$auth_user->name}} 's Profile </h3> <a href="{{route('auth.user.profile.edit')}}" class="btn btn-primary text-white">Update Profile </a>

                </div>
                <table class="table">

                    <tbody>
                    <tr>
                        <td>Name:</td>
                        <td>{{$auth_user->name}}</td>
                    </tr>


                    <tr>
                        <td>Email:</td>
                        <td>{{$auth_user->email}}</td>
                    </tr>

                    <tr>
                        <td>Phone:</td>
                        <td>{{$auth_user->phone}}</td>
                    </tr>

                    <tr>
                        <td>Gender:</td>
                        <td>{{$auth_user->gender}}</td>
                    </tr>

                    <tr>
                        <td>Address:</td>
                        <td>{{$auth_user->address}}</td>
                    </tr>


                    <tr>
                        <td>Image:</td>
                        <td><img height="100px" width="200px" src="{{$auth_user->image}}"></td>
                    </tr>

                    <tr>
                        <td>Profile Status :</td>
                        <td>@if($auth_user->status == '1') <a class=" bg-success text-white p-1">Active</a> @else
                                <a class="bg-danger text-white p-1">Inactive</a>                         <p> Your account has been disabled . Please Contact in support team.</p>
                            @endif
                        </td>
                    </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
