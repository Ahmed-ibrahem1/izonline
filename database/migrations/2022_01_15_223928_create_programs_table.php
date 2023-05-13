<?php

use App\Models\Branch;
use App\Models\Category;
use App\Models\Level;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)->nullable()->default(null);
            $table->foreignIdFor(Level::class);
            $table->foreignIdFor(Branch::class)->nullable()->default(null);

            $table->json('title');
            $table->json('description')->nullable();
            $table->json('objectives')->nullable();
            $table->json('aimed_at')->nullable();
            $table->json('learn_to')->nullable();
            $table->json('modules')->nullable();

            $table->integer('duration');
            $table->string('image');
            $table->integer('price');
            $table->string('language');
            $table->string('delivery_mode');
            $table->boolean('featured')->default(false);
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
        Schema::dropIfExists('programs');
    }
}
