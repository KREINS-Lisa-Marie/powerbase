<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        // Ouvrir le fichier CSV
        $products_csv = database_path('seeders/tables/products.csv');
        $file = fopen($products_csv, 'rb');

        // Lire les headers
        $headers = fgetcsv($file, 1000, ';', escape: '');

        // Nettoyer les headers
        $headers = array_map('trim', $headers);
        //dd($headers);

        // enlever les colonnes vides
        $headers = array_filter(array_map('trim', $headers));

        // Supprimer les produits avant d'importer
        DB::table('products')->truncate();

        // boucler sur chaque ligne du csv
        while ($product_row = fgetcsv($file, 1000, ';', escape: '')) {

        // si j'ai le même nombre de headers que colonnes alors :
        if (count($product_row) === count($headers)) {

        // Combiner headers et values pour qu'on puisse les appeler par leur nom
        $row = array_combine($headers, $product_row);

        // inserer products dans db
        DB::table('products')->insert([
            'product_name'        => ltrim($row['product_name'], '* '),  // ça enlève les *** devant les noms
            'brand'               => $row['brand'],
            'ref_article'         => $row['ref_article'],
            'gtin'                => $row['gtin'],
            'product_description' => $row['product_description'],
            'product_notes'       => $row['product_notes'],
            'quantity'            => (int) $row['quantity'],
            'product_image'       => null,
            'created_at'          => now(),
            'updated_at'          => now(),
                ]);
            }
        }

        // fermer le fichier
        fclose($file);
    }
}
