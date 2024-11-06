@extends('layouts.main')
@section('content')
<div class="content">
    <div class="content-inner">
        <div class="ml-auto mr-auto mt-20 space-y-10">
            <form method="post" action="{{ route('create_user') }}" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="fileInput" class="block text-lg font-normal text-white mb-2">User Profile</label>
                    <input type="file" id="fileInput" name="image" class="block w-full text-white file:mr-4 file:py-1 file:px-4 file:border-0 file:text-lg file:font-medium file:bg-[#CCA152] file:text-white active:file:bg-[#f1bf62]"/>
                </div>
                <div class="max-w-[1000px] space-y-6 mt-8">
                    <div class="relative">
                        <input
                            placeholder="Username"
                            class="peer h-10 w-full border-b-2 border-gray-300 text-white bg-transparent placeholder-transparent focus:outline-none focus:border-[#CCA152]"
                            required
                            id="username"
                            name="username"
                            type="text"
                        />
                        <label
                            class="absolute left-0 -top-3.5 text-gray-500 text-lg transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-[#CCA152] peer-focus:text-sm"
                            for="username"
                        >Username</label>
                    </div>
                    <div class="relative">
                        <input
                            placeholder="Password"
                            class="peer h-10 w-full border-b-2 border-gray-300 text-white bg-transparent placeholder-transparent focus:outline-none focus:border-[#CCA152]"
                            required
                            id="password"
                            name="password"
                            type="password"
                        />
                        <label
                            class="absolute left-0 -top-3.5 text-gray-500 text-lg transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-[#CCA152] peer-focus:text-sm"
                            for="password"
                        >Password</label>
                    </div>
                </div>
                <div class="flex space-x-2 justify-end mt-12">
                    <a href="{{ route('user') }}" class="inline-flex items-center justify-center p-2 w-24 rounded-full bg-[#58626E] active:bg-[#4c535d] text-white focus:outline-none ">
                        <span class="material-symbols-outlined">
                            cancel
                        </span>Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center justify-center p-2 w-24 rounded-full bg-[#CCA152] text-white focus:outline-none active:bg-[#ffc457]">
                        <span class="material-symbols-outlined">
                            download
                        </span>Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
