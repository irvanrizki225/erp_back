<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaanBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan_barangs', function (Blueprint $table) {
            $table->id();
            $table->integer('job_id');
            $table->integer('karyawan_id');
            $table->integer('suplayer_id');
            $table->integer('po_id');            
            $table->date('req_date');
            $table->date('arrival_date')->nullable();
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
        Schema::dropIfExists('penerimaan_barangs');
    }
}
