<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Этот код определяет группу маршрутов в Laravel с префиксом 'api/v1'.
// Внутри этой группы используется метод 'apiResource' для определения ресурса RESTful API для конечной точки 'notebook'.
// Метод 'apiResource' автоматически генерирует маршруты для распространенных операций CRUD (создание, чтение, обновление, удаление) для класса контроллера 'NotebookController'.
// Это позволяет клиентам взаимодействовать с ресурсом 'notebook' с использованием указанных методов HTTP и URL-адресов.
Route::prefix('api/v1')->group(function() {
    Route::apiResource('notebook', \App\Http\Controllers\NotebookController::class);
});
