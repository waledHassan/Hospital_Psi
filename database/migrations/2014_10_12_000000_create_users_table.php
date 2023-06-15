<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('admingroup_id')->nullable();
            $table->integer('active')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'id' => 1,
            'password' => bcrypt('123'),
            'name' => 'admin',
            'email' => 'admin@saas.com',
            'address' => 'Alkhobar',
            'admingroup_id' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
