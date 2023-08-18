<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(with(new User)->getTable(), function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->text('address');
            $table->text('linkedin');
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('office_address')->nullable();
            $table->string('logo')->nullable();
            $table->string('type')->default('Seeker');
            $table->string('status')->default('active');
            $table->rememberToken();
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
        Schema::dropIfExists(with(new User)->getTable());
    }
};
