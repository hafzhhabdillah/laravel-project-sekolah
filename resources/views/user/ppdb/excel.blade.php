<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NISN</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Asal Sekolah</th>
            <th>Jurusan Pilihan</th>
            <th>Nama Ayah</th>
            <th>Nama Ibu</th>
            <th>No HP Orang Tua</th>
            <th>Alamat</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ppdbs as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->nisn }}</td>
            <td>{{ $item->nama_lengkap }}</td>
            <td>{{ $item->jenis_kelamin }}</td>
            <td>{{ $item->tempat_lahir }}</td>
            <td>{{ $item->tanggal_lahir }}</td>
            <td>{{ $item->asal_sekolah }}</td>
            <td>{{ $item->jurusan_pilihan }}</td>
            <td>{{ $item->nama_ayah }}</td>
            <td>{{ $item->nama_ibu }}</td>
            <td>{{ $item->no_hp_ortu }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ strtoupper($item->status) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
