@extends('layouts.app')
@section('title','Kapcsolat')
@section('content')
<h1>Kapcsolat</h1>
<form method="POST" action="{{ route('contact.store') }}">
  @csrf
  <div><label>Név</label><input name="name" value="{{ old('name') }}">@error('name')<div>{{ $message }}</div>@enderror</div>
  <div><label>Email</label><input name="email" value="{{ old('email') }}">@error('email')<div>{{ $message }}</div>@enderror</div>
  <div><label>Tárgy</label><input name="subject" value="{{ old('subject') }}"></div>
  <div><label>Üzenet</label><textarea name="message">{{ old('message') }}</textarea>@error('message')<div>{{ $message }}</div>@enderror</div>
  <button type="submit">Küldés</button>
</form>
@endsection
