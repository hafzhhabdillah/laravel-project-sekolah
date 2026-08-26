<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bukti Pendaftaran PPDB - {{ $ppdb->nama_lengkap }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #2D3748;
            line-height: 1.6;
            font-size: 13px;
            margin: 0;
            padding: 20px;
        }
        .card {
            max-width: 700px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid #E2E8F0;
            border-radius: 12px;
            padding: 30px;
        }
        .header {
            text-align: center;
            border-bottom: 3px double #CBD5E0;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .header h3 {
            margin: 0;
            font-size: 14px;
            color: #4A5568;
            letter-spacing: 1px;
        }
        .header h2 {
            margin: 5px 0;
            font-size: 22px;
            color: #1A202C;
            text-transform: uppercase;
        }
        .header p {
            margin: 0;
            font-size: 12px;
            color: #718096;
        }

        .section-title {
            font-size: 12px;
            font-weight: bold;
            color: #4A5568;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #E2E8F0;
            padding-bottom: 5px;
            margin: 20px 0 10px 0;
        }

        .content {
            width: 100%;
            border-collapse: collapse;
        }
        .content td {
            padding: 6px 4px;
            vertical-align: top;
        }
        .label {
            width: 35%;
            color: #718096;
            font-weight: 500;
        }
        .separator {
            width: 2%;
            color: #A0AEC0;
            text-align: center;
        }
        .value {
            width: 63%;
            font-weight: 600;
            color: #2D3748;
        }

        .status-badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }
        .status-pending { background: #FEFCBF; color: #744210; }
        .status-diterima { background: #C6F6D5; color: #22543D; }
        .status-ditolak { background: #FED7D7; color: #742A2A; }

        .footer {
            margin-top: 40px;
            display: flex;
            justify-content: flex-end;
        }
        .signature-box {
            text-align: center;
            float: right;
            width: 200px;
        }
        .signature-box p {
            margin: 2px 0;
        }
        .clear { clear: both; }

        @media print {
            body { padding: 0; }
            .card { border: none; padding: 0; max-width: 100%; }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="card">
        <!-- Header Surat -->
        <div class="header">
            <h3>BUKTI PENDAFTARAN RESMI PPDB</h3>
            <h2>SMK TARUNA BHAKTI</h2>
            <p>Tahun Ajaran 2026/2027</p>
        </div>

        <!-- Informasi Utama -->
        <div class="section-title">Data Pendaftaran</div>
        <table class="content">
            <tr>
                <td class="label">Nomor Pendaftaran</td>
                <td class="separator">:</td>
                <td class="value">PPDB-{{ str_pad($ppdb->id, 4, '0', STR_PAD_LEFT) }}</td>
            </tr>
            <tr>
                <td class="label">Status Pendaftaran</td>
                <td class="separator">:</td>
                <td class="value">
                    @php
                        $statusClass = 'status-pending';
                        if($ppdb->status == 'diterima') $statusClass = 'status-diterima';
                        if($ppdb->status == 'ditolak') $statusClass = 'status-ditolak';
                    @endphp
                    <span class="status-badge {{ $statusClass }}">{{ strtoupper($ppdb->status) }}</span>
                </td>
            </tr>
        </table>

        <!-- Data Pribadi Siswa -->
        <div class="section-title">Data Diri Calon Siswa</div>
        <table class="content">
            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="separator">:</td>
                <td class="value">{{ $ppdb->nama_lengkap }}</td>
            </tr>
            <tr>
                <td class="label">NISN</td>
                <td class="separator">:</td>
                <td class="value">{{ $ppdb->nisn }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Kelamin</td>
                <td class="separator">:</td>
                <td class="value">{{ $ppdb->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <td class="label">Tempat, Tanggal Lahir</td>
                <td class="separator">:</td>
                <td class="value">{{ $ppdb->tempat_lahir }}, {{ $ppdb->tanggal_lahir ? \Carbon\Carbon::parse($ppdb->tanggal_lahir)->translatedFormat('d F Y') : '-' }}</td>
            </tr>
            <tr>
                <td class="label">Asal Sekolah</td>
                <td class="separator">:</td>
                <td class="value">{{ $ppdb->asal_sekolah }}</td>
            </tr>
            <tr>
                <td class="label">Jurusan Pilihan</td>
                <td class="separator">:</td>
                <td class="value">{{ $ppdb->jurusan_pilihan }}</td>
            </tr>
        </table>

        <!-- Data Orang Tua & Alamat -->
        <div class="section-title">Informasi Orang Tua & Alamat</div>
        <table class="content">
            <tr>
                <td class="label">Nama Ayah / Ibu</td>
                <td class="separator">:</td>
                <td class="value">{{ $ppdb->nama_ayah }} / {{ $ppdb->nama_ibu }}</td>
            </tr>
            <tr>
                <td class="label">No. HP Orang Tua / Wali</td>
                <td class="separator">:</td>
                <td class="value">{{ $ppdb->no_hp_ortu }}</td>
            </tr>
            <tr>
                <td class="label">Alamat Lengkap</td>
                <td class="separator">:</td>
                <td class="value">{{ $ppdb->alamat }}</td>
            </tr>
        </table>

        <!-- Tanda Tangan & Footer -->
        <div class="footer">
            <div class="signature-box">
                <p>Dicetak pada: {{ date('d-m-Y H:i') }}</p>
                <br><br><br>
                <p><strong>Panitia PPDB</strong></p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</body>
</html>
