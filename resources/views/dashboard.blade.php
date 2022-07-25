<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <table class="table-auto">
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
                            <td>{{ $author->birthday }}</td>
                            <td>{{ $author->gender }}</td>
                            <td>{{ $author->place_of_birth }}</td>
                            <td></td>
                        </tr>

                    @endforeach
                        
                    </tbody>
                </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
