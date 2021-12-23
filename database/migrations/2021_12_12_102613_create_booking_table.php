<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('postcode')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->text('special_requirement')->nullable();
            $table->integer('parking_id')->nullable();
            $table->string('other')->nullable();
            $table->boolean('status')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('job_booking');
    }
}
