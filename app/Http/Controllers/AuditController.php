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
        $audit->no_kakitangan = Auth::user()->no_kakitangan;
        $audit->tindakan = strtoupper($tindakan);
        $audit->deskripsi = ucwords($tindakan).' '.ucwords($model).' ID='.$id;
        $audit->save();
    }

    public function filter()
    {
        $no_kakitangan = $_GET['no_kakitangan'];
        $tarikh = $_GET['tarikh'];
        $aktiviti = $_GET['aktiviti'];

        if ($no_kakitangan != null) {
            if ($tarikh != null) {
                if ($aktiviti != null) {
                    $audit = AuditTrail::where('no_kakitangan', 'LIKE', '%'.$no_kakitangan.'%')->whereDate('created_at', $tarikh)->where('tindakan', 'LIKE', '%'.$aktiviti.'%')->get();
                } else {
                    $audit = AuditTrail::where('no_kakitangan', 'LIKE', '%'.$no_kakitangan.'%')->whereDate('created_at', $tarikh)->get();
                }
                
            } else {
                if ($aktiviti != null) {
                    $audit = AuditTrail::where('no_kakitangan', 'LIKE', '%'.$no_kakitangan.'%')->where('tindakan', 'LIKE', '%'.$aktiviti.'%')->get();
                } else {
                    $audit = AuditTrail::where('no_kakitangan', 'LIKE', '%'.$no_kakitangan.'%')->get();
                }
            }
            
        } else {
            if ($tarikh != null) {
                if ($aktiviti != null) {
                    $audit = AuditTrail::whereDate('created_at', $tarikh)->where('tindakan', 'LIKE', '%'.$aktiviti.'%')->get();
                } else {
                    $audit = AuditTrail::whereDate('created_at', $tarikh)->get();
                }
                
            } else {
                if ($aktiviti != null) {
                    $audit = AuditTrail::where('tindakan', 'LIKE', '%'.$aktiviti.'%')->get();
                } else {
                    $audit = AuditTrail::get();
                }
            }
        }

        return response()->json($audit);
        
    }
}
