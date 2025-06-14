<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');      // id pengirim
            $table->unsignedBigInteger('receiver_id');  // id penerima
            $table->string('sender_type');              // 'user' atau 'admin'
            $table->string('receiver_type');            // 'user' atau 'admin'
            $table->text('message');
            $table->string('sender');                   // 'user' atau 'admin'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chats');
    }
}