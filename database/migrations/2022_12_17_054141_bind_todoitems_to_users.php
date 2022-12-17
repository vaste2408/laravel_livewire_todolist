<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('todoitems') && Schema::hasTable('users')) {
            Schema::table('todoitems', function (Blueprint $table) {
                $table->foreignIdFor(User::class, 'user_id')
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->cascadeOnDelete();
                $table->index(['user_id', 'created_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
