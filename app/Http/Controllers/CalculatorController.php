<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Wajib agar tidak error "Class not found"

class CalculatorController extends Controller
{
    /**
     * Fungsi untuk memproses logika matematika.
     * Menerima request dari user dan mengirimkan respons via HTTP[cite: 29, 90].
     */
    public function hitung($angka1, $angka2, $operasi)
    {
        $hasil = 0;
        
        // Trim untuk jaga-jaga jika simbol + berubah jadi spasi di URL
        $operasiBersih = trim($operasi);

        switch ($operasiBersih) {
            case '+':
            case '': // Menangani jika + diterjemahkan sebagai spasi
                $hasil = $angka1 + $angka2;
                $simbol = '+';
                break;
            case '-':
                $hasil = $angka1 - $angka2;
                $simbol = '-';
                break;
            case '*':
                $hasil = $angka1 * $angka2;
                $simbol = '*';
                break;
            case '|':
                // Validasi agar tidak membagi dengan nol [cite: 91]
                if ($angka2 == 0) {
                    return "Error: Tidak bisa membagi dengan nol!";
                }
                $hasil = $angka1 / $angka2;
                $simbol = '|';
                break;
            default:
                return "Operasi '$operasi' tidak dikenal. Gunakan +, -, *, atau |.";
        }

        return "Hasil dari $angka1 $simbol $angka2 adalah: " . $hasil;
    }
}