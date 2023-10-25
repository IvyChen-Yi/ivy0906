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
            $table->integer('user_id');
            $table->string('name',100);
            $table->tinyinteger('type');
            $table->tinyinteger('series');
            $table->integer('stock');
            $table->string('detail',500);
            $table->date('manufactured_date');
            $table->date('expiry_date');
            $table->integer('p_id');
            $table->string('p_name',100);
            $table->integer('p_stock');
            $table->date('p_date');
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
