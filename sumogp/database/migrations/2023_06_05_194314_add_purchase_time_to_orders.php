<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPurchaseTimeToOrders extends Migration
{
    public function up()
    {
        Schema::table('facturas', function (Blueprint $table) {
            $table->time('purchase_time')->nullable();
        });
    }

    public function down()
    {
        Schema::table('facturas', function (Blueprint $table) {
            $table->dropColumn('purchase_time');
        });
    }
}
