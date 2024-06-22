<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyPertanyaanTableAndCreatePertanyaanTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Modifikasi tabel pertanyaan
        Schema::table('pertanyaan', function (Blueprint $table) {
            // Tambahkan kolom 'isi' yang dapat bernilai null
            $table->text('isi')->nullable()->after('judul');
        });

        // Buat tabel pivot 'pertanyaan_tag'
        Schema::create('pertanyaan_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pertanyaan_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
            
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaan')->onDelete('cascade')->onUpdate("cascade");
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate("cascade"); // Tambahkan foreign key constraint untuk kolom tag_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Hapus tabel pivot 'pertanyaan_tag'
        Schema::dropIfExists('pertanyaan_tag');
        
        // Hapus kolom 'isi' dari tabel pertanyaan jika migrasi di-rollback
        Schema::table('pertanyaan', function (Blueprint $table) {
            $table->dropColumn('isi');
        });
    }
}
