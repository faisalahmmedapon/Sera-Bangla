@extends('frontend.layouts.master')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.partials.dashboard_siteber')
            </div>
            <div class="col-md-8">
                <div class="d-flex justify-content-end">
                     <a href="{{route('auth.user.profile')}}" class="btn btn-primary text-white">Profile </a>

                </div>


                <div class="card flex-grow-1 mb-md-0">
                    <div class="card-body">
                        <h3 class="card-title"> {{$auth_user->name}} 's Profile Update</h3>
                        <form action="{{route('auth.user.profile.update',$auth_user->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group"><label> Name</label>
                                <input name="name" type="text" value="{{$auth_user->name}}" class="form-control">
                                <div
                                    style='color:red; padding: 0 5px;'>{{($errors->has('name'))?($errors->first('name')):''}}</div>

                            </div>

                             <div class="form-group"><label> Gender </label>

                                 <select class="form-control" name="gender">
                                     <option @if($auth_user->gender == 'Male') selected @endif value="Male">Male</option>
                                     <option @if($auth_user->gender == 'Female') selected @endif value="Female">Female</option>
                                     <option @if($auth_user->gender == 'Other') selected @endif value="Other">Other</option>
                                 </select>
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('gender'))?($errors->first('gender')):''}}</div>

                            </div>


                            <div class="form-group"><label>Phone</label>
                                <input name="phone" type="tel" value="{{$auth_user->phone}}" class="form-control">
                                <div
                                    style='color:red; padding: 0 5px;'>{{($errors->has('phone'))?($errors->first('phone')):''}}</div>
                            </div>
                            <div class="form-group"><label> Address </label>
                                <input name="address" type="text" value="{{$auth_user->address}}" class="form-control">
                                <div
                                    style='color:red; padding: 0 5px;'>{{($errors->has('address'))?($errors->first('address')):''}}</div>
                            </div>


                            <div class="form-group"><label> Image </label>
                                <input name="image" type="file"  class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary mt-4"> Update </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
