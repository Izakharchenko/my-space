@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="title">
        <h1 class="display">{{ __('Edit user') }}: {{ $user->name }}</h1>
    </div>
</div>
<div class="container">
    <form method="POST" action={{ route('admin.user.update', $user) }}>
        @csrf
        @method('PUT')
        @foreach ($roles as $role)
        <div class="form-check">
            <input id="role_{{ $role->name }}" type="checkbox" name="roles[]" value="{{ $role->id }}">
            <label for="role_{{ $role->name }}">{{ $role->name }}</label>
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </form>
</div>
@endsection
