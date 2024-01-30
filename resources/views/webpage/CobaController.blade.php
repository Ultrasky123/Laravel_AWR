<table>
    <tr>
        <th>No</th>
        <th>ID Senjata</th>
        <th>ID Pengguna</th>
        <th>Nama Pengguna</th>
        <th>Tanggal</th>
        <th>Keluar</th>
        <th>Masuk</th>
    </tr>
    @foreach ($statuses as $index => $status)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $status->id_senjata }}</td>
            <td>{{ $status->id_pengguna }}</td>
            <td>{{ $status->nama_pengguna }}</td>
            <td>{{ $status->tanggal }}</td>
            <td>{{ $status->keluar }}</td>
            <td>{{ $status->masuk }}</td>
        </tr>
    @endforeach
</table>
