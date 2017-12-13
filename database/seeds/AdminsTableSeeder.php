<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('admins')->delete();
        $admins = array(
            array('name' => 'Admin', 'email' => "admin@yopmail.com", 'password' => '$2y$10$79RcBgV3RD.X8AtnNCINXOjrxHth8PVz1EMFlJ.8RhuyqOosCVPOS', 'status' => 1),
            array('name' => 'Partner', 'email' => "partner@yopmail.com", 'password' => '$2y$10$79RcBgV3RD.X8AtnNCINXOjrxHth8PVz1EMFlJ.8RhuyqOosCVPOS', 'status' => 1),
        );
        DB::table('admins')->insert($admins);
    }

}