<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editing Value') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <form action='{{ route('dashboard.update', $persons->UUID) }}' method='post' class="flex-auto justify-center items-center w-full">
    @csrf
    @method('PUT')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-auto">
        <a href='{{ url('dashboard') }}' class="btn align-left mb-8">
            << kembali</a>
                <div class="mb-3 row">
                    <label for="nipd" class="col-sm-2 col-form-label mb-5">NIPD</label>
                    <div class="col-span-10">
                        {{ $persons->NIPD }}
                    </div>
                </div>
                <div class="flex-auto mb-3 row w-full">
                    <label for="nama" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-span-10">
                        <input type="text" class="form-control w-full" name='Kelas' value="{{ $persons->Kelas }}" id="Kelas">
                    </div>
                </div>
                <div class="flex-auto mb-3 row w-full">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control w-full" name='Jurusan' value="{{ $persons->Jurusan }}" id="Jurusan">
                    </div>
                </div>
                <div class="flex-auto mb-3 row w-full">
                    <label for="No Absen" class="col-sm-2 col-form-label">No Absen</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control w-full" name='No_Absen' value="{{ $persons->{'No Absen'} }}" id="No_Absen">
                    </div>
                </div>
                <div class="flex-auto mb-3 row w-full">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control w-full" name='Nama' value="{{ $persons->Nama }}" id="Nama">
                    </div>
                </div>
                <div class="flex-auto mb-3 row w-full">
                    <label for="jenis kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control w-full" name='Jenis_Kelamin' value="{{ $persons->{'Jenis Kelamin'} }}" id="Jenis_Kelamin">
                    </div>
                </div>
                <div class="flex-auto mb-3 row w-full">
                    <label for="jurusan" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary">SIMPAN</button></div>
                </div>
    </div>
    </form>
    <!-- AKHIR FORM -->
    </div>
</x-app-layout>

