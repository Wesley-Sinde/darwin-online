@extends('layouts.app')

@section('content')
    <div class="px-6 py-6 lg:px-8 m-10 rounded-md p-3 dark:bg-gray-800 bg-gray-200">
        <h3 class="mb-4 text-xl font-medium text-gray-800 dark:text-gray-200">
            Your Product cart
        </h3>



        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="p-4">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for items">
                </div>
            </div>
            <table class="mx-4 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">#</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Color
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                {{-- <tbody>
                    +"id": 81
                    +"Quantity": 2
                    +"PurchaseNo": 1655410655
                    +"ProductNo": 81
                    +"created_at": "2022-06-16 17:47:31"
                    +"updated_at": "2022-06-16 17:47:31"
                    +"Size": 3
                    +"Category": "Non fuga quos beatae ipsam qui."
                    +"Colour": "Fugit quia quia inventore quas nemo excepturi ut."
                    +"image": "https://source.unsplash.com/random"
                    +"Description": "Rerum numquam aliquid ipsum repellendus."
                    +"Price": 8.0 --}}
                @isset($Product)
                    <?php $total = 0; ?>
                    @foreach ($Product as $Products)
                        <?php $total += $Products->Price; ?>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $Products->Description }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $Products->Colour }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $Products->Category }}
                            </td>
                            <td class="px-6 py-4">
                                ${{ $Products->Price }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <span
                        class="max-w-full px-5 py-4 text-gray-900 bg-gray-200 rounded-lg shadow dark:text-white dark:bg-gray-800">
                        <a href="">
                            <span class="p-6 text-3xl italic font-bold text-yellow-400 dark:text-yellow-400">
                                No artworks in your cart
                        </a>,
                    </span>
                @endisset
                </tbody>
            </table>
        </div>
        <div class="flex justify-between items-end my-4">
            <span class="text-3xl font-bold text-gray-900 dark:text-white">
                Total $<?php echo $total; ?>
            </span>

        </div>

        <div class="items-center ">
            <a href="/buy"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
                Confirm to Buy
            </a>

        </div>
    </div>
@endsection
