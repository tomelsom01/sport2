<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('sports', function (Blueprint $table) {
        if (!Schema::hasColumn('sports', 'user_id')) {
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
        }
    });
}

public function down()
{
    Schema::table('sports', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
    });
}
};
