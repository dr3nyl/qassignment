<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        @if(session()->has('error'))
            <div class="flex justify-center mb-2">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded w-xl" role="alert">
                    <span class="block sm:inline">{{ session('error')}}</span>
                </div>
            </div>
        @endif

        @if(session()->has('success'))
            <div class="flex justify-center mb-2">
                <div class="bg-green-100 border border-green-400 text-black px-4 py-3 rounded w-xl" role="alert">
                    <span class="block sm:inline">{{ session('success')}}</span>
                </div>
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center mt-4">
                    <form action="/author" method="get">
                        <button class="bg-green-400 px-2 py-1 rounded-md text-white">Create author</button>
                    </form>
                </div>
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
                                <td class="flex justify-center">
                                    <form class="mr-1" action="/author/{{ $author->id }}" method="get">
                                        <button class="bg-blue-400 px-1 py-1 text-sm rounded-md"><i class="fas fa-eye" aria-hidden="true"></i></button>
                                    </form>
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
