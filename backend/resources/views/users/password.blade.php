@extends('layouts.app')

@section('content')
  <div id="change-password">
    <div class="header">
      <h1>Change Password</h1>
    </div>
    <form action="{{ route('password.update', ['id'=>$user->id]) }}" method="post">
      @csrf
      <div class="current-password f-ct">
        <label>現在のパスワード</label>
        <input type="password" name="current_password">
        @error('current_password')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>
      <div class="new-password f-ct">
        <label>新しいパスワード</label>
        <input type="password" name="password">
        @error('password')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>
      <div class="confirmation f-ct">
        <label>パスワード(確認)</label>
        <input type="password" name="password_confirmation">
      </div>
      <div class="password-submit">
        <input type="submit" value="SEND">
      </div>
    </form>
  </div>
@endsection