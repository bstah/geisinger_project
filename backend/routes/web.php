<?php

use Illuminate\Support\Facades\Route;
use App\Models\Gene;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $gene = Gene::paginate(15);
    return json_encode($gene);
    // return view('welcome');
});

Route::get('/search/{symbol}', function ($symbol) {
    $geneSearch = Gene::where('symbol','ilike',$symbol.'%')->get();
    return json_encode($geneSearch);
});

Route::get('/gene/{id}', function ($id){
    $gene = Gene::where('id',$id)->first();
    return json_encode($gene);
});
