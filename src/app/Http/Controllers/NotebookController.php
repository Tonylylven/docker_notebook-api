<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNotebookRequest;
use App\Http\Requests\UpdateNotebookRequest;
use App\Models\Notebook;
use Illuminate\Http\Request;
use App\Http\Resources\NotebookCollection;
use App\Http\Resources\NotebookResource;
use OpenApi\Attributes as OA;


#[
    OA\Info(
        version: "1.0.0",
        title: "Notebook API",
        description: "Notebook API",
    )
]
#[OA\Parameter(name: 'notebook', description: 'Первичный ключ', in: 'path')]
class NotebookController extends Controller
{

    #[OA\Get(
        description: 'Возвращает перечень записей',
        path: '/api/v1/notebook/',
    )]
    #[OA\Response(
        content: new OA\JsonContent(),
        description: 'Перечень записей',
        response: 200,
    )]
    #[OA\Response(
        content: new OA\JsonContent(),
        description: 'Запись не найдена',
        response: 404,
    )]
    // Вывод всех записей
    public function index(){
        $notebooks = Notebook::all();
        return new NotebookCollection($notebooks);
    }

    #[OA\Post(
        description: 'Создаёт запись',
        path: '/api/v1/notebook/{notebook}/',
    )]
    #[OA\Response(
        content: new OA\JsonContent(),
        description: 'Запись создана',
        response: 201,
    )]
    /**
     * Create a new record in the database.
     *
     * @param StoreNotebookRequest $request The request object containing the data for the new record.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the created record with a status code of 201.
     */
    public function store(StoreNotebookRequest $request){
        $data = $request -> validated();
        $notebook = Notebook::create($data);
        return response()->json($notebook, 201)->withHeaders([
            'Location' => route('notebooks.show', [
                'notebook' => $notebook->id,
            ]),
        ]);
    }

    #[OA\Get(
        description: 'Возвращает запись по идентификатору',
        parameters: [
            new OA\Parameter(ref: '#/components/parameters/notebook'),
        ],
        path: '/api/v1/notebook/{notebook}/',
    )]
    #[OA\Response(
        content: new OA\JsonContent(),
        description: 'Запись',
        response: 200,
    )]
    #[OA\Response(
        content: new OA\JsonContent(),
        description: 'Запись не найдена',
        response: 404,
    )]
    public function show(Notebook $notebook)
    {
        return new NotebookResource($notebook);
    }

    #[OA\Patch(
        description: 'Корректирует запись',
        parameters: [
            new OA\Parameter(ref: '#/components/parameters/notebook'),
        ],
        path: '/api/v1/notebook/{notebook}/',
    )]
    #[OA\Response(
        content: new OA\JsonContent(),
        description: 'Запись откорректирована',
        response: 204,
    )]
    public function update(UpdateNotebookRequest $request, Notebook $notebook){
        $data = $request->validated();
        $notebook->update($data);
        return response()->noContent(204);
    }

    #[OA\Delete(
        description: 'Удаляет запись',
        parameters: [
            new OA\Parameter(ref: '#/components/parameters/notebook'),
        ],
        path: '/api/v1/notebook/{notebook}/',
    )]
    #[OA\Response(
        content: new OA\JsonContent(),
        description: 'Запись удалена',
        response: 204,
    )]
    public function destroy(Notebook $notebook){
        $notebook->delete();
        return response()->noContent(204);
    }
}
