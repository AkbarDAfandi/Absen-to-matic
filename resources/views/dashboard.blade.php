<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-auto">
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
                    <?php $i = $persons->firstItem() ?>
                    @foreach ($persons as $person)
                    <tr>
                        <td class="editable">{{ $person->NIPD }}</td>
                        <td class="editable">{{ $person->Kelas }}</td>
                        <td class="editable">{{ $person->Jurusan }}</td>
                        <td class="editable">{{ $person->{'No Absen'} }}</td>
                        <td class="editable">{{ $person->Nama }}</td>
                        <td class="editable">{{ $person->{'Jenis Kelamin'} }}</td>
                        <td>
                            <a class="edit" href='{{ url('dashboard/'.$person->UUID.'/edit') }}' title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
                </tbody>
            </table>
            {{ $persons->links() }}
        </div>
    </div>
</x-app-layout>

