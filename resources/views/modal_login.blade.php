<div class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden"
    id="modalLogin">

    <div class="bg-white rounded shadow-lg w-10/12 md:w-1/3">
        <div class="border-b px-4 py-2 flex justify-between items-center">
            <h3 class="font-semibold text-lg text-black">Form Login</h3>
            <button class="text-black close-modal" id="closeLogin">&cross;</button>
        </div>
        <form method="POST" action="{{ route('post.login') }}">
            @csrf
            <div class="mt-3 bg-white rounded-md shadow-md px-6 py-3 flex flex-col gap-3">
                <div class="flex flex-col">
                    <label class="mb-1 text-black text-left"> Username </label>
                    <input type="text" placeholder="Input Username" name="username" value="{{ old('username') }}"
                        class="px-3 py-2 rounded-md border border-gray-200 focus:ring-2 focus:ring-blue-400 focus:border-transparent focus:outline-none text-black">
                </div>
                <div class="flex flex-col">
                    <label class="mb-1 text-black text-left"> Password </label>
                    <input type="text" placeholder="Input Password" name="password"
                        class="px-3 py-2 rounded-md border border-gray-200 focus:ring-2 focus:ring-blue-400 focus:border-transparent focus:outline-none text-black">
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