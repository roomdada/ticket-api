<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderIntentIdToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('order_intent_id')->nullable();

            // Ajout de la clé étrangère
            $table->foreign('order_intent_id')->references('id')->on('order_intents')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['order_intent_id']);
            $table->dropColumn('order_intent_id');
        });
    }
}