<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrustsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trusts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->json('trust_one');
            $table->json('trust_two');
            $table->json('trust_three');
            $table->json('trust_four')->nullable();
            $table->json('trust_five')->nullable();
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
        Schema::dropIfExists('trusts');
    }
}
