<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('prenom');
            $table->string('nom');
            $table->string('fonction')->nullable();
            $table->date('date_naiss');
            $table->string('tel');
            $table->string('whatshap')->nullable();
            $table->string('email');
            $table->string('niveau_hieracie')->nullable();
            $table->string('service')->nullable();
            $table->integer('service_id')->nullable()->default(0);
            $table->integer('superieur_id')->nullable()->default(0);
            $table->integer('user_id')->nullable()->default(0);
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
        Schema::dropIfExists('agents');
    }
}
