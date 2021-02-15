@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="title">
        <h1 class="display">{{ __('Users') }}</h1>
    </div>
</div>
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm">
                <a href="{{ route('admin.user.create') }}" class="btn btn-success">Create user</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                <th>{{ $loop->iteration }}</th>
                <td>
                    <img class="img-thumbnail-table" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                    <div>
                        <div class="text-right">{{ $user->name }}</div>
                    </div>
                </td>
                <td>
                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                </td>
                <td>
                    <span class="badge badge-success">
                    Active
                    </span>
                </td>
                <td >
                    {{ implode(', ', $user->roles()->get()->pluck('name')->toArray() ) }}
                </td>
                    <td>
                        <a class="btn btn-link" href="{{ route('admin.user.show', $user) }}">View</a>
                        <a class="btn btn-link" href="{{ route('admin.user.edit', $user) }}">Edit</a>
                        {{-- <form action="{{ route('admin.user.destroy', $user) }}"
                            method="post">
                            @csrf
                            @method('DELETE') --}}
                        <button onclick="onDelete({{ $user->id }})" class="btn btn-link on-delete">Delete</button>
                        {{-- </form> --}}
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
            {{-- <button type="submit" class="btn btn-link on-delete1">Delete</button> --}}
        </div>
@endsection

@push('styles')
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{asset('js/sweetalert2.min.js') }}" defer></script>
@endpush
@push('scripts-footer')
    <script src="{{asset('js/on-delete.js') }}" defer></script>
@endpush
