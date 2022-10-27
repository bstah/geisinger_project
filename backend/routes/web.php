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
    dd($data->response->docs);
    // return view('welcome');
});
