<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('address')->nullable();
            $table->enum('title', ['Mr', 'Ms', 'Mrs', 'M/s'])->nullable();
            $table->boolean('active')->default(true);
            $table->string('mobile_no')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('admingroup_id')->nullable();
            $table->string('postal_code')->nullable();
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
        Schema::dropIfExists('admins');
    }
};
