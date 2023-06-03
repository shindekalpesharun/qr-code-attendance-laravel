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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id')->unsigned()->index();
            $table->unsignedBigInteger('user_id')->unsigned()->index();
            $table->string('subject_name');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('class_id')->references('id')->on('class')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
        Schema::dropForeign(['class_id', 'user_id']);
    }
};
