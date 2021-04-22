@extends('layouts.app')

@section('content')
  <edit-post-component :csrf="{{json_encode(csrf_token())}}"></edit-post-component>
@endsection