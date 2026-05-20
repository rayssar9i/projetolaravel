<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Renomeia Sobremesas (id 4) para Comida Estrangeira
        DB::table('categories')
            ->where('id', 4)
            ->update(['name' => 'Comida Estrangeira']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Volta o nome para Sobremesas se precisar reverter
        DB::table('categories')
            ->where('id', 4)
            ->update(['name' => 'Sobremesas']);
    }
};