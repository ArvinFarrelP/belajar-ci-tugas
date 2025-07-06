<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Tanggal mulai seed. Pakai DateTime agar bisa ambil tanggal hari ini
        $startDate = new \DateTime();

	// kosongkan tabel sebelum isi ulang (optional, tapi disarankan saat development)
	$this->db->table('diskon')->truncate();

        // Loop 10 hari berturut-turut tanpa duplikat tanggal
        for ($i = 0; $i < 30; $i++) {
            $tanggal = clone $startDate;
            $tanggal->modify("+$i day");

            $data = [
                'tanggal' => $tanggal->format('Y-m-d'),
                'nominal' => $faker->numberBetween(50000, 150000), // nominal diskon acak
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            // insert ke tabel 'diskon'
            $this->db->table('diskon')->insert($data);
        }
    }
}