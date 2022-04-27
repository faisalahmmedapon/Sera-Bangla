@extends('frontend.layouts.master')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
              @include('frontend.partials.dashboard_siteber')
            </div>
            <div class="col-md-8">
                <h3> Dashboard </h3>
            </div>
        </div>
    </div>
@endsection
