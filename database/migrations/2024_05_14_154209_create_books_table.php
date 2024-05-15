<?php

use App\Models\Publisher;
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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->bigInteger('editorial_id')->unsigned();
            $table->tinyInteger('edicion');
            $table->string('pais', 50);
            $table->decimal('precio', 10, 2);
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('editorial_id')->references('id')->on('publishers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
