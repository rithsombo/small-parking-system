@extends('layouts.main')
@section('content')
    <div class="content">
        <div class="content-inner">
            <div class="flex justify-between items-center mb-6">
                <div class="uppercase text-[#CCA152] font-medium text-3xl">
                    <h1>User</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="bg-slate-600 w-[70px] h-[70px] rounded-full">
                        <img class="w-[70px] h-[70px] rounded-full" src="https://i.pinimg.com/474x/32/88/cb/3288cb9982c02e0e1f8131615f05574d.jpg" alt="">
                    </div>
                    <div class="text-start uppercase text-[#CCA152]">
                        <h1>User Login</h1>
                    </div>
                </div>
            </div>
            <div class="mb-5 text-right">
                <a href="{{route('createuser')}}">
                    <button class="w-[90px] font-medium uppercase flex py-2 px-4 bg-[#CCA152] active:bg-[#e9b656] rounded-md shadow-lg text-white transition duration-100 ease-in-out">
                        <i class="fa fa-plus-circle mt-[5px]" aria-hidden="true"></i>
                        <h2 class="ml-[5px]">Add</h2>
                    </button>
                </a>
            </div>
            <div class="table-container">
                <table class="bg-white rounded-lg overflow-hidden w-full">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-2 px-5 text-left whitespace-nowrap">#</th>
                        <th class="py-2 px-5 text-left whitespace-nowrap">Profile</th>
                        <th class="py-2 px-5 text-left whitespace-nowrap">Username</th>
                        <th class="py-2 px-5 text-left whitespace-nowrap">Password</th>
                        <th class="py-2 px-5 text-left whitespace-nowrap">Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                    @foreach($data as $user)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <img src="{{ asset('/photo/' . $user->photo) }}" class="w-[50px] h-[50px] rounded-full" alt="">
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{$user->username}}</td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">{{$user->password}}</td>
                            <td class="py-3 px-2 text-left whitespace-nowrap">
                                <div class="flex space-x-2">
                                    <a href="{{route('index_update_user').'?id='.$user-> id}}"
                                       class="w-14 inline-flex items-center justify-center p-2 rounded-md bg-blue-600 hover:bg-blue-700 text-white focus:outline-none focus:bg-blue-700">
                                        <span class="material-symbols-outlined">Edit</span>
                                    </a>
                                    <button
                                        class="bg-red-500 text-white rounded-md px-4 py-2 hover:bg-rose-700 transition"
                                        onclick="openModal('modalConfirm_{{$user->id}}')"
                                    >
                                        <span class="material-symbols-outlined">Delete</span>
                                    </button>
                                    <div
                                        id="modalConfirm_{{$user->id}}"
                                        class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4"
                                    >
                                        <div
                                            class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md"
                                        >
                                            <div class="flex justify-end p-2">
                                                <button
                                                    onclick="closeModal('modalConfirm_{{$user->id}}')"
                                                    type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                >
                                                    <svg
                                                        class="w-5 h-5"
                                                        fill="currentColor"
                                                        viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"
                                                        ></path>
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="p-6 pt-0 text-center">
                                                <svg
                                                    class="w-20 h-20 text-red-600 mx-auto"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    ></path>
                                                </svg>
                                                <h3 class="text-l font-normal text-gray-500 mt-5 mb-6">
                                                    Are you sure you want to delete user {{$user->username}}?
                                                </h3>
                                                <div class="flex items-center justify-between">
                                                    <button
                                                        onclick="closeModal('modalConfirm_{{$user->id}}')"
                                                        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                                                        data-modal-toggle="delete-user-modal"
                                                    >
                                                        No, cancel
                                                    </button>
                                                    <form action="{{ route('delete_user', $user->id) }}" method="POST">
                                                        @csrf
                                                        <button
                                                            type="submit"
                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2"
                                                        >
                                                            Yes, I'm sure
                                                        </button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </body>
    <script type="text/javascript">
        window.openModal = function (modalId) {
            document.getElementById(modalId).classList.remove("hidden");
            document
                .getElementsByTagName("body")[0]
                .classList.add("overflow-y-hidden");
        };

        window.closeModal = function (modalId) {
            document.getElementById(modalId).classList.add("hidden");
            document
                .getElementsByTagName("body")[0]
                .classList.remove("overflow-y-hidden");
        };

        // Close all modals when press ESC
        document.onkeydown = function (event) {
            event = event || window.event;
            if (event.keyCode === 27) {
                document
                    .getElementsByTagName("body")[0]
                    .classList.remove("overflow-y-hidden");
                let modals = document.querySelectorAll(".fixed");
                modals.forEach((modal) => {
                    modal.classList.add("hidden");
                });
            }
        };
    </script>
@endsection
