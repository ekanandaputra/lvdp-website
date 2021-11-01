<div class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden"
    id="modalAddDevice">

    <div class="bg-white rounded shadow-lg w-10/12 md:w-1/3">
        <div class="border-b px-4 py-2 flex justify-between items-center">
            <h3 class="font-semibold text-lg">Tambah Perangkat</h3>
            <button class="text-black close-modal" id="closeAddDevice">&cross;</button>
        </div>
        <form method="POST" action="{{ route('devices.patch') }}">
            @csrf
            <div class="p-3 flex flex-col gap-3">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class=" flex flex-col">
                    <label class="mb-1"> Lokasi </label>
                    <input type="text" placeholder="Masukkan Nama Lokasi" name="location"
                        class="px-3 py-2 rounded-md border border-gray-200 focus:ring-2 focus:ring-blue-400 focus:border-transparent focus:outline-none">
                </div>
                <div class="flex flex-col">
                    <label class="mb-1"> Keterangan </label>
                    <input type="text" placeholder="Masukkan Keterangan" name="description"
                        class="px-3 py-2 rounded-md border border-gray-200 focus:ring-2 focus:ring-blue-400 focus:border-transparent focus:outline-none">
                </div>
                <div class="flex flex-col">
                    <label class="mb-1"> ID Perangkat </label>
                    <input type="text" placeholder="Masukkan ID Perangkat" name="uuid"
                        class="px-3 py-2 rounded-md border border-gray-200 focus:ring-2 focus:ring-blue-400 focus:border-transparent focus:outline-none">
                </div>
            </div>
            <div class="flex justify-end items-center w-100 border-t p-3">
                <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1 close-modal"
                    id="closeAddDevice">Cancel</button>
                <button type="submit" class="bg-primary hover:bg-blue-700 px-3 py-1 rounded text-white">Simpan</button>
            </div>
        </form>
    </div>
</div>