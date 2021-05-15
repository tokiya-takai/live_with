@extends('layouts.app')

@section('content')
  @if($guest)
    <guest-user-component></guest-user-component>
  @else
    <user-component
      :csrf="{{json_encode(csrf_token())}}"
      :user="{{ $user }}"
    ></user-component>
  @endif
@endsection