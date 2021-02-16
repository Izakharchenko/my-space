<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create user') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action={{ route('admin.users.store') }}>
                        @csrf
                        @method('POST')
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block text-sm font-medium text-gray-700" for="name">{{ __('Name') }}:</label>
                            <input
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('name') is-invalid @enderror"
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                            <input
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('email') is-invalid @enderror"
                                type="text"
                                name="email"
                                id="email"
                                autocomplete="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-6">
                            <fieldset>
                            <legend class="text-base font-medium text-gray-900">{{ __('Roles') }}</legend>
                                <div class="mt-4 space-y-4">
                                    @foreach ($roles as $role)
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="role_{{ $role->name }}" type="checkbox" name="roles[]" value="{{ $role->id }}"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="role_{{ $role->name }}" class="font-medium text-gray-700">{{ $role->name }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                    @error('roles')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </fieldset>
                        </div>
                        <x-button class="mt-2"> {{ __('Save') }} </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
