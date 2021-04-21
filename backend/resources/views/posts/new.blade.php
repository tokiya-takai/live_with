@extends('layouts.app')

@section('content')
  <new-post-component :csrf="{{json_encode(csrf_token())}}"></new-post-component>
@endsection