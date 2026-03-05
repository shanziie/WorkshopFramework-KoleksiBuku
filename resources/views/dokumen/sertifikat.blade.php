<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        /* Pengaturan Kertas A4 Landscape */
        @page { size: a4 landscape; margin: 0; }
        body { font-family: 'Helvetica', Arial, sans-serif; margin: 0; padding: 0; }

        /* Background & Frame Utama */
        .container {
            width: 297mm;
            height: 210mm;
            position: relative;
            background: white;
            overflow: hidden;
        }

        /* Ornamen Sudut (Lengkungan Ungu/Marun) */
        .corner-top-left { position: absolute; top: 0; left: 0; width: 250px; opacity: 0.8; }
        .corner-bottom-right { position: absolute; bottom: 0; right: 0; width: 350px; transform: rotate(180deg); }

        /* Baris Logo Instansi di Atas */
        .header-logos {
            text-align: center;
            padding-top: 30px;
            z-index: 10;
            position: relative;
        }
        .header-logos img { height: 35px; margin: 0 8px; vertical-align: middle; }

        /* Judul & Nomor */
        .title-section { text-align: center; margin-top: 20px; color: #333; }
        .main-title { font-size: 55pt; font-weight: bold; margin: 0; letter-spacing: 4px; font-family: serif; }
        .cert-number { font-size: 16pt; margin-top: -5px; }

        /* Isi Sertifikat */
        .content { text-align: center; margin-top: 20px; z-index: 10; position: relative; }
        .text-diberikan { font-size: 18pt; margin-bottom: 10px; }
        .name { font-size: 38pt; font-weight: bold; color: #5a1a3a; margin-bottom: 5px; }
        .as-role { font-size: 18pt; margin: 15px 0 5px 0; }
        .role-title { font-size: 28pt; font-weight: bold; color: #333; text-transform: uppercase; }

        /* Deskripsi Acara */
        .event-details {
            font-size: 11pt;
            width: 80%;
            margin: 20px auto;
            line-height: 1.4;
            color: #444;
        }

        /* Tanda Tangan */
        .footer-signatures {
            width: 90%;
            margin: 40px auto 0;
            text-align: center;
        }
        .sig-block { width: 33%; float: left; position: relative; }
        .sig-space { height: 80px; }
        .sig-name { font-weight: bold; text-decoration: underline; font-size: 11pt; margin-bottom: 2px; }
        .sig-title { font-size: 10pt; line-height: 1.2; margin-bottom: 5px; }
        
        /* Stempel/Badge Medali */
        .medal-badge {
            position: absolute;
            top: 130px;
            right: 80px;
            width: 140px;
            z-index: 20;
        }
    </style>
</head>
<body>

    <div class="container">
        <svg class="corner-top-left" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path fill="#5a1a3a" d="M0,0 L200,0 Q100,100 0,200 Z" opacity="0.2"/>
        </svg>

        <div class="header-logos">
            <img src="https://unair.ac.id/wp-content/uploads/2021/04/Logo-Unair-biru-300x300.png">
            </div>

        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Gold_medal_icon.svg/1024px-Gold_medal_icon.svg.png" class="medal-badge">

        <div class="title-section">
            <h1 class="main-title">SERTIFIKAT</h1>
            <div class="cert-number">3353 / B / {{ date('Y') }}</div>
        </div>

        <div class="content">
            <div class="text-diberikan">Diberikan kepada :</div>
            <div class="name">{{ $nama }}</div>
            
            <div class="as-role">Atas Partisipasinya Sebagai:</div>
            <div class="role-title">{{ $peran }}</div> <div class="event-details">
                Dalam acara: <strong>{{ $acara }}</strong> dengan tema "Membalik Tren Global: Menjawab Epidemi Penyakit Tidak Menular Melalui Revolusi Gaya Hidup dan Kekuatan Kesehatan Masyarakat" yang diselenggarakan oleh Program Studi Kesehatan Masyarakat FIKKIA Universitas Airlangga pada {{ $tanggal }}.
            </div>
        </div>

        <div class="footer-signatures">
            <div class="sig-block">
                <div class="sig-title">Dekan FIKKIA UNAIR</div>
                <div class="sig-space"></div>
                <div class="sig-name">Prof. Dr. dr. Soetojo, Sp.U(K)</div>
                <div>NIP. 196001011987011001</div>
            </div>

            <div class="sig-block">
                <div class="sig-title">Koordinator Program Studi<br>Kesehatan Masyarakat FIKKIA UNAIR</div>
                <div class="sig-space"></div>
                <div class="sig-name">Syifa'ul Laili, S.KM., M.Kes</div>
                <div>NIK. 199001012015012001</div>
            </div>

            <div class="sig-block">
                <div class="sig-title">Ketua Pelaksana</div>
                <div class="sig-space"></div>
                <div class="sig-name">Shima Maharani Onessis</div>
                <div>NIM. 434241057</div>
            </div>
        </div>
    </div>

</body>
</html>