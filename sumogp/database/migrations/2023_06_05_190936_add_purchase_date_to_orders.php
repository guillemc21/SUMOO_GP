<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPurchaseDateToOrders extends Migration
{
    public function up()
    {
        Schema::table('facturas', function (Blueprint $table) {
            $table->date('purchase_date')->nullable();
        });
    }

    public function down()
    {
        Schema::table('facturas', function (Blueprint $table) {
            $table->dropColumn('purchase_date');
        });
    }
}
