<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplines', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('emphasis_id')->nullable();
            $table->unsignedBigInteger('professor_id');
            $table->string('code')->unique();
            $table->string('name');
            // $table->longText('description')->nullable();
            $table->string('trailer')->nullable();
            $table->longText('synopsis')->nullable();
            $table->longText('difficulties')->nullable();
            $table->foreign('professor_id')->references('id')
                ->on('professors')
                ->onDelete('cascade');
            // $table->foreign('emphasis_id')->references('id')->on('emphasis');
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
        Schema::dropIfExists('disciplines');
    }
}
