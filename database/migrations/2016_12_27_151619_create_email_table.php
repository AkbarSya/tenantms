<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('emails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_operator');
            $table->string('sender');
            $table->string('receiver');
            $table->string('receiver_name');
            $table->string('subject');
            $table->text('fill');

            $table->timestamps();
            
            

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
    }
}
