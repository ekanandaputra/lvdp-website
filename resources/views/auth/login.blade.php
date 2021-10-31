<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="h-screen">
    <div class="flex flex-row h-full">
        <div class="flex-1 flex flex-col h-full pt-52 w-full">
            <div class="flex flex-col px-32">
                <h1 class="text-lg font-semibold"> Selamat Datang, <br> Silahkan Login Terlebih Dahulu</h1>
                <div class="w-full bg-primary text-white">
                    @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                    @endforeach
                </div>
                <form method="POST" action="">
                    @csrf
                    <div
                        class="mt-3 bg-white rounded-md shadow-md px-6 py-3 border border-gray-200 flex flex-col gap-3">
                        <div class="flex flex-col">
                            <label class="mb-1"> Username </label>
                            <input type="text" placeholder="Input Username" name="username"
                                value="{{ old('username') }}"
                                class="px-3 py-2 rounded-md border border-gray-200 focus:ring-2 focus:ring-blue-400 focus:border-transparent focus:outline-none">
                        </div>
                        <div class="flex flex-col">
                            <label class="mb-1"> Password </label>
                            <input type="text" placeholder="Input Password" name="password"
                                class="px-3 py-2 rounded-md border border-gray-200 focus:ring-2 focus:ring-blue-400 focus:border-transparent focus:outline-none">
                        </div>
                        <div class="flex justify-end w-full">
                            <button class="bg-primary focus:outline-none text-white rounded-md py-2 w-32">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex-1 flex justify-center items-center h-full bg-primary">
            <img src="https://i.imgur.com/uNGdWHi.png">
        </div>
    </div>
    <div class="absolute bottom-0 right-0 text-white p-3 text-sm">© Copyright
        https://lvdp.ntech-dev.my.id 2021
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>