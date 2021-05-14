@extends('layouts.app')

@section('content')
  <edit-post-component :csrf="{{json_encode(csrf_token())}}"
  :item="{{ $item }}"
  :old="{{ json_encode(Session::getOldInput()) }}"
  :errors= "{{ $errors }}"
  ></edit-post-component>
@endsection