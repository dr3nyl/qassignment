<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        @if(session()->has('error'))
            <div class="flex justify-center mb-2">
                <div class="bg-red-100 border border-green-400 text-white px-4 py-3 rounded w-xl" role="alert">
                    <span class="block sm:inline">{{ session('error')}}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
            </div>
        @endif

        @if(session()->has('success'))
            <div class="flex justify-center mb-2">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded w-xl" role="alert">
                    <span class="block sm:inline">{{ session('success')}}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center p-6 bg-white border-b border-gray-200">

                    <table class="table-auto border">
                        <thead>
                            <tr>
                            <th>Name</th>
                            <th>Birthday</th>
                            <th>Gender</th>
                            <th>Place of birth</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($authors as $author)

                            <tr>
                                <td>{{ $author->first_name.' '.$author->last_name}}</td>
                                <td>{{ \Carbon\Carbon::parse($author->birthday)->format('M.d, Y') }}</td>
                                <td>{{ $author->gender }}</td>
                                <td>{{ $author->place_of_birth }}</td>
                                <td>
                                    <form action="/author/{{ $author->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-400 px-1 py-1 text-sm rounded-md"><i class="fa fa-trash text-white" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
