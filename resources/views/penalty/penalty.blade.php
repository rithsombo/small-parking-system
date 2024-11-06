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
        <form method="POST" action="{{ route('update_tickett') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-6 mb-8">
                <div>
                    <label for="customerID" class="block text-lg font-medium text-white mb-2">Customer ID</label>
                    <input type="file" id="customerID" name="customerID" class="text-white block w-full file:mr-4 file:py-1 file:px-4 file:border-0 file:text-lg file:font-medium file:bg-[#CCA152] file:text-white active:file:bg-[#f1bf62]">
                </div>
                <div>
                    <label for="vehicleID" class="block text-lg font-medium text-white mb-2">Vehicle ID</label>
                    <input type="file" id="vehicleID" name="vehicleID" class="text-white block w-full  file:mr-4 file:py-1 file:px-4 file:border-0 file:text-lg file:font-medium file:bg-[#CCA152] file:text-white active:file:bg-[#f1bf62]">
                </div>
            </div>
            <div class="grid grid-cols-3">
                <div class="mt-10">
                    <label for="inputname" class="text-white font-extralight text-lg">Slip Number</label>
                    <div class="mt-2">
                        <input type="text" name="slip_num" value="{{$ticket->slip_num}}" class="bg-transparent w-[270px] border text-[#CCA152] font-medium border-gray-400 focus:border-none px-3 py-2 focus:outline-none focus:ring-[1px] focus:ring-[#CCA152] focus:ring-offset-[#CCA152]" placeholder="">
                    </div>
                </div>
                <div class="mt-10">
                    <label for="inputname" class="text-white font-extralight text-lg">Plate_Num</label>
                    <div class="mt-2">
                        <input type="text" name="plate_num" value="{{$ticket->plate_num}}" class="bg-transparent w-[270px] border text-[#CCA152] font-medium border-gray-400 focus:border-none px-3 py-2 focus:outline-none focus:ring-[1px] focus:ring-[#CCA152] focus:ring-offset-[#CCA152]" placeholder="">
                    </div>
                </div>
                <div class="mt-10">
                    <label for="inputname" class="text-white font-extralight text-lg">In-Time</label>
                    <div class="mt-2">
                        <input type="text" value="{{$ticket->in_time}}" class="bg-transparent w-[270px] border text-[#CCA152] font-medium border-gray-400 focus:border-none px-3 py-2 focus:outline-none focus:ring-[1px] focus:ring-[#CCA152] focus:ring-offset-[#CCA152]" placeholder="">
                    </div>
                </div>
                <div class="mt-10">
                    <label for="inputname" class="text-white font-extralight text-lg">Brand Name</label>
                    <div class="mt-2">
                        <input type="text" value="{{$ticket->name}}" class="bg-transparent w-[270px] border text-[#CCA152] font-medium border-gray-400 focus:border-none px-3 py-2 focus:outline-none focus:ring-[1px] focus:ring-[#CCA152] focus:ring-offset-[#CCA152]" placeholder="">
                    </div>
                </div>
                <div class="mt-10">
                    <label for="inputname" class="text-white font-extralight text-lg">Out-Time</label>
                    <div class="mt-2">
                        <input type="text" value="{{$currentTime}}" class="bg-transparent w-[270px] border text-[#CCA152] font-medium border-gray-400 focus:border-none px-3 py-2 focus:outline-none focus:ring-[1px] focus:ring-[#CCA152] focus:ring-offset-[#CCA152]" placeholder="">
                    </div>
                </div>
                <div class="mt-12">
                    <label for="inputname" class="block text-white font-extralight text-lg">Type</label>
                    <input type="text" value="{{$ticket->type}}" class="bg-transparent w-[270px] border text-[#CCA152] font-medium border-gray-400 focus:border-none px-3 py-2 focus:outline-none focus:ring-[1px] focus:ring-[#CCA152] focus:ring-offset-[#CCA152]" placeholder="">
                </div>
                <div class="mt-12">
                    <div class="relative">
                        <label for="inputname" class="block text-white font-extralight text-lg">Status</label>
                        <input id="status_input" name="status_input" type="text" class="bg-transparent w-[270px] border text-left text-[#CCA152] font-thin border-gray-400 px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#CCA152] focus:ring-offset-[#CCA152] mt-1 block text-base" placeholder="Type to select status" />
                        <div id="status_dropdown" class="hidden absolute z-10 bg-white shadow-md rounded-md mt-1">
                            @foreach($statuses as $status)
                                <div class="status_option cursor-pointer px-3 py-2 hover:bg-gray-200" data-value="{{ $status->id }}">{{ $status->name }}</div>
                            @endforeach
                        </div>
                    </div>
                    <input id="status_id" name="status_id" type="hidden" />
                </div>
                <div class="mt-12">
                    <label for="inputname" class="block text-white font-extralight text-lg">Duration(H)</label>
                    <input type="text" value="{{$ticket->duration}}" class="bg-transparent w-[270px] border text-[#CCA152] font-medium border-gray-400 focus:border-none px-3 py-2 focus:outline-none focus:ring-[1px] focus:ring-[#CCA152] focus:ring-offset-[#CCA152]" placeholder="">
                </div>
                <div class="mt-12">
                    <label for="inputname" class="block text-white font-extralight text-lg">Price</label>
                    <input type="text" name="sub_price" value="{{$ticket->sub_price}}" class="bg-transparent w-[270px] border text-[#CCA152] font-medium border-gray-400 focus:border-none px-3 py-2 focus:outline-none focus:ring-[1px] focus:ring-[#CCA152] focus:ring-offset-[#CCA152]" placeholder="">
                </div>
            </div>
            <div class="mt-[100px] ml-[750px]">
                <button type="submit" class="w-[150px] font-medium uppercase flex mt-[20px] ml-[50px] py-2 px-4 bg-[#CCA152] active:bg-[#e9b656] rounded-md shadow-lg text-white transition duration-100 ease-in-out delay-10 active:translate-y-1 active:scale-20">
                    <i class="fa fa-credit-card-alt mt-[5px]" aria-hidden="true"></i>
                    <h2 class="ml-[5px]">Check Out</h2>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const statusInput = document.getElementById('status_input');
        const statusDropdown = document.getElementById('status_dropdown');
        const statusIdInput = document.getElementById('status_id');

        statusInput.addEventListener('input', function() {
            const searchValue = this.value.trim().toLowerCase();
            const options = statusDropdown.querySelectorAll('.status_option');
            options.forEach(option => {
                const optionText = option.textContent.toLowerCase();
                if (optionText.includes(searchValue)) {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                }
            });
            statusDropdown.style.display = 'block';
        });

        statusInput.addEventListener('focus', function() {
            statusDropdown.style.display = 'block';
        });

        statusInput.addEventListener('blur', function() {
            // Delay hiding dropdown to allow click on dropdown options
            setTimeout(function() {
                statusDropdown.style.display = 'none';
            }, 200); // Adjust delay as needed
        });

        statusDropdown.addEventListener('click', function(e) {
            if (e.target.classList.contains('status_option')) {
                const selectedId = e.target.getAttribute('data-value');
                const selectedText = e.target.textContent;
                statusInput.value = selectedText;
                statusIdInput.value = selectedId;
                statusDropdown.style.display = 'none';
            }
        });
    });
</script>
