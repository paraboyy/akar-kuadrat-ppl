<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Log;

class MainController extends Controller
{
    public function login(Request $req) {
        $credentials = $req->only('name', 'password');

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
            return redirect()->route('home');
        }
    }

    public function home() {
        $logs = Log::all();

        return view('home', compact('logs'));
    }

    public function calculate(Request $req) {
        $hasil = null;

        if ($req->tipe == 'SP') {
            //Awal Execution DB
            $awal_db = microtime(true);

            $log = new Log();
            $log->user_id = auth()->user()->id;
            $log->tipe = 'Database (SP)';
            $log->angka_input = $req->angka;


            DB::statement("CALL perhitungan_kuadrat(?, @hasil)", [$log->angka_input]);

            $results = DB::select('SELECT @hasil AS hasil');
            if (!empty($results)) {
                $hasil = $results[0]->hasil;
            }

            $log->angka_output = $hasil;

            //Akhir excution DB
            $akhir_db = microtime(true);
            $log->lama = $akhir_db - $awal_db;
            // dd($log);
            $log->save();

        } else {
            $log = new Log();
            $log->user_id = auth()->user()->id;
            $log->tipe = 'API (Flask)';
            $log->angka_input = $req->angka;

            //Awal Execution API
            $awal_api = microtime(true);

            $apiUrl = env('API_URL'); // Ambil URL dari file .env

            try {
                $response = Http::post($apiUrl, [$log->angka_input]);

                if ($response->successful()) {
                    $hasilKuadrat = $response->json('hasil_kuadrat');
                    echo "Hasil akar kuadrat dari " . $log->angka_input . " adalah: " . $hasilKuadrat;
                } else {
                    $error = $response->json('error');
                    echo "Permintaan gagal. Error: " . $error;
                }
            } catch (Exception $e) {
                echo '<h3>Gagal mengakses API</h3>
                        <form action="home.php" method="post">
                            <button type="submit" name="back">BACK TO DASHBOARD</button>
                        </form>';
            }

            //Akhir excution API
            $akhir_api = microtime(true);
            $lama = $akhir_api - $awal_api;
        }

        return redirect()->route('home');
    }
}
