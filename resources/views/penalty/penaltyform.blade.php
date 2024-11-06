@extends('layouts.main')
@section('content')
<div class="content">
    <div class="content-inner">
        <div class="flex justify-between items-center mb-6">
            <div class="uppercase text-[#CCA152] font-medium text-3xl">
                <h1>Penalty</h1>
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
        <form method="GET" action="{{ route('checkout_penalty') }}" class="">
        <div class="grid grid-cols-2 gap-6 mb-8">
            <div>
                <label for="slipNumber" class="block text-lg font-medium text-white mb-2">Slip Number</label>
                <input type="text" name="slip_num" id="slipNumber" class="bg-transparent w-full border text-left text-[#CCA152] font-medium border-gray-400 focus:outline-none focus:ring-1 focus:ring-[#CCA152] focus:ring-offset-[#CCA152] px-3 py-2" placeholder="Slip Number">
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-[#CCA152] text-white font-semibold py-2 px-4 rounded inline-flex items-center active:bg-yellow-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.553.894l-3 1.5A1 1 0 017 16.5v-5.086L3.293 7.707A1 1 0 013 7V5z" clip-rule="evenodd" />
                    </svg>
                    Show
                </button>
            </div>
        </div>
        </form>
        <div class="table-container">
            <table class="bg-white rounded-lg overflow-hidden w-full">
                <thead class="bg-gray-100 text-gray-600 uppercase text-base leading-normal">
                <tr>
                    <th class="py-2 px-5 text-left whitespace-nowrap">Slip Number</th>
                    <th class="py-2 px-5 text-left whitespace-nowrap">Vehicle ID</th>
                    <th class="py-2 px-5 text-left whitespace-nowrap">Customer ID</th>
                    <th class="py-2 px-5 text-left whitespace-nowrap">Description</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 text-base font-light">
                @foreach($penalty as $data)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="text-xs py-3 px-6 text-left whitespace-nowrap">{{$data->slip_num}}</td>
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <img src="{{ asset('/photo/' . $data->vehicle_id) }}" class="w-[50px] h-[50px] rounded-full" alt="">
                    </td>
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <img src="{{ asset('/photo/' . $data->id_card) }}" class="w-[50px] h-[50px] rounded-full" alt="">
                    </td>
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{$data->description}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
