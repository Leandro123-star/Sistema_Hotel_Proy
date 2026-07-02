<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index() {
        $pagos = Pago::all();
        return view('pagos.index', compact('pagos'));
    }

    public function create() {
        return view('pagos.create');
    }

    public function store(Request $request) {
        Pago::create($request->all());
        return redirect()->route('pagos.index');
    }

    public function edit($id) {
        $pago = Pago::findOrFail($id);
        return view('pagos.edit', compact('pago'));
    }

    public function update(Request $request, $id) {
        $pago = Pago::findOrFail($id);
        $pago->update($request->all());
        return redirect()->route('pagos.index');
    }

    public function destroy($id) {
        Pago::destroy($id);
        return redirect()->route('pagos.index');
    }
}
