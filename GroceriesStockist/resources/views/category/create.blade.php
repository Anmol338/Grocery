@extends('category.index')

@section('content')
    <div class="container w-full flex flex-col">
        <div class="w-full flex lg:flex lg:items-center lg:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="ml-5 my-5 text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                    Add Category</h2>
            </div>
            <div class="mt-5 mr-5 flex lg:ml-4 lg:mt-0">
                <span class="sm:ml-3">
                    <a href="{{ route('category') }}">
                        <button type="button"
                            class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Back
                        </button>
                    </a>
                </span>
            </div>
        </div>

        <hr class="m-5 border border-1 border-solid border-black dark:border-white">

        <div class="mt-5 mx-5 container lg:w-1/2 lg:mx-auto border-2 border-solid border-graydark">
            <form action="{{ url('category/create') }}" method="POST">
                @csrf

                <div class="mt-5 flex items-center justify-center">
                    <h1 class="flex text-black text-bold text-lg dark:text-white dark:text-bold">Add New Category</h1>
                </div>

                <hr class="mx-5 my-2">

                <div class="p-6.5">
                    <div class="mb-4.5">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Name
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Category Name"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            autofocus />
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Description
                        </label>
                        <textarea name="description" rows="2" placeholder="Write Category Description"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6 flex">
                        <label class="block text-sm font-medium text-black dark:text-white">
                            Category Status :
                        </label>
                        <span class="ml-5"><input type="checkbox" name="status"
                                {{ old('status') == true ? checked : '' }} /></span>
                        @error('status')
                            <span class="text-red-500">{{ $message }} </span>
                        @enderror
                    </div>

                    <button type="submit"
                        class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
