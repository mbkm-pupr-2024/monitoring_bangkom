<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            'id'=> 'U001',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        /////////////////////////////////////////////////
        DB::table('sop')->insert([
            'id'=> 'BPSDM-5.2.5_CFM.01.SOP.IK.SM01',
            'icon' => 'schedule', 
            'sop' => 'Pelaksanaan Rapat Persiapan Pelatihan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sop')->insert([
            'id'=> 'BPSDM-5.2.5_CFM.01.SOP.IK.SM02',
            'icon' => 'contact_mail',
            'sop' => 'Konfirmasi Pengajar Pengembangan Kompetensi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sop')->insert([
            'id'=> 'BPSDM-5.2.5_CFM.01.SOP.IK.SM03',
            'icon' => 'perm_contact_calender',
            'sop' => 'Konfirmasi Peserta Pengembangan Kompetensi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sop')->insert([
            'id'=> 'BPSDM-5.2.5_CFM.02.SOP.IK.SM01',
            'icon' => 'event',
            'sop' => 'Pelaksanaan Pembukaan/Penutupan Pelatihan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sop')->insert([
            'id'=> 'BPSDM-5.2.5_CFM.02.SOP.IK.SM02',
            'icon' => 'class',
            'sop' => 'Pengelolaan Piket (Pemantauan Kegiatan Belajar Mengajar)',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sop')->insert([
            'id'=> 'BPSDM-5.2.5_CFM.03.SOP.IK.SM01',
            'icon' => 'web',
            'sop' => 'Pelaksaan Monitoring dan Evaluasi Pelatihan (e-Pelatihan)',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sop')->insert([
            'id'=> 'BPSDM-5.2.5_CFM.03.SOP.IK.SM02',
            'icon' => 'question_answer',
            'sop' => 'Rapat Evaluasi Kelulusan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sop')->insert([
            'id'=> 'BPSDM-5.2.5_CFM.09.SOP.IK.03',
            'icon' => 'folder',           
            'sop' => 'Penyusunan Laporan Pelatihan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sop')->insert([
            'id'=> 'BPSDM-5.2.5_CFM.03.SOP.IK.SM04',
            'icon' => 'description',
            'sop' => 'Penerbitan Sertifikat Pelatihan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sop')->insert([
            'id'=> 'BPSDM-5.2.5_CFM.03.SOP.IK.SM05',
            'icon' => 'assignment_ind',
            'sop' => 'Penyusunan Surat Pengembalian Peserta',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        /////////////////////////////////////////////////
        DB::table('kegiatan')->insert([
            'id'=> 'K001',
            'kegiatan' => 'Penetapan peserta, pengajar, dan jadwal pelatihan',
            'deskripsi' => 'Surat penetapan peserta, pengajar, dan jadwal pelatihan ditetapkan oleh PUSBANGKOM.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K002',
            'kegiatan' => 'Penetapan jadwal rapat persiapan pelatihan',
            'deskripsi' => 'Kepala Seksi Penyelenggaraan membuat draft jadwal rapat persiapan pelatihan.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K003',
            'kegiatan' => 'Penyusunan undangan rapat persiapan pelatihan',
            'deskripsi' => 'Pranata Diklat menyusun draft undangan rapat persiapan pelatihan.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K004',
            'kegiatan' => 'Persetujuan draft undangan rapat persiapan pelatihan',
            'deskripsi' => 'Kepala Balai dan Kepala Seksi Penyelenggaraan menyetujui draft undangan rapat persiapan pelatihan yang telah disusun oleh Pranata Diklat.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K005',
            'kegiatan' => 'Pendistribusian undangan rapat persiapan pelatihan',
            'deskripsi' => 'Undangan rapat persiapan pelatihan didistribusikan kepada tim dari sie penyelenggara, tim dari sub bagian Tata Usaha dan tim dari bagian keuangan oleh Pranata Diklat.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K006',
            'kegiatan' => 'Pelaksanaan rapat persiapan pelatihan',
            'deskripsi' => 'Rapat persiapan pelatihan yang dipimpin oleh kepala seksi penyelenggaraan dihadiri oleh tim dari sie penyelenggara, tim dari sub bagian Tata Usaha dan tim dari bagian keuangan dengan menghasilkan Draft Notulen Rapat.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K007',
            'kegiatan' => 'Persetujuan notulen rapat persiapan pelatihan dan daftar ceklis pelaksanaan pelatihan',
            'deskripsi' => 'Draft notulen rapat dan daftar ceklis pelaksanaan pelatihan yang berisi sarana dan prasarana, pembagian tugas panitia, SK Penetapan dan penunjukan tim pelaksana, peserta, dan pengajar, materi/modul, lokasi PKL, surat undangan pejabat pembuka/ penutup, jadwal piket, KAK, buku pedoman, biodata peserta, bahan serahan, name tag peserta, nama table, daftar ceklis penyelenggaraan pelatihan, laporan panitia penyelenggaraan dan sambutan pejabat pembukaan/penutup oleh Pranata Diklat ditandatangani Kepala Balai dan/ atau Kepala Seksi Penyelenggaraan.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K008',
            'kegiatan' => 'Koordinasi dan penyiapan sarana prasarana pelatihan yang dibutuhkan',
            'deskripsi' => 'Koordinasi dan penyiapan sarana prasarana pelatihan sesuai dengan metode yang ditetapkan (e-learning/ distance learning, blended learning / klasikal) dilakukan antara Kepala Seksi Penyelenggaraan dan Kepala Subbagian Umum dan Tata Usaha.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K009',
            'kegiatan' => 'Pengarsipan notulen rapat persiapan',
            'deskripsi' => 'Notulen rapat, daftar ceklis pelaksanaan pelatihan diarsipkan oleh Pranata Diklat.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kegiatan')->insert([
            'id'=> 'K010',
            'kegiatan' => 'Pengkonsepan surat pemanggilan calon pengajar',
            'deskripsi' => 'Kepala Seksi Penyelenggaraan mengkonsep surat pemanggilan calon pengajar berdasarkan disposisi dari Kepala Balai terkait surat perintah (SPRINT) dari PUSBANGKOM terkait atau jadwal pelaksanaan pelatihan.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K011',
            'kegiatan' => 'Pengkonfirmasian kehadiran calon pengajar',
            'deskripsi' => 'Pranata Diklat mengkonfirmasi kehadiran Pengajar/Narasumber/Widyaiswara berdasarkan disposisi dari Kepala Seksi Penyelenggaraan.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K012',
            'kegiatan' => 'Pemeriksaan hasil laporan progress konfirmasi',
            'deskripsi' => 'Kepala Seksi Penyelenggaraan memeriksa laporan progress konfirmasi kehadiran yang dilakukan Pranata Diklat berdasarkan tanda terima/bukti distribusi surat pemanggilan calon pengajar dan laporan progres pemanggilan pengajar.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K013',
            'kegiatan' => 'Pengajuan usulan pengajar pengganti',
            'deskripsi' => 'Kepala Seksi Penyelenggaraan mengusulkan pengajar pengganti kepada Kepala Balai karena hasil laporan progres konfirmasi tidak sesuai SPRINT.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K014',
            'kegiatan' => 'Pemeriksaan usulan pengajar pengganti',
            'deskripsi' => 'Kepala Balai memeriksa usulan pengajar pengganti yang diajukan oleh Kepala Seksi Penyelenggaraan kemudian disetujui Kepala Balai.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K015',
            'kegiatan' => 'Koordinasi ke Pusbangkom untuk penerbitan SPRINT Pengajar/Narasumber/Widyaiswara pengganti',
            'deskripsi' => 'Kepala Balai berkoordinasi ke Pusbangkom untuk penerbitan SPRINT Pengajar/Narasumber/Widyaiswara pengganti jika usulan pengajar pengganti telah sesuai.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K016',
            'kegiatan' => 'Pengusulan penundaan/pembatalan jadwal pelaksaan pelatihan',
            'deskripsi' => 'Kepala Balai mengusulkan untuk menunda atau membatalkan jadwal pelaksanaan pelatihan jika usulan pengajar pengganti tidak sesuai.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K017',
            'kegiatan' => 'Pengkonfirmasian kepada Pengajar pengganti',
            'deskripsi' => 'Pranata Diklat melakukan konfirmasi kepada Pengajar pengganti sesuai SPRINT Pengajar/Narasumber/Widyaiswara pengganti berdasarkan disposisi Kepala Seksi Penyelenggaraan.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K018',
            'kegiatan' => 'Pengarsipan berkas pemanggilan pengajar',
            'deskripsi' => 'Pranata diklat mengarsipkan berkas pemanggilan pengajar.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kegiatan')->insert([
            'id'=> 'K019',
            'kegiatan' => 'Pengkonsepan surat pemanggilan calon peserta',
            'deskripsi' => 'Pranata Diklat mengkonsep surat pemanggilan calon peserta sesuai berdasarkan surat perintah (SPRINT) dari PUSBANGKOM terkait atau jadwal pelaksanaan berdasarkan disposisi dari Kepala Seksi Penyelenggaraan.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K020',
            'kegiatan' => 'Pengkoreksian konsep surat pemanggilan peserta',
            'deskripsi' => 'Kepala Seksi Penyelenggaraan melakukan koreksi terhadap konsep surat pemanggilan peserta yang dibuat oleh Pranata Diklat.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K021',
            'kegiatan' => 'Penyetujuan konsep surat pemanggilan calon peserta',
            'deskripsi' => 'Kepala Balai mengkoreksi dan menyetujui dengan menandatangani konsep surat pemanggilan calon peserta.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K022',
            'kegiatan' => 'Pemanggilan Peserta',
            'deskripsi' => 'Pranata Diklat melakukan pemanggilan peserta dan mendistribusikan kepada unit kerja pengusul/calon peserta sesuai penugasan dari Kepala Seksi Penyelenggaraan.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K023',
            'kegiatan' => 'Pemeriksaan hasil laporan progres pemanggilan peserta',
            'deskripsi' => 'Kepala Seksi Penyelenggaraan memeriksa tanda terima/bukti distribusi surat pemanggilan calon peserta dan laporan progres pemanggilan peserta yang dilakukan Pranata Diklat.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K024',
            'kegiatan' => 'Persiapan surat usulan peserta cadangan',
            'deskripsi' => 'Kepala Seksi Penyelenggaraan menyiapkan surat usulan peserta cadangan jika laporan progres pemanggilan peserta tidak sesuai.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K025',
            'kegiatan' => 'Pemeriksaan surat usulan peserta cadangan',
            'deskripsi' => 'Kepala Balai memeriksa surat usulan peserta cadangan dan menyetujui usulan calon peserta cadangan.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K026',
            'kegiatan' => 'Penerbitan SPRINT calon peserta tambahan',
            'deskripsi' => 'Kepala Balai melakukan koordinasi ke PUSBANGKOM untuk penerbitan SPRINT calon peserta tambahan.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K027',
            'kegiatan' => 'Pemanggilan calon peserta tambahan',
            'deskripsi' => 'Pranata Diklat melakukan pemanggilan peserta tambahan dan melaporkannya sesuai penugasan dari Kepala Seksi Penyelenggaraan.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K028',
            'kegiatan' => 'Pemeriksaan dan pemutusan laporan progres pemanggilan peserta tambahan',
            'deskripsi' => 'Kepala Balai memeriksa tanda terima/bukti distribusi surat pemanggilan calon peserta tambahan dan laporan progres pemanggilan peserta tambahan yang dilakukan Pranata Diklat dan memutuskan "lanjut atau tidak" kegiatan.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K029',
            'kegiatan' => 'Penundaan/Pembatalan Pengembangan Kompetensi',
            'deskripsi' => 'Kepala Balai melakukan penundaan atau pembatalan kegiatan pengembangan kompetensi jika memutuskan tidak lanjutnya kegiatan berdasarkan pemeriksaan laporan progres pemanggilan peserta tambahan.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K030',
            'kegiatan' => 'Pengarsipan berkas pemanggilan peserta',
            'deskripsi' => 'Pranata Diklat mengarsipkan berkas pemanggilan calon peserta.',
            'sop' => 'BPSDM-5.2.5_CFM.01.SOP.IK.SM03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kegiatan')->insert([
            'id'=> 'K031',
            'kegiatan' => 'Persiapan sarana dan prasarana kegiatan pembukaan/penutupan pelatihan',
            'deskripsi' => 'Berkas pembukaan/penutupan (tanda terima surat pengembalian peserta, ceklis sarana prasarana, laporan pembukaan/penutupan, daftar undangan) disiapkan oleh Pranata Diklat berdasarkan disposisi dari Kepala Seksi penyelenggaraan.',
            'sop' => 'BPSDM-5.2.5_CFM.02.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K032',
            'kegiatan' => 'Pemeriksaan kesesuaian kesiapan pelaksanaan pembukaan/penutupan',
            'deskripsi' => 'Pemeriksaan kesesuaian kesiapan pelaksanaan pembukaan/penutupan dilakukan oleh Kepala Seksi Penyelenggaraan.',
            'sop' => 'BPSDM-5.2.5_CFM.02.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K033',
            'kegiatan' => 'Pelaksanaan upacara pembukaan/penutupan',
            'deskripsi' => 'Upacara pembukaan/penutupan yang dipimpin Kepala Balai terlaksana sesuai susunan acara.',
            'sop' => 'BPSDM-5.2.5_CFM.02.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K034',
            'kegiatan' => 'Dokumentasi dan publikasi',
            'deskripsi' => 'Pranata Diklat mendokumentasi dan mempublikasi kegiatan pembukaan/penutupan pelatihan.',
            'sop' => 'BPSDM-5.2.5_CFM.02.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kegiatan')->insert([
            'id'=> 'K035',
            'kegiatan' => 'Penyusunan jadwal pelaksanaan piket setiap pelatihan',
            'deskripsi' => 'Jadwal piket dibentuk oleh Kepala Seksi Penyelenggaraan.',
            'sop' => 'BPSDM-5.2.5_CFM.02.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K036',
            'kegiatan' => 'Penyusunan jadwal piket',
            'deskripsi' => 'Pranata Diklat menyusun jadwal piket berdasarkan jadwal piket yang dibentuk oleh Kepala Seksi Penyelenggaraan.',
            'sop' => 'BPSDM-5.2.5_CFM.02.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K037',
            'kegiatan' => 'Persiapan formulir pemantauan piket dan pelaksanaaan pemantauan piket',
            'deskripsi' => 'Pranata Diklat menyiapkan formulir pemantauan piket untuk pelaksanaan pemantauan piket, serta melaporkan hasil pemantauan piket kepada Kepala Seksi Penyelenggaraan.',
            'sop' => 'BPSDM-5.2.5_CFM.02.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K038',
            'kegiatan' => 'Penyusunan laporan hasil pemantauan piket',
            'deskripsi' => 'Kepala Seksi Penyelenggaraan menyusun laporan hasil pemantauan piket dan melaporkan kepada Kepala Balai (Laporan ketidaksesuaian).',
            'sop' => 'BPSDM-5.2.5_CFM.02.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K039',
            'kegiatan' => 'Pemeriksaan laporan hasil pemantauan piket',
            'deskripsi' => 'Kepala Balai memeriksa dan mengevaluasi laporan hasil pemantauan piket.',
            'sop' => 'BPSDM-5.2.5_CFM.02.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K040',
            'kegiatan' => 'Penyimpanan hasil laporan pemantauan piket',
            'deskripsi' => 'Laporan hasil pemantauan piket disimpan oleh Pranata Diklat.',
            'sop' => 'BPSDM-5.2.5_CFM.02.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kegiatan')->insert([
            'id'=> 'K041',
            'kegiatan' => 'Penetapan SK Pembentukan Tim Monitoring dan Evaluasi Pelatihan',
            'deskripsi' => 'SK Pembentukan Tim Monitoring dan Evaluasi Pelatihan ditetapkan oleh Kepala Balai.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K042',
            'kegiatan' => 'Pengaksesan aplikasi E-Pelatihan oleh Tim Monitoring dan Evaluasi',
            'deskripsi' => 'Tim Monitoring dan Evaluasi menerima password dan dapat mengakses aplikasi E-Pelatihan. ',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K043',
            'kegiatan' => 'Pembuatan Jadwal Pelaksanaan monitoring dan evaluasi serta form-form evaluasi',
            'deskripsi' => 'Jadwal Pelaksanaan monitoring dan evaluasi serta form-form evaluasi terkait materi pelatihan, pengajar, manajemen penyelenggaraan pelatihan, dan peserta pelatihan disiapkan oleh Tim Monitoring dan Evaluasi.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K044',
            'kegiatan' => 'Penginputan formulir E-Pelatihan oleh peserta',
            'deskripsi' => 'Peserta mengisi formulir E-Pelatihan yang digunakan dalam monitoring dan evaluasi.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K045',
            'kegiatan' => 'Penyusunan laporan hasil monitoring dan evaluasi',
            'deskripsi' => 'Draft laporan penyelenggaraan monitoring dan evaluasi dan rekomendasi tindakan perbaikan yang diperlukan untuk pelatihan mendatang  disusun oleh Tim Monitoring dan Evaluasi.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K046',
            'kegiatan' => 'Penyampaian laporan hasil monitoring dan evaluasi masing-masing pelatihan',
            'deskripsi' => 'Draft laporan penyelenggaraan monitoring dan evaluasi dan rekomendasi tindakan perbaikan oleh Tim Monitoring dan Evaluasi disampaikan ke Kepala Balai dengan persetujuan Kepala Seksi Penyelenggaraan.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K047',
            'kegiatan' => 'Verifikasi hasil monitoring dan evaluasi serta pemberian saran dan masukan terkait monitoring evaluasi (bila ada)',
            'deskripsi' => 'Laporan penyelenggaraan monitoring dan evaluasi dan rekomendasi tindakan perbaikan ditandatangani oleh Kepala Balai.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K048',
            'kegiatan' => 'Pengarsipan laporan monitoring dan evaluasi',
            'deskripsi' => 'Laporan penyelenggaraan monitoring dan evaluasi dengan tandatangan Kepala Balai diarsip.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kegiatan')->insert([
            'id'=> 'K049',
            'kegiatan' => 'Penyusunan konsep kegiatan rapat evaluasi kelulusan',
            'deskripsi' => 'Kepala Seksi Penyelenggaraan menyusun konsep kegiatan rapat evaluasi kelulusan berdasarkan disposisi dari Kepala Balai untuk mempersiapkan rapat evaluasi kelulusan peserta pengembangan kompetensi dan menugaskan Pelaksana terkait untuk mengumpulkan bahan rapat evaluasi kelulusan.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K050',
            'kegiatan' => 'Pengumpulan bahan rapat evaluasi kelulusan',
            'deskripsi' => 'Pranata Diklat mempelajari peraturan terkait kegiatan rapat evaluasi kelulusan dan mengumpulkan bahan rapat evaluasi kelulusan antara lain, hasil rekap nilai seluruh pengajar, rekap absensi peserta, hasil pemantauan piket kelas berdasarkan disposisi dari Kepala Seksi Penyelenggaraan.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K051',
            'kegiatan' => 'Pelaksanaan rapat evaluasi kelulusan',
            'deskripsi' => 'Terlaksananya rapat evaluasi kelulusan, yaitu penyampaian materi rapat evaluasi kelulusan oleh Kepala Seksi Penyelenggaraan dan pemberian masukan dan penilaian serta keputusan terhadap hasil rapat evaluasi kelulusan oleh Kepala Balai.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K052',
            'kegiatan' => 'Penyusunan konsep notulen rapat evaluasi kelulusan',
            'deskripsi' => 'Konsep notulen rapat evaluasi kelulusan disusun oleh Pranata Diklat.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K053',
            'kegiatan' => 'Pemeriksaan dan pengesahan konsep notulen rapat evaluasi kelulusan',
            'deskripsi' => 'Konsep notulen rapat diperiksa dan disetujui oleh Kepala Seksi Penyelenggaraan dan Kepala Balai.
            ',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K054',
            'kegiatan' => 'Pengarsipan notulen rapat',
            'deskripsi' => 'Notulen rapat digandakan, didistribusikan dan diarsipkan oleh Pranata Diklat.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM02',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kegiatan')->insert([
            'id'=> 'K055',
            'kegiatan' => 'Pengumpulan kebutuhan data',
            'deskripsi' => 'Pranata Diklat mengumpulkan kebutuhan data sebagai lampiran laporan pelatihan, antara lain SK penyelenggaraan, buku panduan, biodata peserta, biodata pengajar, hasil evaluasi dari e-pelatihan/Sibangkoman, salinan STTP dan/atau sertifikat (bila ada), dan dokumentasi pelatihan.',
            'sop' => 'BPSDM-5.2.5_CFM.09.SOP.IK.03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K056',
            'kegiatan' => 'Penyusunan laporan penyelenggaraan pelatihan',
            'deskripsi' => 'Pranata Diklat menyusun laporan penyelenggaraan dan dikoreksi disertai paraf Kepala Seksi Penyelenggaraan.',
            'sop' => 'BPSDM-5.2.5_CFM.09.SOP.IK.03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K057',
            'kegiatan' => 'Perbaikan dan finalisasi laporan penyelenggaraan pelatihan',
            'deskripsi' => 'Pranata Diklat memperbaiki dan menyelesaikan laporan penyelenggaraan serta ditandatangani oleh Kepala Balai.',
            'sop' => 'BPSDM-5.2.5_CFM.09.SOP.IK.03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K058',
            'kegiatan' => 'Pengarsipan laporan penyelenggaraan',
            'deskripsi' => 'Pranata Diklat menggandakan laporan untuk arsip balai dan yang lain untuk dikirim ke Pusbangkom.',
            'sop' => 'BPSDM-5.2.5_CFM.09.SOP.IK.03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K059',
            'kegiatan' => 'Pemindaian dan pengunggahan laporan penyelenggaraan pelatihan',
            'deskripsi' => 'Pranata Diklat memindai dan mengunggah laporan penyelenggaraan pelatihan di e-pelatihan/Sibangkoman.',
            'sop' => 'BPSDM-5.2.5_CFM.09.SOP.IK.03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K060',
            'kegiatan' => 'Pendistribusian salinan laporan penyelenggaraan pelatihan',
            'deskripsi' => 'Pusbangkom mendistribusikan salinan laporan penyelenggaraan pelatihan yang telah diupload di e-pelatihan/Sibangkoman.',
            'sop' => 'BPSDM-5.2.5_CFM.09.SOP.IK.03',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kegiatan')->insert([
            'id'=> 'K061',
            'kegiatan' => 'Pelaksanaan rapat evaluasi kelulusan peserta',
            'deskripsi' => 'Kepala Pusbangkom mengadakan rapat evaluasi kelulusan peserta dan menetapkan surat penetapan peserta pelatihan, jadwal pembelajaran, dan penugasan pengajar.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM04',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K062',
            'kegiatan' => 'Penginputan data nilai peserta pelatihan',
            'deskripsi' => 'Kepala Balai menginputkan nilai peserta pelatihan secara online.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM04',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K063',
            'kegiatan' => 'Pengajuan nomor sertifikat',
            'deskripsi' => 'Pranata Diklat mengajukan nomor sertifikat secara online dengan  persetujuan dari Kepala Seksi Penyelenggaraan.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM04',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K064',
            'kegiatan' => 'Penerbitan nomor pelatihan sertifikat',
            'deskripsi' => 'Kepala Pusbangkom menerbitkan nomor pelatihan sertifikat berdasarkan undangan dari Kepala Pusbangkom/surat dari Kepala Balai.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM04',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K065',
            'kegiatan' => 'Pengunggahan berita acara kelulusan peserta evaluasi pelatihan',
            'deskripsi' => 'Pranata Diklat mengunggah berita acara kelulusan peserta evaluasi pelatihan ke website e-pelatihan.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM04',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K066',
            'kegiatan' => 'Pengajuan TTE sertifikat',
            'deskripsi' => 'Pranata Diklat mengajukan TTE sertifikat kepada Pusbangkom terkait pada website e-pelatihan/Sibangkoman.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM04',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K067',
            'kegiatan' => 'Pengoreksian dan persetujuan proses TTE sertifikat',
            'deskripsi' => 'Pranata Diklat mengoreksi dan menyetujui proses TTE sertifikat kepada Pusbangkom untuk diteruskan kepada Kepala BPSDM.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM04',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K068',
            'kegiatan' => 'Penandatanganan sertifikat pelatihan elektronik',
            'deskripsi' => 'Pranata Diklat menandatangani sertifikat pelatihan elektronik.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM04',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K069',
            'kegiatan' => 'Pemeriksaan kebutuhan koordinasi dengan pihak lain diluar BPSDM',
            'deskripsi' => 'Kepala Seksi Penyelenggaraan melakukan pemeriksaan kebutuhan koordinasi dengan pihak lain diluar BPSDM.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM04',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K070',
            'kegiatan' => 'Koordinasi Pelaksanaan Kunjungan Lapangan dan/atau Koordinasi dengan Asosiasi pemberi sertifikasi',
            'deskripsi' => 'Pranata diklat melakukan Koordinasi Pelaksanaan Kunjungan Lapangan dan/atau Koordinasi dengan Asosiasi pemberi sertifikasi untuk tata cara dan persyaratan sertifikasi keahlian (bila ada).',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM04',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K071',
            'kegiatan' => 'Persiapan sarana dan prasarana pelatihan',
            'deskripsi' => 'Kepala Subbagian Umum dan Tata Usaha menyiapkan sarana dan prasarana pelatihan dengan metode virtual maupun klasikal, menyiapkan akomodasi dan transportasi pengajar, training kit peserta, dan rencana konsumsi.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM04',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kegiatan')->insert([
            'id'=> 'K072',
            'kegiatan' => 'Pembuatan Konsep Surat Pemulangan peserta pelatihan',
            'deskripsi' => 'Pranata Diklat membuat konsep surat pemulangan peserta pelatihan berdasarkan arahan dari kepala seksi penyelenggaraan.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM05',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K073',
            'kegiatan' => 'Pemeriksaan konsep surat pemulangan peserta',
            'deskripsi' => 'Kepala Seksi Penyelenggaraan memeriksa konsep surat pemulangan peserta pelatihan yang telah dikonsep oleh Pranata Diklat kemudian melaporkan ke Kepala Balai.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM05',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K074',
            'kegiatan' => 'Pemeriksaan dan pemvalidasian surat pemulangan peserta pelatihan',
            'deskripsi' => 'Surat pemulangan peserta pelatihan divalidasi oleh Kepala Balai.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM05',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K075',
            'kegiatan' => 'Penyerahan surat pemulangan peserta',
            'deskripsi' => 'Pranata Diklat menyerahkan surat pemulangan yang telah divalidasi ke peserta pelatihan.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM05',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('kegiatan')->insert([
            'id'=> 'K076',
            'kegiatan' => 'Pengarsipan surat pemulangan peserta pelatihan',
            'deskripsi' => 'Surat pemulangan peserta pelatihan yang telah divalidasi diarsipkan oleh Pranata Diklat.',
            'sop' => 'BPSDM-5.2.5_CFM.03.SOP.IK.SM05',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        /////////////////////////////////////////////
        DB::table('bidang_pelatihan')->insert([
            'id'=> 'JP001',
            'gambar' => 'sda.png',
            'bidang_pelatihan' => 'Bidang SDA & Permukiman',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('bidang_pelatihan')->insert([
            'id'=> 'JP002',
            'gambar' => 'permukiman.png',
            'bidang_pelatihan' => 'Bidang Permukiman',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('bidang_pelatihan')->insert([
            'id'=> 'JP003',
            'gambar' => 'jalan.png',
            'bidang_pelatihan' => 'Bidang Jalan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('bidang_pelatihan')->insert([
            'id'=> 'JP004',
            'gambar' => 'perumahan.png',
            'bidang_pelatihan' => 'Bidang Perumahan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('bidang_pelatihan')->insert([
            'id'=> 'JP005',
            'gambar' => 'infrastruktur.png',
            'bidang_pelatihan' => 'Bidang Pengembangan Infrastruktur Wilayah',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('bidang_pelatihan')->insert([
            'id'=> 'JP006',
            'gambar' => 'manajemen.png',
            'bidang_pelatihan' => 'Bidang Pengembangan Manajemen',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('bidang_pelatihan')->insert([
            'id'=> 'JP007',
            'gambar' => 'konstruksi.png',
            'bidang_pelatihan' => 'Bidang Pengembangan Konstruksi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        /////////////////////////////////////////////

        // DB::table('pelatihan')->insert([
        //     'id'=> 'P001',
        //     'pelatihan' => 'Pengembangan Kompetensi Pengelolaan Keuangan Daerah',
        //     'bidang_pelatihan' => 'JP001',
        //     'tanggal_mulai' => '2021-01-01',
        //     'tanggal_selesai' => '2021-01-01',
        // ]);

        // DB::table('status')->insert([
        //     'id'=> 'S001',
        //     'status' => 'Sedang berlangsung',
        //     'pelatihan' => 'P001',
    }
}
