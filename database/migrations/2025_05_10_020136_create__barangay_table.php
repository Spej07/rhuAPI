<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Barangay;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('_barangay', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        $barangays = [
    ['name' => 'Barangay 1'],
    ['name' => 'Barangay 2'],
    ['name' => 'Barangay 3'],
        ];
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_barangay');
    }
};
