<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Rule;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Dashboard admin
     */
    public function dashboard()
    {
        $totalGejala = Gejala::count();
        $totalPenyakit = Penyakit::count();
        $totalRule = Rule::count();
        $totalRiwayat = Riwayat::count();

        return view('admin_dashboard', compact('totalGejala', 'totalPenyakit', 'totalRule', 'totalRiwayat'));
    }

    // ======================== GEJALA ========================

    public function indexGejala()
    {
        $gejala = Gejala::paginate(10);
        return view('admin_gejala_index', compact('gejala'));
    }

    public function createGejala()
    {
        return view('admin_gejala_create');
    }

    public function storeGejala(Request $request)
    {
        $request->validate([
            'kode_gejala' => 'required|string|max:3|unique:gejala,kode_gejala',
            'nama_gejala' => 'required|string|max:100',
        ]);

        Gejala::create($request->all());
        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil ditambahkan');
    }

    public function editGejala($id)
    {
        $gejala = Gejala::findOrFail($id);
        return view('admin_gejala_edit', compact('gejala'));
    }

    public function updateGejala(Request $request, $id)
    {
        $gejala = Gejala::findOrFail($id);
        $request->validate([
            'kode_gejala' => 'required|string|max:3|unique:gejala,kode_gejala,' . $id . ',id_gejala',
            'nama_gejala' => 'required|string|max:100',
        ]);

        $gejala->update($request->all());
        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil diperbarui');
    }

    public function destroyGejala($id)
    {
        Gejala::destroy($id);
        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil dihapus');
    }

    // ======================== PENYAKIT ========================

    public function indexPenyakit()
    {
        $penyakit = Penyakit::paginate(10);
        return view('admin_penyakit_index', compact('penyakit'));
    }

    public function createPenyakit()
    {
        return view('admin_penyakit_create');
    }

    public function storePenyakit(Request $request)
    {
        $request->validate([
            'kode_penyakit' => 'required|string|max:3|unique:penyakit,kode_penyakit',
            'nama_penyakit' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'solusi_obat' => 'nullable|string',
            'solusi_lain' => 'nullable|string',
        ]);

        Penyakit::create($request->all());
        return redirect()->route('admin.penyakit.index')->with('success', 'Penyakit berhasil ditambahkan');
    }

    public function editPenyakit($id)
    {
        $penyakit = Penyakit::findOrFail($id);
        return view('admin_penyakit_edit', compact('penyakit'));
    }

    public function updatePenyakit(Request $request, $id)
    {
        $penyakit = Penyakit::findOrFail($id);
        $request->validate([
            'kode_penyakit' => 'required|string|max:3|unique:penyakit,kode_penyakit,' . $id . ',id_penyakit',
            'nama_penyakit' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'solusi_obat' => 'nullable|string',
            'solusi_lain' => 'nullable|string',
        ]);

        $penyakit->update($request->all());
        return redirect()->route('admin.penyakit.index')->with('success', 'Penyakit berhasil diperbarui');
    }

    public function destroyPenyakit($id)
    {
        Penyakit::destroy($id);
        return redirect()->route('admin.penyakit.index')->with('success', 'Penyakit berhasil dihapus');
    }

    // ======================== RULE ========================

    public function indexRule()
    {
        $rule = Rule::with(['penyakit', 'gejala'])->paginate(10);
        return view('admin_rule_index', compact('rule'));
    }

    public function createRule()
    {
        $penyakit = Penyakit::all();
        $gejala = Gejala::all();
        return view('admin_rule_create', compact('penyakit', 'gejala'));
    }

    public function storeRule(Request $request)
    {
        $request->validate([
            'kode_rule' => 'required|integer',
            'kode_penyakit' => 'required|string|max:3|exists:penyakit,kode_penyakit',
            'kode_gejala' => 'required|string|max:3|exists:gejala,kode_gejala',
        ]);

        Rule::create($request->all());
        return redirect()->route('admin.rule.index')->with('success', 'Rule berhasil ditambahkan');
    }

    public function editRule($id)
    {
        $rule = Rule::findOrFail($id);
        $penyakit = Penyakit::all();
        $gejala = Gejala::all();
        return view('admin_rule_edit', compact('rule', 'penyakit', 'gejala'));
    }

    public function updateRule(Request $request, $id)
    {
        $rule = Rule::findOrFail($id);
        $request->validate([
            'kode_rule' => 'required|integer',
            'kode_penyakit' => 'required|string|max:3|exists:penyakit,kode_penyakit',
            'kode_gejala' => 'required|string|max:3|exists:gejala,kode_gejala',
        ]);

        $rule->update($request->all());
        return redirect()->route('admin.rule.index')->with('success', 'Rule berhasil diperbarui');
    }

    public function destroyRule($id)
    {
        Rule::destroy($id);
        return redirect()->route('admin.rule.index')->with('success', 'Rule berhasil dihapus');
    }

    // ======================== RIWAYAT ========================

    public function indexRiwayat()
    {
        $riwayat = Riwayat::with('user')->orderBy('tanggal', 'desc')->paginate(15);
        return view('admin_riwayat_index', compact('riwayat'));
    }

    public function destroyRiwayat($id)
    {
        Riwayat::destroy($id);
        return redirect()->route('admin.riwayat.index')->with('success', 'Riwayat berhasil dihapus');
    }
}
