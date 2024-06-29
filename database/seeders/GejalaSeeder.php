<?php

namespace Database\Seeders;

use App\Models\Gejala;
use CsHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kd_gejala' => 'G001', 'gejala' => 'AC mengeluarkan bau tidak sedap', 'created_by' => 'dev'],
            ['kd_gejala' => 'G002', 'gejala' => 'Kabel indoor terbakar dalam unit AC', 'created_by' => 'dev'],
            ['kd_gejala' => 'G003', 'gejala' => 'Adanya jamur di bagian saluran udara', 'created_by' => 'dev'],
            ['kd_gejala' => 'G004', 'gejala' => 'Meningkatnya tagihan listrik rumah atau tempat AC terpasang', 'created_by' => 'dev'],
            ['kd_gejala' => 'G005', 'gejala' => 'Lampu indikator AC berkedip', 'created_by' => 'dev'],
            ['kd_gejala' => 'G006', 'gejala' => 'Munculnya minyak atau cairan oli pada bagian yang bocor', 'created_by' => 'dev'],
            ['kd_gejala' => 'G007', 'gejala' => 'Munculnya bau hangus', 'created_by' => 'dev'],
            ['kd_gejala' => 'G008', 'gejala' => 'Udara AC menjadi panas', 'created_by' => 'dev'],
            ['kd_gejala' => 'G009', 'gejala' => 'AC otomatis mati tanpa adanya fitur', 'created_by' => 'dev'],
            ['kd_gejala' => 'G010', 'gejala' => 'Mengeluarkan udara yang lemah atau sedikit', 'created_by' => 'dev'],
            ['kd_gejala' => 'G011', 'gejala' => 'Terjadi kebocoran pada pipa', 'created_by' => 'dev'],
            ['kd_gejala' => 'G012', 'gejala' => 'Bagian penutup keran pipa yang terlepas', 'created_by' => 'dev'],
            ['kd_gejala' => 'G013', 'gejala' => 'Suhu kompresor yang terlalu tinggi', 'created_by' => 'dev'],
            ['kd_gejala' => 'G014', 'gejala' => 'Tegangan tidak stabil', 'created_by' => 'dev'],
            ['kd_gejala' => 'G015', 'gejala' => 'Sensor tidak berfungsi', 'created_by' => 'dev'],
            ['kd_gejala' => 'G016', 'gejala' => 'Tidak ada respons pada tombol atau layar', 'created_by' => 'dev'],
            ['kd_gejala' => 'G017', 'gejala' => 'Mengeluarkan suara berisik', 'created_by' => 'dev'],
            ['kd_gejala' => 'G018', 'gejala' => 'Banyak air yang merembes dari AC', 'created_by' => 'dev'],
            ['kd_gejala' => 'G019', 'gejala' => 'Terdapat lapisan es atau embun pada evaporator atau kondensor AC', 'created_by' => 'dev'],
            ['kd_gejala' => 'G020', 'gejala' => 'Lampu peringatan atau indikator pada unit AC menyala', 'created_by' => 'dev'],
            ['kd_gejala' => 'G021', 'gejala' => 'Pipa yang rusak', 'created_by' => 'dev'],
            ['kd_gejala' => 'G022', 'gejala' => 'AC tidak menyala sama sekali ketika dinyalakan', 'created_by' => 'dev'],
            ['kd_gejala' => 'G023', 'gejala' => 'Filter udara yang kotor atau tersumbat', 'created_by' => 'dev'],
            ['kd_gejala' => 'G024', 'gejala' => 'AC berjalan dalam siklus yang sering atau terlalu pendek', 'created_by' => 'dev'],
            ['kd_gejala' => 'G025', 'gejala' => 'Suara ledakan atau dentuman yang tiba-tiba dari unit AC', 'created_by' => 'dev'],
            ['kd_gejala' => 'G026', 'gejala' => 'Unit outdoor tidak menyala', 'created_by' => 'dev'],
            ['kd_gejala' => 'G027', 'gejala' => 'Kipas unit outdoor mati', 'created_by' => 'dev'],
            ['kd_gejala' => 'G028', 'gejala' => 'Kipas unit indoor mati', 'created_by' => 'dev'],
            ['kd_gejala' => 'G029', 'gejala' => 'Daun swing tidak bekerja', 'created_by' => 'dev'],
            ['kd_gejala' => 'G030', 'gejala' => 'Kompresor tidak mati ketika unit indoor mati', 'created_by' => 'dev'],
            ['kd_gejala' => 'G031', 'gejala' => 'Kabel outdoor terbakar', 'created_by' => 'dev'],
        ];

        foreach ($data as $item) {
            Gejala::create([
                'id' => 'GJL-' . CsHelper::data_id(),
                'kd_gejala' => $item['kd_gejala'],
                'gejala' => $item['gejala'],
                'created_by' => 'Dev'
            ]);
        }

    }
}
