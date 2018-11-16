<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
            L107:ADDING a column image to the posts table
        */
        Schema::table('posts', function(Blueprint$table){

            $table->string("image")->nullable;
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        /*
        L108: DROPING COLUMN
        */
        Schema::table('posts', function(Blueprint$table){

            $table->dropColumn("image");
            
        });
    }
}
