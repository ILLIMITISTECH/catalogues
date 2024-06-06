<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('resume')->nullable();
            $table->string('video_a')->nullable();
            $table->string('video_b')->nullable();
            $table->string('video_c')->nullable();
            $table->string('text_a')->nullable();
            $table->string('text_b')->nullable();
            $table->string('text_c')->nullable();
            $table->string('note_a')->nullable();
            $table->string('note_b')->nullable();
            $table->string('note_c')->nullable();
            $table->string('formation')->nullable();
            $table->integer('formation_id')->nullable()->default(0);
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
        Schema::dropIfExists('modules');
    }
}
