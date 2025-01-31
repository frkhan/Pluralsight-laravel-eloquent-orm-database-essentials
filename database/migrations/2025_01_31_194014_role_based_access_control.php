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
        Schema::create('role_based_access_control_rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('RoleID')->constrained('user_roles');            
            $table->string('TableName',128);
            $table->string('ColumnName',128);
            $table->boolean('CanCreate')->default(false);
            $table->boolean('CanRead')->default(false);
            $table->boolean('CanUpdate')->default(false);
            $table->boolean('CanDelete')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_based_access_control_rules');
    }
};
