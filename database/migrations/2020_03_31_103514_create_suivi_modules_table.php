<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuiviModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suivi_modules', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('heure_debut')->nullable();
            $table->string('heure_fin')->nullable();
            $table->boolean('etat_video_a')->nullable()->default(0);
            $table->boolean('etat_video_b')->nullable()->default(0);
            $table->boolean('etat_video_c')->nullable()->default(0);
            $table->boolean('etat_text_a')->nullable()->default(0);
            $table->boolean('etat_text_b')->nullable()->default(0);
            $table->boolean('etat_text_c')->nullable()->default(0);
            $table->boolean('etat_note_a')->nullable()->default(0);
            $table->boolean('etat_note_b')->nullable()->default(0);
            $table->boolean('etat_note_c')->nullable()->default(0);
            $table->integer('agent_id')->nullable()->default(0);
            $table->integer('module_id')->nullable()->default(0);
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
        Schema::dropIfExists('suivi_modules');
    }
}
