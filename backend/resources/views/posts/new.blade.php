@extends('layouts.app')

@section('content')
  <new-post-component 
    :csrf="{{json_encode(csrf_token())}}"
    :old="{{ json_encode(Session::getOldInput()) }}"
    :errors= "{{ $errors }}"
  ></new-post-component>
@endsection