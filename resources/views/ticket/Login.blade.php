<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
    @vite('resources/css/app.css')
    <style>
        @keyframes slideInFromLeft {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes appear {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
<div class="w-screen h-screen bg-[#314657] flex justify-between items-center font-poppins">
    <div class="w-1/2 h-screen bg-[#314657] flex flex-col items-center justify-center">
        <img class="filter invert brightness-600 w-[600px]" src="images/logo.png" alt="Motivational Image">
        <h1 class="text-white text-center px-4">Hard work beats talent when talent doesn’t work hard.</h1>
    </div>
    <div class="w-1/2 h-screen bg-white border-1 flex items-center justify-center">
        <div
            style="animation: slideInFromLeft 1s ease-out;"
            class="max-w-[500px] w-full bg-white rounded-xl overflow-hidden p-8 space-y-8"
        >
            <form method="POST" action="#" class="space-y-10">
                <h2
                    style="animation: appear 2s ease-out;"
                    class="text-left text-3xl font-bold font-poppins text-[#CCA152] uppercase"
                >
                    Login
                </h2>
                <div class="relative">
                    <input
                        placeholder="Username"
                        class="peer h-10 w-full border-b-2 border-gray-300 text-black bg-transparent placeholder-transparent focus:outline-none focus:border-[#CCA152]"
                        required
                        id="text"
                        name="text"
                        type="text"
                    />
                    <label
                        class="absolute left-0 -top-3.5 text-gray-500 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-[#CCA152] peer-focus:text-sm"
                        for="text"
                    >Username</label>
                </div>
                <div class="relative">
                    <input
                        placeholder="Password"
                        class="peer h-10 w-full border-b-2 border-gray-300 text-black bg-transparent placeholder-transparent focus:outline-none focus:border-[#CCA152]"
                        required
                        id="password"
                        name="password"
                        type="password"
                    />
                    <label
                        class="absolute left-0 -top-3.5 text-gray-500 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-[#CCA152] peer-focus:text-sm"
                        for="password"
                    >Password</label>
                </div>
                <div class="flex justify-center">
                    <a href="{{route('user')}}">
                        <button
                            class="w-[300px] py-3 px-2 bg-[#CCA152] active:bg-[#e9b656] rounded-full shadow-lg uppercase text-white font-semibold transition duration-150 ease-in-out delay-150 active:translate-y-1"
                            type="button"
                        >
                            LOGIN
                        </button>
                    </a>
                </div>
            </form>
            <div class="text-center">
                <h1 class="text-xl text-slate-400 font-bold">Good to see you again</h1>
                <p class="text-sm text-slate-400">Log In To Continue</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
