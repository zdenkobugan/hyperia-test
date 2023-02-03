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
        Schema::create('fake_api_bookstore_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fake_api_bookstore_id')->references('id')->on('fake_api_bookstores');
            $table->string('name');
            $table->decimal('price', 6, 2, true);
            $table->char('currency', 1)->nullable();
            $table->string('language', 2)->nullable();
            $table->timestamps();
            $table->fullText('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fake_api_bookstore_items');
    }
};
