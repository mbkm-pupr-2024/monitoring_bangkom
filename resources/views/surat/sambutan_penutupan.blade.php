<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
  <title>Surat Pemanggilan Peserta</title>
</head>

<style>
  * {
    font-family: 'Roboto', sans-serif;
  }
</style>

<body>
  <div class="container">
    <div class="kopsurat"
      style="display: flex; align-items: center; justify-content: center; border-bottom: 1px solid black;">
      <img style="text-align:left" src="{{ asset('assets/images/pupr.png') }}" alt="" width="100" height="100">
      <div class="heading" style="text-align: center; margin-left: 10px;">
        <h4 style="margin-top: 20px;">KEMENTERIAN PEKERJAAN UMUM DAN PERUMAHAN RAKYAT</h4>
        <h4 style="margin-top: -20px;font-weight:normal">BADAN PENGEMBANGAN SUMBER DAYA MANUSIA</h4>
        <h4 style="margin-top: -20px;">BALAI PENGEMBANGAN KOMPETENSI PUPR WILAYAH IV SURABAYA</h4>
        <h6 style="margin-top: -20px;font-weight:normal">Jalan Gayung Kebonsari 48, Gayungan, Surabaya 60234, Telepon (031) 8291040, 8286501 Faksimili 8275847</h6>
      </div>
    </div>
    <div class="isi">
      <div class="judul">
        <p style="margin-bottom: 20px; text-align:right;">Surabaya, 2 Februari 2024</p>
        <table>
            <tr>
                <td>Nomor</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>Sifat</td>
                <td>:</td>
                <td>Biasa</td>
            </tr>
            <tr>
                <td>Lampiran</td>
                <td>:</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Hal</td>
                <td>:</td>
                <td style="word-wrap: break-word;vertical-align:middle">Permohonan Memberikan Sambutan dan Menutup Pelatihan {{ $pelatihan->nama }}</td>
            </tr>
        </table>
      </div>
      <div class="isi-surat">
        <p>Yth. <b>Kepala Pusat Pengembangan Kompetensi Manajemen
            Kementerian Pekerjaan Umum dan Perumahan Rakyat</b> <br>di Jakarta</p>

        <p style="text-indent: 50px; line-height: 1.5;">Disampaikan dengan hormat bahwa Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya sedang menyelenggarakan Pelatihan {{ $pelatihan->nama }} pada tanggal 29 Januari s.d. 06 Februari 2024 secara Blended Learning. Sehubungan dengan hal tersebut, kami memohon perkenan Bapak untuk memberikan Sambutan dan Menutup kegiatan dimaksud pada :</p>
        <table style="text-indent: 10px;line-height: 1.5;">
          <tr>
            <td width="200px" >Hari/tanggal</td>
            <td>:</td>
            <td>Selasa / 06 Februari 2024</td>
          </tr>
          <tr>
            <td>Waktu</td>
            <td>:</td>
            <td>Pukul 15.00 WIB s.d selesai.</td>
          </tr>
          <tr>
            <td>Tempat</td>
            <td>:</td>
            <td>Aula Majapahit, Balai Pengembangan Kompetensi Wilayah VI Surabaya.
            </td>
          </tr>
          <tr>
            <td>Media</td>
            <td>:</td>
            <td>
                <i>Zoom Meeting</i> Id Meeting : <b>939 3640 3531</b> <i>Passcode</i> : <b>123456</b>
            </td>
          </tr>
        </table>
        <p style="text-indent: 50px;line-height: 1.5;">Demikian kami sampaikan, atas perhatian dan perkenan Bapak, kami mengucapkan terimakasih.</p>
      </div>
    </div>
    <div class="ttd" style="display: flex; justify-content: flex-end;">
      <div class="ttd-koprodi" style="position: relative;">
        
        <br>
        <p style="margin-top: -20px; text-align:center;"><b>Kepala Balai Pengembangan Kompetensi PUPR 
            <br>Wilayah VI Surabaya,</b>
        </p>
        <p style="margin-top: 100px;text-align:center;"><b>Diki Zulkarnaen, ST, M.Sc.</b></p>
        <p style="margin-top: -10px;text-align:center;">NIP. 197904182005021001</p>
        <p style="margin-top: -10px;text-align:center;"><i style="color:rgb(151, 149, 149)">Ditandatangani secara elektronik</i></p>
      </div>
    </div>
    <p><b>Tembusan:</b></p>
    <p>Sekretaris Badan Pengembangan Sumber Daya Manusia Kementerian PUPR.</p>
  </div>
</body>
<script>
  // window.print();
</script>

</html>