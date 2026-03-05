<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        @page { margin: 1cm 2cm; }
        body { font-family: "Times New Roman", Times, serif; font-size: 11pt; line-height: 1.15; color: black; }
        
        .header-table { width: 100%; border-bottom: 2px solid black; padding-bottom: 5px; margin-bottom: 10px; }
        .logo-td { width: 75px; vertical-align: middle; }
        .header-text { text-align: center; vertical-align: middle; }
        .univ-name { font-size: 14pt; font-weight: normal; margin: 0; letter-spacing: 1px; }
        .faculty-name { font-size: 14pt; font-weight: bold; margin: 0; }
        .address { font-size: 7.5pt; margin: 2px 0; font-style: normal; }

        .info-table { width: 100%; margin-top: 15px; border-collapse: collapse; }
        .info-table td { vertical-align: top; padding: 1px 0; }
        .date-cell { text-align: right; }

        .recipient { margin-top: 20px; margin-bottom: 20px; }
        .content { text-align: justify; margin-top: 15px; }
        
        .details-table { margin: 15px 0 15px 40px; border-collapse: collapse; }
        .details-table td { vertical-align: top; padding: 2px 0; }
        .dot-column { padding: 0 10px; }

        .signature-wrapper { margin-top: 40px; width: 100%; }
        .sig-container { float: right; width: 320px; text-align: left; }
        .signature-space { height: 75px; position: relative; }
        .name-bold { font-weight: bold; text-decoration: underline; margin-bottom: 0; }
        .nip { margin-top: 0; }
    </style>
</head>
<body>

    <table class="header-table">
        <tr>
            <td class="logo-td">
                <img src="https://unair.ac.id/wp-content/uploads/2021/04/Logo-Unair-biru-300x300.png" width="80">
            </td>
            <td class="header-text">
                <div class="univ-name">UNIVERSITAS AIRLANGGA</div>
                <div class="faculty-name">FAKULTAS VOKASI</div>
                <div class="address">
                    Kampus B Jl. Dharmawangsa Dalam Surabaya 60286 Telp. (031) 5033869 Fax (031) 5053156<br>
                    Laman: https://vokasi.unair.ac.id, e-mail: info@vokasi.unair.ac.id
                </div>
            </td>
        </tr>
    </table>

    <table class="info-table">
        <tr>
            <td width="80">Nomor</td>
            <td width="10">:</td>
            <td>{{ $nomor }}</td>
            <td class="date-cell">{{ $tanggal_surat }}</td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>:</td>
            <td>Satu Lembar</td>
            <td></td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>:</td>
            <td><strong>{{ $perihal }}</strong></td>
            <td></td>
        </tr>
    </table>

    <div class="recipient">
        Yth.<br>
        1. Para Wakil Dekan<br>
        2. Para Ketua Departemen<br>
        3. Para Sekretaris Departemen<br>
        4. Para Koordinator Program Studi<br>
        5. Kepala Bagian Tata Usaha<br>
        6. Para Kepala Subbagian<br>
        7. Seluruh Dosen<br>
        8. Seluruh Tenaga Kependidikan<br>
        Fakultas Vokasi Universitas Airlangga
    </div>

    <div class="content">
        <p>Dalam rangka mempererat tali silaturahmi serta mengawali kegiatan tahun 2026, Fakultas Vokasi Universitas Airlangga akan menyelenggarakan Silaturahmi Awal Tahun Keluarga Besar Fakultas Vokasi. Sehubungan dengan hal tersebut, kami mengundang Bapak/Ibu untuk hadir pada kegiatan yang akan dilaksanakan pada:</p>
        
        <table class="details-table">
            <tr>
                <td width="100">Hari, Tanggal</td>
                <td class="dot-column">:</td>
                <td>{{ $hari_tgl }}</td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td class="dot-column">:</td>
                <td>{{ $waktu }}</td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td class="dot-column">:</td>
                <td>{{ $tempat }}</td>
            </tr>
            <tr>
                <td>Agenda</td>
                <td class="dot-column">:</td>
                <td>{{ $perihal }} Keluarga Besar Fakultas Vokasi</td>
            </tr>
        </table>

        <p>Demikian undangan ini kami sampaikan. Atas perhatian dan kehadiran Bapak/Ibu, kami ucapkan terima kasih.</p>
    </div>

    <div class="signature-wrapper">
        <div class="sig-container">
            <p>Dekan,</p>
            <div class="signature-space">
                </div>
            <p class="name-bold">Prof. Dian Yulie Reindrawati, S.Sos., M.M., Ph.D</p>
            <p class="nip">NIP. 197607071999032001</p>
        </div>
    </div>

</body>
</html>