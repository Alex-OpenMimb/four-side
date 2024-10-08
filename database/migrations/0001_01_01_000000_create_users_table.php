<?php

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

        Schema::create('seg_usuario', function (Blueprint $table) {
            $table->id('idUsuario');
            $table->string('usuarioNombre')->nullable();
            $table->string('usuarioAlias')->nullable();
            $table->string('usuarioFoto')->nullable();
            $table->string('usuarioPassword')->nullable();
            $table->string('usuarioEmail')->nullable();
            $table->boolean('usuarioConectado')->default(0);
            $table->enum('usuarioEstado',['Activo','Inactivo','Bloqueado'])->default('Activo');
            $table->dateTime('usuarioUltimaConexion')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seg_usuario');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
