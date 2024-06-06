<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->date('deadline');
            $table->string('visibilite')->nullable();
            $table->string('note')->nullable();
            $table->string('risque')->nullable();
            $table->string('reunion')->nullable();
            $table->string('agent')->nullable();
            $table->integer('agent_id')->nullable()->default(0);
            $table->integer('reunion_id')->nullable()->default(0);
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
        Schema::dropIfExists('actions');
    }
}
