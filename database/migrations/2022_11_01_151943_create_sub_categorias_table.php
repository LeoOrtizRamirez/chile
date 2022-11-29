<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categorias', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->text('descripcion');
            $table->text('observaciones');

            $table->unsignedBigInteger('id_padre_sub_categoria')->nullable();
            $table->foreign('id_padre_sub_categoria')
                ->references('id')
                ->on('sub_categorias')
                ->onDelete('set null');

            $table->string('adt_usuario_modificacion');
            $table->date('adt_fecha_modificacion');
            $table->string('icon');
            $table->integer('orden');
            $table->boolean('is_oculto')->deafult(false);
            
            $table->integer('id_region')->deafult(null);

            $table->integer('tipo_categoria')->comment('1 = Actividad Economica, 2 = Modalidad , 3 = Ubicación');

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
        Schema::dropIfExists('sub_categorias');
    }
}
