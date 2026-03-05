<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */
    public function indexBarang()
    {
        $barangs = DB::table('barang')->get();
        return view('barang.index', compact('barangs'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE PAGE
    |--------------------------------------------------------------------------
    */
    public function createBarang()
    {
        return view('barang.create');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT PAGE
    |--------------------------------------------------------------------------
    */
    public function editBarang($id)
    {
        $barang = DB::table('barang')
                    ->where('id_barang', $id)
                    ->first();

        if (!$barang) {
            return redirect()->route('barang.index')
                             ->with('error', 'Data tidak ditemukan');
        }

        return view('barang.edit', compact('barang'));
    }

    /*
    |--------------------------------------------------------------------------
    | GENERATE TAG HARGA
    |--------------------------------------------------------------------------
    */
    public function generateTagHarga(Request $request)
    {
        $selectedIds = $request->input('ids', []);

        if (empty($selectedIds)) {
            return redirect()->back()
                ->with('error', 'Silahkan pilih barang terlebih dahulu!');
        }

        $startX = (int) $request->input('x', 1);
        $startY = (int) $request->input('y', 1);

        $skipCount = (($startY - 1) * 5) + ($startX - 1);

        $items = DB::table('barang')
            ->whereIn('id_barang', $selectedIds)
            ->get();

        $pdf = Pdf::loadView('barang.pdf_tag', [
            'items' => $items,
            'skipCount' => $skipCount
        ]);

        return $pdf->setPaper('a4', 'potrait')
                   ->stream('Tag_Harga_UMKM.pdf');
    }

    /*
    |--------------------------------------------------------------------------
    | SERTIFIKAT
    |--------------------------------------------------------------------------
    */
    public function generateSertifikat()
    {
        $data = [
            'nama' => 'Alfia',
            'peran' => 'WAKIL KETUA PELAKSANA',
            'acara' => 'Seminar Nasional FIKKIA UNAIR',
            'tanggal' => '18 Oktober 2025'
        ];

        $pdf = Pdf::loadView('dokumen.sertifikat', $data);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Sertifikat.pdf');
    }

    /*
    |--------------------------------------------------------------------------
    | UNDANGAN
    |--------------------------------------------------------------------------
    */
    public function generateUndangan()
    {
        $data = [
            'nomor' => '556/B/DST/UN3.FV/TU.01.00/2026',
            'perihal' => 'Undangan Silaturahmi Awal Tahun',
            'tanggal_surat' => '13 Januari 2026',
            'hari_tgl' => 'Selasa, 20 Januari 2026',
            'waktu' => '10.00-13.00 WIB',
            'tempat' => 'Aula Gedung A Lt.3 Fakultas Vokasi'
        ];

        $pdf = Pdf::loadView('dokumen.undangan', $data);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Undangan.pdf');
    }
}