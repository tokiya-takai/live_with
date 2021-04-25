@extends('layouts.app')

@section('content')
    <list-rendering-component v-bind:items="{{ $items }}"></list-rendering-component>
@endsection