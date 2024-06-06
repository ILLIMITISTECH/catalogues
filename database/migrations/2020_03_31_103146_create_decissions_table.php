<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decissions', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('delais')->nullable();
            $table->string('agent')->nullable();
            $table->string('reunion')->nullable();
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
        Schema::dropIfExists('decissions');
    }
}
