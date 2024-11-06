<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mainregister</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        body {
            margin: 0;
            font-family: 'Poppins';
            background-color: #314657;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        .navbar {
            width: 20%;
            max-width: 300px;
            background-color: white;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            overflow-y: auto;
        }
        .content {
            margin-left: 20%;
            width: 80%;
            overflow-y: auto;
            padding: 20px;
            height: 100vh;
        }
        .content-inner {
            max-width: 1000px;
            margin: 0 auto;
        }
        .table-container {
            width: 69vw;
            overflow-x: auto;
        }
        .active {
            color: #CCA152 !important;
        }
    </style>
</head>
<body>
<div class="navbar">
    <div class="w-[240px] h-[120px] mx-auto mt-6">
        <img class="w-full" src="/images/logoll.png" alt="">
    </div>
    <div class="w-[250px] h-[1px] mx-auto mt-[20px] bg-[#314657]"></div>
    <div class="mx-auto mt-[50px] flex flex-col leading-normal uppercase w-[150px] gap-4">
        <nav>
            <ul>
                <li class="mb-4">
                    <a href="{{route('ticket')}}" class="flex items-center text-black {{ request()->routeIs('ticket') ? 'active' : '' }}">
                        <i class="fas fa-clipboard-list"></i>
                        <span class="ml-2">Register</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{'checkout'}}" class="flex items-center text-black {{ request()->routeIs('checkout') ? 'active' : '' }}">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="ml-2">Check Out</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('penalty') }}" class="flex items-center text-black {{ request()->routeIs('penalty') ? 'active' : '' }}">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span class="ml-2">Penalty</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('user') }}" class="flex items-center text-black {{ request()->routeIs('user') ? 'active' : '' }}">
                        <i class="fas fa-user"></i>
                        <span class="ml-2">User</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('history')}}" class="flex items-center text-black {{ request()->routeIs('history') ? 'active' : '' }}">
                        <i class="fas fa-history"></i>
                        <span class="ml-2">History</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="mt-auto mb-6 mx-auto">
        <a href="/">
            <div class="flex hover:text-blue w-[200px] h-[30px] gap-3 text-xl">
                <i class="fa fa-desktop mt-[5px]" aria-hidden="true"></i>
                <h3>Log Out</h3>
            </div>
        </a>
    </div>
</div>
@yield('content')
@vite('resources/js/app.js')
</body>
</html>
