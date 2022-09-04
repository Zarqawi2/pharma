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
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string('name_supplier');
            $table->string('email_supplier');
            $table->string('address_supplier');
            $table->integer('phone_supplier');
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
        Schema::dropIfExists('supplier');
    }
};

//bo drustkrdny data base la laravel 
// terminal la menu bar > php artisan make:migration nawek bo filaka --create nawy table > la folder database migration 
//colomn zyad akay
//dwatr la terminal php artisan migrate