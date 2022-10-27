<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonData = file_get_contents('http://ftp.ebi.ac.uk/pub/databases/genenames/hgnc/json/locus_types/gene_with_protein_product.json');
        $data = json_decode($jsonData);
        $dataArray = $data->response->docs[1];
        foreach($dataArray as $gene){
            DB::table('genes')->insert([
                'symbol' => $gene->symbol,
                'location' => $gene->location,
                'name' => $gene->name,
                'type' => $gene->locus_type,
                'previousSymbols' => implode($gene->alias_symbol),
                'aliasSymbols' => implode(', ',$gene->alias_symbol),
                'hgncId' => $gene->hgnc_id,
            ]);
        }
    }
}
