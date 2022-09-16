<?php

use App\Models\Contract;
use App\Models\Job;
use App\Models\MessageType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id()->startingValue(0);
            $table->string('messageContent');
            $table->foreignIdFor(MessageType::class);
            $table->foreignIdFor(Contract::class);
            $table->foreignIdFor(Job::class)->nullable();
            $table->morphs('messagable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
