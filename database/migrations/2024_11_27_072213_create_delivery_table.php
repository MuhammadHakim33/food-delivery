<?php

use App\Models\Order;
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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignIdFor(Order::class);
            $table->enum('status', ['pending', 'process', 'shipped', 'delivered', 'failed'])->default('pending');
            $table->timestamps();
        });

        Schema::create('delivery_address', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('delivery_id')->constrained('deliveries');
            $table->string('kecamatan', 255)->nullable();
            $table->string('kelurahan', 255)->nullable();
            $table->text('detail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery');
        Schema::dropIfExists('delivery_address');
    }
};
