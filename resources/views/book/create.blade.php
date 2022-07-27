<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a book') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden">

                <div class="flex justify-center p-6">

                    <form action="/book" method="POST">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6">
                                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                        <input type="text" name="title" id="title" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="author_id" class="block text-sm font-medium text-gray-700">Author</label>
                                        <select id="author_id" 
                                                name="author_id" 
                                                class="overflow-auto mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                                                required>
                                                @foreach($authors as $author)

                                                    <option value="{{ $author->id }}">{{ $author->first_name.' '.$author->last_name }}</option>

                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="release_date" class="block text-sm font-medium text-gray-700">Release date</label>
                                        
                                        <div class="relative">
                                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                <svg aria-hidden="true" 
                                                    class="w-5 h-5 text-gray-500 dark:text-gray-400" 
                                                    fill="currentColor" 
                                                    viewBox="0 0 20 20" 
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" 
                                                        clip-rule="evenodd">
                                                    </path>
                                                </svg>
                                            </div>
                                            <input datepicker="" 
                                                type="text"
                                                name="release_date"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" 
                                                placeholder="Select date" required>
                                        </div>

                                    </div>

                                    <div class="col-span-6">
                                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea type="text" name="description" id="description" autocomplete="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" > </textarea>
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="isbn" class="block text-sm font-medium text-gray-700">Isbn</label>
                                        <input type="text" name="isbn" id="isbn" autocomplete="isbn" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="format" class="block text-sm font-medium text-gray-700">Format</label>
                                        <input type="text" name="format" id="format" autocomplete="format" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="number_of_pages" class="block text-sm font-medium text-gray-700">No. of pages</label>
                                        <input type="text" name="number_of_pages" id="number_of_pages" autocomplete="number_of_pages" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
