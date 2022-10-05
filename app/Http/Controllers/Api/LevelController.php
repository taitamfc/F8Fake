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
        $items = Level::paginate();
        return response()->json([
            'data' => $items,
            'count' => $items->count()
        ]);
    }
    
    public function show($id)
    {
        /*
        Tra ve bang JSON binh thuong va lay them moi quan he courses trong model
        Comment dong 69 de thay ket qua
        Duoi day la 3 tuy chon
        */
        //Lay chi tiet level hien tai
        $item = Level::find($id);

        //Lay chi tiet level hien tai -> courses 
        $item = Level::with('courses')->find($id);

        //Lay chi tiet level hien tai -> courses -> level cua course
        $item = Level::with([
            'courses' => function( $query ){
                return $query->with('level');
            }
        ])->find($id);
        
        return new LevelResource($item);
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
