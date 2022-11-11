<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('pdf.style')
</head>

<body>
    <div class="card">
        <div class="profile-img-style">
            <h5 class="text-center">Data Pendaftar</h5>
            <span class="text-secondary" style="font-weight: bold;">Profile Data Anda</span>
            <div style="display: flex; margin-top:20px;">
                <p style="width:200px;display:inline-block;">Nomor Daftar</p>
                <p style="display:inline-block;">:{{ $pendaftaran->no_daftar }}</p>
            </div>
            <div style="display: flex">
                <p style="width:200px;display:inline-block;">Nama Lengkap</p>
                <p style="display:inline-block;">: {{ $pendaftaran->santri->nama_lengkap }}</p>
            </div>
            <div style="display: flex">
                <p style="width:200px;display:inline-block;">Tempat / Tanggal Lahir</p>
                <p style="display:inline-block;">: {{ $pendaftaran->santri->tempat_lahir }} /
                    {{ $pendaftaran->santri->tgl_lahir }}</p>
            </div>
            <div style="display: flex">
                <p style="width:200px;display:inline-block;">Jenis Kelamin</p>
                <p style="display:inline-block;">: {{ $pendaftaran->santri->jenis_kelamin }}</p>
            </div>
            <div style="display: flex">
                <p style="width:200px;display:inline-block;">Golongan Darah</p>
                <p style="display:inline-block;">: {{ $pendaftaran->santri->gol_darah }}</p>
            </div>
            <div style="display: flex">
                <p style="width:200px;display:inline-block;">Berat / Tinggi</p>
                <p style="display:inline-block;">: {{ $pendaftaran->santri->berat_badan }}
                    / {{ $pendaftaran->santri->tinggi_badan }}</p>
            </div>
            <div style="display: flex">
                <p style="width:200px;display:inline-block;">Alamat Lengkap</p>
                <p style="display:inline-block;">: {{ $pendaftaran->santri->alamat }}</p>
            </div>
            <div style="display: flex">
                <p style="width:200px;display:inline-block;">Asal Sekolah</p>
                <p style="display:inline-block;">: {{ $pendaftaran->santri->asal_sekolah }}</p>
            </div>
            <div style="display: flex">
                <p style="width:200px;display:inline-block;">No. Telp / HP</p>
                <p style="display:inline-block;">: {{ $pendaftaran->santri->no_hp }}</p>
            </div>
            <div style="display: flex">
                <p style="width:200px;display:inline-block;">Email</p>
                <p style="display:inline-block;">: {{ $pendaftaran->santri->email }}</p>
            </div>
            <span class="text-secondary" style="font-weight: bold">Profile Data Orang
                Tua</span>
            <div style="display: flex; margin-top:20px;">
                <p style="width:200px;display:inline-block;">Nama Ayah</p>
                <p style="display:inline-block;">:{{ $pendaftaran->santri->nama_ayah }}</p>
            </div>
            <div style="display: flex">
                <p style="width:200px;display:inline-block;">Nama Ibu</p>
                <p style="display:inline-block;">: {{ $pendaftaran->santri->nama_ibu }}</p>
            </div>
            <div style="display: flex">
                <p style="width:200px;display:inline-block;">No. Telp / HP</p>
                <p style="display:inline-block;">: {{ $pendaftaran->santri->no_hp }}</p>
            </div>
            <div style="display: flex">
                <p style="width:200px;display:inline-block;">Pekerjaan Ayah</p>
                <p style="display:inline-block;">: {{ $pendaftaran->santri->pekerjaan_ayah }}</p>
            </div>
            <div style="display: flex">
                <p style="width:200px;display:inline-block;">Pekerjaan Ibu</p>
                <p style="display:inline-block;">: {{ $pendaftaran->santri->pekerjaan_ibu }}</p>
            </div>
            <div style="display: flex">
                <p style="width:200px;display:inline-block;">Alamat</p>
                <p>: Achmad Fawait</p>
            </div>
            <div style="display: flex;">
                <p style="width:200px;display:inline-block;">Agama</p>
                <p style="display:inline-block;">: {{ $pendaftaran->santri->alamat }}</p>
            </div>
            <span class="text-secondary" style="font-weight: bold">Profile Data Wali
                Tua</span>
            <div style="display: flex; margin-top:20px;">
                <p style="width:200px;display:inline-block;">Nama Wali</p>
                <p style="display:inline-block;">: {{ $pendaftaran->santri->nama_ayah }}</p>
            </div>
            <div style="display: flex">
                <p style="width:200px;display:inline-block;">No. Telp / HP</p>
                <p style="display:inline-block;">: {{ $pendaftaran->santri->no_hp }}</p>
            </div>
            <div style="display: flex">
                <p style="width:200px;display:inline-block;">Pekerjaan Wali</p>
                <p style="display:inline-block;">: {{ $pendaftaran->santri->pekerjaan_ayah }}</p>
            </div>
            <div style="display: flex">
                <p style="width:200px;display:inline-block;">Alamat</p>
                <p style="display:inline-block;">: {{ $pendaftaran->santri->alamat }}</p>
            </div>
        </div>
    </div>

</body>

</html>
