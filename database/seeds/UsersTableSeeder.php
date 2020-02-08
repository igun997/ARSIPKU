<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Indra Gunanda',
                'alamat' => NULL,
                'no_hp' => NULL,
                'email' => 'indra.gunanda@gmail.com',
                'username' => 'igun997',
                'password' => 'igun997',
                'status' => 1,
                'level' => 'super_admin',
                'isLogin' => NULL,
                'tgl_register' => '2020-02-07 14:18:23',
            ),
        ));
        
        
    }
}