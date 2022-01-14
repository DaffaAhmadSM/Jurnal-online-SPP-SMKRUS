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
            $table->string('nisn');
            $table->foreignId('wali_kelas_id');
            $table->string('SMT Gasal');
            $table->string('SPP_bulanan');
            $table->string('PKL 1');
            $table->string('OSIS Genap');
            $table->string('PAS Genap');
            $table->string('PAS Ganjil');
            $table->string('Admin Bank');
            $table->string('Jumlah');
            $table->rememberToken();
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
