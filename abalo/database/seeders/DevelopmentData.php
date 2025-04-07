<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevelopmentData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->fillUserTable();
        $this->fillArticlesTable();
        $this->fillArticleCategoryTable();
        $this->fillImages();
    }

    public function fillImages(): void
    {
        $imagePath = public_path('images/articleImages/');
        $count_articles = DB::table('ab_article')->count();

        for ($i = 1; $i <= $count_articles; $i++) {
            $filename_jpg = $i . '.jpg';
            $fullPath_jpg = $imagePath . $filename_jpg;
            $filename_png = $i . '.png';
            $fullPath_png = $imagePath . $filename_png;


            if (file_exists($fullPath_jpg)) {
                DB::table('ab_article')
                    ->where('id', $i)
                    ->update([
                        'ab_image' => 'images/articleImages/' . $filename_jpg
                    ]);
            } else if (file_exists($fullPath_png)) {
                DB::table('ab_article')
                    ->where('id', $i)
                    ->update([
                        'ab_image' => 'images/articleImages/' . $filename_png
                    ]);
            }
        }
    }

    public function fillUserTable() : void {
        $path = database_path('seeders/user.csv');
        if (!file_exists($path)) {
            dd("Datei nicht gefunden: $path");
        }
        $file = fopen($path, 'r');
        $header_line = true;
        while (($data = fgetcsv($file, 0, ';')) !== false) {

            if ($header_line) {
                $header_line = false;
                continue;
            }


            DB::table('ab_user')->insert([
                'id' => (int) $data[0],
                'ab_name' => $data[1],
                'ab_password' => $data[2],
                'ab_mail' => $data[3],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        fclose($file);
    }

    public function fillArticlesTable() : void {
        $path = database_path('seeders/articles.csv');
        if (!file_exists($path)) {
            dd("Datei nicht gefunden: $path");
        }
        $file = fopen($path, 'r');
        $header_line = true;
        while (($data = fgetcsv($file, 0, ';')) !== false) {

            if ($header_line) {
                $header_line = false;
                continue;
            }

            DB::table('ab_article')->insert([
                'id' => (int) $data[0],
                'ab_name' => $data[1],
                'ab_price' => (int) str_replace('.', '', $data[2]) * 100, // Preis in Cent
                'ab_description' => $data[3],
                'ab_creator_id' => (int) $data[4],
                'ab_createdate' => \DateTime::createFromFormat('d.m.y H:i', $data[5])?->format('Y-m-d H:i:s'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        fclose($file);
    }

    public function fillArticleCategoryTable() : void {
        $path = database_path('seeders/articlecategory.csv');
        if (!file_exists($path)) {
            dd("Datei nicht gefunden: $path");
        }
        $file = fopen($path, 'r');
        $header_line = true;
        while (($data = fgetcsv($file, 0, ';')) !== false) {

            if ($header_line) {
                $header_line = false;
                continue;
            }
            DB::table('ab_articlecategory')->insert([
                'id' => (int) $data[0],
                'ab_name' => $data[1],
                'ab_parent' => (strtoupper($data[2]) === 'NULL') ? null : (int)$data[2],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        fclose($file);
    }


}
