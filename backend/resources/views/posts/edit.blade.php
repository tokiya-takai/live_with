@extends('layouts.app')

@section('content')
  <edit-post-component :csrf="{{json_encode(csrf_token())}}"
  id="{{ $item->id }}"
  title="{{ $item->title }}"
  content="{{ $item->content }}"
  path="{{ $item->file_path }}"
  day="{{ $item->created_at }}"
  ></edit-post-component>
@endsection