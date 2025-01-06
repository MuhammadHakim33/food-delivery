<?php

use App\Models\Menu;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->char('id', 255)->primary();
            $table->foreignId('user_id')->constrained('users');
            $table->integer('total');
            $table->enum('status', ['failed', 'pending', 'success'])->default('pending');
            $table->char('snap_token')->nullable();
            $table->timestamps();
        });

        Schema::create('item_order', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::class);
            $table->foreignIdFor(Menu::class);
            $table->integer('qty');
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('item_order');
    }
};
