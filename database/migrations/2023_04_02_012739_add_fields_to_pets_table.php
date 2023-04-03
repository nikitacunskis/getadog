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
        Schema::table('pets', function (Blueprint $table) {
            $table->integer('age');
            $table->enum('size', ['S', 'M', 'L']);
            $table->string('breed');
            $table->enum('gender', ['M', 'F']);
            $table->boolean('child')->default(false);
            $table->boolean('cats')->default(false);
            $table->boolean('other_boys')->default(false);
            $table->boolean('other_girls')->default(false);
            $table->boolean('birds')->default(false);
            $table->boolean('stealing')->default(false);
            $table->boolean('demolition')->default(false);
            $table->enum('activity', ['Low', 'Middle', 'High']);
            $table->enum('temperament', ['Introvert', 'Extrovert']);
            $table->boolean('city')->default(false);
            $table->string('commands')->nullable();
            $table->enum('loyal', ['Low', 'Middle', 'High']);
            $table->integer('alone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->dropColumn(['name', 'age', 'size', 'breed', 'gender', 'child', 'cats', 'other_boys', 'other_girls', 'birds', 'stealing', 'demolition', 'activity', 'temperament', 'city', 'commands', 'loyal', 'alone']);
        });
    }
};

