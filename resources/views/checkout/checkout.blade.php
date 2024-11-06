@extends('layouts.main')
@section('content')
<div class="content">
    <div class="content-inner">
        <div class="flex justify-between items-center mb-6">
            <div class="uppercase text-[#CCA152] font-medium text-3xl">
                <h1>Check Out</h1>
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
        <div class="flex items-center mb-4 ">
            <div class="flex flex-col items-start mr-4">
                <label for="fileInput" class="block text-sm font-medium text-white mb-2">QR Code</label>
                <input type="file" id="fileInput" class="text-white block w-1/7 file:mr-4 file:py-1 file:px-4 file:border-0 file:text-lg file:font-medium file:bg-[#CCA152] file:text-white active:file:bg-[#f1bf62]"/>
            </div>

            <div class="text-white mr-10 mt-7 "><h1>OR</h1></div>
            <form method="GET" action="{{ route('checkout_form') }}" class="flex justify-center items-center mt-6">
                <div class="relative mb-4 mr-7">
                    <input
                        class="peer h-10 w-full border-b-2 border-gray-300 text-[#CCA152] bg-transparent placeholder-transparent focus:outline-none focus:border-[#CCA152]"
                        id="slip_num"
                        name="slip_num"
                        type="text"
                    />
                    <label
                        class="absolute left-0 -top-3.5 text-white text-lg transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-white peer-placeholder-shown:top-2 peer-focus:-top-[20px] peer-focus:text-[#CCA152] peer-focus:text-base"
                        for="slip_num"
                    >Slip Number</label>
                </div>
                <button type="submit" class="flex items-center justify-center p-2 w-28 rounded-md bg-[#CCA152] text-white focus:outline-none active:bg-[#ffc457]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.553.894l-3 1.5A1 1 0 017 16.5v-5.086L3.293 7.707A1 1 0 013 7V5z" clip-rule="evenodd" />
                    </svg>
                    Show
                </button>
            </form>
        </div>
        <div class="table-container">
            <table class="bg-white rounded-lg overflow-hidden w-full">
                <colgroup>
                    <col style="width: 12.5%;">
                    <col style="width: 12.5%;">
                    <col style="width: 12.5%;">
                    <col style="width: 12.5%;">
                    <col style="width: 12.5%;">
                    <col style="width: 12.5%;">
                    <col style="width: 12.5%;">
                    <col style="width: 12.5%;">
                </colgroup>
                <thead class="bg-gray-100 text-gray-600 text-base leading-normal">
                <tr>
                    <th class="py-2 px-5 text-left whitespace-nowrap">Slip Number</th>
                    <th class="py-2 px-5 text-left whitespace-nowrap">Vehicle Name</th>
                    <th class="py-2 px-5 text-left whitespace-nowrap">Slot Type</th>
                    <th class="py-2 px-5 text-left whitespace-nowrap">In Time</th>
                    <th class="py-2 px-5 text-left whitespace-nowrap">Out Time</th>
                    <th class="py-2 px-5 text-left whitespace-nowrap">Duration</th>
                    <th class="py-2 px-5 text-left whitespace-nowrap">Status</th>
                    <th class="py-2 px-5 text-left whitespace-nowrap">Price</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 text-base font-light">
                @foreach($check_out as $checkout)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="text-xs py-3 px-5 text-left">{{$checkout->slip_num}}</td>
                    <td class="text-xs py-3 px-5 text-left">{{$checkout->brand_name}}</td>
                    <td class="text-xs py-3 px-5 text-left">{{$checkout->type}}</td>
                    <td class="text-xs py-3 px-5 text-left">{{date('Y-m-d', strtotime($checkout->in_time))}}</td>
                    <td class="text-xs py-3 px-5 text-left">{{date('Y-m-d', strtotime($checkout->out_time))}}</td>
                    <td class="text-xs py-3 px-5 text-left">{{$checkout->duration}}</td>
                    <td class="text-xs py-3 px-5 text-left">{{$checkout->name}}</td>
                    <td class="text-xs py-3 px-5 text-left">{{$checkout->sub_price}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
