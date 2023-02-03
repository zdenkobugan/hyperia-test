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
        Schema::create('bookstores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('search_url');
            $table->string('path_to_list')->default('');
            $table->string('name_identifier');
            $table->string('price_identifier');
            $table->string('price_regex_extractor')->default('');
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
        Schema::dropIfExists('bookstores');
    }
};
