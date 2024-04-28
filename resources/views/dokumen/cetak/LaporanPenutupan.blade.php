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
    
  <title>Laporan Penutup</title>
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
    <div class="isi">
      <div class="judul">
        <h3 style="text-align: center">LAPORAN PENUTUPAN PELAKSANAAN</h3>
        <h4 style="text-align: center;">{{ strtoupper($pelatihan->nama) }} SECARA {{ strtoupper($pelatihan->model_pelatihan->nama) }}</h4>
      </div>
      <div class="isi-surat">
        <p style="margin-bottom: 20px; text-align:right;">Surabaya, {{ tanggal_indo(now()->toDateString()) }}
        </p>
        <p>
            <b>Kepada yang selalu kami banggakan Plt. Kepala Badan Pengembangan SDM:</b>
            <br>
            Dr. Dadang Rukmana, S.H., CES., DEA.
        </p>
        <p>
            <b>Kepada Yth :</b>
            <ul>
                <li>Kepala Pusat Pengembangan Kompetensi Manajemen diwakili oleh Kepala Bidang Manajemen Sistem dan Pelaksanaan Pengembangan Kompetensi :  <b>R.J. Catherine I. Sihombing, S.Sos., M.I.Kom.</b></li>
                <li>Kepala Balai Pengembangan Kompetensi Pekerjaan Umum Wilayah IV Surabaya : <b>Diki Zulkarnaen, ST.,M.Sc.</b></li>
            </ul>
        </p>
        <p>
            <b>Yang kami hormati: </b>
            <ul>
                <li>Para Pejabat Administrator dan Pengawas di lingkungan BPSDM Kementerian PUPR;</li>
                <li>Para Pengajar Ika Harini Pirenaningtias Sastrosoebroto S.Sos.;</li>
                <li>Agnes Hapsari Indrwati;</li>
                <li>Andri Nooriman;</li>
                <li>Burhanuddin Abe;</li>
                <li>Muhammad Abi Al-Haq;</li>
                <li>Devianti Anggraini;</li>
                <li>Para Panitia dan Peserta pelatihan.</li>
            </ul>
        </p>
        <p>Bismillaahirrohmaanirrahim</p>
        <p>Assalamu’alaikum Wr. Wb.</p>
        <p>Selamat Sore, Salam sejahtera bagi kita semua,</p>
        <p>
            Pertama-tama marilah kita panjatkan puji syukur kehadirat Allah SWT karena atas perkenan-Nya, pada hari ini <b>Jum’at, 05 April 2024 </b> kita dapat hadir di sini diberikan nikmat sehat dan kesempatan, sehingga masih dapat mengikuti acara <b>Penutupan </b> {{ ucwords($pelatihan->nama) }} yang dilaksanakan secara {{ ucwords($pelatihan->model_pelatihan->nama) }}. 
        </p>
        <p>
            Selanjutnya Perkenankanlah kami melaporkan penyelenggaraan sebagai berikut :
        </p>

        <ol type="A">
            <li>DASAR HUKUM PENYELENGGARAAN PELATIHAN
                <ol type="1"> 
                    <li>Undang-Undang Republik Indonesia Nomor 20 Tahun 2023 tentang Aparatur Sipil Negara; </li>
                    <li>Peraturan Pemerintah Nomor 17 Tahun 2020 tentang Perubahan Peraturan Pemerintah Nomor 11 Tahun 2017 tentang Manajemen Pegawai Negeri Sipil;</li>
                    <li>Peraturan Menteri Pekerjaan Umum Dan Perumahan Rakyat Republik Indonesia Nomor 15 Tahun 2020 Tentang Penyelenggaraan Layanan Informasi Publik;</li>
                    <li>Surat Edaran Sekretaris Jenderal Selaku Atasan Pejabat Pengelola Informasi dan Dokumentasi Nomor 04/SE/SJ/2019 tentang Pedoman Penyelenggaraan Layanan Informasi Publik Di Kementerian Pekerjaan Umum dan Perumahan Rakyat;</li>
                    <li>Surat Edaran Menteri Pekerjaan Umum dan Perumahan Rakyat Nomor 06/SE/M/2021 Tahun 2021 tentang Panduan Aplikasi Identitas Visual Komunikasi Publik Kementerian Pekerjaan Umum dan Perumahan Rakyat;</li>
                    <li>Peraturan Menteri PUPR Nomor 2 tahun 2023 tentang Pengembangan Kompetensi Pegawai Aparatur Sipil Negara;</li>                    <li>Peraturan LAN Nomor 10 Tahun 2018 tentang Pengembangan Kompetensi Pegawai Negeri Sipil;</li>
                    <li>Surat Kepala Pusat Pengembangan Kompetensi Manajemen Nomor SM 0304-Mf/438 tanggal 21 Maret 2024 Hal Penetapan Peserta dan Pengajar Pelatihan Manajemen Komunikasi Publik T.A 2024.</li>
                </ol>
            </li>
            <li>PESERTA PELATIHAN
                <p>Peserta pelatihan berjumlah 25 orang mengikuti pelatihan. Keseluruhan calon peserta tersebut berasal dari seluruh unit kerja Lingkungan Kementerian PUPR.</p>
            </li>
            <li>KEGIATAN PELATIHAN
                <p>Pelatihan diselenggarakan tanggal 01 s.d 05 April 2024 dilaksanakan dengan model pembelajaran Klasikal.</p>
            </li>
            <li>EVALUASI PELATIHAN
                <p>Evaluasi dilakukan terhadap: kehadiran peserta, Evaluasi manajemen dan proses belajar. Adapun rekapitulasi hasil evaluasi dimaksud adalah sebagai berikut:</p>
                <ol type="a">
                    <li>Kehadiran Peserta
                        <p>Peserta yang hadir mengikuti pelatihan dari awal sampai akhir sebanyak 25 orang yang terdiri dari 13 orang laki-laki dan 12 orang Perempuan. Keseluruhan peserta berasal dari Lingkungan Kementerian PUPR.</p>
                    </li>
                    <li>Evaluasi Manajemen:
                        <p>Evaluasi terhadap manajemen dilakukan untuk mengetahui tingkat keberhasilan pembelajaran yang dilaksanakan oleh penyelenggara secara langsung. Rekap hasil evaluasi manajemen sebagai berikut:</p>
                        <ol type="1">
                            <li>Tata Laksana Pelatihan: cukup 4.17%, tinggi 48.96%, sangat tinggi 46.88%</li>
                            <li>Ruang Belajar Termasuk Ruang Terbuka: cukup 8.33%, tinggi 41.67%, sangat tinggi 50.00%</li>
                            <li>Ruang Asrama/Penginapan; cukup 11.81%, tinggi 52.78%, sangat tinggi 35.42% </li>
                            <li>Konsumsi Termasuk Fasilitas Umum; rendah 1,05%, kurang 2.11%, cukup 9.47%, tinggi 54.74%, sangat tinggi 32.63%</li>
                            <li>Pelayanan Kesehatan, Transportasi, serta Rekreasi dan Hiburan; cukup 7.37%, tinggi 47.37%, sangat tinggi 45.26%</li>
                            <li>Fasilitas Alat Pendukung; cukup 12.50%, tinggi 50.00%, sangat tinggi 37.50%</li>
                        </ol>
                    </li>
                    <li>Evaluasi Proses Belajar
                        <p>Berdasarkan rekap hasil evaluasi terhadap peserta dari unsur-unsur yang dinilai baik akademik maupun non akademik peserta Pelatihan Manajemen Komunikasi Publik secara keseluruhan dinyatakan lulus.</p>
                        <p>Adapun 3 peserta terbaik pada Pelatihan Manajemen Komunikasi Publik adalah sebagai berikut:</p>
                        <p>Peringkat 1 diraih oleh Azhari, ST., MT dari Balai Pelaksanaan Jalan Nasional Nusa Tenggara Timur dengan nilai <b>86,18 (Memuaskan)</b></p>
                        <p>Peringkat 2 diraih oleh Andria Muharami Fitra, ST., M.Eng.Sc dari Balai Pelaksanaan Jalan Nasional Nusa Tenggara Timur dengan nilai<b>85,22 (Memuaskan)</b></p>
                        <p>Peringkat 3 diraih oleh Adestya Bismandoko Haryantono Putra, SE., M.Ak dari Pusat Pengembangan Kompetensi Manajemen dengan nilai<b>84,52 (Baik Sekali)</b></p>
                    </li>
                </ol>
                
            </li>
            <p>Sebelum saya akhiri, izinkan saya menyampaikan pantun terlebih dahulu:</p>
            <p><b>
                JUMPA KAWAN LAMA BERNAMA ARJUNA<br>
                MAKAN KUDAPAN SAMBIL MELIHAT TABEBUYA<br>
                PURNA SUDAH PELATIHAN INI TERLAKSANA<br>
                SEMOGA PELATIHAN MANAJEMEN KOMUNIKASI PUBLIK MEMBAWA MANFAAT UNTUK SEMUA
            </b></p>
            <li>PENUTUP
                <p>
                    Demikian laporan yang dapat kami sampaikan pada sore hari ini, dan kepada <b>Kepala Pusat Pengembangan Kompetensi Manajemen</b> diwakili oleh <b>Kepala Bidang Manajemen Sistem dan Pelaksanaan Pengembangan Kompetensi : R.J. Catherine I. Sihombing, S.Sos., M.I.Kom.</b> dengan hormat kami mohon untuk memberikan sambutan sekaligus menutup pelatihan ini secara resmi. Terimakasih.
                </p>
            </li>
        </ol>
        <p>
            <i>Wabilahitaufiq walhidayah</i>
            <br>
            <i>Wassalamu’alaikum Wr. Wb.</i>
        </p>
      </div>
    </div>
  </div>
</body>
<script>
    // window.print();
</script>

</html>