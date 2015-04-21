<?php

/**
 * @author Manjunath Reddy<manju16832003@gmail.com>
 */
class CountryTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('country')->delete();
        Country::create(
            [
                'name'       => 'Malaysia',
                'code'       => 'my',
                'created_by' => 'manju',
                'updated_by' => 'manju'
            ]
        );
    }
} 