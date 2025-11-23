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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')
                ->constrained()
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->string('description');
            $table->string('image');
            $table->string('levels');
            $table->string('status');
            $table->enum('status', [
                'open',
                'in_class',
                'in_room',
                'test',
                'exam',
                'unlock',
                'maintenance',
                'none'
            ])->default('none');
            $table->boolean('is_fixed')->default(false);
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};
