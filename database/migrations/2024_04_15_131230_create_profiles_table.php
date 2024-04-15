<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('Customer_id')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->date('birthday')->nullable();
            $table->string('avatar')->nullable();
            $table->string('city');
            $table->string('state')->after('city');
            $table->boolean('profile_status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
