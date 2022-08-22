<?php

namespace App\Http\Controllers;

use App\Models\AuditTrail;
use Illuminate\Support\Facades\Auth;

class AuditController extends Controller
{
    public function index()
    {
        $audit = AuditTrail::with('pengguna')->get();
        return view('audit.index', [
            'audit'=>$audit
        ]);
    }
    
    public static function audit($tindakan, $model, $id)
    {
        $audit = new AuditTrail;
        $audit->user_id = Auth::id();
        $audit->tindakan = strtoupper($tindakan);
        $audit->deskripsi = ucwords($tindakan).' '.ucwords($model).' ID='.$id;
        $audit->save();
    }
}
