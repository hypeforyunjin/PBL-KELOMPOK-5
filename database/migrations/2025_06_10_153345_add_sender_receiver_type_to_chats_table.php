<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->string('sender_type')->default('user');
            $table->string('receiver_type')->default('admin');
        });
    }

    public function down()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->dropColumn(['sender_type', 'receiver_type']);
        });
    }
};