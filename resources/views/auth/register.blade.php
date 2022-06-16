@extends('layouts.app')

@section('content')
    <main
        class="sm:container sm:mx-auto sm:max-w-full sm:mt-10 dark:bg-gray-900 flex justify-center items-center text-gray-900  m-4">
        <div>
            <section
                class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg dark:bg-gray-800 dark:text-gray-200 
                    rounded-l 
                      ">

                <header
                    class="px-2 py-2 font-semibold text-gray-700 bg-gray-200 sm:py-2 sm:px-8 sm:rounded-t-md dark:bg-gray-800 dark:text-gray-200  shadow-md flex justify-center items-center border-b">
                    {{ __('Register') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8 dark:bg-gray-800 grid grid-cols-1 md:grid-cols-2"
                    method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="flex flex-wrap mx-2">
                        <label for="CustFName" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4 dark:text-gray-200">
                            {{ __('First Name') }}:
                        </label>

                        <input id="CustFName" type="text"
                            class="form-input p-2 w-full @error('CustFName') text-gray-700   border-red-500 @enderror"
                            name="CustFName" value="{{ old('CustFName') }}" required autocomplete="CustFName" autofocus>

                        @error('CustFName')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap  mx-2">
                        <label for="CustLName"
                            class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4 dark:text-gray-200">
                            {{ __('Last Name') }}:
                        </label>

                        <input id="CustLName" type="text"
                            class="form-input p-2 w-full @error('CustLName') border-red-500 @enderror" name="CustLName"
                            value="{{ old('CustLName') }}" required autocomplete="CustLName" autofocus>

                        @error('CustLName')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap  mx-2">
                        <label for="Title" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4 dark:text-gray-200">
                            {{ __('Title') }}:
                        </label>

                        <input id="Title" type="text"
                            class="form-input p-2 w-full @error('Title') border-red-500 @enderror" name="Title"
                            value="{{ old('Title') }}" required autocomplete="Title" autofocus>

                        @error('Title')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap  mx-2">
                        <label for="Address" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4 dark:text-gray-200">
                            {{ __('Address') }}:
                        </label>

                        <input id="Address" type="text"
                            class="form-input p-2 w-full @error('Address') border-red-500 @enderror" name="Address"
                            value="{{ old('Address') }}" required autocomplete="Address" autofocus>

                        @error('Address')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div class="flex flex-wrap  mx-2">
                        <label for="City" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4 dark:text-gray-200">
                            {{ __('City') }}:
                        </label>

                        <input id="City" type="text"
                            class="form-input p-2 w-full @error('City') border-red-500 @enderror" name="City"
                            value="{{ old('City') }}" required autocomplete="City" autofocus>

                        @error('City')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap  mx-2">
                        <label for="State" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4 dark:text-gray-200">
                            {{ __('State') }}:
                        </label>

                        <input id="State" type="text"
                            class="form-input p-2 w-full @error('State') border-red-500 @enderror" name="State"
                            value="{{ old('State') }}" required autocomplete="State" autofocus>

                        @error('State')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div class="flex flex-wrap  mx-2">
                        <label for="Country" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4 dark:text-gray-200">
                            {{ __('Country') }}:
                        </label>

                        <input id="Country" type="text"
                            class="form-input p-2 w-full @error('Country') border-red-500 @enderror" name="Country"
                            value="{{ old('Country') }}" required autocomplete="Country" autofocus>

                        @error('Country')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div class="flex flex-wrap  mx-2">
                        <label for="Phone" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4 dark:text-gray-200">
                            {{ __('Phone') }}:
                        </label>

                        <input id="Phone" type="tel"
                            class="form-input p-2 w-full @error('Phone') border-red-500 @enderror" name="Phone"
                            value="{{ old('Phone') }}" required autocomplete="Phone" autofocus>

                        @error('Phone')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div class="flex flex-wrap  mx-2">
                        <label for="PostCode" class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4 dark:text-gray-200">
                            {{ __('PostCode') }}:
                        </label>

                        <input id="PostCode" type="number"
                            class="form-input p-2 w-full @error('PostCode') border-red-500 @enderror" name="PostCode"
                            value="{{ old('PostCode') }}" required autocomplete="PostCode" autofocus>

                        @error('PostCode')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    {{-- CustFName CustLName  Title  Address City State Country Phone PostCode email password --}}







                    <div class="flex flex-wrap  mx-2">
                        <label for="email"
                            class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4  dark:text-gray-200">
                            {{ __('E-Mail Address') }}:
                        </label>

                        <input id="email" type="email"
                            class="form-input w-full  p-2  @error('email') border-red-500 @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap  mx-2">
                        <label for="password"
                            class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4  dark:text-gray-200">
                            {{ __('Password') }}:
                        </label>

                        <input id="password" type="password"
                            class="form-input w-full  p-2  @error('password') border-red-500 @enderror" name="password"
                            required autocomplete="new-password">

                        @error('password')
                            <p class="mt-4 text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap  mx-2">
                        <label for="password-confirm"
                            class="block mb-2 text-sm font-bold text-gray-700 sm:mb-4  dark:text-gray-200">
                            {{ __('Confirm Password') }}:
                        </label>

                        <input id="password-confirm" type="password" class="w-full form-input p-2 "
                            name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="flex flex-wrap  mx-2">
                        <div class="relative mr-3 w-full revue-form-group mx-auto">


                            <div class="flex absolute  items-center pl-3 my-auto pt-3">

                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z">
                                    </path>
                                </svg>
                            </div>

                            <button type="submit"
                                class="w-full p-3 text-base font-bold leading-normal text-gray-100 no-underline whitespace-no-wrap bg-blue-500 rounded-lg select-none hover:bg-gray-200 sm:py-4 dark:text-gray-100 dark:hover:bg-green-700  ">
                                {{ __('Register') }}
                            </button>


                        </div>



                        <p
                            class="w-full my-6 text-xs text-center text-gray-700 sm:text-sm sm:my-8  dark:text-gray-200 mx-auto">
                            {{ __('Already have an account?') }}
                            <a class="text-blue-500 no-underline hover:text-blue-700 hover:underline"
                                href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </p>
                    </div>
                </form>

            </section>

        </div>
    </main>
@endsection
