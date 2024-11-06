@extends('layouts.main')
@section('content')
<div class="content">
    <div class="content-inner">
        <div class="flex justify-between items-center mb-6">
            <div class="uppercase text-[#CCA152] font-medium text-3xl">
                <h1>History</h1>
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
        <div class="grid grid-cols-3 gap-4 mb-8">
            <div>
                <label for="datetime" class="block text-white font-extralight text-lg">In-Time</label>
                <input type="datetime-local" id="datetime" name="datetime" class="bg-transparent w-full rounded-lg border text-left text-[#CCA152] font-thin border-gray-400 px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#CCA152] focus:ring-offset-[#CCA152] mt-1 block text-base">
            </div>
            <div>
                <label for="number" class="block text-white font-extralight text-lg">Status</label>
                <select id="number" name="number" class="bg-transparent w-full rounded-lg border text-left text-[#CCA152] font-thin border-gray-400 px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#CCA152] focus:ring-offset-[#CCA152] mt-1 block text-base">
                    <option value="Moto">Pending</option>
                    <option value="Bike">Next</option>
                    <option value="Car">Dream</option>
                </select>
            </div>
            <div class="flex items-end">
                <button class="bg-[#CCA152] text-white font-semibold py-2 px-4 rounded inline-flex items-center active:bg-yellow-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.553.894l-3 1.5A1 1 0 017 16.5v-5.086L3.293 7.707A1 1 0 013 7V5z" clip-rule="evenodd" />
                    </svg>
                    Filter
                </button>
            </div>
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
                <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left whitespace-nowrap">Slip Number</th>
                    <th class="py-3 px-6 text-left whitespace-nowrap">Vehicle Name</th>
                    <th class="py-3 px-6 text-left whitespace-nowrap">Slot Type</th>
                    <th class="py-3 px-6 text-left whitespace-nowrap">In Time</th>
                    <th class="py-3 px-6 text-left whitespace-nowrap">Out Time</th>
                    <th class="py-3 px-6 text-left whitespace-nowrap">Duration</th>
                    <th class="py-3 px-6 text-left whitespace-nowrap">Status</th>
                    <th class="py-3 px-6 text-left whitespace-nowrap">Price</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                @foreach($check_out as $data)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="text-xs py-3 px-6 text-left whitespace-nowrap">{{$data->slip_num}}</td>
                    <td class="text-xs py-3 px-6 text-left whitespace-nowrap">{{$data->brand_name}}</td>
                    <td class="text-xs py-3 px-6 text-left whitespace-nowrap">{{$data->type}}</td>
                    <td class="text-xs py-3 px-6 text-left whitespace-nowrap">{{date('Y-m-d', strtotime($data->in_time))}}</td>
                    <td class="text-xs py-3 px-6 text-left whitespace-nowrap">{{date('Y-m-d', strtotime($data->out_time))}}</td>
                    <td class="text-xs py-3 px-6 text-left whitespace-nowrap">{{$data->duration}}</td>
                    <td class="text-xs py-3 px-6 text-left whitespace-nowrap">{{$data->name}}</td>
                    <td class="text-xs py-3 px-6 text-left whitespace-nowrap">{{$data->sub_price}}</td>
                </tr>
                @endforeach
                <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
