@extends('layouts.app')

@section('content')
  @if($user->isguest)
    <guest-user-component :user="{{ $user }}"></guest-user-component>
  @else
    <user-component
      :csrf="{{json_encode(csrf_token())}}"
      :user="{{ $user }}"
      :old="{{ json_encode(Session::getOldInput()) }}"
      :errors= "{{ $errors }}"
    ></user-component>
  @endif
@endsection