<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();

            $table->string('type_identity')->nullable();
            $table->string('doc_identity')->nullable();

            $table->foreignId('state_id')->nullable()->constrained()->onDelete('set Null');
            $table->foreignId('city_id')->nullable()->constrained()->onDelete('set Null');

            $table->string('address')->nullable();
            $table->string('phone')->nullable();

            $table->string('delivery_free')->nullable();

            $table->string('status')->default('active');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
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
        Schema::dropIfExists('users');
    }
}

