<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWpChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wp_changes', function (Blueprint $table) {
            $table->id();
            $table->text('contents', 65535);
            $table->integer('inserted')->nullable();
            $table->integer('deleted')->nullable();
            $table->integer('unmodified')->nullable();
            $table->integer('changed_ratio')->nullable();
            $table->boolean('diff')->nullable();
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
        Schema::dropIfExists('wpchanges');
    }
}
