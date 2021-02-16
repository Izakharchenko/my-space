<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}: {{ $user->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="py-3 bg-gray-200 mb-6 rounded">
                        <a class="text-white bg-yellow-500 hover:bg-yellow-700 rounded p-3 mr-2"
                            href="{{ route('admin.users.edit', $user) }}">{{ __('Update') }}
                        </a>
                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                            class="text-white bg-red-500 hover:bg-red-700 rounded p-3">{{ __('Delete') }}
                        </button>
                        </form>

                    </div>

                    <div class="flex">
                        <div class="flex-none">
                            <img class="h-250 w-250 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="{{ $user->name }}">
                        </div>
                        <ul class="flex-grow">
                            <li>Name: {{ $user->name }}</li>
                            <li>Email: {{ $user->email }}</li>
                            <li>Roles: {{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</li>
                        </ul>
                    <div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
