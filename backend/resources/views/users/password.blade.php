@extends('layouts.app')

@section('content')
  <div id="change-password">
    @if(count($errors)>0)
    <ul>
      {{-- @foreach ($errors->password as $error)
          <li>{{ $error }}</li>
      @endforeach --}}
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
    @endif
    <div class="header">
      <h1>パスワードを変更</h1>
    </div>
    <form action="{{ route('password.update', ['id'=>$user->id]) }}" method="post">
      @csrf
      <div class="current-password">
        <label>現在のパスワード</label>
        <input type="password" name="current_password">
      </div>
      <div class="new_password">
        <label>新しいパスワード</label>
        <input type="password" name="password">
      </div>
      <div class="confirmation">
        <label>パスワード(確認)</label>
        <input type="password" name="password_confirmation">
      </div>
      <div class="password-submit">
        <input type="submit" value="SEND">
      </div>
    </form>
  </div>
@endsection