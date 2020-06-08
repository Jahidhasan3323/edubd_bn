<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('short_name')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->text('address');
            $table->string('api_key')->nullable();
            $table->string('sender_id')->nullable();
            $table->string('school_type_id');
            $table->text('website')->nullable();
            $table->string('fax')->nullable();
            $table->string('code');
            $table->string('established_date');
            $table->string('expiry_date');
            $table->string('country_code');
            $table->string('serial_no');
            $table->string('logo')->nullable();
            $table->string('signature_p')->nullable();
            $table->integer('sms_service')->default(0);
            $table->boolean('status');
            $table->integer('social_post_access')->default(0)->comment('Social site post approve access');
            $table->string('total_student');
            $table->integer('service_type_id')->default(1);
            $table->tinyInteger('attendance_option')->default(1)->comment('1=In Time sms, 2= In Time and Out Time sms');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}