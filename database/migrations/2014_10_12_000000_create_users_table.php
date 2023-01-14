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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullName');
            $table->enum('gender', ['male', 'female']);
            $table->string('regNumber');
            $table->string('matricNumber');
            $table->string('phoneNumber');
            $table->string('department')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('level')->nullable();
            $table->string('faculty')->nullable();
            $table->string('courseOfStudy')->nullable();
            $table->string('applicationNumber')->nullable();
            $table->string('session')->nullable();
            $table->string('roomNumber')->nullable();
            $table->string('hallNumber')->nullable();
            $table->string('bedNumber')->nullable();
            $table->string('portalFee')->default('UNPAID');
            $table->string('payStatus')->default('UNPAID');
            $table->string('invoiceNumberStatus')->default('UNPAID');
            $table->tinyInteger('accomdationStatus')->default(0);
            $table->tinyInteger('publishStatus')->default(0);
            $table->timestamp('expired_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
};