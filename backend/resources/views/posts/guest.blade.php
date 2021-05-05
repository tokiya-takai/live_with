@extends('layouts.app')

@section('content')
<div id="my-list">
  <a href="/posts/new" class="new-post-btn"><button>New</button></a>
  <div class="guest-header">
    <h1>Hello</h1>
  </div>
  <div class="guest-body">
    <p class="guide">Let's log in to create your own shoe list.</p>
    <p class="number-of-users">Currently used by <b style="font-size: 20px;">{{ $users }}</b> users.</p>
  </div>
</div>
@endsection