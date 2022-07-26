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
                </div>
            </div>
        @endif

        @if(session()->has('success'))
            <div class="flex justify-center mb-2">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded w-xl" role="alert">
                    <span class="block sm:inline">{{ session('success')}}</span>
                </div>
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="ml-6 mt-2">
                    <h1 class="text-2xl underline">Author: {{ $author->first_name.' '. $author->last_name }}</h1>
                </div>
                <div class="flex justify-center p-6 bg-white border-b border-gray-200">

                    <table class="table-auto border">
                        <thead>
                            <tr>
                            <th>Title</th>
                            <th>Release date</th>
                            <th>Description</th>
                            <th>No. of pages</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)

                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ \Carbon\Carbon::parse($book->release_date)->format('M.d, Y') }}</td>
                                <td>{{ $book->description }}</td>
                                <td>{{ $book->number_of_pages }}</td>
                                <td class="flex justify-center">
                                    <form action="/book/{{ $book->id }}" method="post">
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
