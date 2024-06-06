<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuiviIndicateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suivi_indicateurs', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('pourcentage')->nullable();
            $table->string('note')->nullable();
            $table->string('indicateur')->nullable();
            $table->integer('indicateur_id')->nullable()->default(0);
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
        Schema::dropIfExists('suivi_indicateurs');
    }
}
