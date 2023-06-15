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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->default(1);
            $table->string('medical_no')->nullable();
            $table->string('members_no')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('second_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('dob')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('left_normal_hear')->nullable();
            $table->integer('left_hearing_device')->nullable();
            $table->string('left_implant_date')->nullable();
            $table->integer('right_normal_hear')->nullable();
            $table->integer('right_hearing_device')->nullable();
            $table->string('right_implant_date')->nullable();
            $table->boolean('status')->nullable();
            $table->string('register_date')->nullable();

            $table->timestamps();
        });


        \DB::statement("INSERT INTO `patients` (`id`, `medical_no`, `members_no`, `first_name`, `second_name`, `last_name`, `email`, `mobile_no`, `dob`, `gender`, `country_id`, `city_id`, `left_normal_hear`, `left_hearing_device`, `left_implant_date`, `right_normal_hear`, `right_hearing_device`, `right_implant_date`, `status`, `register_date`) VALUES
        (35, '36995', '', 'Ramy', 'Ahmed', 'Ahmed', 'nrsf@gmail.com', '6666966', '2021-04-19', 'Female', 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-20 08:39:01'),
        (36, '325865', '', 'ameer', 'beach', 'Ahmed', 'hjhh@gmail.com', '6666969589', '2021-04-02', 'F', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-18 11:35:20'),
        (39, '123', '', 'PANDIYAN', 'G', 'G', 'gpandiyan.tech@gmail.com', '9066418026', '1990-12-12', 'M', 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-18 11:35:29'),
        (40, '123', '', 'patient', '123', '234', 'test@gmail.com', '1234567', '2020-11-05', 'M', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-18 11:35:44'),
        (41, '5885', '', 'ali', 'omer', 'ali', 'workabdo702@gmail.com', '5468032343', '1997-01-10', 'Female', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-19 10:01:31'),
        (42, '4344', '', 'Mohammed', 'basel', 'Ola', 'ssdwe_aa@gmail.com', '507064267', '1997-03-10', 'Male', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-20 05:38:17'),
        (43, '1254', '', 'qameer', 'yousef', 'aqel', 'ameer2@hotmail.com', '0597064265', '1993-3-17', 'Male', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-20 05:56:20'),
        (44, '1254', '', 'qameer', 'yousef', 'aqel', 'ameer2@hotmail.com', '0597064265', '1993-3-17', 'Male', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-20 07:43:05'),
        (45, '1122334455', '', 'yazan', 'suhaib', 'ali', 'support@sahmtech.com', '0551661309', '1991-03-30', 'Female', 4, 0, 1, 1, '', 1, 1, '', 1, '2021-05-02 09:01:36'),
        (46, '54321', '', 'banan1', 'suhaib1', 'ali1', 'su@gmail.com', '04444444444444441', '1991-03-24', 'M', 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-01 08:02:28'),
        (47, '123456', '', 'Medhat', 'Test', 'Test', 'mmmm@yahoo.com', '0544444444', '1990-03-27', 'male', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-26 09:52:05'),
        (48, '369951', '', 'Mithra  Dass', ' Dass', 'K', 'admin2@gmail.com', '23280721', '2021-05-01', 'F', 4, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-01 08:11:39'),
        (49, '10344', 'SU10149', 'PANDIYAN', 'G', 'GANDHI', 'gpandiyan.tech3@gmail.com', '9066418026', '2021-05-13', 'Male', 4, 2, 1, 0, '2021-05-12', 2, 0, '2021-05-18', 1, '2021-05-07 03:11:19'),
        (50, '123', '', 'patient', '123', '234', 'test@gmail.com', '1234567', '2020-11-05', 'Male', 1, NULL, 1, 1, '2021-01-01', 1, 1, '2021-01-01', 1, '2021-05-01 02:55:25'),
        (51, '123456', '', 'Mtest', '', 'Yousef', '', '0543395947', '1990-04-19', 'male', 4, NULL, 2, 2, '', 2, 3, '', 1, '2021-05-19 04:44:47'),
        (52, '123456', '', 'Mtest', '', 'Yousef', '', '0543395947', '1990-04-19', 'male', 4, NULL, 2, 2, '', 2, 3, '', 1, '2021-05-19 04:45:39'),
        (53, '562389', '', 'Test', 'Test', 'Test', '', '00966543395947', '1990-04-19', 'female', 4, NULL, 1, 0, '', 1, 0, '', 1, '2021-05-19 04:49:13'),
        (54, '142536', '', 'xyz', 'xyz', 'xyz', '', '543395947', '1991-04-19', 'male', 4, NULL, 1, 0, '', 2, 2, '1993-04-19', 1, '2021-05-19 04:50:22'),
        (55, '12121212', '', 'Medhat', 'Test', 'Test', '', '0543395947', '1990-05-09', 'male', 4, 2, 1, 0, '', 1, 0, '', 1, '2021-06-08 09:12:28'),
        (56, '21402777', '', 'test 2', 'name', 'name', 'suhaib@sahmtech.com', '0580111196', '1990-05-16', 'male', 4, 2, 1, 0, '', 2, 2, '', 1, '2021-06-16 08:18:03'),
        (57, '123987', '', 'Medhat', '', 'Youseftest', '', '0543213211', '1990-08-20', 'male', 0, 0, 2, 1, '', 1, 0, '', 1, '2021-09-20 07:31:26'),
        (58, '123456', '', 'Medhat', '', 'Test', '', '05555555555', '1990-08-20', 'male', 5, 2, 2, 1, '', 1, 0, '', 1, '2021-09-20 07:54:16'),
        (59, '988765', '', 'suhaib', 'h', 'ali', '', '058000011', '1983-08-20', 'male', 5, 0, 1, 0, '', 1, 0, '', 1, '2021-09-20 07:55:53'),
        (60, '10090336', '', 'JANAN', '', 'OTAIF', '', '0506005745', '2011-11-02', 'female', 4, 0, 2, 3, '', 2, 2, '', 1, '2021-10-04 07:45:10'),
        (61, '000000000', '', 'test', 'kaesc', 'kauh', 'aaaaaa@aaa.com', '0555555555', '1994-09-14', 'male', 4, 2, 2, 1, '', 1, 0, '', 1, '2021-10-14 12:02:25'),
        (62, '10144717', '', 'Abdullah', 'rashid', 'altamimi', '', '0503211458', '2016-07-16', 'male', 0, 0, 2, 3, '', 2, 3, '', 1, '2021-11-07 06:56:12'),
        (63, '10052445', '', 'Reem', 'abdulkhaliq', 'Alhlali', '', '0556294187', '2012-10-02', 'male', 4, 2, 2, 1, '', 2, 3, '', 1, '2021-11-07 07:34:27'),
        (64, '123456', '', 'ameer', 'ayousef', 'aqel', 'ameer@hotmail.com', '0597064265', '1992-11-16', 'male', 0, 0, 1, 0, '', 1, 0, '', 1, '2021-12-06 04:33:11'),
        (65, '333', 'SU10165', 'ali', 'ahmas', 'ahmad', 'ahmad@psi.com', '6666666', '2021-12-07', 'M', 4, 5, 2, 5, '', 1, NULL, '', 1, '2021-12-06 11:19:13'),
        (66, '123456', '', 'Medhat', '', 'Yousef', '', '0554443333', '1990-11-07', 'male', 0, 0, 1, 0, '', 1, 0, '', 1, '2021-12-07 11:16:17'),
        (67, '123321123321', '', 'kids', 'ali', 'ali', 'suhaib@sahmtech.com', '058000000', '1984-11-08', 'male', 4, 2, 1, 0, '', 2, 2, '1990-11-08', 1, '2021-12-08 06:59:59'),
        (68, '10321414', '', 'Batal', 'Taher', 'Almalki', '', '0501415779', '2018-09-30', 'male', 4, 0, 2, 2, '2020-01-24', 2, 2, '2020-01-24', 1, '2022-02-24 12:03:47'),
        (69, '099', '', 'ahmad', '', 'test', '', '0555555555', '2000-03-06', 'male', 0, 2, 1, 0, '', 2, 1, '', 1, '2022-04-06 06:46:44'),
        (70, '12345', '', 'Medhat', '', 'Yousef', '', '0543395947', '1990-03-17', 'male', 5, 2, 1, 0, '', 1, 0, '', 1, '2022-04-17 08:22:23'),
        (71, '10292211', '', 'Mohammed', 'Saleh', 'Alharbi', '', '0555172772', '2019-09-02', 'male', 4, 2, 2, 1, '', 2, 1, '', 1, '2022-11-15 08:15:57');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
