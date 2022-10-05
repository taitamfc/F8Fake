<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Level;

// Resources
use App\Http\Resources\LevelCollection;
use App\Http\Resources\LevelResource;

// Requests
use App\Http\Requests\StoreLevelRequest;
use App\Http\Requests\UpdatelevelRequest;

class LevelController extends Controller
{
    /*
        Ly thuyet:
        Collection: Dung de tra ve mang du lieu
        - php artisan make:collection LevelCollection
        Resource  : Dung de tra ve chi tiet du lieu
        - php artisan make:resource LevelResource
        Dung with() de lay them moi quan he trong model
        ->with('MQH1')
        ->with('MQH2')

    */
    public function index()
    {
        /*
        - Dung Collection de tu dong tra ve json
        - Doc them: https://viblo.asia/p/eloquent-api-resources-aWj53GA156m
        - Doc them: https://www.digitalocean.com/community/tutorials/how-to-create-laravel-eloquent-api-resources-to-convert-models-into-json
        */  
        $items = Level::paginate();
        /*
        Muon lay them moi quan he courses trong model:
        $items = Level::with('courses')->paginate();
        */
        // return new LevelCollection($items);

        /*
        Neu khong dung Collection thi co the dung Resource::collection
        Comment dong 44 de xem ket qua
        */
        // return LevelResource::collection($items);

        /*
        Tra ve bang JSON binh thuong
        Comment dong 44,50 de xem ket qua
        */
        return response()->json([
            'data' => $items,
            'count' => $items->count()
        ]);

    }
    
    public function show($id)
    {
        /*
        Tra ve bang API Resource
        */
        $item = Level::find($id);
        return new LevelResource($item);

        /*
        Tra ve bang JSON binh thuong va lay them moi quan he courses trong model
        Comment dong 69 de thay ket qua
        */
        //Lay chi tiet level hien tai -> courses -> level cua course
        $item = Level::with([
            'courses' => function( $query ){
                return $query->with('level');
            }
        ])->find($id);

        return response()->json([
            'data' => $item
        ]);

    }
    public function store(StoreLevelRequest $request)
    {
        //
    }
    public function update(UpdateLevelRequest $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
