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
                        <p class="row1">Thank you!</p>
                        <p class="row2">Enjoy your shoe life.</p>
                        <p class="row3">May all your dreams come true, I hope it goes well.</p>
                        <p class="row4">I’m always on your side.</p>
                        <p class="row5">We live with shoes.</p>
                        <p class="row6"><a href=" {{ route('index') }} "><button>Return to the HOME</button></a></p>
                        <figure><img src="{{ asset('images/livewith-sub-logo.png') }}" alt="logo"></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
