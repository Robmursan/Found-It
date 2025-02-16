<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->bigIncrements('id_usuario');//PK
            $table->string('correo',255);
            $table->string('pass',17);
            $table->string('username',255);
            $table->enum('rol',['administrador','operador']);
            $table->boolean('estado')->default(true);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        Schema::create('material', function (Blueprint $table) {
            $table->bigIncrements('id_material');//PK
            $table->string('nombre',255);
            $table->string('categoria',255);
            $table->bigInteger('codigo')->default(0)->unique();
            $table->timestamp('fecha_ingreso')->default(value: DB::raw(value: 'CURRENT_TIMESTAMP'));
            $table->timestamp('fecha_salida')->nullable();//agrega salida manual
            $table->engine = 'InnoDB';
        });

        Schema::create('inventario', function (Blueprint $table) {
            $table->bigIncrements('id_inventario');//PK
            $table->integer('cantidad')->default(0);
            $table->timestamp('fecha_actualizacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('material_ids');//FK
            //clave foranea
            $table->foreign('material_ids')->references('id_material')->on('material')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        Schema::create('estante', function (Blueprint $table) {
            $table->bigIncrements('id_estante');//PK
            $table->string('pasillo',255);
            $table->string('columna',255);
            $table->string('fila',255);
            $table->boolean('led')->default(false);
            $table->unsignedBigInteger('usuario_id');//FK
            $table->unsignedBigInteger('material_id');//FK
            $table->unsignedBigInteger('inventario_id');//FK

            //definir la claves foraneas
            $table->foreign('usuario_id')->references('id_usuario')->on('usuario')->onDelete('cascade');
            $table->foreign('material_id')->references('id_material')->on('material')->onDelete('cascade');
            $table->foreign('inventario_id')->references('id_inventario')->on('inventario')->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('db_foundit');
        Schema::dropIfExists('estante');
        Schema::dropIfExists('inventario');
        Schema::dropIfExists('material');
        Schema::dropIfExists('usuario');
    }
};
