<table>
    <thead>
        <tr>
            <th>No</th>
            <th>No Urut</th>
            <th>NIK</th>
            <th>Tempat Lahir</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>No Telp</th>
            <th>Email</th>
            <th>Asal Sekolah</th>
            <th>NISN</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Golongan Darah</th>
            <th>Tinggi Badan</th>
            <th>Berat Badan</th>
            <th>Hobi</th>
            <th>NO KK</th>
            <th>Anak Ke</th>
            <th>NIK Ibu</th>
            <th>Nama Ibu</th>
            <th>Pekerjaan Ibu</th>
            <th>Nik Ayah</th>
            <th>Nama Ayah</th>
            <th>Pekerjaan Ayah</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($santri as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->no_urut }}</td>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->tempat_lahir }}</td>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->asal_sekolah }}</td>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->tgl_lahir }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->gol_darah }}</td>
                <td>{{ $item->tinggi_badan }}</td>
                <td>{{ $item->berat_badan }}</td>
                <td>{{ $item->hobi }}</td>
                <td>{{ $item->no_kk }}</td>
                <td>{{ $item->anak_ke }}</td>
                <td>{{ $item->nik_ibu }}</td>
                <td>{{ $item->nama_ibu }}</td>
                <td>{{ $item->pekerjaan_ibu }}</td>
                <td>{{ $item->nik_ayah }}</td>
                <td>{{ $item->nama_ayah }}</td>
                <td>{{ $item->pekerjaan_ayah }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
