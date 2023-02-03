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
        Schema::create('fake_api_bookstores', function (Blueprint $table) {
            $table->id();
            $table->string('bookstore_search_url');
            $table->string('name_identifier');
            $table->string('price_identifier');
            $table->string('currency_identifier')->nullable();
            $table->string('lang_identifier')->nullable();
            $table->string('price_template')->nullable();
            $table->string('final_template')->nullable();
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
        Schema::dropIfExists('fake_api_bookstores');
    }
};
