<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Mozi;
use App\Models\Film;
use Illuminate\Support\Facades\DB;

class FilmMoziSeeder extends Seeder
{
    public function run()
    {
        $base = database_path('seeders/data');

        // --- FILMEK beolvasása (film.txt)
        $filmFile = $base . '/film.txt';
        if (file_exists($filmFile)) {
            $lines = file($filmFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            // első sor a header -> skip
            $header = array_shift($lines);
            foreach ($lines as $line) {
                // tab-delimited
                $cols = preg_split('/\t+/', $line);
                // fkod, filmcim, szines, szinkron, szarmazas, mufaj, hossz
                $fkod = intval($cols[0] ?? 0);
                Film::updateOrCreate(
                    ['fkod' => $fkod],
                    [
                        'filmcim' => $cols[1] ?? null,
                        'szines' => is_numeric($cols[2] ?? null) ? intval($cols[2]) : null,
                        'szinkron' => $cols[3] ?? null,
                        'szarmazas' => $cols[4] ?? null,
                        'mufaj' => $cols[5] ?? null,
                        'hossz' => is_numeric($cols[6] ?? null) ? intval($cols[6]) : null
                    ]
                );
            }
        }

        // --- MOZIK beolvasása (mozi.txt)
        $moziFile = $base . '/mozi.txt';
        if (file_exists($moziFile)) {
            $lines = file($moziFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $header = array_shift($lines);
            foreach ($lines as $line) {
                $cols = preg_split('/\t+/', $line);
                $moziazon = intval($cols[0] ?? 0);
                Mozi::updateOrCreate(
                    ['moziazon' => $moziazon],
                    [
                        'mozinev' => $cols[1] ?? null,
                        'irszam' => $cols[2] ?? null,
                        'cim' => $cols[3] ?? null,
                        'telefon' => $cols[4] ?? null
                    ]
                );
            }
        }

        // --- PIVOT beolvasása (hely.txt)
        $helyFile = $base . '/hely.txt';
        if (file_exists($helyFile)) {
            $lines = file($helyFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $header = array_shift($lines);
            foreach ($lines as $line) {
                $cols = preg_split('/\t+/', $line);
                $fkod = intval($cols[0] ?? 0);
                $moziazon = intval($cols[1] ?? 0);

                // ellenőrizzük, hogy léteznek-e
                $film = Film::where('fkod', $fkod)->first();
                $mozi = Mozi::where('moziazon', $moziazon)->first();
                if ($film && $mozi) {
                    // pivot tábla mezőit manuálisan töltjük (mert custom kulcsok)
                    DB::table('film_mozi')->updateOrInsert(
                        ['fkod' => $fkod, 'moziazon' => $moziazon],
                        ['created_at' => now(), 'updated_at' => now()]
                    );
                }
            }
        }
    }
}
