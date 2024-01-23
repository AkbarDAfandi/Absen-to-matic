<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 15px;
            text-align: left;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>NIPD</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>No Absen</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>UUID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($persons as $person)
                <tr>
                    <td>{{ $person->NIPD }}</td>
                    <td>{{ $person->Kelas }}</td>
                    <td>{{ $person->Jurusan }}</td>
                    <td>{{ $person->{'No Absen'} }}</td>
                    <td>{{ $person->Nama }}</td>
                    <td>{{ $person->{'Jenis Kelamin'} }}</td>
                    <td>{{ $person->UUID }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
