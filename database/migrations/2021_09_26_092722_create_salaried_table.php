<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaried', function (Blueprint $table) {
            $table->foreignId('employee_id')
            ->constrained('employees')
            ->primary()
            ->onUpdate('cascade')
            ->onDelete('cascade');
      
            $table->decimal('salary', $total = 12, $places = 2, $unsigned = true);
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
        Schema::dropIfExists('salaried');
    }
}
