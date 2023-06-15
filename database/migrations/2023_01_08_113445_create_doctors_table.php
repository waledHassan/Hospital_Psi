<?php

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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('company_id')->default(1);
            $table->string('members_no')->nullable();
            $table->integer('operator_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('second_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('password')->nullable();
            $table->string('activate_code')->nullable();
            $table->string('password_code')->nullable();
            $table->string('dob')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('profile_image')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('last_otp')->nullable();
            $table->string('last_visit')->nullable();
            $table->string('register_date')->nullable();
        });



        \DB::statement("INSERT INTO `doctors` (`id`, `members_no`, `operator_id`, `first_name`, `second_name`, `last_name`, `email`, `mobile_no`, `password`, `activate_code`, `password_code`, `dob`, `gender`, `profile_image`, `status`, `last_otp`, `last_visit`, `register_date`) VALUES
(8, 'SU10108', 3, 'yusuf', 'ali', 'yusuf', 'support@sahmtech.com', '05468032329', 'e10adc3949ba59abbe56e057f20f883e', '954f48aa6a37bf3fd5dacb1d06154e98', '', '', '', '', 1, 0, '2022-10-18 07:15:31', '2021-01-14 11:02:37'),
(11, 'SU10111', 3, 'wafaa', 'Chief Doctor ', 'Surgeon , Cardiologist', 'wafaajame@gmail.com', '0598271758', 'e10adc3949ba59abbe56e057f20f883e', '843043695d5003fbf55ab4803aa2a688', '', '', '', '', 1, 0, '2021-04-15 11:00:52', '2021-04-15 11:00:52'),
(12, 'SU10112', 3, 'suhaib', 'hasan', 'ali', 'suhaib@sahmtech.com', '0580111196', '1c63129ae9db9c60c3e8aa94d3e00495', '4e932efc0e8a9abb521d7f713c323fd2', '', '', '', '', 1, 787966, '2021-04-24 14:37:02', '2021-04-21 07:15:09'),
(13, 'SU10113', 3, 'Dr. Medhat', 'Fathy', 'Yousef', 'myousef@ksu.edu.sa', '00966543395947', '475ec174073ee5064e7ce4473a89f963', 'a90e7b87544996c4224e717cafd6fbc5', '', '', '', '', 1, 427512, '2021-12-07 11:08:46', '2021-04-26 09:48:18'),
(14, 'SU10114', 3, 'doctor22', 'doctor22', 'Ali', 'admin@gmail.in', '05899999', 'e10adc3949ba59abbe56e057f20f883e', 'c6052c60e90bcd5841ea7955568dfd25', '', '', '', '', 1, 0, '2021-12-06 23:13:04', '2021-12-06 11:12:51');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
};
