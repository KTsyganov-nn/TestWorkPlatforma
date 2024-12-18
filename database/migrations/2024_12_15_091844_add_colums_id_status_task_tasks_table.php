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
        Schema::table('tasks', function (Blueprint $table) {
            $table->integer( 'status_id')->after('description')
                ->foreignId()->constrained('status_tasks')->default(1);
            $table->integer('user_took_id')->after('status_id')
                ->foreignId()->constrained('user')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('user_took_id');
            $table->dropColumn('status_id');
        });
    }
};
