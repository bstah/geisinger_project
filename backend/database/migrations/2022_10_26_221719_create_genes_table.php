<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genes', function (Blueprint $table) {
            $table->id();
            $table->string('symbol');
            $table->string('location');
            $table->string('name');
            $table->string('type');
            $table->string('previousSymbols');
            $table->string('aliasSymbols');
            $table->string('hgncId');
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
        Schema::dropIfExists('genes');
    }
};
