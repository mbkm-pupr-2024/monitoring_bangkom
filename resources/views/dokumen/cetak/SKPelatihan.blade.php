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
    
  <title>SK Pelatihan</title>
</head>

<style>
  * {
    font-family: 'Roboto', sans-serif;
  }
    /* .peserta{
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
    /* #dynamic-list {
    counter-reset: list-counter;
    } */

    /* Mengatur urutan huruf abjad pada pseudo-element ::before */
    /* #dynamic-list li::before {
    content: counter(list-counter, lower-alpha) ') ';
    counter-increment: list-counter;
    } */ */
    

</style>

<body>
    @if (!function_exists('tanggal_indo'))
    @php
    function tanggal_indo($tanggal){
        $bulan = array (
        1 =>'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

    function rentang_tgl($tgl_mulai, $tgl_selesai){
        $tgl_mulai = tanggal_indo($tgl_mulai);
        $tgl_selesai = tanggal_indo($tgl_selesai);
        $tgl_mulai_pecah = explode(' ', $tgl_mulai);
        $tgl_selesai_pecah = explode(' ', $tgl_selesai);
        if ($tgl_mulai_pecah[1] == $tgl_selesai_pecah[1]) {
            return $tgl_mulai_pecah[0] . ' s.d ' . $tgl_selesai_pecah[0] . ' ' . $tgl_mulai_pecah[1] . ' ' . $tgl_mulai_pecah[2];
        }
        return $tgl_mulai . ' s.d ' . $tgl_selesai;
    }

    function hari_indo($tanggal){
        if (date('l', strtotime($tanggal)) == 'Sunday') {
            return 'Minggu';
        } elseif (date('l', strtotime($tanggal)) == 'Monday') {
            return 'Senin';
        } elseif (date('l', strtotime($tanggal)) == 'Tuesday') {
            return 'Selasa';
        } elseif (date('l', strtotime($tanggal)) == 'Wednesday') {
            return 'Rabu';
        } elseif (date('l', strtotime($tanggal)) == 'Thursday') {
            return 'Kamis';
        } elseif (date('l', strtotime($tanggal)) == 'Friday') {
            return 'Jumat';
        } elseif (date('l', strtotime($tanggal)) == 'Saturday') {
            return 'Sabtu';
        }
        return date('l', strtotime($tanggal));
    }
    @endphp
@endif
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
        <h4 style="text-align: center">K E P U T U S A N <br>
            KEPALA BALAI PENGEMBANGAN KOMPETENSI PEKERJAAN UMUM DAN PERUMAHAN RAKYAT WILAYAH VI SURABAYA
        </h4>
        <h4 style="text-align: center;white-space: pre;">NOMOR  :       /KPTS/Mo/2024</h4>
        <h4 style="text-align: center">T E N T A N G</h4>
        <h4 style="text-align: center">PENETAPAN DAN PENUNJUKAN TIM PELAKSANA PENYELENGGARAAN (TIM SWAKELOLA), PESERTA  PELATIHAN DAN TIM PENGAJAR / FASILITATOR {{ $pelatihan->nama }}  PADA BALAI PENGEMBANGAN KOMPETENSI PEKERJAAN UMUM DAN PERUMAHAN RAKYAT  WILAYAH VI SURABAYA TAHUN ANGGARAN {{ $pelatihan->tahun_periode }}</h4>
        <hr>
        <h4 style="text-align: center">KEPALA BALAI PENGEMBANGAN KOMPETENSI PEKERJAAN UMUM 
            DAN PERUMAHAN RAKYAT WILAYAH VI SURABAYA
        </h4>
        
      </div>
      <div class="isi-surat">
        <table>
            <tr>
                <td style="vertical-align: top;">Menimbang</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;">
                    <ol type="a" style="margin-top:-5px;padding-left:20px;text-align:justify">
                        <li style="line-height: 2">bahwa dalam rangka peningkatan mutu Sumber Daya Manusia dan meningkatkan pengetahuan, keahlian dan keterampilan serta sikap untuk dapat melaksanakan tugas secara professional, maka Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya, dipandang perlu menetapkan Peserta  Pelatihan Pengelolaan Sumber Daya Air Terpadu (Blended Learning), pada Balai Pengembangan Kompetensi Pekerjaan Umum Dan Perumahan Rakyat  Wilayah VI Surabaya Tahun Anggaran 2024;</li>
                        <li style="line-height: 2">bahwa untuk menunjang kelancaran pelaksanaan Peserta  Pelatihan Pengelolaan Sumber Daya Air Terpadu (Blended Learning), pada Balai Pengembangan Kompetensi Pekerjaan Umum Dan Perumahan Rakyat  Wilayah VI Surabaya Tahun Anggaran 2024; perlu menunjuk Tim Pelaksana Penyelenggara, Peserta Pelatihan dan Tim Pengajar / Fasilitator; </li>
                        <li style="line-height: 2">bahwa para pejabat/pegawai yang namanya tercantum dalam keputusan ini dipandang memenuhi syarat untuk melaksanakan tugasnya sebagai Tim Pelaksana Penyelenggara, dan Calon Peserta  Pelatihan Pengelolaan Sumber Daya Air Terpadu (Blended Learning);</li>
                        <li style="line-height: 2">bahwa untuk keperluan tersebut perlu diatur dengan surat keputusan;</li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top;text-align:justify">Mengingat</td>
                <td style="vertical-align:top;text-align:justify">:</td>
                <td style="vertical-align:top;text-align:justify">
                    <ol type="1" style="margin-top:0px;padding-left:20px;text-align:justify">
                        <li style="line-height: 1.5">Undang-Undang Nomor 17 Tahun 2019 tentang Sumber Daya Air;</li>
                        <li style="line-height: 1.5">Undang-Undang Republik Indonesia Nomor 20 Tahun 2023 tentang Aparatur Sipil Negara;</li>
                        <li style="line-height: 1.5">Peraturan Pemerintah Nomor 42 Tahun 2008 tentang Pengelolaan Sumber Daya Air;</li>
                        <li style="line-height: 1.5">Peraturan Pemerintah Nomor 17 Tahun 2020 tentang Perubahan atas Peraturan Pemerintah Nomor 11 Tahun 2017 tentang Manajemen Pegawai Negeri Sipil;</li>
                        <li style="line-height: 1.5">Peraturan Presiden Nomor 37 tahun 2023 tentang kebijakan nasional Sumber Daya Air;</li>
                        <li style="line-height: 1.5">Peraturan Menteri Pekerjaan Umum dan Perumahan Rakyat  Nomor 26 Tahun 2020 tentang Perubahan  Atas  Peraturan Menteri Pekerjaan Umum dan Perumahan Rakyat Nomor 16 Tahun 2020 tentang Organisasi dan Tata Kerja Unit Pelaksana Teknis di Kementerian Pekerjaan Umum dan Perumahan Rakyat;</li>
                        <li style="line-height: 1.5">Peraturan Menteri Pekerjaan Umum dan Perumahan Rakyat  Nomor 12 / PRT/ M / 2015 tentang Exploitasi dan Pemeliharaan Jaringan Irigasi;</li>
                        <li style="line-height: 1.5">Peraturan Menteri Pekerjaan Umum dan Perumahan Rakyat  Nomor 30 / PRT/ M / 2015 tentang Pengembangan dan Pengelolaan Sistem Irigasi;</li>
                        <li style="line-height: 1.5">Peraturan Menteri Pekerjaan Umum dan Perumahan Rakyat Nomor 2 Tahun 2023 tentang Pengembangan Kompetensi Pegawai Aparatur Sipil Negara;</li>
                        <li style="line-height: 1.5">Surat Edaran Kepala Badan Pengembangan SDM Nomor 04/SE/KM/2023 tentang Pedoman Umum Penyelenggaraan Pengembangan Kompetensi Dalam Bentuk Pelatihan Di Kementerian Pekerjaan Umum dan Perumahan Rakyat;</li>
                        <li style="line-height: 1.5">DIPA Petikan T.A 2024 Satuan Kerja Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya Nomor SP DIPA. 033.15.1.400932/2024 tanggal 24 November 2023;</li>
                        <li style="line-height: 1.5">Surat Kepala Pusat Pengembangan Kompetensi Sumber Daya Air dan Permukiman Nomor SM 0304-Ma/43 tanggal 19 Januari 2024 tentang Penetapan Calon Peserta Pelatihan Pengelolaan Sumber Daya Air Terpadu (Blended Learning);</li>
                    </ol>
                </td>
            </tr>
            
        </table>
        <h4 style="text-align: center;page-break-before:always;">M E M U T U S K A N</h4>
        <table>
            <tr>
                <td style="line-height: 2;vertical-align:top;text-align:justify">Menetapkan</td>
                <td style="line-height: 2;vertical-align:top;text-align:justify">:</td>
                <td style="line-height: 2; vertical-align:top;text-align:justify">KEPUTUSAN KEPALA BALAI PENGEMBANGAN KOMPETENSI PUPR WILAYAH VI SURABAYA TENTANG PENETAPAN DAN PENUNJUKAN TIM PELAKSANA PENYELENGGARAAN (TIM SWAKELOLA), PESERTA DAN TIM PENGAJAR / FASILITATOR  PELATIHAN PENGELOLAAN SUMBER DAYA AIR TERPADU (BLENDED LEARNING), PADA BALAI PENGEMBANGAN KOMPETENSI PEKERJAAN UMUM DAN PERUMAHAN RAKYAT  WILAYAH VI SURABAYA TAHUN ANGGARAN 2024<br><br></td>
            </tr>
            <tr>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">Kesatu</td>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">Menunjuk Pejabat/Pegawai yang namanya tersebut dalam kolom 2 (dua) sebagai <b>Tim Pelaksana Penyelenggara </b> Pelatihan, Pengelolaan Sumber Daya Air Terpadu (Blended Learning), pada Balai Pengembangan Kompetensi Pekerjaan Umum Dan Perumahan Rakyat  Wilayah VI Surabaya Tahun Anggaran 2024, dengan jabatan seperti tersebut dalam kolom 3 (tiga) pada lampiran I (satu) keputusan ini;<br></td>
            </tr>
            <tr>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">Kedua</td>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">Menunjuk Pejabat/Pegawai yang namanya tersebut dalam kolom 2 (dua) sebagai <b>Pengajar / Fasilitator</b> Peserta  Pelatihan Pengelolaan Sumber Daya Air Terpadu (Blended Learning), pada Balai Pengembangan Kompetensi Pekerjaan Umum Dan Perumahan Rakyat  Wilayah VI Surabaya Tahun Anggaran 2024, pada lampiran II (dua) keputusan ini dan diberikan honorarium sebesar sesuai dengan Peraturan dan Undang Undang yang berlaku, dan atau seperti tersebut dalam lampiran III (tiga) keputusan ini;<br></td>
            </tr>
            <tr>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">Ketiga</td>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify;">Menetapkan Pejabat/Pegawai yang namanya tersebut dalam kolom 2 (dua) sebagai Peserta   Pelatihan Pengelolaan Sumber Daya Air Terpadu (Blended Learning), pada Balai Pengembangan Kompetensi Pekerjaan Umum Dan Perumahan Rakyat  Wilayah VI Surabaya Tahun Anggaran 2024, pada lampiran IV (empat) keputusan ini;<br></td>
            </tr>
            <tr>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">Keempat</td>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify;">Melaksanakan tugas dan tanggung jawab sebagai Panitia, dan Peserta Pelatihan Pengelolaan Sumber Daya Air Terpadu (Blended Learning), pada Balai Pengembangan Kompetensi Pekerjaan Umum Dan Perumahan Rakyat  Wilayah VI Surabaya Tahun Anggaran 2024, sebagaimana dijelaskan dalam lampiran V (lima) keputusan ini;<br></td>
            </tr>
            <tr>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">Kelima</td>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify;">Pelatihan Pengelolaan Sumber Daya Air Terpadu (Blended Learning), pada Balai Pengembangan Kompetensi Pekerjaan Umum Dan Perumahan Rakyat  Wilayah VI Surabaya Tahun Anggaran 2024, dilaksanakan Daring  24 Januari s.d. 2 Februari 2024 dan dilaksanakan Klasikal 5 s.d. 6 Februari 2024 di Balai Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah VI Surabaya;<br></td>
            </tr>
            <tr>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">Keenam</td>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify;">DIPA Petikan  Balai Pengembangan Kompetensi Pekerjaan Umum dan Perumahan Rakyat Wilayah VI Surabaya  Nomor DIPA : SP DIPA. 033.15.1.400932/2024 tanggal 24 November 2023;</td>
            </tr>
            <tr>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">Ketujuh</td>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">Keputusan  ini  berlaku   sejak  tanggal  ditetapkan  dengan   ketentuan  bahwa apabila  dikemudian hari terdapat kekeliruan di dalam penetapan ini akan   diadakan perbaikan  sebagaimana  mestinya.</td>
            </tr>
        </table>
      </div>
    </div>
    <div class="ttd" style="display: flex; justify-content: flex-end;">
      <div class="ttd-koprodi" style="position: relative;">
        <table>
            <tr>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">Ditetapkan di</td>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">Surabaya</td>
            </tr>
            <tr>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">Pada tanggal</td>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                <td style="line-height: 1.5; vertical-align:top;text-align:justify">{{ tanggal_indo(now()->toDateString()) }}</td>
            </tr>
        </table>
        <hr>
        <br>
        <p style="margin-top: -20px; text-align:center;">Kepala <br> Balai Pengembangan Kompetensi PUPR 
            <br>Wilayah VI Surabaya
        </p>
        <p style="margin-top: 100px;text-align:center;"><b><u>Diki Zulkarnaen, ST, M.Sc.</u></b></p>
        <p style="margin-top: -10px;text-align:center;"><b>NIP. 197904182005021001</b></p>
      </div>
    </div>
    <p><b>Tembusan:</b></p>
    <ol>
        <li style="line-height: 1.5">Kepala Badan Pengembangan Sumber Daya Manusia Kementerian PUPR di Jakarta ; </li>
        <li style="line-height: 1.5">Sekretaris Badan Pengembangan Sumber Daya Manusia Kementerian PUPR di Jakarta ;</li>
        <li style="line-height: 1.5">Kepala Biro Keuangan Kementerian PUPR di Jakarta;</li>
        <li style="line-height: 1.5">Kepala Kantor Pelayanan Perbendaharaan Negara Surabaya I;</li>
        <li style="line-height: 1.5">Pejabat Pembuat Komitmen Satker Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya;</li>
        <li style="line-height: 1.5">Bendahara Pengeluaran Satker Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya;</li>
    </ol>
  </div>

  {{-- Lampiran 1 --}}
  <table style="page-break-before: always">
    <tr>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">Lampiran I</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">Keputusan Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya</td>
    </tr>
    <tr>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">Nomor</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify;white-space: pre;">      /KPTS/Mo/2023</td>
    </tr>
    <tr>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">Tanggal</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">{{ tanggal_indo(now()->toDateString()) }}</td>
    </tr>
    <tr>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">Tentang</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">Penetapan Dan Penunjukan Tim Pelaksana Penyelenggaraan (Tim Swakelola), Peserta  Pelatihan dan Pengajar / Fasilitator Pengelolaan Sumber Daya Air Terpadu (Blended Learning) pada Balai Pengembangan Kompetensi Pekerjaan Umum Dan Perumahan Rakyat  Wilayah VI Surabaya Tahun Anggaran 2024</td>
    </tr>
    <tr>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">Daftar Nama</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify"><b>Tim Pelaksana Penyelenggara</b></td>
    </tr>
  </table>
    <table class="table table-bordered peserta">
        <thead>
          <tr style="page-break-inside: avoid;">
            <th style="padding:10px;">NO</th>
            <th style="text-align:center;padding:10px;">NAMA/NIP/NRP</th>
            <th style="text-align:center;padding:10px;">JABATAN</th>
            <th style="text-align:center;padding:10px;">HONORARIUM
                <br>(Rp)
            </th>
          </tr>
          <tr style="page-break-inside: avoid;">
            <th style="padding:10px;">1</th>
            <th style="text-align:center;padding:10px;">2</th>
            <th style="text-align:center;padding:10px;">3</th>
            <th style="text-align:center;padding:10px;">4</th>
          </tr>
        </thead>
        <tbody>
        {{-- @foreach ($data as $item) --}}
            <tr style="page-break-inside: avoid;">
                {{-- <td style="padding:10px;vertical-align:middle">{{ $item['NO'] }}</td>
                <td style="text-align:center;padding:10px;vertical-align:middle">{{ $item['NAMA/NIP/NRP'] }}</td>
                <td style="text-align:center;padding:10px;vertical-align:middle">{{ $item['JABATAN'] }}</td>
                <td style="text-align:center;padding:10px;vertical-align:middle">{{ $item['HONORARIUM'] }}</td> --}}
            </tr>
        {{-- @endforeach --}}
        </tbody>
    </table>
    <div class="ttd" style="display: flex; justify-content: flex-end;">
        <div class="ttd-koprodi" style="position: relative;">
          <table>
              <tr>
                  <td style="line-height: 1.5; vertical-align:top;text-align:justify">Ditetapkan di</td>
                  <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                  <td style="line-height: 1.5; vertical-align:top;text-align:justify">Surabaya</td>
              </tr>
              <tr>
                  <td style="line-height: 1.5; vertical-align:top;text-align:justify">Pada tanggal</td>
                  <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                  <td style="line-height: 1.5; vertical-align:top;text-align:justify">{{ tanggal_indo(now()->toDateString()) }}</td>
              </tr>
          </table>
          <hr>
          <br>
          <p style="margin-top: -20px; text-align:center;">Kepala <br> Balai Pengembangan Kompetensi PUPR 
              <br>Wilayah VI Surabaya
          </p>
          <p style="margin-top: 100px;text-align:center;"><b><u>Diki Zulkarnaen, ST, M.Sc.</u></b></p>
          <p style="margin-top: -10px;text-align:center;"><b>NIP. 197904182005021001</b></p>
        </div>
    </div>

    {{-- Lampiran 2 --}}
  <table style="page-break-before: always">
    <tr>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">Lampiran II</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">Keputusan Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya</td>
    </tr>
    <tr>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">Nomor</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify;white-space: pre;">      /KPTS/Mo/{{ $pelatihan->tahun_periode }}</td>
    </tr>
    <tr>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">Tanggal</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">{{ tanggal_indo(now()->toDateString()) }}</td>
    </tr>
    <tr>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">Tentang</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">Penetapan Dan Penunjukan Tim Pelaksana Penyelenggaraan (Tim Swakelola), Peserta  Pelatihan dan Pengajar / Fasilitator Pengelolaan Sumber Daya Air Terpadu (Blended Learning) pada Balai Pengembangan Kompetensi Pekerjaan Umum Dan Perumahan Rakyat  Wilayah VI Surabaya Tahun Anggaran 2024</td>
    </tr>
    <tr>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">Daftar Nama</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
        <td style="line-height: 1.5; vertical-align:top;text-align:justify"><b>Tim Pelaksana Penyelenggara</b></td>
    </tr>
  </table>
    <table class="table table-bordered peserta">
        <thead>
          <tr style="page-break-inside: avoid;">
            <th style="padding:10px;">NO</th>
            <th style="text-align:center;padding:10px;">NAMA</th>
            <th style="text-align:center;padding:10px;">MATA PELAJARAN</th>
            <th style="text-align:center;padding:10px;">JP</th>
            <th style="text-align:center;padding:10px;">KET</th>
          </tr>
        </thead>
        <tbody>
            <tr style="page-break-inside: avoid;">
                <td style="padding:10px;">1</td>
                <td style="text-align:center;padding:10px;">2</td>
                <td style="text-align:center;padding:10px;">3</td>
                <td style="text-align:center;padding:10px;">4</td>
                <td style="text-align:center;padding:10px;">5</td>
            </tr>
            <tr>
                <td colspan="5" style="background-color: #bbbcbd">I. Pengajar</td>
            </tr>
        {{-- @foreach ($data as $item) --}}
            <tr style="page-break-inside: avoid;">
            {{-- <td style="padding:10px;vertical-align:middle">{{ $item['NO'] }}</td>
            <td style="text-align:center;padding:10px;vertical-align:middle">{{ $item['NAMA'] }}</td>
            <td style="text-align:center;padding:10px;vertical-align:middle">{{ $item['MATA PELAJARAN'] }}</td>
            <td style="text-align:center;padding:10px;vertical-align:middle">{{ $item['JP'] }}</td>
            <td style="text-align:center;padding:10px;vertical-align:middle">{{ $item['KET'] }}</td> --}}
            </tr>
        {{-- @endforeach --}}
        </tbody>
    </table>
    <div class="ttd" style="display: flex; justify-content: flex-end;">
        <div class="ttd-koprodi" style="position: relative;">
          <table>
              <tr>
                  <td style="line-height: 1.5; vertical-align:top;text-align:justify">Ditetapkan di</td>
                  <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                  <td style="line-height: 1.5; vertical-align:top;text-align:justify">Surabaya</td>
              </tr>
              <tr>
                  <td style="line-height: 1.5; vertical-align:top;text-align:justify">Pada tanggal</td>
                  <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                  <td style="line-height: 1.5; vertical-align:top;text-align:justify">{{ tanggal_indo(now()->toDateString()) }}</td>
              </tr>
          </table>
          <hr>
          <br>
          <p style="margin-top: -20px; text-align:center;">Kepala <br> Balai Pengembangan Kompetensi PUPR 
              <br>Wilayah VI Surabaya
          </p>
          <p style="margin-top: 100px;text-align:center;"><b><u>Diki Zulkarnaen, ST, M.Sc.</u></b></p>
          <p style="margin-top: -10px;text-align:center;"><b>NIP. 197904182005021001</b></p>
        </div>
    </div>

    {{-- Lampiran 3 --}}
    <table style="page-break-before: always;">
      <tr>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify;">Lampiran III</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Keputusan Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya</td>
      </tr>
      <tr>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Nomor</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify;white-space: pre;">      /KPTS/Mo/{{ $pelatihan->tahun_periode }}</td>
      </tr>
      <tr>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Tanggal</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">{{ tanggal_indo(now()->toDateString()) }}</td>
      </tr>
      <tr>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Tentang</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Penetapan Dan Penunjukan Tim Pelaksana Penyelenggaraan (Tim Swakelola), Peserta  Pelatihan dan Pengajar / Fasilitator Pengelolaan Sumber Daya Air Terpadu (Blended Learning) pada Balai Pengembangan Kompetensi Pekerjaan Umum Dan Perumahan Rakyat  Wilayah VI Surabaya Tahun Anggaran 202</td>
      </tr>
      <tr>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Daftar Nama</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify"><b>Penetapan Honorarium Pelatihan</b></td>
      </tr>
    </table>
      <table class="table table-bordered peserta">
          <thead>
            <tr style="page-break-inside: avoid;">
              <th style="padding:10px;vertical-align:middle">NO</th>
              <th style="text-align:center;padding:10px;vertical-align:middle">KEDUDUKAN DALAM PELAKSANAAN DIKLAT</th>
              <th style="text-align:center;padding:10px;vertical-align:middle">BESARAN HONORARIUM <br> (Rp.)</th>
              <th style="text-align:center;padding:10px;vertical-align:middle">KETERANGAN</th>
            </tr>
            <tr style="page-break-inside: avoid;">
              <th style="padding:10px;">1</th>
              <th style="text-align:center;padding:10px;">2</th>
              <th style="text-align:center;padding:10px;">3</th>
              <th style="text-align:center;padding:10px;">4</th>
            </tr>
          </thead>
          <tbody>
          {{-- @foreach ($data as $item) --}}
              <tr style="page-break-inside: avoid;">
                  {{-- <td style="padding:10px;vertical-align:middle">{{ $item['NO'] }}</td>
                  <td style="text-align:center;padding:10px;vertical-align:middle">{{ $item['KEDUDUKAN'] }}</td>
                  <td style="text-align:center;padding:10px;vertical-align:middle">{{ $item['HONORARIUM'] }}</td>
                  <td style="text-align:center;padding:10px;vertical-align:middle">{{ $item['KETERANGAN'] }}</td> --}}
              </tr>
          {{-- @endforeach --}}
          </tbody>
      </table>
      <div class="ttd" style="display: flex; justify-content: flex-end;">
          <div class="ttd-koprodi" style="position: relative;">
            <table>
                <tr>
                    <td style="line-height: 1.5; vertical-align:top;text-align:justify">Ditetapkan di</td>
                    <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                    <td style="line-height: 1.5; vertical-align:top;text-align:justify">Surabaya</td>
                </tr>
                <tr>
                    <td style="line-height: 1.5; vertical-align:top;text-align:justify">Pada tanggal</td>
                    <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                    <td style="line-height: 1.5; vertical-align:top;text-align:justify">{{ tanggal_indo(now()->toDateString()) }}</td>
                </tr>
            </table>
            <hr>
            <br>
            <p style="margin-top: -20px; text-align:center;">Kepala <br> Balai Pengembangan Kompetensi PUPR 
                <br>Wilayah VI Surabaya
            </p>
            <p style="margin-top: 100px;text-align:center;"><b><u>Diki Zulkarnaen, ST, M.Sc.</u></b></p>
            <p style="margin-top: -10px;text-align:center;"><b>NIP. 197904182005021001</b></p>
          </div>
      </div>
    {{-- Lampiran 4 --}}
    <table style="page-break-before: always">
      <tr>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Lampiran IV</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Keputusan Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya</td>
      </tr>
      <tr>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Nomor</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify;white-space: pre;">      /KPTS/Mo/{{ $pelatihan->tahun_periode }}</td>
      </tr>
      <tr>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Tanggal</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">{{ tanggal_indo(now()->toDateString()) }}</td>
      </tr>
      <tr>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Tentang</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Penetapan Dan Penunjukan Tim Pelaksana Penyelenggaraan (Tim Swakelola), Peserta  Pelatihan dan Pengajar / Fasilitator Pengelolaan Sumber Daya Air Terpadu (Blended Learning) pada Balai Pengembangan Kompetensi Pekerjaan Umum Dan Perumahan Rakyat  Wilayah VI Surabaya Tahun Anggaran 2024</td>
      </tr>
      <tr>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Daftar Nama</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify"><b>Peserta</b></td>
      </tr>
    </table>
      <table class="table table-bordered peserta">
          <thead>
            <tr style="page-break-inside: avoid;">
              <th style="padding:10px;background-color:#bbbcbd">NO</th>
              <th style="text-align:center;padding:10px;background-color:#bbbcbd">NAMA</th>
              <th style="text-align:center;padding:10px;background-color:#bbbcbd">NIP/NRP/NIK</th>
              <th style="text-align:center;padding:10px;background-color:#bbbcbd">UNIT KERJA</th>
            </tr>
          </thead>
          <tbody>
          {{-- @foreach ($data as $item) --}}
              <tr style="page-break-inside: avoid;">
                  {{-- <td style="padding:10px;vertical-align:middle">{{ $item['NO'] }}</td>
                  <td style="text-align:center;padding:10px;vertical-align:middle">{{ $item['NAMA'] }}</td>
                  <td style="text-align:center;padding:10px;vertical-align:middle">{{ $item['NIP/NRP/NIK'] }}</td>
                  <td style="text-align:center;padding:10px;vertical-align:middle">{{ $item['UNIT KERJA'] }}</td> --}}
              </tr>
          {{-- @endforeach --}}
          </tbody>
      </table>
      <div class="ttd" style="display: flex; justify-content: flex-end;">
          <div class="ttd-koprodi" style="position: relative;">
            <table>
                <tr>
                    <td style="line-height: 1.5; vertical-align:top;text-align:justify">Ditetapkan di</td>
                    <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                    <td style="line-height: 1.5; vertical-align:top;text-align:justify">Surabaya</td>
                </tr>
                <tr>
                    <td style="line-height: 1.5; vertical-align:top;text-align:justify">Pada tanggal</td>
                    <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                    <td style="line-height: 1.5; vertical-align:top;text-align:justify">{{ tanggal_indo(now()->toDateString()) }}</td>
                </tr>
            </table>
            <hr>
            <br>
            <p style="margin-top: -20px; text-align:center;">Kepala <br> Balai Pengembangan Kompetensi PUPR 
                <br>Wilayah VI Surabaya
            </p>
            <p style="margin-top: 100px;text-align:center;"><b><u>Diki Zulkarnaen, ST, M.Sc.</u></b></p>
            <p style="margin-top: -10px;text-align:center;"><b>NIP. 197904182005021001</b></p>
          </div>
      </div>
    {{-- Lampiran 5 --}}
    <table style="page-break-before: always">
      <tr>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Lampiran V</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Keputusan Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya</td>
      </tr>
      <tr>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Nomor</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify;white-space: pre;">      /KPTS/Mo/{{ $pelatihan->tahun_periode }}</td>
      </tr>
      <tr>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Tanggal</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">{{ tanggal_indo(now()->toDateString()) }}</td>
      </tr>
      <tr>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Tentang</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Penetapan Dan Penunjukan Tim Pelaksana Penyelenggaraan (Tim Swakelola), Peserta  Pelatihan dan Pengajar / Fasilitator  Pengelolaan Sumber Daya Air Terpadu (Blended Learning) pada Balai Pengembangan Kompetensi Pekerjaan Umum Dan Perumahan Rakyat  Wilayah VI Surabaya Tahun Anggaran 2024</td>
      </tr>
      <tr>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">Daftar</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
          <td style="line-height: 1.5; vertical-align:top;text-align:justify"><b>Tugas dan Tanggung Jawab Tim Pelaksana Penyelenggara, Pengajar dan Peserta</b></td>
      </tr>
    </table>
      <table class="table table-bordered" style="border-collapse: collapse;width: 100%;">
          <ol type="I" style="">
            {{-- @foreach ($data as $item) --}}
            <tr>
                <th><li style="line-height: 1.5;list-style-type: none;text-align:left;border: 1px solid;background-color:#bbbcbd;border-collapse:collapse;">PENANGGUNGJAWAB</li></th>
            </tr>
            <tr style="page-break-inside: avoid;">
                <td style="padding:10px;vertical-align:middle;border: 1px solid;border-collapse:collapse;">Menetapkan kebijakan umum dan memberikan bimbingan serta pengarahan mengenai penyelenggaraan pelatihan di Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya Tahun Anggaran 2024 untuk administrasi dan substansi.</td>
            </tr>

            <tr>
                <th><li style="line-height: 1.5;list-style-type: none;text-align:left;border: 1px solid;background-color:#bbbcbd;border-collapse:collapse;">KETUA</li></th>
            </tr>
            <tr style="page-break-inside: avoid;">
                <td style="padding:10px;vertical-align:middle;border: 1px solid;border-collapse:collapse;">Menetapkan kebijakan umum dan memberikan bimbingan serta pengarahan mengenai penyelenggaraan pelatihan di Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya Tahun Anggaran 2024 untuk administrasi dan substansi.</td>
            </tr>

            <tr>
                <th><li style="line-height: 1.5;list-style-type: none;text-align:left;border: 1px solid;background-color:#bbbcbd;border-collapse:collapse;">SEKRETARIS</li></th>
            </tr>
            <tr style="page-break-inside: avoid;">
                <td style="padding:10px;vertical-align:middle;border: 1px solid;border-collapse:collapse;">Bertanggung jawab terhadap kesiapan dukungan sarana prasarana serta dukungan administrasi (keuangan, surat menyurat, dan lain-lain).</td>
            </tr>

            <tr>
                <th><li style="line-height: 1.5;list-style-type: none;text-align:left;border: 1px solid;background-color:#bbbcbd;border-collapse:collapse;">ANGGOTA</li></th>
            </tr>
            <tr style="page-break-inside: avoid;">
                <td style="padding:10px;vertical-align:middle;border: 1px solid;border-collapse:collapse;">
                    <ul>
                        <li style="line-height: 1.5">Menerima pendaftaran calon peserta pelatihan;</li>
                        <li style="line-height: 1.5">Menyiapkan peralatan atk dan jadwal pelatihan;</li>
                        <li style="line-height: 1.5">Mengurus administrasi pengajar/penceramah/narasumber;</li>
                        <li style="line-height: 1.5">Mempersiapkan alat bantu latihan dan penunjang lainnya;</li>
                        <li style="line-height: 1.5">Bertanggung jawab terhadap penyelenggaraan pelatihan;</li>
                        <li style="line-height: 1.5">Memantau jalannya pelaksanaan pelatihan dan menyusun laporan;</li>
                        <li style="line-height: 1.5">Melakukan survei untuk kegiatan kunjungan lapangan;</li>
                        <li style="line-height: 1.5">Menyusun data/laporan hasil pelaksanaan pelatihan;</li>
                        <li style="line-height: 1.5">Memproses dan mengirimkan sertifikat.</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <th><li style="line-height: 1.5;list-style-type: none;text-align:left;border: 1px solid;background-color:#bbbcbd;border-collapse:collapse;">PEJABAT PEMBUKA/PENUTUP/PENGARAH PELATIHAN</li></th>
            </tr>
            <tr style="page-break-inside: avoid;">
                <td style="padding:10px;vertical-align:middle;border: 1px solid;border-collapse:collapse;">
                    <ul>
                        <li style="line-height: 1.5">Melaksanakan peresmian/penutupan pelatihan;</li>
                        <li style="line-height: 1.5">Menyampaikan kebijakan pimpinan/organisasi serta usulan terkait dengan pembinaan SDM, kebijakan dan substansi diklat yang terkini.</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <th><li style="line-height: 1.5;list-style-type: none;text-align:left;border: 1px solid;background-color:#bbbcbd;border-collapse:collapse;">WIDYAISWARA/NARASUMBER/PENCERAMAH</li></th>
            </tr>
            <tr style="page-break-inside: avoid;">
                <td style="padding:10px;vertical-align:middle;border: 1px solid;border-collapse:collapse;">
                    <ul>
                        <li style="line-height: 1.5">Memberikan materi/modul sesuai kurikulum pelatihan serta pengembangannya sesuai dengan perkembangan kebijakan,teknologi, serta tuntutan stakeholders;</li>
                        <li style="line-height: 1.5">Mengikuti ketentuan lainnya dalam sistem manajemen mutu penyelenggaraan pelatihan terkait.</li>
                    </ul>
                </td>
            </tr>

            <tr>
                <th><li style="line-height: 1.5;list-style-type: none;text-align:left;border: 1px solid;background-color:#bbbcbd;border-collapse:collapse;">PESERTA PELATIHAN</li></th>
            </tr>
            <tr style="page-break-inside: avoid;">
                <td style="padding:10px;vertical-align:middle;border: 1px solid;border-collapse:collapse;">
                    <ul>
                        <li style="line-height: 1.5">Mengikuti seluruh proses kegiatan pembelajaran dengan penuh perhatian;</li>
                        <li style="line-height: 1.5">Mentaati Tata Tertib yang diberlakukan oleh Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya.</li>
                    </ul>
                </td>
            </tr>
          </ol>
          {{-- @endforeach --}}
      </table>
      <br>
      <div class="ttd" style="display: flex; justify-content: flex-end;">
          <div class="ttd-koprodi" style="position: relative;">
            <table>
                <tr>
                    <td style="line-height: 1.5; vertical-align:top;text-align:justify">Ditetapkan di</td>
                    <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                    <td style="line-height: 1.5; vertical-align:top;text-align:justify">Surabaya</td>
                </tr>
                <tr>
                    <td style="line-height: 1.5; vertical-align:top;text-align:justify">Pada tanggal</td>
                    <td style="line-height: 1.5; vertical-align:top;text-align:justify">:</td>
                    <td style="line-height: 1.5; vertical-align:top;text-align:justify">{{ tanggal_indo(now()->toDateString()) }}</td>
                </tr>
            </table>
            <hr>
            <br>
            <p style="margin-top: -20px; text-align:center;">Kepala <br> Balai Pengembangan Kompetensi PUPR 
                <br>Wilayah VI Surabaya
            </p>
            <p style="margin-top: 100px;text-align:center;"><b><u>Diki Zulkarnaen, ST, M.Sc.</u></b></p>
            <p style="margin-top: -10px;text-align:center;"><b>NIP. 197904182005021001</b></p>
          </div>
      </div>
</body>
<script>
    // window.print();
</script>

</html>