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
                <td style="word-wrap: break-word;vertical-align:middle">Pengembalian Peserta Pelatihan {{ $pelatihan->nama }}</td>
            </tr>
        </table>
      </div>
      <div class="isi-surat">
        <p>
            Yth.<b>Bapak/Ibu </b>
            <br>
            <b>(Daftar Terlampir)</b> 
            <br>
            di Tempat
        </p>

        <p style="text-indent: 50px; line-height: 1.5;">Sehubungan dengan telah berakhirnya Pelatihan Manajemen Konstruksi yang diselenggarakan dari tanggal  29 Januari s.d 06 Februari 2024 secara Blended Learning di Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya, maka dengan hormat kami menyerahkan kembali peserta yang telah mengikuti pelatihan kepada Unit Organisasi Pengutus/Pemberi Tugas.</p>
        <p style="text-indent: 50px; line-height: 1.5;">Sebagai informasi, dari 28 orang peserta pelatihan ini, peserta dinyatakan lulus sebanyak 26 orang. Informasi kelulusan setiap peserta dapat diakses melalui sistem Sibangkoman.pu.go.id. Peserta yang telah mengikuti pelatihan diberikan Sertifikat dari Badan Pengembangan Sumber Daya Manusia, Kementerian Pekerjaan Umum dan Perumahan Rakyat.</p>
        <p style="text-indent: 50px;line-height: 1.5;">Demikian kami sampaikan, atas perhatian dan kerjasamanya, kami mengucapkan terima kasih.</p>
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
        <li>Plt. Kepala Badan Pengembangan Sumber Daya Manusia Kementerian PUPR;</li>
        <li>Plt.Sekretaris Badan Pengembangan Sumber Daya Manusia Kementerian PUPR;</li>
        <li>Kepala Pusat Pengembangan Kompetensi Manajemen Kementerian PUPR.</li>
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
        <li>Direktur Bina Teknik Sumber Daya Air;</li>
        <li>Direktur Pembangunan Jalan;</li>
        <li>Direktur Jalan Bebas Hambatan;</li>
        <li>Direktur Bina Teknik Jalan dan Jembatan;</li>
        <li>Direktur Kepatuhan Intern - Bina Marga;</li>
        <li>Kepala Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa Timur;</li>
        <li>Kepala Balai Wilayah Sungai Sumatera II Medan;</li>
        <li>Kepala Balai Wilayah Sungai Sulawesi I Manado;</li>
        <li>Kepala Balai Teknik Rawa;</li>
        <li>Kepala Balai Besar Pelaksanaan Jalan Nasional Jawa Tengah - D.I. Yogyakarta;</li>
        <li>Kepala Balai Besar Pelaksanaan Jalan Nasional Jawa Timur - Bali;</li>
        <li>Kepala Balai Pelaksanaan Jalan Nasional Banten;</li>
        <li>Kepala Balai Pelaksanaan Jalan Nasional Nusa Tenggara Barat;</li>
        <li>Kepala Balai Pelaksanaan Jalan Nasional Kalimantan Tengah;</li>
        <li>Kepala Balai Pelaksanaan Jalan Nasional Gorontalo;</li>
        <li>Kepala Balai Pelaksanaan Jalan Nasional Maluku;</li>
        <li>Kepala Balai Pelaksanaan Jalan Nasional Marauke;</li>
        <li>Kepala Balai Jasa Konstruksi Wilayah IV Surabaya;</li>
        <li>Kepala Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Aceh;</li>
        <li>Kepala Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Jawa Tengah;</li>
        <li>Kepala Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Nusa Tenggara Barat;</li>
        <li>Kepala Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Kepulauan Riau;</li>
        <li>Kepala Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Papua;</li>
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
        DAFTAR PESERTA
        <br>
        PESERTA PELATIHAN MANAJEMEN KONSTRUKSI 
        <br>
        BALAI PENGEMBANGAN KOMPETENSI PUPR WILAYAH VI SURABAYA
        <br>
        TANGGAL 29 JANUARI S.D 06 FEBRUARI 2024
    </h3>
    <table class="table table-bordered peserta">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP/NRP</th>
                <th>Unit Kerja</th>
                <th>Peringkat</th>
            </tr>
        </thead>
        <tbody style="text-align: center">
            <tr>
                <td>1</td>
                <td style="text-align: left">Ade Karma, S.Si., M.T.</td>
                <td>197810272006041002</td>
                <td>Direktorat Bina Teknik Sumber Daya Air</td>
                <td>Tidak Memenuhi Syarat Kelulusan</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Asror Halim, S.T.</td>
                <td>197112312007101002</td>
                <td>Balai Pelaksanaan Jalan Nasional Nusa Tenggara Barat</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Dica Erly Andjarwati, S.T., M.T.</td>
                <td>198703082009122001</td>
                <td>Direktorat Bina Teknik Jalan dan Jembatan</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Disnaika Dwi Rimbawati, S.E.</td>
                <td>198412242010122002</td>
                <td>Balai Jasa Konstruksi Wilayah IV Surabaya</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Dwi Ananta Irwinsyah Putra, S.E.</td>
                <td>199507152020121006</td>
                <td>Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Kepulauan Riau</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Eri Prasetyo Sadewo, S.E.</td>
                <td>197209272008121001</td>
                <td>Balai Pelaksanaan Jalan Nasional Banten</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Esthy Dwinda P., S.Sos., M.T. </td>
                <td>197811212008122001</td>
                <td>Balai Jasa Konstruksi Wilayah IV Surabaya</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Ganggaya Sotyadarpita, S.Si., M.Sc.</td>
                <td>198902192015031002</td>
                <td>Balai Teknik Rawa</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Grace Marcelina Lumoindong, S.T.</td>
                <td>197303272007012002</td>
                <td>Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Papua</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>10</td>
                <td>Indra Murahman,S.T.</td>
                <td>3516061204890001</td>
                <td>UPT PSDA Wilayah Sungai di Kediri</td>
                <td>Tidak Memenuhi Syarat Kelulusan</td>
            </tr>
            <tr>
                <td>11</td>
                <td>Istanto Ruchban S.T., M.T.</td>
                <td>197502142002121002</td>
                <td>Balai Pelaksanaan Jalan Nasional Gorontalo</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>12</td>
                <td>Joni Hendri Wahyu, S.E.</td>
                <td>197706082015041001</td>
                <td>Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Kepulauan Riau</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>13</td>
                <td>M. Akram Arifin, S.T.</td>
                <td>199501282020121006</td>
                <td>Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Papua</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>14</td>
                <td>Marini Rotua, S.T.</td>
                <td>198903222010122001</td>
                <td>Balai Wilayah Sungai Sumatera II Medan</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>15</td>
                <td>Miftahul Jannah, S.T.</td>
                <td>199110122018022001</td>
                <td>Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Aceh</td>
                <td>Lulus Peringkat 2</td>
            </tr>
            <tr>
                <td>16</td>
                <td>Pramesti Indrika Sari S.T.</td>
                <td>3372055007860002</td>
                <td>Balai Besar Pelaksanaan Jalan Nasional Jawa Tengah - D.I. Yogyakarta</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>17</td>
                <td>Pudjiati Lestari, S.T., M.Si.</td>
                <td>196601161989032003</td>
                <td>Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Nusa Tenggara Barat</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>18</td>
                <td>Rakhmawati Masewa, S.T.</td>
                <td>197612232008122002</td>
                <td>Balai Pelaksanaan Jalan Nasional Maluku</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>19</td>
                <td>Rhyno Eka Arieyanto, S.T.</td>
                <td>198104062023211009</td>
                <td>Direktorat Kepatuhan Intern Bina Marga</td>
                <td>Lulus Peringkat 1</td>
            </tr>
            <tr>
                <td>20</td>
                <td>Rima Veronica Pasaribu, S.T., M.Sc.u</td>
                <td>198104062023211009</td>
                <td>Balai Pelaksanaan Jalan Nasional Kalimantan Tengah</td>
                <td>Lulus Peringkat 3</td>
            </tr>
            <tr>
                <td>21</td>
                <td>Ir. Risco Bolgrado Sirait, S.T., M.Si.</td>
                <td>197504272010041001</td>
                <td>Balai Pelaksanaan Jalan Nasional Merauke</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>22</td>
                <td>Siti Rahmah, S.T.</td>
                <td>199108052015052001</td>
                <td>Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Aceh</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>23</td>
                <td>Stevano Krista Kambey, S.T.</td>
                <td>7173010902890001</td>
                <td>Balai Wilayah Sungai Sulawesi I Manado</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>24</td>
                <td>Syukur Salami, S.E., S.T.</td>
                <td>3372011803850004</td>
                <td>Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Jawa Tengah</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>25</td>
                <td>Vania Rebecca Wyanet Clara, S.T.</td>
                <td>199601302019032006</td>
                <td>Direktorat Pembangunan Jalan</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>26</td>
                <td>Wahyu Anang, S.T.</td>
                <td>197201302009111001</td>
                <td>Balai Besar Pelaksanaan Jalan Nasional Jawa Timur - Bali</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>27</td>
                <td>Wisdawaty Situmorang, S.ST., M.T.</td>
                <td>198710142010122002</td>
                <td>Balai Pelaksana Pemilihan Jasa Konstruksi Wilayah Kepulauan Riau</td>
                <td>Lulus</td>
            </tr>
            <tr>
                <td>28</td>
                <td>Yanita Hanastasia Sinaga, S.T., M.T.</td>
                <td>198908162015032003</td>
                <td>Direktorat Jalan Bebas Hambatan</td>
                <td>Lulus</td>
            </tr>
        </tbody>

    </table>
</body>
<script>
    // window.print();
</script>

</html>