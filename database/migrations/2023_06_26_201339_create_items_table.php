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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('song_name', 100)->comment("曲名");
            $table->string('name')->comment("歌手名");
            $table->string('type', 100)->comment("ジャンル");
            $table->string('detail', 1500)->comment("詳細説明");
            $table->longText('item_image')->comment("曲画像");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
