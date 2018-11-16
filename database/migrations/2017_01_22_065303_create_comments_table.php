<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            
            /*
                L142: ADDING A ROWS TO THE COMMMENTS TABLE
            */
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->integer('post_id')->unsigned();
            
            $table->timestamps();
        });
        
        
        /*
            L143: ADDING A Foreing key TO THE COMMMENTS TABLE RELATED TO PST TABLE
        */
        Schema::table('comments', function ($table) {

            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
            L144: DROPING THE FOREING KEY WITH ROLLBACK
        */
        Schema::dropForeign('post_id');
        
        
        Schema::dropIfExists('comments');
    }
}
