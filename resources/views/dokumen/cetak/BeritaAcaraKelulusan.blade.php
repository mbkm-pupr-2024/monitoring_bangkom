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
    
  <title>Berita Acara Kelulusan</title>
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
        <h4 style="text-align: center">BERITA ACARA RAPAT EVALUASI KELULUSAN</h4>
        <h4 style="text-align: center">{{ strtoupper($pelatihan->nama) }}</h4>
        <h4 style="text-align: center">(<i>{{ strtoupper($pelatihan->model_pelatihan->nama) }}</i>)</h4>

        <h4 style="text-align: center;white-space: pre;">NOMOR  :       /BA-Mo/2024</h4>

        
      </div>
      <div class="isi-surat">
        <p>Pada hari ini Rabu tanggal Dua Puluh Delapan bulan Maret tahun Dua Ribu Dua Puluh Empat, kami:</p>
        <ol>
            <li>Dr. Ir. Sri Hartoyo, M.E., Dipl.SE (NIP. 195805311986031002) selaku Widyaiswara Ahli Utama Sekretariat BPSDM;</li>
            <li>Nugroho Wuritomo, S.T., M.T. (NIP. 197601222005021001) selaku Kepala Bidang Manajemen Sistem dan Pelaksanaan Pengembangan Kompetensi, Pusbangkom Jalan, Perumahan dan Pengembangan Infrastruktur Wilayah;</li>
            <li>Alfan Bramestia, SE., M.A. (NIP.198603212009121001) selaku Kasi Penyelenggara Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya.</li>
        </ol>
        <p>
            Telah melaksanakan rapat evaluasi kelulusan Peserta {{ ucwords($pelatihan->nama) }} ({{ $pelatihan->model_pelatihan->nama }}) yang dilaksanakan oleh Balai Pengembangan Kompetensi PUPR Wilayah VI Surabaya pada tanggal {{ rentang_tgl($pelatihan->tanggal_mulai, $pelatihan->tanggal_selesai) }} dengan hasil sebagai berikut :
            <ol>
                <li>Jumlah peserta pelatihan sebanyak 30 (tiga puluh) orang;</li>
                <li>Sebanyak 3 (tiga) orang lulus dengan predikat “memuaskan”;</li>
                <li>Sebanyak 24 (dua puluh empat) orang lulus dengan predikat “baik sekali”;</li>
                <li>Sebanyak 3 (tiga) orang lulus dengan predikat “baik”.</li>
            </ol>
            Demikian Berita Acara ini dibuat dengan sesungguhnya untuk dapat dipergunakan sebagaimana mestinya.
        </p>

        <h3 style="text-align: center">MENYETUJUI</h3>
        <table>
            <tr>
                <td>No.</td>
                <td>Nama Lengkap</td>
                <td>Jabatan</td>
                <td>Unit Kerja</td>
                <td>Tanda Tangan</td>
            </tr>
        </table>

      </div>
    </div>
  </div>
</body>
<script>
    // window.print();
</script>

</html>