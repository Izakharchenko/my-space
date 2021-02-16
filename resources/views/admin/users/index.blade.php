<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Users') }}
        </h2>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <div class="py-3 bg-gray-200 mb-6 rounded">
                        <a  class="text-white bg-green-500 hover:bg-green-700 rounded p-3 mr-2"
                            href="{{ route('admin.users.create') }}" class="btn btn-success">{{ __('Create user') }}
                        </a>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($users as $user)
                        <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                {{ $user->name }}
                                </div>
                                <div class="text-sm text-gray-500">
                                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                </div>
                            </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ implode(', ', $user->roles()->get()->pluck('name')->toArray() ) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a class="text-indigo-600 hover:text-indigo-900" href="{{ route('admin.users.show', $user) }}">View</a>
                            <a class="text-indigo-600 hover:text-indigo-900" href="{{ route('admin.users.edit', $user) }}">Edit</a>
                            {{-- <form action="{{ route('admin.user.destroy', $user) }}"
                                method="post">
                                @csrf
                                @method('DELETE') --}}
                            <button onclick="onDelete({{ $user->id }})" class="text-indigo-600 hover:text-indigo-900 on-delete">Delete</button>
                            {{-- </form> --}}
                        </td>
                        @empty
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            {{ __('No Users') }}
                            </td>
                        </tr>
                        @endforelse
                        <!-- More items... -->
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- @push('styles')
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{asset('js/sweetalert2.min.js') }}" defer></script>
@endpush
@push('scripts-footer')
    <script src="{{asset('js/on-delete.js') }}" defer></script>
@endpush --}}
