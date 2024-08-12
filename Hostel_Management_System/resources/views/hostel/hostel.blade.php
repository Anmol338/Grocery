@extends('layouts.index')

@section('content')
    <h1 class="text-3xl text-black">Hostel</h1>

    @if (session('status'))
        <div id="alert-box" class="mx-5 bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
            role="alert">
            <div class="flex justify-between items-center">
                <p class="font-bold">{{ session('status') }}</p>
                <button onclick="closeAlert()" class="text-teal-900 font-bold px-2">X</button>
            </div>
        </div>

        <script>
            function closeAlert() {
                document.getElementById('alert-box').style.display = 'none';
            }

            setTimeout(closeAlert, 5000); // Automatically close the alert after 5 seconds
        </script>
    @endif

    <div class="w-full my-5 text-end">
        <a href="{{ route('hostel.create') }}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
            aria-current="page"> <i class="fas fa-solid fa-plus mr-2"></i> Add
            Hostel</a>
    </div>

    <div class="w-full">
        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center">ID</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center">Hosteler ID
                        </th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center">Name</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center">Description</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center">Address</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center">Created</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center">Updated</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($hostels as $hostel)
                        <tr>
                            <td class="text-left py-3 px-4">{{ $hostel->id }}</td>
                            <td class="text-left py-3 px-4">{{ $hostel->user_id }}</td>
                            <td class="text-left py-3 px-4">{{ $hostel->name }}</td>
                            <td class="text-left py-3 px-4">{{ $hostel->description }}</td>
                            <td class="text-left py-3 px-4">{{ $hostel->address }}</td>
                            <td class="text-left py-3 px-4">{{ $hostel->created_at }}</td>
                            <td class="text-left py-3 px-4">{{ $hostel->updated_at }}</td>
                            <td class="text-left py-3 px-4">
                                <div class="mx-5 my-1 flex flex-wrap items-center justify-center gap-2">

                                    <a href="{{ url('hostel/'.$hostel->id.'/delete') }}"
                                        class="flex items-center justify-center h-10 w-20 rounded-md bg-blue-700 text-center font-medium text-white hover:bg-opacity-90">
                                        <i class="fas fa-solid fa-eye mr-2"></i>
                                        View
                                    </a>

                                    <a href="#"
                                        class="flex items-center justify-center h-10 w-20 rounded-md bg-green-700 text-center font-medium text-white hover:bg-opacity-90">
                                        <i class="fas fa-solid fa-pen mr-2"></i>
                                        Edit
                                    </a>

                                    <a href="#"
                                        class="flex items-center justify-center h-10 w-20 rounded-md bg-red-500 text-center font-medium text-white hover:bg-opacity-90"
                                        onclick="showConfirmationModal(event);">
                                        <i class="fas fa-solid fa-trash mr-2"></i>
                                        Delete
                                    </a>

                                    <!-- Confirmation Modal -->
                                    <div id="confirmationModal"
                                        class="fixed inset-0 flex items-center justify-center z-50 hidden">
                                        <div
                                            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-11/12 sm:w-1/2 lg:w-1/3">
                                            <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-black">Confirm
                                                Deletion</h2>
                                            <p class="mb-6 text-gray-900 dark:text-black">Are you sure you want to
                                                delete this item?</p>
                                            <div class="flex justify-end">
                                                <button onclick="closeConfirmationModal()"
                                                    class="px-4 py-2 bg-green-500 dark:bg-gray-600 text-gray-900 dark:text-black rounded-lg mr-2">Cancel</button>
                                                <button id="confirmButton"
                                                    class="px-4 py-2 bg-red-500 text-white rounded-lg">Delete</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Overlay -->
                                    <div id="modalOverlay" class="fixed inset-0 bg-black opacity-50 hidden"></div>


                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
