@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('You are logged in!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="logged-message">
                        <p>Thank you!</p>
                        <p>Enjoy your shoe life.</p>
                        <p>May all your dreams come true, I hope it goes well.</p>
                        <p>I’m always on your side.</p>
                        <p>We live with shoes.</p>
                        <p><a href=" {{ route('index') }} "><button>Return to the home.</button></a></p>
                        <figure><img src="{{ asset('images/livewith-sub-logo.png') }}" alt="logo"></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
