<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    // =====================
    // FORM VIEW
    // =====================

    public function create()
    {
        return view('barang.create');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    // =====================
    // STORE (SIMPAN DATA)
    // =====================

    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required',
            'harga' => 'required|numeric'
        ]);

        // JANGAN kirim id_barang karena dibuat oleh trigger
        Barang::create([
            'nama'  => $request->nama,
            'harga' => $request->harga
        ]);

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil ditambahkan!');
    }

    // =====================
    // UPDATE (EDIT DATA)
    // =====================

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required',
            'harga' => 'required|numeric'
        ]);

        $barang = Barang::findOrFail($id);

        $barang->update([
            'nama'  => $request->nama,
            'harga' => $request->harga
        ]);

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil diperbarui!');
    }

    // =====================
    // DELETE
    // =====================

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil dihapus!');
    }

    // =====================
    // CETAK LABEL PDF (5x8)
    // =====================

    public function pdf_tag(Request $request)
    {
        if (!$request->has('ids')) {
            return redirect()->back()
                ->with('error', 'Pilih minimal satu barang untuk dicetak!');
        }

        $selectedIds = $request->ids;
        $startX = $request->x;
        $startY = $request->y;

        $items = Barang::whereIn('id_barang', $selectedIds)->get();

        $skipCount = (($startY - 1) * 5) + ($startX - 1);

        $pdf = Pdf::loadView('barang.pdf_tag', [
            'items' => $items,
            'skipCount' => $skipCount
        ])->setPaper('a4', 'portrait');

        return $pdf->stream('tag-barang.pdf');
    }
}