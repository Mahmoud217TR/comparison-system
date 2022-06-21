<?php

use App\Models\Item;
use App\Models\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_type', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Item::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Type::class)->constrained()->onDelete('cascade');
            $table->string('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_type');
    }
};
