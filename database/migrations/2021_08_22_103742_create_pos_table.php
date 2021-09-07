<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos', function (Blueprint $table) {
            $table->id();
            $table->integer('job_id');
            $table->integer('karyawan_id');
            $table->integer('suplayer_id');
            $table->integer('pr_id');
            $table->integer('invoice_id')->nullable();
            $table->string('uuid');
            $table->string('type');
            $table->integer('quantity');
            $table->integer('price')->nullable();
            $table->date('date');
            $table->integer('invoice')->nullable();
            $table->string('status')->default("PENDING");
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
        Schema::dropIfExists('pos');
    }
}
