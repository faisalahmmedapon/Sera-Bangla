@extends('frontend.layouts.master')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.partials.dashboard_siteber')
            </div>

                <div class="col-md-8">

                    <div class="card" style="border:1px solid #ddd;">
                        <div class="card-header bg-light">{{ __('Verify Your Email Address') }}</div>

                        <div class="card-body" style="padding:20px">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('email.verification.send') }}">
                                @csrf
                                <button type="submit"
                                        class="btn btn-link p-0 m-0 align-baseline">{{ __('verify') }}</button>
                                .
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
