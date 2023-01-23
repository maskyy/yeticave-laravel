<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('lots', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('url', 100);
            $table->integer('price');
            $table->integer('bet_step');
            $table->foreignId('author_id')->constrained('users');
            $table->foreignId('category_id')->constrained();
            $table->foreignId('winner_id')->nullable()->constrained('users');
            $table->timestamp('creation_date')->default(New Expression('CURRENT_TIMESTAMP'));
            $table->timestamp('end_date');
        });
        DB::statement('ALTER TABLE lots ADD FULLTEXT fulltext_index (title,description)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lots');
    }
};
