<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('depart_id'); // Foreign key ke tabel departments
            $table->unsignedBigInteger('user_id'); // Foreign key ke tabel users
            $table->string('address');
            $table->string('place_of_birth');
            $table->date('dob');
            $table->string('religion');
            $table->enum('sex', ['male', 'female']);
            $table->string('phone');
            $table->decimal('salary', 10, 2);
            $table->timestamps();
    
            // Foreign key constraint untuk depart_id
            $table->foreign('depart_id')->references('id')->on('departments')->onDelete('cascade');
            
            // Foreign key constraint untuk user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
}
