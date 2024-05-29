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
        Schema::create(
            'applications',
            function (Blueprint $table) {
                $table->id();

                $table->string('title');
                $table->text('description');
                $table->integer('price');
                $table->string('type');
                $table->string('photo_before');
                $table->string('photo_after')->nullable();
                $table->string('status')->default('Новая');
                $table->text('reason')->nullable();

                $table->unsignedBigInteger('user_id');

                $table->unsignedBigInteger('category_id');
                $table->foreign('category_id')
                    ->references('id')->on('categories')
                    ->onDelete('cascade');

                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
