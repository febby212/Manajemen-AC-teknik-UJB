<?php

namespace Database\Seeders;

use App\Models\Solusi;
use CsHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SolusiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kd_penyakit' => 'P001',
                'nama_penyakit' => 'Freon ',
                'solusi' => 'Lakukan pemeriksaan menyeluruh pada AC, jika ada kebocoran, lakukan perbaikan atau penggantian pipa yang bocor. Setelah itu lakukan pengisian ulang freon sesuai dengan spesifikasi yang disarankan oleh pabrikan AC.',
            ],
            [
                'kd_penyakit' => 'P002',
                'nama_penyakit' => 'Gangguan Modul',
                'solusi' => 'Lakukan inspeksi menyeluruh terhadap modul AC untuk mengidentifikasi masalah seperti korsleting listrik, kerusakan komponen, atau gangguan sirkuit. Dalam proses perbaikan gunakan komponen yang sesuai dengan spesifikasi modul AC.',
            ],
            [
                'kd_penyakit' => 'P003',
                'nama_penyakit' => 'Kompresor',
                'solusi' => 'Periksa tegangan listrik yang diterima oleh kompresor, lakukan pemeriksaan visual terhadap kompresor AC, periksa suhu operasional kompresor, periksa tingkat pelumas pada kompesor. Jika masih ditemukan masalah, ganti bagian-bagian yang rusak atau aus, seperti penggantian katup selenoid atau penggantian motor. Lakukan perawatan preventif secara teratur.',
            ],
            [
                'kd_penyakit' => 'P004',
                'nama_penyakit' => 'Thermostat',
                'solusi' => 'Matikan listrik AC dan bersihkan kotoran atau debu yang menumpuk di sekitar konektor termostat dengan menggunakan sikat halus, periksa koneksi kabel pada termostat, kalibrasi ulang termostat. Apabila belum teratasi, lakukan penggantian termostat yang sesuai dengan model dan spesifikasi AC.',
            ],
            [
                'kd_penyakit' => 'P005',
                'nama_penyakit' => 'Aliran Udara',
                'solusi' => 'Bersihkan atau ganti filter udara secara teratur, lakukan pemeriksaan dan perbaikan ducting atau saluran udara yang rusak, periksa dan bersihkan kipas serta periksa kondisi motor, lakukan penyesuaian sistem ventilasi.',
            ],
            [
                'kd_penyakit' => 'P006',
                'nama_penyakit' => 'Instalasi Pipa',
                'solusi' => 'Jika terjadi kebocoran, perbaiki dengan menutup atau mengganti bagian yang rusak. Lakukan pembersihan dan pemeliharaan secara berkala serta pastikan pipa AC dilengkapi dengan isolasi yang baik.',
            ],
            [
                'kd_penyakit' => 'P007',
                'nama_penyakit' => 'Kapasitor',
                'solusi' => 'Lakukan penggantian dengan kapasitor yang baru dan sesuai dengan spesifikasi AC. Pastikan semua kabel terhubung dengan baik, periksa tegangan kapasitor menggunakan alat pengukur tegangan serta lakukan pemeriksaan overload.',
            ],
            [
                'kd_penyakit' => 'P008',
                'nama_penyakit' => 'Kabel',
                'solusi' => 'Lakukan pemeriksaan visual secara berkala, pasang pelindung kabel atau conduit, pastikan ujung kabel terpasang segel, serta lakukan pemeliharaan rutin pada seluruh sistem AC termasuk kabel dan konektor. Jika kabel AC mengalami kerusakan parah, lakukan penggantian dengan kabel yang baru dan berkualitas.',
            ],
            [
                'kd_penyakit' => 'P009',
                'nama_penyakit' => 'Motor Daun Swing',
                'solusi' => 'Periksa kondisi fisik kabel dan sambungan, bersihkan debu atau kotoran pada motor daun swing, oleskan sedikit oil pada bagian yang berputar, pastikan saklar atau kontrol berfungsi dengan baik, serta periksa tegangan listrik pada sumber daya.',
            ],
            [
                'kd_penyakit' => 'P010',
                'nama_penyakit' => 'Overload',
                'solusi' => 'Kurangi beban listrik yang dioperasikan bersamaan dengan AC, periksa kondisi kabel dan steker AC, bersihkan filter dan evaporator secara teratur, serta pastikan ventilasi ruangan dalam kondisi yang baik.',
            ],
            [
                'kd_penyakit' => 'P011',
                'nama_penyakit' => 'Unit Dalam',
                'solusi' => 'Lakukan pemeriksaan rutin dan berkala pada komponen-komponen unit dalam AC, seperti kompresor, kondensor, evaporator, dan filter udara. Jika terdapat kerusakan, lakukan perbaikan atau penggantian sesuai dengan kebutuhan.',
            ],
            [
                'kd_penyakit' => 'P012',
                'nama_penyakit' => 'Unit Luar',
                'solusi' => 'Lakukan pemeriksaan rutin dan berkala, bersihkan kotoran yang menumpuk, serta lindungi unit luar AC dari cuaca ekstrem atau kondisi lingkungan yang keras dengan penutup.',
            ],
            [
                'kd_penyakit' => 'P013',
                'nama_penyakit' => 'Motor Fan',
                'solusi' => 'Lakukan pemeriksaan dan pembersihkan kotoran pada motor fan AC. Jika motor fun mengeluarkan suara berisik atau bergetar saat berputar, perbaiki atau ganti batalan. Periksa koneksi listrik, jika diperlukan lakukan penggantian pada kabel yang rusak.',
            ],
            [
                'kd_penyakit' => 'P014',
                'nama_penyakit' => 'Umur AC',
                'solusi' => 'Melakukan perawatan rutin dengan membersihkan filter udara, membersihkan unit dalam dan luar, serta periksa komponen utama seperti evaporator, kondensor, dan blower. Lakukan pemantauan pada suhu operasional AC serta lakukan penggantian pada komponen yang telah usang.',
            ],
            [
                'kd_penyakit' => 'P015',
                'nama_penyakit' => 'Kekurangan Tegangan',
                'solusi' => 'Periksa sumber daya listrik dan pastikan tidak ada masalah penurunan tegangan, periksa kabel dan konektor yang menghubungkan AC, serta periksa sistem proteksi AC seperti pengaman tegangan rendah (undervoltage protection).',
            ],
            [
                'kd_penyakit' => 'P016',
                'nama_penyakit' => 'Remote',
                'solusi' => 'Periksa baterai pada remote, periksa sinyal pada remote. Jika masih ditemukan masalah, lakukan penggantian dengan remote yang baru.',
            ],
            [
                'kd_penyakit' => 'P017',
                'nama_penyakit' => 'Sensor',
                'solusi' => 'Lakukan pemeriksaan visual terhadap sensor AC, lakukan kalibrasi sensor. Jika masih tidak berfungsi, lakukan penggantian sensor dengan tipe yang sesuai dan berkualitas. Serta lakukan pemeriksaan pada sistem elektrikal, pastikan tidak ada masalah dengan sirkuit listrik.',
            ],
        ];

        foreach ($data as $item) {
            Solusi::create([
                'id' => 'SLI-' . CsHelper::data_id(),
                'kd_penyakit' => $item['kd_penyakit'],
                'nama_penyakit' => $item['nama_penyakit'],
                'solusi' => $item['solusi'],
                'created_by' => 'Dev',
            ]);
        }
    }
}
