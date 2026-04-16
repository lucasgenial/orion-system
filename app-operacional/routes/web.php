<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/orion/dashboard');
});

Route::get('/entrar', function () {
    return view('auth.entrar');
})->name('login');

Route::post('/sair', function () {
    return redirect()->route('login');
})->name('logout');

Route::prefix('orion')->group(function (): void {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('orion.dashboard');

    Route::get('/dashboard/interno', function () {
        return view('admin.dashboard.interno');
    })->name('orion.dashboard.interno');

    Route::get('/ocorrencias', function () {
        return view('admin.ocorrencias.index');
    })->name('orion.ocorrencias.index');

    Route::get('/ocorrencias/nova', function () {
        return view('admin.ocorrencias.form');
    })->name('orion.ocorrencias.create');

    Route::get('/ocorrencias/editar', function () {
        return view('admin.ocorrencias.form');
    })->name('orion.ocorrencias.edit');

    Route::get('/ocorrencias/detalhe', function () {
        return view('admin.ocorrencias.show');
    })->name('orion.ocorrencias.show');

    Route::get('/produtividade', function () {
        return view('admin.produtividade.index');
    })->name('orion.produtividade.index');

    Route::get('/produtividade/nova', function () {
        return view('admin.produtividade.form');
    })->name('orion.produtividade.create');

    Route::get('/unidades', function () {
        return view('admin.unidades.index');
    })->name('orion.unidades.index');

    Route::get('/unidades/nova', function () {
        return view('admin.unidades.form');
    })->name('orion.unidades.create');

    Route::get('/tipificacoes', function () {
        return view('admin.tipificacoes.index');
    })->name('orion.tipificacoes.index');

    Route::get('/usuarios', function () {
        return view('admin.usuarios.index');
    })->name('orion.usuarios.index');

    Route::get('/usuarios/novo', function () {
        return view('admin.usuarios.form');
    })->name('orion.usuarios.create');

    Route::get('/auditoria', function () {
        return view('admin.auditoria.index');
    })->name('orion.auditoria.index');

    Route::get('/seguranca', function () {
        return view('admin.seguranca.index');
    })->name('orion.seguranca.index');

    Route::prefix('minha-conta')->group(function (): void {
        Route::get('/perfil', function () {
            return view('admin.minha-conta.perfil');
        })->name('orion.minha-conta.perfil');

        Route::get('/senha', function () {
            return view('admin.minha-conta.senha');
        })->name('orion.minha-conta.senha');

        Route::get('/notificacoes', function () {
            return view('admin.minha-conta.notificacoes');
        })->name('orion.minha-conta.notificacoes');
    });

    Route::get('/configuracoes', function () {
        return view('admin.configuracoes.index');
    })->name('orion.configuracoes.index');
});
