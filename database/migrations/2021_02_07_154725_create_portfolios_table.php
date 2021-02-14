<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('portfolios', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('slug');
                $table->text('description');
                $table->text('link');
                $table->text('image');
                $table->text('gallery')->nullable();
                $table->foreignId('category_id')
                    ->constrained('categories')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
                $table->timestamp('created_at');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}
