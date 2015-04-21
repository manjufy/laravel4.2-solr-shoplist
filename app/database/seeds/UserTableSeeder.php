<?php
/**
 * @author Manjunath Reddy<manju16832003@gmail.com>
 */

class UserTableSeeder extends Seeder{

    public function run ()
    {
        DB::table('user')->delete();
        User::create(
          [
              'username' => 'admin',
              'password' => Hash::make('admin'),
              'type'     => 'admin',
          ]
        );
    }
} 