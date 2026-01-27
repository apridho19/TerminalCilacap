<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_produksi', function (Blueprint $table) {
            $table->id(); // satu-satunya auto increment

            $table->foreignId('data_master_id')
                ->constrained('data_master')
                ->cascadeOnDelete();

            $table->string('no_kendaraan')->nullable();

            $table->integer('jml_pnp_berangkat')->nullable();
            $table->time('waktu_berangkat')->nullable();
            $table->dateTime('bus_berangkat')->nullable();

            $table->integer('jml_pnp_datang')->nullable();
            $table->time('waktu_datang')->nullable();
            $table->dateTime('bus_datang')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_produksi');
    }
};
