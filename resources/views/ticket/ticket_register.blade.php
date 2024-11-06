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
        <form method="POST" action="{{ route('ticket_register') }}">
            @csrf

            <div class="grid grid-cols-2 gap-6 mb-8">
                <!-- License Plate -->
                <div>
                    <label for="plate_num" class="block text-lg font-medium text-white mb-2">License Plate</label>
                    <input type="text"
                           name="plate_num"
                           class="bg-transparent w-full border text-left text-[#CCA152] font-medium border-gray-400 focus:outline-none focus:ring-1 focus:ring-[#CCA152] focus:ring-offset-[#CCA152] px-3 py-2" placeholder="Enter License Plate">
                </div>

                <!-- Vehicle Brand -->
                <div>
                    <label for="vehicle_id" class="block text-white font-extralight text-lg">Vehicle Brand</label>
                    <select id="vehicle_id"
                            type="number"
                            name="vehicle_id"
                            class="bg-transparent w-full rounded-lg border text-left text-[#CCA152] font-thin border-gray-400 px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#CCA152] focus:ring-offset-[#CCA152] mt-1 block text-base">
                        @foreach($vehicle_brand as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Slot -->
                <div>
                    <label for="slot_id" class="block text-white font-extralight text-lg">Slot Name</label>
                    <select id="slot_id"
                            type="number"
                            name="slot_id"
                            class="bg-transparent w-full rounded-lg border text-left text-[#CCA152] font-thin border-gray-400 px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#CCA152] focus:ring-offset-[#CCA152] mt-1 block text-base">
                        @foreach($slot as $slot)
                            <option value="{{ $slot->id }}">{{ $slot->type }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label for="status_id" class="block text-white font-extralight text-lg">Status</label>
                    <select id="status_id"
                            name="status_id"
                            type="number"
                            class="bg-transparent w-full rounded-lg border text-left text-[#CCA152] font-thin border-gray-400 px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#CCA152] focus:ring-offset-[#CCA152] mt-1 block text-base">
                        @foreach($status as $statuss)
                            <option value="{{ $statuss->id }}">{{ $statuss->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- User Name -->
                <div>
                    <label for="user_name" class="block text-white font-extralight text-lg">User Name</label>
                    <select id="user_name"
                            type="number"
                            name="user_name"
                            class="bg-transparent w-full rounded-lg border text-left text-[#CCA152] font-thin border-gray-400 px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#CCA152] focus:ring-offset-[#CCA152] mt-1 block text-base">
                        @foreach($user as $user)
                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                    class="float-right bg-[#CCA152] text-white font-semibold px-4 py-2 rounded hover:bg-yellow-800 focus:outline-none focus:bg-yellow-800">Create Ticket</button>
        </form>
    </div>
</div>
@endsection
