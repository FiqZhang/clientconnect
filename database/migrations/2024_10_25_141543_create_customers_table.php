<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); //ID
            $table->string('name'); // Name of the customer
            $table->string('email')->unique(); // Email address
            $table->string('id_number')->unique(); // Unique ID number
            $table->string('phone_number'); // Phone number
            $table->string('address'); // Address
            $table->text('notes')->nullable(); // Notes
            $table->timestamps(); 
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};

