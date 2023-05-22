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
        Schema::create('buy_post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('post_id')->index();
            $table->string('compte');
            $table->string('num_compte');
            $table->string('desc');
            $table->string('passe');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buy_post');
    }
};
