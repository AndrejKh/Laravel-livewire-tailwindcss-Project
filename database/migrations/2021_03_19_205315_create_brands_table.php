<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->text('description')->nullable();
            $table->string('code')->nullable();

            $table->string('slug');
            $table->text('profile_photo_path_brand')->nullable();

            $table->double('rating_average')->nullable();

            $table->string('status')->default('active');
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
        Schema::dropIfExists('brands');
    }
}
