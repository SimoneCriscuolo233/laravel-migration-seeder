<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('trains', function (Blueprint $table) {
        $table->id(); // Colonna necessaria
        $table->string('company', 50); // Azienda
        $table->string('departure_station', 50); // Stazione di partenza
        $table->string('arrival_station', 50); // Stazione di arrivo
        $table->dateTime('departure_time'); // Orario di partenza (Data e Ora)
        $table->dateTime('arrival_time'); // Orario di arrivo (Data e Ora)
        $table->string('train_code', 12)->unique(); // Codice Treno
        $table->tinyInteger('number_of_carriages'); // Totale Carrozze
        $table->boolean('on_time')->default(true); // In orario
        $table->boolean('is_cancelled')->default(false); // Cancellato
        $table->timestamps(); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
