<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\EiancDataSasaran;
use App\Models\EiancDesposisi;
use App\Models\EiancIceBoxId;
use App\Models\EiancInstansi;
use App\Models\EiancPatient;
use App\Models\EiancServiceAncDetail;
use App\Models\EiancServiceKb;
use App\Models\EiancServiceMarrital;
use App\Models\EiancServiceMarritalSkl;
use App\Models\EiancServiceVaksin;
use App\Models\EiancTemoi;
use App\Models\SelecMonth;
use App\Models\SysAlamat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function imunisasi()
    {
        $month = SelecMonth::all();

        return view('pages/report/imunisasi', compact('month'));
    }

    public function cek_imunisasi(Request $request)
    {
        if ($request->month == 'x') {
            return redirect()->back()->withInput()->with('month', 'Options not selected');
        }

        if ($request->year == 'x') {
            return redirect()->back()->withInput()->with('year', 'Options not selected');
        }

        $rmonth = $request->month;
        $ryear = $request->year;

        $find = EiancServiceVaksin::where('svak_ins_id', EiancTemoi::find(auth()->user()->temoi)->value('temoi_ins_id'))
            ->where('svak_date', 'LIKE', '%' . implode('-', [$ryear, sprintf("%02s", $rmonth)]) . '%')
            ->get();

        if (count($find) < 1) {
            Alert::error('Gagal', 'Data tidak ditemukan');
            return redirect()->back()->withInput();
        } else {
            return redirect()->back()->withInput()->with('print', '')->with(compact('rmonth', 'ryear'));
        }
    }

    public function view_imunisasi($month, $year)
    {
        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->get();

        $vaksin = EiancServiceVaksin::where('svak_ins_id', EiancTemoi::find(auth()->user()->temoi)->value('temoi_ins_id'))
            ->where('svak_date', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
            ->get();

        $data = [
            'ins_name' => $ins[0]->ins_name,
            'ins_add' => $ins[0]->ins_address,
            'ins_rt' => $ins[0]->ins_rt,
            'ins_rw' => $ins[0]->ins_rw,
            'ins_telp' => $ins[0]->ins_telp,
            'ins_thumb' => $ins[0]->ins_thumb,
            'al_desa' => SysAlamat::where('kode', $ins[0]->ins_village)->value('nama'),
            'al_subdis' => SysAlamat::where('kode', $ins[0]->ins_subdistrict)->value('nama'),
            'al_dis' => SysAlamat::where('kode', $ins[0]->ins_district)->value('nama'),
            'al_prov' => SysAlamat::where('kode', $ins[0]->ins_province)->value('nama'),
            'month' => $month,
            'year' => $year,
            'vaksin' => $vaksin,
            'nakessip' => $ins[0]->nakes_sip,
            'nakesnip' => $ins[0]->nakes_nip,
        ];

        $pdf = PDF::loadView('pages/report/report/imunisasi', $data)->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function kb()
    {
        $month = SelecMonth::all();

        return view('pages/report/kb', compact('month'));
    }

    public function cek_kb(Request $request)
    {
        if ($request->month == 'x') {
            return redirect()->back()->withInput()->with('month', 'Options not selected');
        }

        if ($request->year == 'x') {
            return redirect()->back()->withInput()->with('year', 'Options not selected');
        }

        $rmonth = $request->month;
        $ryear = $request->year;

        $find = EiancServiceKb::where('sanckb_ins_id', EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))
            ->where('created_at', 'LIKE', '%' . implode('-', [$ryear, sprintf("%02s", $rmonth)]) . '%')
            ->get();

        if (count($find) < 1) {
            Alert::error('Gagal', 'Data tidak ditemukan');
            return redirect()->back()->withInput();
        } else {
            return redirect()->back()->withInput()->with('print', '')->with(compact('rmonth', 'ryear'));
        }
    }

    public function view_kb($month, $year)
    {
        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->get();

        $kb =  EiancServiceKb::where('sanckb_ins_id', EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))
            ->where('created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
            ->get();

        $data = [
            'ins_id' => $ins[0]->ins_id,
            'ins_code' => $ins[0]->ins_code,
            'ins_name' => $ins[0]->ins_name,
            'ins_add' => $ins[0]->ins_address,
            'ins_rt' => $ins[0]->ins_rt,
            'ins_rw' => $ins[0]->ins_rw,
            'ins_telp' => $ins[0]->ins_telp,
            'ins_thumb' => $ins[0]->ins_thumb,
            'al_desa' => SysAlamat::where('kode', $ins[0]->ins_village)->value('nama'),
            'al_subdis' => SysAlamat::where('kode', $ins[0]->ins_subdistrict)->value('nama'),
            'al_dis' => SysAlamat::where('kode', $ins[0]->ins_district)->value('nama'),
            'al_prov' => SysAlamat::where('kode', $ins[0]->ins_province)->value('nama'),
            'month' => $month,
            'year' => $year,
            'kb' => $kb,
            'nakessip' => $ins[0]->nakes_sip,
            'nakesnip' => $ins[0]->nakes_nip,
        ];

        $pdf = PDF::loadView('pages/report/report/kb', $data)->setPaper('A4', 'portrait');
        return $pdf->stream();
    }

    public function cek_kb_subdis(Request $request)
    {
        if ($request->month == 'x') {
            return redirect()->back()->withInput()->with('month', 'Options not selected');
        }

        if ($request->year == 'x') {
            return redirect()->back()->withInput()->with('year', 'Options not selected');
        }

        $rmonth = $request->month;
        $ryear = $request->year;

        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->get();

        $subdist = EiancDataSasaran::where('ds_add_kode', $ins[0]->ins_subdistrict)
            ->where('ds_year', $ryear)
            ->where('ds_month', $rmonth)
            ->get();

        if (count($subdist) < 1) {
            Alert::error('Gagal', 'Data tidak ditemukan');
            return redirect()->back()->withInput();
        } else {
            return redirect()->back()->withInput()->with('print1', '')->with(compact('rmonth', 'ryear'));
        }
    }

    public function view_kb_subdis($month, $year)
    {
        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->get();

        $subdist = EiancDataSasaran::where('ds_add_kode', $ins[0]->ins_subdistrict)
            ->where('ds_year', $year)
            ->where('ds_month', $month)
            ->get();

        $des = EiancDataSasaran::where('ds_add_kode', $ins[0]->ins_subdistrict)
            ->where('ds_year', $year)
            ->where('ds_month', $month)
            ->get();

        $data = [
            'ins_id' => $ins[0]->ins_id,
            'ins_code' => $ins[0]->ins_code,
            'ins_name' => $ins[0]->ins_name,
            'ins_add' => $ins[0]->ins_address,
            'ins_rt' => $ins[0]->ins_rt,
            'ins_rw' => $ins[0]->ins_rw,
            'ins_telp' => $ins[0]->ins_telp,
            'ins_thumb' => $ins[0]->ins_thumb,
            'al_desa' => SysAlamat::where('kode', $ins[0]->ins_village)->value('nama'),
            'al_subdis' => SysAlamat::where('kode', $ins[0]->ins_subdistrict)->value('nama'),
            'al_dis' => SysAlamat::where('kode', $ins[0]->ins_district)->value('nama'),
            'al_prov' => SysAlamat::where('kode', $ins[0]->ins_province)->value('nama'),
            'month' => $month,
            'year' => $year,
            'ins_subdis' => $ins[0]->ins_subdistrict,
            'ins_village' => $ins[0]->ins_village,
            'subdist' => $subdist,
            'des' => $des,
            'nakessip' => $ins[0]->nakes_sip,
            'nakesnip' => $ins[0]->nakes_nip,
        ];

        $pdf = PDF::loadView('pages/report/report/kbsubdis', $data)->setPaper('legal', 'landscape');
        return $pdf->stream();
    }

    public function cek_kb_village(Request $request)
    {
        if ($request->month == 'x') {
            return redirect()->back()->withInput()->with('month', 'Options not selected');
        }

        if ($request->year == 'x') {
            return redirect()->back()->withInput()->with('year', 'Options not selected');
        }

        $rmonth = $request->month;
        $ryear = $request->year;

        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->get();

        $subdist = EiancDataSasaran::where('ds_add_kode', $ins[0]->ins_village)
            ->where('ds_year', $ryear)
            ->where('ds_month', $rmonth)
            ->get();

        if (count($subdist) < 1) {
            Alert::error('Gagal', 'Data tidak ditemukan');
            return redirect()->back()->withInput();
        } else {
            return redirect()->back()->withInput()->with('print2', '')->with(compact('rmonth', 'ryear'));
        }
    }

    public function view_kb_village($month, $year)
    {
        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->get();

        $rw = EiancDataSasaran::where('ds_add_kode', $ins[0]->ins_village)
            ->where('ds_year', $year)
            ->where('ds_month', $month)
            ->get();

        $des = EiancDataSasaran::where('ds_add_kode', $ins[0]->ins_village)
            ->where('ds_year', $year)
            ->where('ds_month', $month)
            ->get();

        $data = [
            'ins_id' => $ins[0]->ins_id,
            'ins_code' => $ins[0]->ins_code,
            'ins_name' => $ins[0]->ins_name,
            'ins_add' => $ins[0]->ins_address,
            'ins_rt' => $ins[0]->ins_rt,
            'ins_rw' => $ins[0]->ins_rw,
            'ins_telp' => $ins[0]->ins_telp,
            'ins_thumb' => $ins[0]->ins_thumb,
            'al_desa' => SysAlamat::where('kode', $ins[0]->ins_village)->value('nama'),
            'al_subdis' => SysAlamat::where('kode', $ins[0]->ins_subdistrict)->value('nama'),
            'al_dis' => SysAlamat::where('kode', $ins[0]->ins_district)->value('nama'),
            'al_prov' => SysAlamat::where('kode', $ins[0]->ins_province)->value('nama'),
            'month' => $month,
            'year' => $year,
            'rw' => $rw,
            'des' => $des,
            'ins_village' => $ins[0]->ins_village,
            'nakessip' => $ins[0]->nakes_sip,
            'nakesnip' => $ins[0]->nakes_nip,
        ];

        $pdf = PDF::loadView('pages/report/report/kbvillage', $data)->setPaper('legal', 'landscape');
        return $pdf->stream();
    }

    public function rujuk($id)
    {
        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->get();

        $data = EiancDesposisi::find(Crypt::decrypt($id));

        $pasien = EiancPatient::where('pat_norm', $data->des_norm)->get();

        $list = [
            'data' => $data,
            'ins_id' => $ins[0]->ins_id,
            'ins_name' => $ins[0]->ins_name,
            'ins_add' => $ins[0]->ins_address,
            'ins_rt' => $ins[0]->ins_rt,
            'ins_rw' => $ins[0]->ins_rw,
            'ins_telp' => $ins[0]->ins_telp,
            'ins_thumb' => $ins[0]->ins_thumb,
            'al_desa' => SysAlamat::where('kode', $ins[0]->ins_village)->value('nama'),
            'al_subdis' => SysAlamat::where('kode', $ins[0]->ins_subdistrict)->value('nama'),
            'al_dis' => SysAlamat::where('kode', $ins[0]->ins_district)->value('nama'),
            'al_prov' => SysAlamat::where('kode', $ins[0]->ins_province)->value('nama'),
            'pasien' => $pasien,
            'nakes' => $ins[0]->nakes_name,
            'nakessip' => $ins[0]->nakes_sip,
            'nakesnip' => $ins[0]->nakes_nip,
        ];

        $pdf = PDF::loadView('pages/report/report/rujuk', $list)->setPaper('A4', 'portrait');
        return $pdf->stream();
    }

    public function skl($id)
    {
        $data = EiancServiceMarritalSkl::where('sancmskl_id', Crypt::decrypt($id))
            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_id', '=', 'eianc_service_marrital_skls.sancmskl_marr_id')
            ->get();

        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->get();

        $patient = EiancPatient::where('pat_norm', $data[0]->sancm_norm)->get();

        $ke = EiancServiceMarrital::join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_id', '=', 'eianc_service_marritals.sancm_anc_d_id')
            ->join('eianc_service_ancs', 'eianc_service_ancs.sanc_id', '=', 'eianc_service_anc_details.sancd_anc_id')
            ->value('sanc_gravida');

        $list = [
            'data' => $data,
            'patient' => $patient,
            'ins_id' => $ins[0]->ins_id,
            'ins_name' => $ins[0]->ins_name,
            'ins_add' => $ins[0]->ins_address,
            'ins_rt' => $ins[0]->ins_rt,
            'ins_rw' => $ins[0]->ins_rw,
            'ins_telp' => $ins[0]->ins_telp,
            'ins_thumb' => $ins[0]->ins_thumb,
            'ins_code' => $ins[0]->ins_code,
            'al_desa' => SysAlamat::where('kode', $ins[0]->ins_village)->value('nama'),
            'al_subdis' => SysAlamat::where('kode', $ins[0]->ins_subdistrict)->value('nama'),
            'al_dis' => SysAlamat::where('kode', $ins[0]->ins_district)->value('nama'),
            'al_prov' => SysAlamat::where('kode', $ins[0]->ins_province)->value('nama'),
            'ke' => $ke,
            'nakes' => $ins[0]->nakes_name,
            'nakessip' => $ins[0]->nakes_sip,
            'nakesnip' => $ins[0]->nakes_nip,
        ];

        $pdf = PDF::loadView('pages/report/report/skl', $list)->setPaper('A4', 'portrait');
        return $pdf->stream();
    }

    public function cekrujuk()
    {
        $month = SelecMonth::all();

        return view('pages/report/rujuk', compact('month'));
    }

    public function cekrujcek(Request $request)
    {
        if ($request->month == 'x') {
            return redirect()->back()->withInput()->with('month', 'Options not selected');
        }

        if ($request->year == 'x') {
            return redirect()->back()->withInput()->with('year', 'Options not selected');
        }

        $rmonth = $request->month;
        $ryear = $request->year;

        $data = EiancDesposisi::where('created_at', 'LIKE', '%' . $ryear . '-' . $rmonth . '%')
            ->where('des_de_id', 2)
            ->where('des_ins_id', EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))
            ->get();

        if (count($data) < 1) {
            Alert::error('Gagal', 'Tidak ditemukan data rujukkan');
            return redirect()->back()->withInput();
        } else {
            return redirect()->back()->withInput()->with('print', '')->with(compact('rmonth', 'ryear'));
        }
    }

    public function viewrujuk($month, $year)
    {
        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->get();

        $data = EiancDesposisi::where('created_at', 'LIKE', '%' . $year . '-' . $month . '%')
            ->where('des_de_id', 2)
            ->where('des_ins_id', $ins[0]->ins_id)
            ->get();

        $list = [
            'ins_id' => $ins[0]->ins_id,
            'ins_name' => $ins[0]->ins_name,
            'ins_add' => $ins[0]->ins_address,
            'ins_rt' => $ins[0]->ins_rt,
            'ins_rw' => $ins[0]->ins_rw,
            'ins_telp' => $ins[0]->ins_telp,
            'ins_thumb' => $ins[0]->ins_thumb,
            'al_desa' => SysAlamat::where('kode', $ins[0]->ins_village)->value('nama'),
            'al_subdis' => SysAlamat::where('kode', $ins[0]->ins_subdistrict)->value('nama'),
            'al_dis' => SysAlamat::where('kode', $ins[0]->ins_district)->value('nama'),
            'al_prov' => SysAlamat::where('kode', $ins[0]->ins_province)->value('nama'),
            'month' => $month,
            'year' => $year,
            'data' => $data,
            'nakessip' => $ins[0]->nakes_sip,
            'nakesnip' => $ins[0]->nakes_nip,
        ];

        $pdf = PDF::loadView('pages/report/report/rujuk1', $list)->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function kohort()
    {
        return view('pages/report/kohort');
    }

    public function cekkohort(Request $request)
    {
        $this->validate($request, [
            'awal' => 'required',
            'akhir' => 'required',
        ]);

        $akhir = $request->akhir;
        $awal = $request->awal;

        if ($akhir < $awal || $akhir == $awal) {
            Alert::error('Gagal', 'Tanggal Kurang Tepat');
            return redirect()->back()->withInput();
        } else {
            $data = EiancServiceAncDetail::whereBetween('eianc_service_anc_details.created_at', [$awal, $akhir])
                ->where('sancd_type', '0')
                ->join('users', 'users.id', '=', 'eianc_service_anc_details.sancd_user_id')
                ->join('eianc_temois', 'eianc_temois.temoi_id', '=', 'users.temoi')
                ->where('temoi_ins_id', EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))
                ->get();

            if (count($data) < 1) {
                Alert::error('Gagal', 'Tidak ditemukan data kohort');
                return redirect()->back()->withInput();
            } else {
                return redirect()->back()->withInput()->with('print', '')->with(compact('awal', 'akhir'));
            }
        }
    }

    public function viewkohort($awal, $akhir)
    {
        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->get();

        $data = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_type', '0')
            ->join('eianc_service_ancs', 'eianc_service_ancs.sanc_id', '=', 'eianc_service_anc_details.sancd_anc_id')
            ->whereBetween('eianc_service_anc_details.created_at', [$awal, $akhir])
            ->join('eianc_service_anc_anamnesas', 'eianc_service_anc_anamnesas.sanca_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_anc_physical_examinations', 'eianc_service_anc_physical_examinations.sancpe_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_anc_treatments', 'eianc_service_anc_treatments.sanct_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_anc_diagnoses', 'eianc_service_anc_diagnoses.sancdi_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->orderBy('ins_rw', 'ASC')
            ->get();

        $salin = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_type', '1')
            ->join('eianc_service_ancs', 'eianc_service_ancs.sanc_id', '=', 'eianc_service_anc_details.sancd_anc_id')
            ->whereBetween('eianc_service_anc_details.created_at', [$awal, $akhir])
            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_marrital_skls', 'eianc_service_marrital_skls.sancmskl_marr_id', '=', 'eianc_service_marritals.sancm_id')
            ->get();

        $list = [
            'ins_id' => $ins[0]->ins_id,
            'ins_name' => $ins[0]->ins_name,
            'ins_add' => $ins[0]->ins_address,
            'ins_rt' => $ins[0]->ins_rt,
            'ins_rw' => $ins[0]->ins_rw,
            'ins_telp' => $ins[0]->ins_telp,
            'ins_thumb' => $ins[0]->ins_thumb,
            'al_desa' => SysAlamat::where('kode', $ins[0]->ins_village)->value('nama'),
            'al_subdis' => SysAlamat::where('kode', $ins[0]->ins_subdistrict)->value('nama'),
            'al_dis' => SysAlamat::where('kode', $ins[0]->ins_district)->value('nama'),
            'al_prov' => SysAlamat::where('kode', $ins[0]->ins_province)->value('nama'),
            'data' => $data,
            'awal' => $awal,
            'akhir' => $akhir,
            'nakessip' => $ins[0]->nakes_sip,
            'nakesnip' => $ins[0]->nakes_nip,
            'salin' => $salin,
        ];

        $pdf = PDF::loadView('pages/report/report/kohort', $list)->setPaper('legal', 'landscape');
        return $pdf->stream();
    }

    public function cekkohortkel(Request $request)
    {
        $this->validate($request, [
            'awal' => 'required',
            'akhir' => 'required',
        ]);

        $akhir = $request->akhir;
        $awal = $request->awal;

        if ($akhir < $awal || $akhir == $awal) {
            Alert::error('Gagal', 'Tanggal Kurang Tepat');
            return redirect()->back()->withInput();
        } else {
            $data = EiancServiceAncDetail::whereBetween('eianc_service_anc_details.created_at', [$awal, $akhir])
                ->where('sancd_type', '0')
                ->join('users', 'users.id', '=', 'eianc_service_anc_details.sancd_user_id')
                ->join('eianc_temois', 'eianc_temois.temoi_id', '=', 'users.temoi')
                ->where('temoi_ins_id', EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))
                ->get();

            if (count($data) < 1) {
                Alert::error('Gagal', 'Tidak ditemukan data kohort');
                return redirect()->back()->withInput();
            } else {
                return redirect()->back()->withInput()->with('print1', '')->with(compact('awal', 'akhir'));
            }
        }
    }

    public function viewkohortkel($awal, $akhir)
    {
        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->get();

        $data = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_type', '0')
            ->join('eianc_service_ancs', 'eianc_service_ancs.sanc_id', '=', 'eianc_service_anc_details.sancd_anc_id')
            ->whereBetween('eianc_service_anc_details.created_at', [$awal, $akhir])
            ->join('eianc_service_anc_anamnesas', 'eianc_service_anc_anamnesas.sanca_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_anc_physical_examinations', 'eianc_service_anc_physical_examinations.sancpe_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_anc_treatments', 'eianc_service_anc_treatments.sanct_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_anc_diagnoses', 'eianc_service_anc_diagnoses.sancdi_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->orderBy('ins_rw', 'ASC')
            ->get();

        $salin = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_type', '1')
            ->join('eianc_service_ancs', 'eianc_service_ancs.sanc_id', '=', 'eianc_service_anc_details.sancd_anc_id')
            ->whereBetween('eianc_service_anc_details.created_at', [$awal, $akhir])
            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_marrital_skls', 'eianc_service_marrital_skls.sancmskl_marr_id', '=', 'eianc_service_marritals.sancm_id')
            ->get();

        $list = [
            'ins_id' => $ins[0]->ins_id,
            'ins_name' => $ins[0]->ins_name,
            'ins_add' => $ins[0]->ins_address,
            'ins_rt' => $ins[0]->ins_rt,
            'ins_rw' => $ins[0]->ins_rw,
            'ins_telp' => $ins[0]->ins_telp,
            'ins_thumb' => $ins[0]->ins_thumb,
            'al_desa' => SysAlamat::where('kode', $ins[0]->ins_village)->value('nama'),
            'al_subdis' => SysAlamat::where('kode', $ins[0]->ins_subdistrict)->value('nama'),
            'al_dis' => SysAlamat::where('kode', $ins[0]->ins_district)->value('nama'),
            'al_prov' => SysAlamat::where('kode', $ins[0]->ins_province)->value('nama'),
            'data' => $data,
            'awal' => $awal,
            'akhir' => $akhir,
            'nakessip' => $ins[0]->nakes_sip,
            'nakesnip' => $ins[0]->nakes_nip,
            'salin' => $salin,
        ];

        $pdf = PDF::loadView('pages/report/report/kohortkel', $list)->setPaper('legal', 'landscape');
        return $pdf->stream();
    }

    public function pws()
    {
        $month = SelecMonth::all();

        return view('pages/report/pws', compact('month'));
    }

    public function cekpws(Request $request)
    {
        if ($request->month == 'x') {
            return redirect()->back()->withInput()->with('month', 'Options not selected');
        }

        if ($request->year == 'x') {
            return redirect()->back()->withInput()->with('year', 'Options not selected');
        }

        $rmonth = $request->month;
        $ryear = $request->year;

        $nakor = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->value('ins_village');

        $data = EiancDataSasaran::where('ds_add_kode', $nakor)->where('ds_year', $ryear)->get();

        if (count($data) < 1) {
            Alert::error('Gagal', 'Data tidak ditemukan');
            return redirect()->back()->withInput();
        } else {
            return redirect()->back()->withInput()->with('print', '')->with(compact('rmonth', 'ryear'));
        }
    }

    public function viewpws($month, $year)
    {
        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->get();

        $hal1 = EiancDataSasaran::where('ds_add_kode', $ins[0]->ins_village)
            ->where('ds_year', $year)
            ->where('ds_month', $month)
            ->get();

        $hal2 = EiancDataSasaran::where('ds_add_kode', $ins[0]->ins_village)
            ->where('ds_year', $year)
            ->where('ds_month', $month)
            ->get();

        $hal3 = EiancDataSasaran::where('ds_add_kode', $ins[0]->ins_village)
            ->where('ds_year', $year)
            ->where('ds_month', $month)
            ->get();

        $list = [
            'ins_id' => $ins[0]->ins_id,
            'ins_name' => $ins[0]->ins_name,
            'ins_add' => $ins[0]->ins_address,
            'ins_rt' => $ins[0]->ins_rt,
            'ins_rw' => $ins[0]->ins_rw,
            'ins_telp' => $ins[0]->ins_telp,
            'ins_thumb' => $ins[0]->ins_thumb,
            'ins_village' => $ins[0]->ins_village,
            'al_desa' => SysAlamat::where('kode', $ins[0]->ins_village)->value('nama'),
            'al_subdis' => SysAlamat::where('kode', $ins[0]->ins_subdistrict)->value('nama'),
            'al_dis' => SysAlamat::where('kode', $ins[0]->ins_district)->value('nama'),
            'al_prov' => SysAlamat::where('kode', $ins[0]->ins_province)->value('nama'),
            'month' => $month,
            'year' => $year,
            'nakessip' => $ins[0]->nakes_sip,
            'nakesnip' => $ins[0]->nakes_nip,
            'hal1' => $hal1,
            'hal2' => $hal2,
            'hal3' => $hal3,
        ];

        $pdf = PDF::loadView('pages/report/report/pws', $list)->setPaper('legal', 'landscape');
        return $pdf->stream();
    }

    public function cekpwssubdis(Request $request)
    {
        if ($request->month == 'x') {
            return redirect()->back()->withInput()->with('month', 'Options not selected');
        }

        if ($request->year == 'x') {
            return redirect()->back()->withInput()->with('year', 'Options not selected');
        }

        $rmonth = $request->month;
        $ryear = $request->year;

        $nakor = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->value('ins_subdistrict');

        $data = EiancDataSasaran::where('ds_add_kode', $nakor)->where('ds_year', $ryear)->get();

        // if (count($data) < 1) {
        //     Alert::error('Gagal', 'Tidak ditemukan data rujukkan');
        //     return redirect()->back()->withInput();
        // } else {
        // }
        return redirect()->back()->withInput()->with('print1', '')->with(compact('rmonth', 'ryear'));
    }

    public function viewpwssubdis($month, $year)
    {
        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->get();

        $list = [
            'ins_id' => $ins[0]->ins_id,
            'ins_name' => $ins[0]->ins_name,
            'ins_add' => $ins[0]->ins_address,
            'ins_rt' => $ins[0]->ins_rt,
            'ins_rw' => $ins[0]->ins_rw,
            'ins_telp' => $ins[0]->ins_telp,
            'ins_thumb' => $ins[0]->ins_thumb,
            'al_desa' => SysAlamat::where('kode', $ins[0]->ins_village)->value('nama'),
            'al_subdis' => SysAlamat::where('kode', $ins[0]->ins_subdistrict)->value('nama'),
            'al_dis' => SysAlamat::where('kode', $ins[0]->ins_district)->value('nama'),
            'al_prov' => SysAlamat::where('kode', $ins[0]->ins_province)->value('nama'),
            'month' => $month,
            'year' => $year,
            'nakessip' => $ins[0]->nakes_sip,
            'nakesnip' => $ins[0]->nakes_nip,
        ];

        $pdf = PDF::loadView('pages/report/report/pwssubdis', $list)->setPaper('legal', 'landscape');
        return $pdf->stream();
    }

    public function lb3()
    {
        $month = SelecMonth::all();

        return view('pages/report/lb3', compact('month'));
    }

    public function ceklb3(Request $request)
    {
        if ($request->month == 'x') {
            return redirect()->back()->withInput()->with('month', 'Options not selected');
        }

        if ($request->year == 'x') {
            return redirect()->back()->withInput()->with('year', 'Options not selected');
        }

        $rmonth = $request->month;
        $ryear = $request->year;

        return redirect()->back()->withInput()->with('print', '')->with(compact('rmonth', 'ryear'));
    }

    public function viewlb3($month, $year)
    {
        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->get();

        $anamnesa = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->join('eianc_service_anc_anamnesas', 'eianc_service_anc_anamnesas.sanca_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $kie = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_anc_kies', 'eianc_service_anc_kies.sanckie_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $lab = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_anc_labs', 'eianc_service_anc_labs.sancl_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $fisik = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_anc_physical_examinations', 'eianc_service_anc_physical_examinations.sancpe_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $treatment = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_anc_treatments', 'eianc_service_anc_treatments.sanct_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $salinhiv = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_anc_labs', 'eianc_service_anc_labs.sancl_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->where('sancl_hiv', 1)
            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_marrital_skls', 'eianc_service_marrital_skls.sancmskl_marr_id', '=', 'eianc_service_marritals.sancm_id')
            ->get();

        $salinhb = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_anc_labs', 'eianc_service_anc_labs.sancl_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_marrital_skls', 'eianc_service_marrital_skls.sancmskl_marr_id', '=', 'eianc_service_marritals.sancm_id')
            ->get();

        $salin = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_marrital_skls', 'eianc_service_marrital_skls.sancmskl_marr_id', '=', 'eianc_service_marritals.sancm_id')
            ->join('eianc_service_ancs', 'eianc_service_ancs.sanc_id', '=', 'eianc_service_anc_details.sancd_anc_id')
            ->get();

        $salin2 = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $nifas = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->get();

        $neo28 = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_neo28s', 'eianc_service_neo28s.neo28_user_id', '=', 'users.id')
            ->join('eianc_patients', 'eianc_patients.pat_norm', '=', 'eianc_service_neo28s.neo28_norm')
            ->where('neo28_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->get();

        $neo5 = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_neo_bbs', 'eianc_service_neo_bbs.neobb_user_id', '=', 'users.id')
            ->join('eianc_patients', 'eianc_patients.pat_norm', '=', 'eianc_service_neo_bbs.neobb_norm')
            ->where('neobb_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->get();

        $list = [
            'ins_id' => $ins[0]->ins_id,
            'ins_name' => $ins[0]->ins_name,
            'ins_add' => $ins[0]->ins_address,
            'ins_rt' => $ins[0]->ins_rt,
            'ins_rw' => $ins[0]->ins_rw,
            'ins_telp' => $ins[0]->ins_telp,
            'ins_thumb' => $ins[0]->ins_thumb,
            'al_desa' => SysAlamat::where('kode', $ins[0]->ins_village)->value('nama'),
            'al_subdis' => SysAlamat::where('kode', $ins[0]->ins_subdistrict)->value('nama'),
            'al_dis' => SysAlamat::where('kode', $ins[0]->ins_district)->value('nama'),
            'al_prov' => SysAlamat::where('kode', $ins[0]->ins_province)->value('nama'),
            'month' => $month,
            'year' => $year,
            'nakessip' => $ins[0]->nakes_sip,
            'nakesnip' => $ins[0]->nakes_nip,
            'anamnesa' => $anamnesa,
            'kie' => $kie,
            'lab' => $lab,
            'fisik' => $fisik,
            'treatment' => $treatment,
            'salinhiv' => $salinhiv,
            'salinhb' => $salinhb,
            'salin' => $salin,
            'salin2' => $salin2,
            'nifas' => $nifas,
            'neo28' => $neo28,
            'neo5' => $neo5,
        ];

        // return $nifas;

        $pdf = PDF::loadView('pages/report/report/lb3', $list)->setPaper('legal', 'portrait');
        return $pdf->stream();
    }
    
    public function ceklb3rw(Request $request)
    {
        if ($request->month == 'x') {
            return redirect()->back()->withInput()->with('month', 'Options not selected');
        }

        if ($request->year == 'x') {
            return redirect()->back()->withInput()->with('year', 'Options not selected');
        }

        $rmonth = $request->month;
        $ryear = $request->year;

        return redirect()->back()->withInput()->with('print1', '')->with(compact('rmonth', 'ryear'));
    }

    public function viewlb3rw($month, $year)
    {
        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->get();

        $dest = EiancDataSasaran::where('ds_add_kode', $ins[0]->ins_village)->where('ds_month', $month)->where('ds_year', $year)->get();

        $anamnesa = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->join('eianc_service_anc_anamnesas', 'eianc_service_anc_anamnesas.sanca_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $kie = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_anc_kies', 'eianc_service_anc_kies.sanckie_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $lab = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_anc_labs', 'eianc_service_anc_labs.sancl_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $fisik = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_anc_physical_examinations', 'eianc_service_anc_physical_examinations.sancpe_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $treatment = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_anc_treatments', 'eianc_service_anc_treatments.sanct_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $salinhiv = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_anc_labs', 'eianc_service_anc_labs.sancl_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->where('sancl_hiv', 1)
            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_marrital_skls', 'eianc_service_marrital_skls.sancmskl_marr_id', '=', 'eianc_service_marritals.sancm_id')
            ->get();

        $salinhb = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_anc_labs', 'eianc_service_anc_labs.sancl_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_marrital_skls', 'eianc_service_marrital_skls.sancmskl_marr_id', '=', 'eianc_service_marritals.sancm_id')
            ->get();

        $salin = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_marrital_skls', 'eianc_service_marrital_skls.sancmskl_marr_id', '=', 'eianc_service_marritals.sancm_id')
            ->join('eianc_service_ancs', 'eianc_service_ancs.sanc_id', '=', 'eianc_service_anc_details.sancd_anc_id')
            ->get();

        $salin2 = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $nifas = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->get();

        $neo28 = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_neo28s', 'eianc_service_neo28s.neo28_user_id', '=', 'users.id')
            ->join('eianc_patients', 'eianc_patients.pat_norm', '=', 'eianc_service_neo28s.neo28_norm')
            ->where('neo28_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->get();

        $neo5 = EiancInstansi::where('ins_village', $ins[0]->ins_village)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_neo_bbs', 'eianc_service_neo_bbs.neobb_user_id', '=', 'users.id')
            ->join('eianc_patients', 'eianc_patients.pat_norm', '=', 'eianc_service_neo_bbs.neobb_norm')
            ->where('neobb_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->get();

        $list = [
            'ins_id' => $ins[0]->ins_id,
            'ins_name' => $ins[0]->ins_name,
            'ins_add' => $ins[0]->ins_address,
            'ins_rt' => $ins[0]->ins_rt,
            'ins_rw' => $ins[0]->ins_rw,
            'ins_telp' => $ins[0]->ins_telp,
            'ins_thumb' => $ins[0]->ins_thumb,
            'al_desa' => SysAlamat::where('kode', $ins[0]->ins_village)->value('nama'),
            'al_subdis' => SysAlamat::where('kode', $ins[0]->ins_subdistrict)->value('nama'),
            'al_dis' => SysAlamat::where('kode', $ins[0]->ins_district)->value('nama'),
            'al_prov' => SysAlamat::where('kode', $ins[0]->ins_province)->value('nama'),
            'month' => $month,
            'year' => $year,
            'nakessip' => $ins[0]->nakes_sip,
            'nakesnip' => $ins[0]->nakes_nip,
            'anamnesa' => $anamnesa,
            'kie' => $kie,
            'lab' => $lab,
            'fisik' => $fisik,
            'treatment' => $treatment,
            'salinhiv' => $salinhiv,
            'salinhb' => $salinhb,
            'salin' => $salin,
            'salin2' => $salin2,
            'nifas' => $nifas,
            'neo28' => $neo28,
            'neo5' => $neo5,
            'dest' => $dest,
        ];

        $pdf = PDF::loadView('pages/report/report/lb3rw', $list)->setPaper('legal', 'portrait');
        return $pdf->stream();
    }

    public function ceklb3sub(Request $request)
    {
        if ($request->month == 'x') {
            return redirect()->back()->withInput()->with('month', 'Options not selected');
        }

        if ($request->year == 'x') {
            return redirect()->back()->withInput()->with('year', 'Options not selected');
        }

        $rmonth = $request->month;
        $ryear = $request->year;

        return redirect()->back()->withInput()->with('print2', '')->with(compact('rmonth', 'ryear'));
    }

    public function viewlb3sub($month, $year)
    {
        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->get();

        $dest = EiancDataSasaran::where('ds_add_kode', $ins[0]->ins_subdistrict)->where('ds_month', $month)->where('ds_year', $year)->get();

        $anamnesa = EiancInstansi::where('ins_subdistrict', $ins[0]->ins_subdistrict)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->join('eianc_service_anc_anamnesas', 'eianc_service_anc_anamnesas.sanca_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $kie = EiancInstansi::where('ins_subdistrict', $ins[0]->ins_subdistrict)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_anc_kies', 'eianc_service_anc_kies.sanckie_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $lab = EiancInstansi::where('ins_subdistrict', $ins[0]->ins_subdistrict)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_anc_labs', 'eianc_service_anc_labs.sancl_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $fisik = EiancInstansi::where('ins_subdistrict', $ins[0]->ins_subdistrict)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_anc_physical_examinations', 'eianc_service_anc_physical_examinations.sancpe_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $treatment = EiancInstansi::where('ins_subdistrict', $ins[0]->ins_subdistrict)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_anc_treatments', 'eianc_service_anc_treatments.sanct_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $salinhiv = EiancInstansi::where('ins_subdistrict', $ins[0]->ins_subdistrict)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_anc_labs', 'eianc_service_anc_labs.sancl_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->where('sancl_hiv', 1)
            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_marrital_skls', 'eianc_service_marrital_skls.sancmskl_marr_id', '=', 'eianc_service_marritals.sancm_id')
            ->get();

        $salinhb = EiancInstansi::where('ins_subdistrict', $ins[0]->ins_subdistrict)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_anc_labs', 'eianc_service_anc_labs.sancl_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_marrital_skls', 'eianc_service_marrital_skls.sancmskl_marr_id', '=', 'eianc_service_marritals.sancm_id')
            ->get();

        $salin = EiancInstansi::where('ins_subdistrict', $ins[0]->ins_subdistrict)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_marrital_skls', 'eianc_service_marrital_skls.sancmskl_marr_id', '=', 'eianc_service_marritals.sancm_id')
            ->join('eianc_service_ancs', 'eianc_service_ancs.sanc_id', '=', 'eianc_service_anc_details.sancd_anc_id')
            ->get();

        $salin2 = EiancInstansi::where('ins_subdistrict', $ins[0]->ins_subdistrict)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $nifas = EiancInstansi::where('ins_subdistrict', $ins[0]->ins_subdistrict)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
            ->where('sancd_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->get();

        $neo28 = EiancInstansi::where('ins_subdistrict', $ins[0]->ins_subdistrict)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_neo28s', 'eianc_service_neo28s.neo28_user_id', '=', 'users.id')
            ->join('eianc_patients', 'eianc_patients.pat_norm', '=', 'eianc_service_neo28s.neo28_norm')
            ->where('neo28_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->get();

        $neo5 = EiancInstansi::where('ins_subdistrict', $ins[0]->ins_subdistrict)
            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->join('eianc_service_neo_bbs', 'eianc_service_neo_bbs.neobb_user_id', '=', 'users.id')
            ->join('eianc_patients', 'eianc_patients.pat_norm', '=', 'eianc_service_neo_bbs.neobb_norm')
            ->where('neobb_date', 'LIKE', '%' . $year . '-' . $month . '%')
            ->get();

        $list = [
            'ins_id' => $ins[0]->ins_id,
            'ins_name' => $ins[0]->ins_name,
            'ins_add' => $ins[0]->ins_address,
            'ins_rt' => $ins[0]->ins_rt,
            'ins_rw' => $ins[0]->ins_rw,
            'ins_telp' => $ins[0]->ins_telp,
            'ins_thumb' => $ins[0]->ins_thumb,
            'al_desa' => SysAlamat::where('kode', $ins[0]->ins_village)->value('nama'),
            'al_subdis' => SysAlamat::where('kode', $ins[0]->ins_subdistrict)->value('nama'),
            'al_dis' => SysAlamat::where('kode', $ins[0]->ins_district)->value('nama'),
            'al_prov' => SysAlamat::where('kode', $ins[0]->ins_province)->value('nama'),
            'month' => $month,
            'year' => $year,
            'nakessip' => $ins[0]->nakes_sip,
            'nakesnip' => $ins[0]->nakes_nip,
            'anamnesa' => $anamnesa,
            'kie' => $kie,
            'lab' => $lab,
            'fisik' => $fisik,
            'treatment' => $treatment,
            'salinhiv' => $salinhiv,
            'salinhb' => $salinhb,
            'salin' => $salin,
            'salin2' => $salin2,
            'nifas' => $nifas,
            'neo28' => $neo28,
            'neo5' => $neo5,
            'dest' => $dest,
        ];

        $pdf = PDF::loadView('pages/report/report/lb3sub', $list)->setPaper('legal', 'portrait');
        return $pdf->stream();
    }
}
