<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $jsonData = file_get_contents('http://ftp.ebi.ac.uk/pub/databases/genenames/hgnc/json/locus_types/gene_with_protein_product.json');
        $data = json_decode($jsonData);
        $dataArray = $data->response->docs;
        foreach($dataArray as $gene){
            if(!isset($gene->prev_symbol)||!$gene->prev_symbol)
                $gene->prev_symbol = [];
            if(!isset($gene->alias_symbol)||!$gene->alias_symbol)
                $gene->alias_symbol = [];
            if(!isset($gene->location)){
                if(isset($gene->location_sortable))
                    $gene->location = $gene->location_sortable;
                else
                    $gene->location = '';
            }
            DB::table('genes')->insert([
                'symbol' => $gene->symbol,
                'location' => $gene->location,
                'name' => $gene->name,
                'type' => $gene->locus_type,
                'previousSymbols' => implode(', ',$gene->prev_symbol),
                'aliasSymbols' => implode(', ',$gene->alias_symbol),
                'hgncId' => $gene->hgnc_id,
            ]);
        }
    }
}
