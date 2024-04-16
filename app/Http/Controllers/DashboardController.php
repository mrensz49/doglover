<?php

namespace App\Http\Controllers;

use App\Models\Dogs;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Dogs::count()) {
       
            $response = Http::get('https://dog.ceo/api/breeds/list/all');
            $datas = [];
            $index = 0;
            foreach ($response->object()->message as $key => $breed) {
                if ($index <= 15) {
                    $dogs = Http::get('https://dog.ceo/api/breed/'.$key.'/images/random');

                    $datas[] = [
                        'name' => ucfirst($key),
                        'image_link' => $dogs->object()->message,
                        
                    ];
                }

                $index++;
            }

            $currentTime = now();
            $dataDataWithTimestamps = array_map(function ($data) use ($currentTime) {
                return array_merge($data, ['created_at' => $currentTime, 'updated_at' => $currentTime]);
            }, $datas);

            Dogs::insert($dataDataWithTimestamps);
        }
        
        // return Dogs::withCount('like', 'likes')->with('likes')->get();
        return view('dashboard', [
            'breeds' => Dogs::withCount('like', 'likes')->with('likes')->get(),
        ]);
    }
}
