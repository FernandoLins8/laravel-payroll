<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commissioned', function (Blueprint $table) {
            $table->foreignId('employee_id')
            ->constrained('employees')
            ->primary()
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->decimal('base_salary', $total = 12, $places = 2, $unsigned = true);
            $table->decimal('commission_tax', $total = 3, $places = 2, $unsigned = true);
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
        Schema::dropIfExists('commissioned');
    }
}
