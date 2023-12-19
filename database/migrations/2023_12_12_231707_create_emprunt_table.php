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
        Schema::create('emprunt', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('livre_id');
            $table->unsignedBigInteger('client_id');
            $table->timestamp('date_emprunt')->useCurrent();
            $table->timestamp('date_retour')->nullable();
            $table->timestamps();

            // Clé étrangère vers Livres
            $table->foreign('livre_id')->references('id')->on('livres')->onDelete('cascade');

            // Clé étrangère vers Clients
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprunt');
    }
};
