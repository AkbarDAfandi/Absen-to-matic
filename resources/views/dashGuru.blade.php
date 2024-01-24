<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Guru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-auto">
            <form name="nipd_inpt" action="{{ route('dashGuru.search') }}" method="POST">
                @csrf
                <input id="textarea" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-20" name="nipd"
                    value="{{ old('nipd') }}" placeholder="Masukkan NIPD">
                <button id="btn_submit" type="submit" class="hidden"></button>
            </form>
            <table class="table block sm:table-auto">
                <thead>
                    <tr>
                        <th>NIPD</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>No Absen</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Waktu Absen</th>
                    </tr>
                </thead>
                <tbody>
                <tbody>

                    @if (isset($person))
                        <tr>
                            <td class="editable">{{ $person->NIPD }}</td>
                            <td class="editable">{{ $person->Kelas }}</td>
                            <td class="editable">{{ $person->Jurusan }}</td>
                            <td class="editable">{{ $person->{'No Absen'} }}</td>
                            <td class="editable">{{ $person->Nama }}</td>
                            <td class="editable">{{ $person->{'Jenis Kelamin'} }}</td>
                            <td class="editable">{{ now() }}</td>
                        </tr>
                    @endif
                </tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        window.addEventListener("keydown", () => {
            document.getElementById("textarea").focus()
        });
    </script>

</x-app-layout>
