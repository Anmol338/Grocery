@extends('category.index')

@section('content')
    <div class="container w-full flex flex-col">
        <div class="w-full flex lg:flex lg:items-center lg:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="ml-5 my-5 text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                    Category</h2>
            </div>
            <div class="mt-5 mr-5 flex lg:ml-4 lg:mt-0">
                <span class="sm:ml-3">
                    <a href="{{ route('category.create') }}">
                        <button type="button"
                            class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Add Category
                        </button>
                    </a>
                </span>
            </div>
        </div>

        <hr class="m-5 border border-1 border-solid border-black dark:border-white">

        <div class="container">
            @if (session('status'))
                <div id="alert-box"
                    class="mx-5 bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
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

            <div class="mx-5 flex justify-center items-center">
                <table id="myTable" class="m-2 border-separate border border-slate-500 ...">
                    <thead>
                        <tr>
                            <th class="border border-slate-600 ...">ID</th>
                            <th class="border border-slate-600 ...">Category</th>
                            <th class="border border-slate-600 ...">Description</th>
                            <th class="border border-slate-600 ...">Status</th>
                            <th class="border border-slate-600 ...">Created</th>
                            <th class="border border-slate-600 ...">Updated</th>
                            <th class="border border-slate-600 ...">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr>
                                <td class="border border-slate-700 ...">{{ $item->id }}</td>
                                <td class="border border-slate-700 ...">{{ $item->name }}</td>
                                <td class="border border-slate-700 ...">{{ $item->description }}</td>
                                <td class="border border-slate-700 ...">
                                    @if ($item->status)
                                        <span class="inline-flex items-center ml-2 text-x font-bold text-green-600">
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center ml-2 text-x font-bold text-red-600">
                                            Inactive
                                        </span>
                                    @endif
                                </td>
                                <td class="border border-slate-700 ...">{{ $item->created_at }}</td>
                                <td class="border border-slate-700 ...">{{ $item->updated_at }}</td>
                                <td class="border border-slate-700 ... ">
                                    <div class="mx-5 my-1 flex flex-wrap items-center justify-center gap-2">
                                        <a href="{{ url('category/' . $item->id . '/edit') }}"
                                            class="flex items-center justify-center h-6 w-15 rounded-md bg-green-700 text-center font-medium text-white hover:bg-opacity-90">
                                            Edit
                                        </a>

                                        <a href="{{ url('category/' . $item->id . '/delete') }}"
                                            class="flex items-center justify-center h-6 w-15 rounded-md bg-red-500 text-center font-medium text-white hover:bg-opacity-90"
                                            onclick="showConfirmationModal(event);">
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
    </div>
@endsection
