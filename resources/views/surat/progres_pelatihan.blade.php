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
  <title>Report Progress</title>
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
      <div class="judul" style="text-align: center;">
        <h3>SURAT KETERANGAN</h3>
        <h3 style="border-bottom: 1px solid black; width: fit-content; margin: auto;">PROGRES PELAKSANAAN PELATIHAN</h3>
        <p style="margin-top: 5px;">Nomor: 234/Un.03/B.II/KM.02.4/08/2022</p>
      </div>
      <div class="isi-surat">
        @php
          $pointer = 0;
        @endphp
        <ul>
          @foreach($sop_kegiatans as $sop_kegiatan)
            <li>
              <h4 style="margin-bottom: 1px;">{{ $sop_kegiatan[0]->sop->judul }}</h4>
              <table width="90%">
                @foreach ($sop_kegiatan as $kegiatan )
                <tr>
                  <td width="400px">{{ $kegiatan->nama }}</td>
                  <td>:</td>
                  <td style="text-align: right;">
                    @if ($detil_status->contains('id_kegiatan_sop', $kegiatan->id))
                      [ ✔ ]
                    @else
                      [ X ]
                    @endif
                  </td>
                </tr>
                @endforeach
              </table>

              <!-- Model 2 -->
              <!-- <table width="90%">
                @foreach ($sop_kegiatan as $kegiatan )
                  @if ($detil_status->contains('id_kegiatan_sop', $kegiatan->id))
                    <tr>
                      <td width="400px">{{ $kegiatan->nama }}</td>
                      <td>:</td>
                      <td style="text-align: right;">[ ✔ ]</td>
                    </tr>
                  @endif
                @endforeach
              </table> -->
            </li>
          @endforeach
        </ul>
        <p>Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya, atas perhatian dan kerjasama
          yang baik disampaikan terimakasih.</p>
      </div>
    </div>
    <div class="ttd" style="display: flex; justify-content: flex-end;">
      <div class="ttd-koprodi" style="position: relative;">
        <p style="margin-bottom: 20px;">Bangkalan, 17 Agustus 1945/p>
        <p style="margin-top: -20px;">a.n. Rektor<br>Kepala Biro Administrasi Akademik, <br>Kemahasiswaan, dan Kerjasama
        </p>
        <p style="margin-top: 100px;">Dr. Eng. Mohammad Javier</p>
        <p style="margin-top: -20px;">NIP. 123456789</p>
      </div>
    </div>
  </div>
</body>
<script>
  // window.print();
</script>

</html>