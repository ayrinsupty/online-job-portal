<?php

use App\Models\Job;
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
        Schema::create(with(new Job())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');
            $table->string('title');
            $table->string('short_description');
            $table->string('salary')->nullable();
            $table->string('type')->default(Job::$statusType[1]);
            $table->string('description');
            $table->string('application_last_date');
            $table->string('status')->default(Job::$statusArray[1]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(with(new Job())->getTable());
    }
};
