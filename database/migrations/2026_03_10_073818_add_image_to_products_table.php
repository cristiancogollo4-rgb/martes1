<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

  public function up()
{
    Schema::table('products', function (Blueprint $table) {
        // Añadimos la columna para la ruta de la imagen
        $table->string('image')->nullable()->after('stock');
    });
}

public function down()
{
    Schema::table('products', function (Blueprint $table) {
        // Si revertimos la migración, borramos la columna
        $table->dropColumn('image');
    });
}
};
