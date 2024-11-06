@extends('layouts.main')
@section('content')
    <div class="content">
        <div class="content-inner">
            <div class="flex justify-between items-center mb-6">
                <div class="uppercase text-[#CCA152] font-medium text-3xl">
                    <h1>Register</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="bg-slate-600 w-[70px] h-[70px] rounded-full">
                        <img class="w-[70px] h-[70px] rounded-full" src="https://i.pinimg.com/474x/32/88/cb/3288cb9982c02e0e1f8131615f05574d.jpg" alt="User Profile">
                    </div>
                    <div class="text-start uppercase text-[#CCA152]">
                        <h1>User Login</h1>
                    </div>
                </div>
            </div>
            <div class="flex justify-start mt-8 mb-4 ">
                <a href="{{route('index_register')}}">
                    <button class="w-[90px] font-medium uppercase flex py-2 px-4 bg-[#CCA152] active:bg-[#e9b656] rounded-md shadow-lg text-white transition duration-100 ease-in-out delay-10 active:translate-y-1 active:scale-20">
                        <i class="fa fa-plus-circle mt-[5px]" aria-hidden="true"></i>
                        <h2 class="ml-[5px]">Add</h2>
                    </button>

                </a>
                <h2 class="text-white ml-40 mt-1">Moto slot: {{ $count2Wheels }}/500</h2>
                <h2 class="text-white ml-5 mt-1">|</h2>
                <h2 class="text-white ml-5 mt-1">Normal Car slot: {{ $count4Wheels }}/500</h2>
                <h2 class="text-white ml-5 mt-1">|</h2>
                <h2 class="text-white ml-5 mt-1">8 wheels Car slot: {{ $count8Wheels }}/200</h2>
            </div>
            <div class="table-container">
                <table class="bg-white rounded-lg overflow-hidden w-full">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-base leading-normal">
                    <tr>
                        <th class="py-2 px-5 text-left whitespace-nowrap">ID</th>
                        <th class="py-2 px-5 text-left whitespace-nowrap">Slip Number</th>
                        <th class="py-2 px-5 text-left whitespace-nowrap">License Plate</th>
                        <th class="py-2 px-5 text-left whitespace-nowrap">Vehicle Name</th>
                        <th class="py-2 px-5 text-left whitespace-nowrap">Slot ID</th>
                        <th class="py-2 px-5 text-left whitespace-nowrap">In Time</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-base font-light">
                    @foreach($ticket as $tickett)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="text-xs py-3 px-6 text-left whitespace-nowrap">{{$loop->iteration}}</td>
                        <td class="text-xs py-3 px-6 text-left whitespace-nowrap">{{$tickett->slip_num}}</td>
                        <td class="text-xs py-3 px-6 text-left whitespace-nowrap">{{$tickett->plate_num}}</td>
                        <td class="text-xs py-3 px-6 text-left whitespace-nowrap">{{$tickett->name}}</td>
                        <td class="text-xs py-3 px-6 text-left whitespace-nowrap">{{$tickett->type}}</td>
                        <td class="text-xs py-3 px-6 text-left whitespace-nowrap">{{$tickett->in_time}}</td>
                    </tr>
                    @endforeach
                    <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
