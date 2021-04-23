@extends('layouts.app')

@section('content')
  <edit-post-component :csrf="{{json_encode(csrf_token())}}" 
  title="{{ $item->title }}"
  content="{{ $item->content }}"
  path="{{ $item->file_path }}"
  day="{{ $item->created_at }}"
  ></edit-post-component>
@endsection