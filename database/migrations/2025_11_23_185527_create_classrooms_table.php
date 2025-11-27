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
            $table->enum('type', [
                'classroom',
                'secretary',
                'library',
                'male_toilet',
                'female_toilet'
            ])->default('classroom');
            $table->string('cover')->nullable();
            $table->string('level');
            $table->enum('access_state', [
                'lock',
                'unlock',
            ])->default('lock');
            $table->enum('usage_state', [
                'book',
                'in_class',
                'in_room',
                'test',
                'exam',
                'maintenance',
                'to_wash',
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
