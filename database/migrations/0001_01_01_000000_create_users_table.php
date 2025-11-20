<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('admin');
            $table->rememberToken();
            $table->timestamps();
        });

        // untuk membuat 1 user bernama admin dan password 123123123
        DB::table('users')->insert([
            'name' => 'admin1',
            'email' => 'admin@gmail.com',
            'password' => '$2y$12$ogrNM4AtpkFTPE1zvXXXwveQwm63wEr3Br/o5HQCEToiLd8uBpNOXy'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
