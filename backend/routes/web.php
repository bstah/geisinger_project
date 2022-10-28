<?php

use Illuminate\Support\Facades\Route;

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
    $jsonData = file_get_contents('http://ftp.ebi.ac.uk/pub/databases/genenames/hgnc/json/locus_types/gene_with_protein_product.json');
    $data = json_decode($jsonData);
    $gene = $data->response->docs[12470];
    dd($gene);
    // $id = DB::table('genes')->insertGetId([
    //     'symbol' => $gene->symbol,
    //     'location' => $gene->location,
    //     'name' => $gene->name,
    //     'type' => $gene->locus_type,
    //     'previousSymbols' => implode(', ',$gene->alias_symbol),
    //     'aliasSymbols' => implode(', ',$gene->alias_symbol),
    //     'hgncId' => $gene->hgnc_id,
    // ]);
    return $id;
    // return view('welcome');
});
