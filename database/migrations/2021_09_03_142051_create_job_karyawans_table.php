<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_karyawans', function (Blueprint $table) {
            $table->id();
            $table->integer('job_id');
            $table->integer('karyawan_id');
            $table->string('name');
            $table->date('req_date');
            $table->date('start');
            $table->date('finished');
            $table->string('description');

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
        Schema::dropIfExists('job_karyawans');
    }
}
