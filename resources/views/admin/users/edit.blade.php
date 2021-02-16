<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit user') }}: {{ $user->name }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action={{ route('admin.users.update', $user) }}>
                    @csrf
                    @method('PUT')
                    @foreach ($roles as $role)
                    <div class="">
                        <input id="role_{{ $role->name }}" type="checkbox" name="roles[]" value="{{ $role->id }}">
                        <label for="role_{{ $role->name }}">{{ $role->name }}</label>
                    </div>
                    @endforeach
                     <x-button>Update</x-button>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
