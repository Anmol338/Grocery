@extends('layouts.index')

@section('content')
    <h1 class="text-3xl text-black">Add Hostel</h1>

    <div class="w-full my-5 text-end">
        <a href="{{ route('hostel') }}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
            aria-current="page"> <i class="fas fa-solid fa-arrow-left mr-2"></i> Back</a>
    </div>

    <div class="flex items-center justify-center  w-full">
        <div class="bg-white overflow-auto w-full max-w-lg md:max-w-2xl lg:max-w-4xl">
            <div class="leading-loose">
                <form method="POST" action="{{ url('/hostel/create') }}" class="p-10 bg-white rounded shadow-xl">
                    @csrf

                    <div class="m-5 w-full flex justify-center">
                        <div class="w-full">
                            <label class="block text-sm text-black" for="name">Hosteler ID</label>
                            <input class="w-full px-5 py-1 text-black bg-gray-100 rounded" id="user_id" name="user_id"
                                type="text" required="" placeholder="Hosteler ID" aria-label="user_id" value="{{ auth()->user()->id }}">
                            @error('id')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="m-5 w-full flex justify-center">
                        <div class="w-full">
                            <label class="block text-sm text-black" for="name">Hostel Name</label>
                            <input class="w-full px-5 py-1 text-black bg-gray-100 rounded" id="name" name="name"
                                type="text" required="" placeholder="Hostel Name" aria-label="Name"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="m-5 w-full flex justify-center">
                        <div class="w-full">
                            <label class="block text-sm text-black" for="address">Address</label>
                            <input class="w-full px-5 py-1 text-black bg-gray-100 rounded" id="address" name="address"
                                type="text" required="" placeholder="Address" aria-label="Address"
                                value="{{ old('address') }}">
                            @error('address')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="m-5 w-full flex justify-center">
                        <div class="w-full">
                            <label class="block text-sm text-black" for="message">Description</label>
                            <textarea class="w-full px-5 py-1 text-black bg-gray-100 rounded" id="description" name="description" rows="6" placeholder="Description" aria-label="Message">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="m-5 w-full flex items-center justify-center align-items-center">
                        <button class="w-1/2 px-5 py-2 mb-5 text-white font-light tracking-wider bg-gray-900 rounded"
                            type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
