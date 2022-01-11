<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->string('nama_siswa');
            $table->string('smt_gasal');
            $table->string('spp_jan');
            $table->string('pkl1');
            $table->string('osis_genap');
            $table->string('pas_genap');
            $table->string('admin_bank');
            $table->string('jumlah');
            $table->string('keterangan');
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
        Schema::dropIfExists('invoices');
    }
}
