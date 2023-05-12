<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();

            $table->string('code')->unique();
            $table->string('discount_type');

            $table->text('description')->default('');

            $table->unsignedInteger('amount');
            $table->unsignedInteger('usage_limit')->nullable();

            $table->json('user_ids')->default('[]');
            $table->json('course_ids')->default('[]');
            $table->json('category_ids')->default('[]');

            $table->boolean('all_users')->default(false);
            $table->boolean('all_courses')->default(false);

            $table->date('valid_from')->default(Carbon::minValue());
            $table->date('valid_to')->default(Carbon::maxValue());

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
        Schema::dropIfExists('coupons');
    }
}
