<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create shop table
        if (!Schema::hasTable('shop')) {
            Schema::create(
                'shop',
                function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('category', 100);
                    $table->string('name', 200);
                    $table->string('address', 255);
                    $table->string('town', 200);
                    $table->double('town_latitude');
                    $table->double('town_longitude');
                    $table->string('state', 200);
                    $table->string('tel', 20);
                    $table->string('fax', 20);
                    $table->string('cperson', 50);
                    $table->string('mobile', 20);
                    $table->string('email', 100);
                    $table->text('description');
                    $table->string('urlcom', 250);
                    $table->string('urladv', 250);
                    $table->tinyInteger('rank', false, true);
                    $table->double('latitude');
                    $table->double('longitude');
                    $table->string('created_by', 45);
                    $table->string('updated_by', 45);
                    $table->timestamps();
                }
            );
        } else {
            echo "Table shop already exists!!!";
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop the table shop
        Schema::drop('shop');
    }

}
