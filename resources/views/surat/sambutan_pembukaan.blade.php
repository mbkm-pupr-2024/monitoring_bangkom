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
                <td style="word-wrap: break-word;vertical-align:middle">Permohonan Memberikan Sambutan dan
                    Membuka Pelatihan {{ $pelatihan->nama }}</td>
            </tr>
        </table>
      </div>
      <div class="isi-surat">
        <p><b>Yth. Plt. Kepala Badan Pengembangan Sumber Daya Manusia Kementerian Pekerjaan Umum dan Perumahan Rakyat</b> <br>di Jakarta</p>

        <p style="text-indent: 50px; line-height: 1.5;">Menindaklanjuti Surat Kepala Pusat Pengembangan Kompetensi Sumber Daya Air dan Permukiman Nomor SM 0304-Ma/107 01 Februari 2024 Hal Penetapan Calon Peserta Pelatihan {{ $pelatihan->nama }}, kami akan menyelenggarakan Pelatihan {{ $pelatihan->nama }} pada tanggal 20 s.d. 28 Februari 2024 secara Tatap Muka. Sehubungan hal tersebut, kami memohon dengan hormat perkenan Bapak untuk memberikan Sambutan dan Membuka Pelatihan {{ $pelatihan->nama }} dimaksud pada:</p>
        <table style="text-indent: 10px;line-height: 1.5;">
          <tr>
            <td width="200px" >Hari/tanggal</td>
            <td>:</td>
            <td>Selasa / 20 Februari 2024</td>
          </tr>
          <tr>
            <td>Waktu</td>
            <td>:</td>
            <td>Pukul 08.00 s.d 08.45 WIB</td>
          </tr>
          <tr>
            <td>Tempat</td>
            <td>:</td>
            <td>Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya.
                Jln. Gayung Kebonsari No.48 Surabaya.
            </td>
          </tr>
          <tr>
            <td>Media</td>
            <td>:</td>
            <td>
                <i>Zoom Meeting ID</i> : <b>925 7842 3144</b> <i>Passcode</i> : <b>123456</b>
            </td>
          </tr>
        </table>
        <p style="text-indent: 50px;line-height: 1.5;">Demikian kami sampaikan, atas perhatian dan perkenan Bapak, kami mengucapkan terimakasih.</p>
      </div>
    </div>
    <div class="ttd" style="display: flex; justify-content: flex-end;">
      <div class="ttd-koprodi" style="position: relative;">
        <p style="margin-bottom: 20px; text-align:right;">Surabaya, 15 Februari 2024</p>
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
    <ol>
        <li>Plt. Sekretaris Badan Pengembangan Sumber Daya Manusia Kementerian PUPR;</li>
        <li>Kepala Pusat Pengembangan Kompetensi SDA dan Permukiman Kementerian PUPR.</li>
    </ol>
  </div>
</body>
<script>
  // window.print();
</script>

</html>