@extends('layouts.app')

@section('content')
    <div class="px-6 py-6 lg:px-8 m-10 rounded-md p-3 dark:bg-gray-800 bg-gray-200">
        @if ($errors->any())
            <div class="w-4/5 m-auto ">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="w-4/5 py-4 mb-4 bg-red-700 text-gray-50 rounded-2xl">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('message'))
            <div id="toast-success"
                class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal"> {{ session()->get('message') }}</div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-collapse-toggle="toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd">
                        </path>
                    </svg>
                </button>
            </div>
        @endif
        <h3 class="mb-4 text-xl font-medium text-gray-800 dark:text-gray-200">
            Add Product
        </h3>
        <form action="{{ url('/admin') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="pb-3" type="file" accept="image/*" onchange="loadFile(event)" name="image">

            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="Category">Category Of
                    your
                    art
                </label>
                <input type="text" id="Category" name="Category" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="Price">Price Of your
                    art
                </label>
                <input type="number" id="Price" name="Price" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="Colour">Color Of your
                    art
                </label>
                <input type="number" id="Colour" name="Colour" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="Size">Size Of your
                    art
                </label>
                <input type="number" id="Size" name="Size" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <label class="block mt-2 mb-1 text-sm font-medium text-gray-900 dark:text-gray-300"
                for="default_size">Description</label>
            <div class="description">
                <textarea id="description" required placeholder="Description..." name="Description" required
                    class="block w-full py-2 text-xl text-gray-600 border-b-2 outline-none h-60 bg-slate-400 dark:bg-slate-600 dark:text-gray-200 ">
                </textarea>
            </div>

            <div class="flex items-start mt-2 mb-6">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value=""
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 required">
                </div>
                <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                    I agree with
                    the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">
                        terms
                        and conditions
                    </a>.
                </label>
            </div>
            <div class="items-center ">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
                    Submit
                </button>

            </div>

        </form>
    </div>
@endsection
