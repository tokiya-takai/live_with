@extends('layouts.app')

@section('content')
    <liked-posts-component :items="{{ $items }}"></liked-posts-component>
@endsection