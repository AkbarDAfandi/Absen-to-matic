<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-auto">
    <table class="table block sm:table-auto">
        <!-- head -->
        <thead>
            <tr>
                <th>NIPD</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Jam</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataHistory as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->NIPD }}</td>
                <td>{{ $item->Nama }}</td>
                <td>{{ $item->Jurusan }}</td>
                <td>{{ \Carbon\Carbon::parse($item->timestamp)->format('Y-m-d H:i:s') }}</td>
                ...
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

