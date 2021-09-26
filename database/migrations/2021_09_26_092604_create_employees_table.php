<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->unsignedTinyInteger('payment_method_id');
            $table->unsignedTinyInteger('employee_type_id');
            $table->unsignedTinyInteger('schedule_id');
            $table->foreign('employee_type_id')->references('id')->on('employee_types');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->foreignUuid('union_id')->nullable()->constrained('union_registrations');
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
        Schema::dropIfExists('employees');
    }
}
