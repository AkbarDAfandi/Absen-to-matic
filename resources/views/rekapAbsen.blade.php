<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rekap Hari Ini') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-auto">
            <a><button type="button" onclick="window.location='{{ url("rekap/export/excel") }}'" class="btn btn-success">Export to Excel</button></a>
            <table class="table block sm:table-auto">
                <thead>
                    <tr>
                        <th>NIPD</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>No Absen</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                <tbody>
                    <?php $i = $history->firstItem() ?>
                    @foreach ($history as $history)
                    <tr>
                        <td class="editable">{{ $history->NIPD }}</td>
                        <td class="editable">{{ $history->Kelas }}</td>
                        <td class="editable">{{ $history->Jurusan }}</td>
                        <td class="editable">{{ $history->{'No Absen'} }}</td>
                        <td class="editable">{{ $history->Nama }}</td>
                        <td class="editable">{{ $history->{'Jenis Kelamin'} }}</td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
                </tbody>
            </table>

        </div>
    </div>

</x-app-layout>
