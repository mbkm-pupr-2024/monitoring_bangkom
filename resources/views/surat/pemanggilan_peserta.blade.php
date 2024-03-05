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
    .peserta{
        border-collapse: collapse;
        
    }
    .peserta th {
        border: 1px solid black;
        padding: 15px;
    }
    .peserta td {
        border: 1px solid black;
        padding: 15px;
    }
    .peserta th{
        background-color: aqua;
    }
    /* Mengatur counter untuk menghitung urutan */
    #dynamic-list {
    counter-reset: list-counter;
    }

    /* Mengatur urutan huruf abjad pada pseudo-element ::before */
    #dynamic-list li::before {
    content: counter(list-counter, lower-alpha) ') ';
    counter-increment: list-counter;
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
                <td>1 (satu) berkas</td>
            </tr>
            <tr>
                <td>Hal</td>
                <td>:</td>
                <td style="word-wrap: break-word;vertical-align:middle">Pemanggilan Peserta Pelatihan {{ $pelatihan->nama }}</td>
            </tr>
        </table>
      </div>
      <div class="isi-surat">
        <p>
            Yth.<b>Bapak/Ibu </b>
            <br>
            <b>(Daftar Terlampir)</b> 
            <br>
            Di-Tempat
        </p>

        <p style="text-indent: 50px; line-height: 1.5;">Sebagai upaya pengembangan kompetensi SDM bidang ke PUPR-an dan menindaklanjuti Surat Kepala Pusat Pengembangan Kompetensi Sumber Daya Air dan Permukiman Nomor SM 0304-Ma/107 tanggal 01 Februari 2024 Hal Penetapan Calon Peserta Pelatihan Integrated Coastal Lowland Development, dengan hormat kami mohon Bapak/Ibu berkenan untuk menugaskan pegawai yang namanya tercantum di bawah ini untuk mengikuti Pelatihan Integrated Coastal Lowland Development yang akan dilaksanakan pada tanggal 20 s.d 28 Februari 2024 secara Tatap Muka. Adapun ketentuan yang harus dipenuhi oleh calon peserta pelatihan adalah sebagai berikut </p>
        <ol style="line-height: 1.5;">
            <li>Calon peserta melakukan konfirmasi kehadiran dan mengisi biodata online secara lengkap paling lambat hari Jum’at, tanggal 16 Februari 2024 pukul 14.00 WIB melalui Web Sibangkoman Form berikut :
                <a href="https://bit.ly/PendaftaranPelatihanIntegratedCoastalLowlandDevelopment">https://bit.ly/PendaftaranPelatihanIntegratedCoastalLowlandDevelopment</a> dengan melampirkan :
                    <ul type="none" id="dynamic-list">
                        <li>Soft File Pas Foto ukuran 4 x 6 <b>Background Merah. Baju Putih Lengan Panjang memakai Dasi Biru Dongker/Hitam; Bagi Wanita Berhijab memakai Kerudung Warna Hitam.</b></li>
                        <li>Surat Tugas;</li>
                        <li>SK Pangkat Terakhir;</li>
                        <li>Lembar Komitmen;</li>
                    </ul>
                    <p>Narahubung panitia pelatihan Istadi (No. HP: 0813-576-3166).</p>
                </li>
                <li>Calon peserta wajib mempersiapkan diri dengan perangkat (pc/laptop/hp) dan keperluan lain untuk pembelajaran Klasikal di Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya.</li>
                <li>Calon peserta wajib melakukan cek in di Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya pada hari Senin, tanggal 19 Februari 2024 pukul 15.00 s.d 21.00 WIB.</li>
                <li>Informasi lebih lanjut dapat menghubungi Kepala Seksi Penyelenggaraan Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya: Alfan Bramestia, S.E., M.Ak (No.Hp: 08179316472).</li>
        </ol>
        <p style="text-indent: 50px; line-height: 1.5;">Demikian kami sampaikan atas perhatian dan kerjasamanya, kami ucapkan terima kasih.</p>
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
    <ol>
        <li>Plt. Sekretaris Badan Pengembangan Sumber Daya Manusia, Kementerian PUPR;</li>
        <li>Kepala Pusat Pengembangan Kompetensi Sumber Daya Air dan Permukiman ,Kementerian PUPR.</li>
    </ol>
  </div>

  {{-- Lampiran 1 --}}
  <p style="text-align: right">Lampiran I Surat Kepala Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya</p>
  <table class="float-end">
    <tr>
        <td>Nomor</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td></td>
  </table>
  <h3 style="text-align:center">DAFTAR UNIT ORGANISASI PENGUTUS</h3>
  <p>Yth.</p>
  <ol>
        <li>Direktur Sungai dan Pantai;</li>
        <li>Direktur Irigasi dan Rawa;</li>
        <li>Kepala Balai Besar Wilayah Sungai Sumatera VIII Palembang;</li>
        <li>Kepala Balai Besar Wilayah Sungai Pompengan Jeneberang;</li>
        <li>Kepala Balai Besar Wilayah Sungai Citanduy;</li>
        <li>Kepala Balai Wilayah Sungai Sumatera I Banda Aceh;</li>
        <li>Kepala Balai Wilayah Sungai Sumatera IV Batam;</li>
        <li>Kepala Balai Wilayah Sungai Bangka Belitung;</li>
        <li>Kepala Balai Wilayah Sungai Sumatera V Padang;</li>
        <li>Kepala Balai Wilayah Sungai Sumatera VI Jambi;</li>
        <li>Kepala Balai Wilayah Sungai Bali-Penida;</li>
        <li>Kepala Balai Wilayah Sungai Kalimantan I Pontianak;</li>
        <li>Kepala Balai Wilayah Sungai Kalimantan II Palangkaraya;</li>
        <li>Kepala Balai Wilayah Sungai Kalimantan III Banjarmasin;</li>
        <li>Kepala Balai Wilayah Sungai Kalimantan IV Samarinda;</li>
        <li>Kepala Balai Wilayah Sungai Sulawesi II Gorontalo;</li>
        <li>Kepala Balai Wilayah Sungai Sulawesi III Palu;</li>
        <li>Kepala Balai Wilayah Sungai Maluku Utara;</li>
        <li>Kepala Balai Wilayah Sungai Papua;</li>
        <li>Kepala Balai Teknik Pantai.</li>
    </ol>

    {{-- Lampiran 1 --}}
  <p style="text-align: right">Lampiran II Surat Kepala Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya</p>
  <table style="text-align: right">
    <tr>
        <td>Nomor</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td></td>
  </table>
    <h3 style="text-align:center">
        DAFTAR CALON PESERTA
        <br>
        PESERTA PELATIHAN {{ $pelatihan->nama }}
        <br>
        BALAI PENGEMBANGAN KOMPETENSI PUPR WILAYAH VI SURABAYA
        <br>
        TANGGAL 20 S.D 28 FEBRUARI 2024
    </h3>
    <table class="table table-bordered peserta">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Jabatan</th>
                <th>Unit Kerja</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody style="text-align: center">
            <tr>
                <td>1</td>
                <td style="text-align: left">Anthony Harlly Sasono Putro S.T., M.Sc.</td>
                <td>198905062014021006</td>
                <td>Analis Pengelolaan Sumber Daya Air</td>
                <td>Direktorat Sungai dan Pantai</td>
                
            </tr>
            <tr>
                <td>2</td>
                <td>M. Rizqy Faza Arofat S.T.</td>
                <td>199305312020121003</td>
                <td>Balai Pelaksanaan Jalan Nasional Nusa Tenggara Barat</td>
                <td>Direktorat Sungai dan Pantai</td>
                <td>Analis Pengelolaan Sumber Daya Air</td>
                <td rowspan="2">Sesuai Daftar Usulan Calon Peserta Utama Surat Tugas Sekretaris Direktorat Jenderal Sumber Daya Air, Nomor: 05/SPT/As/2024 tanggal 25
                    Januari 2024
                    </td>
            </tr>
        </tbody>
    </table>
    <p style="text-align: right">Lampiran III Surat Kepala Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya</p>
    <table style="text-align: right">
        <tr>
            <td>Nomor</td>
            <td>:</td>
            <td></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td></td>
    </table>
    <div style="text-align: center;">
        <hr style="width: 50%; margin-top: 10px; margin-bottom: 10px;">
        <div style="position: relative; top: -10px; background-color: white; padding: 0 10px;">KOP INSTANSI</div>
    </div>
    <h3 style="text-align:center">
        SURAT PERNYATAAN KOMITMEN
        <br>
        PESERTA PELATIHAN {{ $pelatihan->nama }}
        <br>
        TANGGAL 20 S.D 28 FEBRUARI 2024
    </h3>
    <p>Yang bertanda tangan di bawah ini :</p>
    <table style="text-indent:20px;">
        <tr>
            <td>1.</td>
            <td>Nama</td>
            <td>:</td>
            <td></td>
        </tr>
        <tr>
            <td>2.</td>
            <td>NIP / NRP</td>
            <td>:</td>
            <td></td>
        </tr>
        <tr>
            <td>3.</td>
            <td>Jabatan</td>
            <td>:</td>
            <td></td>
        </tr>
        <tr>
            <td>4.</td>
            <td>Instansi</td>
            <td>:</td>
            <td></td>
        </tr>
    </table>
    <p class="text-indent:50px;line-height:1.5">
        Menyatakan bahwa Saya bersedia mengikuti Peserta Pelatihan {{ $pelatihan->nama }} pada tanggal 20 s.d 28 Februari 2024 secara Tatap Muka dengan kehadiran penuh sesuai dengan jadwal yang sudah ditetapkan oleh pelaksana kegiatan dan dibebastugaskan sementara oleh pimpinan agar dapat mengikuti pelatihan secara bersungguh-sungguh.
        Demikian Surat Pernyataan ini dibuat dengan sebenar-benarnya.
    </p>
    <p style="text-align: right">................ 2024</p>
    
    <div class="row">
        
    </div>
        <div class="col-6">
            <p class="text-center">Disetujui oleh,</p>
            <p class="text-center">(Atasan Langsung Peserta)</p>
            <p class="text-center">NIP</p>
        </div>
        <div class="col-6">
            <p class="text-center">Yang menyatakan,</p>
            <p class="text-center">(Nama Peserta)</p>
            <p class="text-center">NIP</p>
        </div>
    </div>
    <h3 style="text-align:center">
        JADWAL PELATIHAN {{ $pelatihan->nama }}
        <br>
        BALAI PENGEMBANGAN KOMPETENSI PUPR WILAYAH VI SURABAYA
        <br>
        20 S.D 28 FEBRUARI 2024
    </h3>

</body>
<script>
    // window.print();
</script>

</html>