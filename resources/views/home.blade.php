@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- component -->
        <section class="bg-white dark:bg-gray-900">
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
            <div class="container px-6 py-8 mx-auto">
                <div class="lg:flex lg:-mx-2">

                    <div class="space-y-3 lg:w-1/5 lg:px-2 lg:space-y-4">
                        <a href="#" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Jackets
                            &
                            Coats</a>
                        <a href="#"
                            class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Hoodies</a>
                        <a href="#"
                            class="block font-medium text-blue-600 dark:text-blue-500 hover:underline">T-shirts
                            & Vests</a>
                        <a href="#"
                            class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Shirts</a>
                        <a href="#" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Blazers
                            & Suits</a>
                        <a href="#"
                            class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Jeans</a>
                        <a href="#"
                            class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Trousers</a>
                        <a href="#"
                            class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Shorts</a>
                        <a href="#"
                            class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Underwear</a>
                    </div>

                    <div class="mt-6 lg:mt-0 lg:px-2 lg:w-4/5 ">
                        <div class="flex items-center justify-between text-sm tracking-widest uppercase ">
                            <p class="text-gray-500 dark:text-gray-300">6 Items</p>
                            <div class="flex items-center">
                                <p class="text-gray-500 dark:text-gray-300">Sort</p>
                                <select
                                    class="font-medium text-gray-700 bg-transparent dark:text-gray-500 focus:outline-none">
                                    <option value="#">Recommended</option>
                                    <option value="#">Size</option>
                                    <option value="#">Price</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                            @isset($Product)
                                @foreach ($Product as $Products)
                                    <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                                        <img class="object-cover w-full rounded-md h-72 xl:h-80" src="{{ $Products->image }}"
                                            alt="T-Shirt">
                                        <p class="text-blue-500">Price ${{ $Products->Price }}</p>

                                        <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200">
                                            {{ $Products->Description }}
                                        </h4>
                                        <div class=" text-left">

                                            <p class="text-blue-500">Colour <span
                                                    class="text-gray-700 dark:text-gray-200">{{ $Products->Colour }}</span>
                                            </p>
                                            <p class="text-blue-500">Size <span
                                                    class="text-gray-700 dark:text-gray-200">{{ $Products->Size }}</span></p>
                                            <p class="text-blue-500">Category <span
                                                    class="text-gray-700 dark:text-gray-200">{{ $Products->Category }}</span>
                                            </p>
                                        </div>

                                        {{-- ItemNo Quantity PurchaseNo ProductNo --}}
                                        <form action="{{ url('/home') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="ProductNo" value="{{ $Products->id }}">


                                            <div>
                                                <label for="visitors"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                    Quantity (in Number)
                                                </label>
                                                <input type="number" id="Quantity" name="Quantity"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="" required>
                                            </div>
                                            <button type="submit"
                                                class="flex items-center justify-center w-full px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-1" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                                </svg>
                                                <span class="mx-1">Add to Cart</span>
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                            @else
                                <span
                                    class="max-w-full px-5 py-4 text-gray-900 bg-gray-200 rounded-lg shadow dark:text-white dark:bg-gray-800">
                                    <a href="">
                                        <span class="p-6 text-3xl italic font-bold text-yellow-400 dark:text-yellow-400">
                                            No artworks Available at the moment check back Later
                                        </span>
                                    </a>,
                                </span>
                            @endisset


                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2 m-2 rounded-sm bg-slate-600 ">
                <?php echo $Product->render(); ?>
            </div>
        </section>
    </div>
@endsection
