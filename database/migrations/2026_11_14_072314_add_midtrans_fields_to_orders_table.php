
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('snap_token')->nullable();
            $table->string('midtrans_transaction_id')->nullable()->unique();
            $table->string('payment_type')->nullable();
            $table->timestamp('paid_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropUnique(['midtrans_transaction_id']);

            $table->dropColumn([
                'snap_token',
                'midtrans_transaction_id',
                'payment_type',
                'paid_at',
            ]);
        });
    }
};
