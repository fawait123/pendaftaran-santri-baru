<table>
    <thead>
        <tr>
            <th>No</th>
            <th>ID Seleksi</th>
            <th>NO Pendaftaran</th>
            <th>NIK</th>
            <th>Nama Lengkap</th>
            <th>Kamar</th>
            <th>Keterangan</th>
            <th>Nilai Baca Alquran</th>
            <th>Nilai Tulis Arab</th>
            <th>Nilai Wawancara</th>
            <th>Total Penilaian</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($seleksi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->no_seleksi }}</td>
                <td>{{ $item->pendaftaran->no_daftar ?? '' }}</td>
                <td>{{ $item->pendaftaran->santri->nik ?? '' }}</td>
                <td>{{ $item->pendaftaran->santri->nama_lengkap ?? '' }}</td>
                <td>{{ $item->kamar }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->nilai_baca_alquran }}</td>
                <td>{{ $item->nilai_tulis_arab }}</td>
                <td>{{ $item->nilai_wawancara }}</td>
                <td>{{ $item->total_penilaian }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
