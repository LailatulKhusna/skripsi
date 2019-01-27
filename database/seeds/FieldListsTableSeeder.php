<?php

use Illuminate\Database\Seeder;

class FieldListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data=[[
        	'branch_id' => 1,
        	'name' => 'Bukti Fisik (Tangible)',
        	'description' => 'Bukti  secara fisik   yaitu  bukti   yang  ditunjukkan  oleh fasilitas  fisik & peralatan  yang  digunakan,'
        ],[
        	'branch_id' => 1,
        	'name' => 'Keandalan (Reliability)',
        	'description' => 'Menyajikan jasa  sesuai  dengan  janji  serta  akurat  dan memuaskan'
        ],[
            'branch_id' => 1,
            'name' => 'Daya Tanggap (Responsiveness)',
            'description' => 'Ketersediaan para karyawan untuk membantu  pelanggan  dan  menyajikan  jasa dengan segera'
        ],[
            'branch_id' => 1,
            'name' => 'Jaminan (Assurance)',
            'description' => 'Pengetahuan, ketrampilan  dan  kemampuan dalam  menyajikan  jasa'
        ],[
            'branch_id' => 1,
            'name' => 'Empati (Empaty)',
            'description' => 'kemudahan     dalam berinteraksi, komunikasi yang baik, memberikan  perhatian  secara  pribadi  serta memahami     kebutuhandan     keinginan pelanggan'

        ]];

        DB::table('field_lists')->insert($data);
    }
}
