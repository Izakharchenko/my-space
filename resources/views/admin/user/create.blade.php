@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="title">
        <h1 class="display">{{ __('Create user') }}</h1>
    </div>
</div>
@include('_form')
@endsection
