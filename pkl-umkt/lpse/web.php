<?php

Route::prefix('nama-page')->group(function () {
  Route::get('/', [NamaController::class, 'index'])
    ->name('admin.nama-page.index');
  Route::get('/create', [NamaController::class, 'create'])
    ->name('admin.nama-page.create');
  Route::post('/store', [NamaController::class, 'store'])
    ->name('admin.nama-page.store');
  Route::get('/edit/{id}', [NamaController::class, 'edit'])
    ->name('admin.nama-page.edit');
  Route::post('/update/{id}', [NamaController::class, 'update'])
    ->name('admin.nama-page.update');
  Route::delete('/delete/{id}', [NamaController::class, 'destroy'])
    ->name('admin.nama-page.destroy');
});
