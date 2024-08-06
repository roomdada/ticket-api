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
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id'); // Identifiant auto-incrémenté
            $table->string('event_category',255 )->notNull();
            $table->string('event_title', 255);
            $table->mediumText('event_description');
            $table->dateTime('event_date');
            $table->string('event_image', 200)->nullable();
            $table->string('event_city', 100);
            $table->string('event_address', 200);
            $table->enum('event_status', ['upcoming', 'completed', 'cancelled']);
            $table->timestamps(); // Crée les colonnes created_at et updated_at automatiquement
        });
        DB::table('events')
        ->whereRaw('LENGTH(event_title) > 255')
        ->update(['event_title' => DB::raw('LEFT(event_title, 255)')]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};