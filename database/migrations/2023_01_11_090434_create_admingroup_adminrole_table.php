<?php

use App\Models\Admin;
use App\Models\Adminrole;
use App\Models\Admingroup;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admingroup_adminrole', function (Blueprint $table) {
            $table->id();
            $table->integer('admingroup_id');
            $table->integer('adminrole_id');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        $group = Admingroup::create([
            'company_id' => 1,
            'name' => 'supermanager',
        ]);
        $group->permissions()->attach(Adminrole::get());
        Admin::create([
            'username' => 'super',
            'password' => bcrypt('123'),
            'fname' => 'admin',
            'lname' => 'admin',
            'email' => 'admin@super.com',
            'address' => 'a',
            'title' => 'Mr',
            'active' => 1,
            'mobile_no' => '010' . rand(11111111, 99999999),
            'city_id' => 1,
            'company_id' => 1,
            'country_id' => 1,
            'postal_code' => '1',
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
        Schema::dropIfExists('admingroup_adminrole');
    }
};
