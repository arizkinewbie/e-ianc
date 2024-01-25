<?php

use App\Http\Controllers\Auth\AuthenticationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthenticationController::class, 'home'])->name('home');
Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('postlogin', [AuthenticationController::class, 'postlogin'])->name('postlogin');
Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'check.logout']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Main\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/tutorial', [App\Http\Controllers\Main\DashboardController::class, 'tutorial'])->name('tutorial');

    Route::group(['middleware' => ['check.role:0']], function () {
        Route::get('/userrole', [App\Http\Controllers\Main\UserRoleController::class, 'index'])->name('userrole');
        Route::get('/userrole/create', [App\Http\Controllers\Main\UserRoleController::class, 'create'])->name('userrole.create');
        Route::post('/userrole/store', [App\Http\Controllers\Main\UserRoleController::class, 'store'])->name('userrole.store');
        Route::get('/userrole/edit/{id}', [App\Http\Controllers\Main\UserRoleController::class, 'edit'])->name('userrole.edit');
        Route::post('/userrole/update', [App\Http\Controllers\Main\UserRoleController::class, 'update'])->name('userrole.update');
        Route::post('/userrole/destroy', [App\Http\Controllers\Main\UserRoleController::class, 'destroy'])->name('userrole.destroy');
    });

    Route::group(['middleware' => ['check.role:0,1']], function () {
        Route::get('/instansi', [App\Http\Controllers\Main\InstansiController::class, 'index'])->name('instansi');
        Route::get('/instansi/create', [App\Http\Controllers\Main\InstansiController::class, 'create'])->name('instansi.create');
        Route::post('/instansi/store', [App\Http\Controllers\Main\InstansiController::class, 'store'])->name('instansi.store');
        Route::get('/instansi/edit/{id}', [App\Http\Controllers\Main\InstansiController::class, 'edit'])->name('instansi.edit');
        Route::post('/instansi/update', [App\Http\Controllers\Main\InstansiController::class, 'update'])->name('instansi.update');
        Route::post('/instansi/destroy', [App\Http\Controllers\Main\InstansiController::class, 'destroy'])->name('instansi.destroy');

        Route::get('/nakes', [App\Http\Controllers\Main\NakesController::class, 'index'])->name('nakes');
        Route::get('/nakes/create', [App\Http\Controllers\Main\NakesController::class, 'create'])->name('nakes.create');
        Route::post('/nakes/store', [App\Http\Controllers\Main\NakesController::class, 'store'])->name('nakes.store');
        Route::get('/nakes/edit/{id}', [App\Http\Controllers\Main\NakesController::class, 'edit'])->name('nakes.edit');
        Route::post('/nakes/update', [App\Http\Controllers\Main\sNakesController::class, 'update'])->name('nakes.update');
        Route::post('/nakes/destroy', [App\Http\Controllers\Main\sNakesController::class, 'destroy'])->name('nakes.destroy');

        Route::get('/temoi', [App\Http\Controllers\Main\TemoiController::class, 'index'])->name('temoi');
        Route::get('/temoi/create', [App\Http\Controllers\Main\TemoiController::class, 'create'])->name('temoi.create');
        Route::post('/temoi/store', [App\Http\Controllers\Main\TemoiController::class, 'store'])->name('temoi.store');
        Route::get('/temoi/edit/{id}', [App\Http\Controllers\Main\TemoiController::class, 'edit'])->name('temoi.edit');
        Route::post('/temoi/update', [App\Http\Controllers\Main\TemoiController::class, 'update'])->name('temoi.update');
        Route::post('/temoi/destroy', [App\Http\Controllers\Main\TemoiController::class, 'destroy'])->name('temoi.destroy');

        Route::get('/user', [App\Http\Controllers\Main\UserController::class, 'index'])->name('user');
        Route::get('/user/create', [App\Http\Controllers\Main\UserController::class, 'create'])->name('user.create');
        Route::post('/user/store', [App\Http\Controllers\Main\UserController::class, 'store'])->name('user.store');
        Route::get('/user/edit/{id}', [App\Http\Controllers\Main\UserController::class, 'edit'])->name('user.edit');
        Route::post('/user/update', [App\Http\Controllers\Main\UserController::class, 'update'])->name('user.update');
        Route::post('/user/destroy', [App\Http\Controllers\Main\UserController::class, 'destroy'])->name('user.destroy');

        Route::get('/selection/icd', [App\Http\Controllers\Main\SelectICDController::class, 'index'])->name('sel.icd');
        Route::get('/selection/create/{id}', [App\Http\Controllers\Main\SelectICDController::class, 'create'])->name('sel.icd.create');
        Route::post('/selection/store', [App\Http\Controllers\Main\SelectICDController::class, 'store'])->name('sel.icd.store');
        Route::post('/selection/destroy', [App\Http\Controllers\Main\SelectICDController::class, 'destroy'])->name('sel.icd.destroy');
    });

    Route::group(['middleware' => ['check.role:0,1,2,3']], function () {
        Route::get('/datasasaran', [App\Http\Controllers\Main\DataSasaranController::class, 'index'])->name('datasasaran');
        Route::get('/datasasaran/create', [App\Http\Controllers\Main\DataSasaranController::class, 'create'])->name('datasasaran.create');
        Route::post('/datasasaran/store', [App\Http\Controllers\Main\DataSasaranController::class, 'store'])->name('datasasaran.store');
        Route::get('/datasasaran/edit/{id}', [App\Http\Controllers\Main\DataSasaranController::class, 'edit'])->name('datasasaran.edit');
        Route::post('/datasasaran/update', [App\Http\Controllers\Main\DataSasaranController::class, 'update'])->name('datasasaran.update');
        Route::post('/datasasaran/destroy', [App\Http\Controllers\Main\DataSasaranController::class, 'destroy'])->name('datasasaran.destroy');
    });

    Route::group(['middleware' => ['check.role:0,1,3']], function () {
        Route::get('/kematian/maternal', [App\Http\Controllers\Main\DeathMaterinalController::class, 'index'])->name('maternal');
        Route::get('/kematian/maternal/create', [App\Http\Controllers\Main\DeathMaterinalController::class, 'create'])->name('maternal.create');
        Route::post('/kematian/maternal/store', [App\Http\Controllers\Main\DeathMaterinalController::class, 'store'])->name('maternal.store');
        Route::get('/kematian/maternal/edit/{id}', [App\Http\Controllers\Main\DeathMaterinalController::class, 'edit'])->name('maternal.edit');
        Route::post('/kematian/maternal/update', [App\Http\Controllers\Main\DeathMaterinalController::class, 'update'])->name('maternal.update');
        Route::post('/kematian/maternal/destroy', [App\Http\Controllers\Main\DeathMaterinalController::class, 'destroy'])->name('maternal.destroy');
        Route::post('/kematian/maternal/cek', [App\Http\Controllers\Main\DeathMaterinalController::class, 'cek'])->name('maternal.cek');
        Route::get('/kematian/maternal/report/{month}/{year}', [App\Http\Controllers\Main\DeathMaterinalController::class, 'report'])->name('maternal.report');

        Route::get('/kematian/baby', [App\Http\Controllers\Main\DeathBabyController::class, 'index'])->name('baby');
        Route::get('/kematian/baby/create', [App\Http\Controllers\Main\DeathBabyController::class, 'create'])->name('baby.create');
        Route::post('/kematian/baby/store', [App\Http\Controllers\Main\DeathBabyController::class, 'store'])->name('baby.store');
        Route::get('/kematian/baby/edit/{id}', [App\Http\Controllers\Main\DeathBabyController::class, 'edit'])->name('baby.edit');
        Route::post('/kematian/baby/update', [App\Http\Controllers\Main\DeathBabyController::class, 'update'])->name('baby.update');
        Route::post('/kematian/baby/destroy', [App\Http\Controllers\Main\DeathBabyController::class, 'destroy'])->name('baby.destroy');
        Route::post('/kematian/baby/cek', [App\Http\Controllers\Main\DeathBabyController::class, 'cek'])->name('baby.cek');
        Route::get('/kematian/baby/report/{month}/{year}', [App\Http\Controllers\Main\DeathBabyController::class, 'report'])->name('baby.report');

        Route::get('/kematian/pn', [App\Http\Controllers\Main\DeathPNController::class, 'index'])->name('pn');
        Route::get('/kematian/pn/create', [App\Http\Controllers\Main\DeathPNController::class, 'create'])->name('pn.create');
        Route::post('/kematian/pn/store', [App\Http\Controllers\Main\DeathPNController::class, 'store'])->name('pn.store');
        Route::get('/kematian/pn/edit/{id}', [App\Http\Controllers\Main\DeathPNController::class, 'edit'])->name('pn.edit');
        Route::post('/kematian/pn/update', [App\Http\Controllers\Main\DeathPNController::class, 'update'])->name('pn.update');
        Route::post('/kematian/pn/destroy', [App\Http\Controllers\Main\DeathPNController::class, 'destroy'])->name('pn.destroy');
        Route::post('/kematian/pn/cek', [App\Http\Controllers\Main\DeathPNController::class, 'cek'])->name('pn.cek');
        Route::get('/kematian/pn/report/{month}/{year}', [App\Http\Controllers\Main\DeathPNController::class, 'report'])->name('pn.report');
    });

    Route::group(['middleware' => ['check.role:0,1,4']], function () {
        Route::get('/icebox', [App\Http\Controllers\Main\IceBoxController::class, 'index'])->name('icebox');
        Route::get('/icebox/create', [App\Http\Controllers\Main\IceBoxController::class, 'create'])->name('icebox.create');
        Route::post('/icebox/store', [App\Http\Controllers\Main\IceBoxController::class, 'store'])->name('icebox.store');
        Route::get('/icebox/edit/{id}', [App\Http\Controllers\Main\IceBoxController::class, 'edit'])->name('icebox.edit');
        Route::post('/icebox/update', [App\Http\Controllers\Main\IceBoxController::class, 'update'])->name('icebox.update');
        Route::post('/icebox/destroy', [App\Http\Controllers\Main\IceBoxController::class, 'destroy'])->name('icebox.destroy');
        Route::post('/icebox/cek', [App\Http\Controllers\Main\IceBoxController::class, 'cek'])->name('icebox.cek');
        Route::get('/icebox/report/{month}/{year}/{icebox}', [App\Http\Controllers\Main\IceBoxController::class, 'report'])->name('icebox.report');

        Route::get('/iceboxid', [App\Http\Controllers\Main\IceBoxIdController::class, 'index'])->name('iceboxid');
        Route::post('/iceboxid/store', [App\Http\Controllers\Main\IceBoxIdController::class, 'store'])->name('iceboxid.store');
        Route::get('/iceboxid/edit/{id}', [App\Http\Controllers\Main\IceBoxIdController::class, 'edit'])->name('iceboxid.edit');
        Route::post('/iceboxid/update', [App\Http\Controllers\Main\IceBoxIdController::class, 'update'])->name('iceboxid.update');
        Route::post('/iceboxid/destroy', [App\Http\Controllers\Main\IceBoxIdController::class, 'destroy'])->name('iceboxid.destroy');

        Route::get('/vaksin', [App\Http\Controllers\Main\VaksinController::class, 'index'])->name('vaksin');
        Route::get('/vaksin/create', [App\Http\Controllers\Main\VaksinController::class, 'create'])->name('vaksin.create');
        Route::post('/vaksin/store', [App\Http\Controllers\Main\VaksinController::class, 'store'])->name('vaksin.store');
        Route::get('/vaksin/edit/{id}', [App\Http\Controllers\Main\VaksinController::class, 'edit'])->name('vaksin.edit');
        Route::post('/vaksin/update', [App\Http\Controllers\Main\VaksinController::class, 'update'])->name('vaksin.update');
        Route::post('/vaksin/destroy', [App\Http\Controllers\Main\VaksinController::class, 'destroy'])->name('vaksin.destroy');

        Route::get('/kb', [App\Http\Controllers\Main\KBController::class, 'index'])->name('kb');
        Route::get('/kb/create', [App\Http\Controllers\Main\KBController::class, 'create'])->name('kb.create');
        Route::post('/kb/store', [App\Http\Controllers\Main\KBController::class, 'store'])->name('kb.store');
        Route::get('/kb/edit/{id}', [App\Http\Controllers\Main\KBController::class, 'edit'])->name('kb.edit');
        Route::post('/kb/update', [App\Http\Controllers\Main\KBController::class, 'update'])->name('kb.update');
        Route::post('/kb/destroy', [App\Http\Controllers\Main\KBController::class, 'destroy'])->name('kb.destroy');

        Route::get('/drug', [App\Http\Controllers\Main\DrugController::class, 'index'])->name('drug');
        Route::get('/drug/create', [App\Http\Controllers\Main\DrugController::class, 'create'])->name('drug.create');
        Route::post('/drug/store', [App\Http\Controllers\Main\DrugController::class, 'store'])->name('drug.store');
        Route::get('/drug/edit/{id}', [App\Http\Controllers\Main\DrugController::class, 'edit'])->name('drug.edit');
        Route::post('/drug/update', [App\Http\Controllers\Main\DrugController::class, 'update'])->name('drug.update');
        Route::post('/drug/destroy', [App\Http\Controllers\Main\DrugController::class, 'destroy'])->name('drug.destroy');

        // ========================================================================================================================

        Route::get('/patient', [App\Http\Controllers\Main\PatientController::class, 'index'])->name('patient');
        Route::get('/patient/create', [App\Http\Controllers\Main\PatientController::class, 'search'])->name('patient.search');
        Route::get('/patient/search', [App\Http\Controllers\Main\PatientController::class, 'create'])->name('patient.create');
        Route::post('/patient/store', [App\Http\Controllers\Main\PatientController::class, 'store'])->name('patient.store');
        Route::get('/patient/edit/{id}', [App\Http\Controllers\Main\PatientController::class, 'edit'])->name('patient.edit');
        Route::post('/patient/update', [App\Http\Controllers\Main\PatientController::class, 'update'])->name('patient.update');
        Route::get('/patient/destroy/{id}', [App\Http\Controllers\Main\PatientController::class, 'destroy'])->name('patient.destroy');

        // LAYANAN PASIEN
        Route::get('/layanan/{id}', [App\Http\Controllers\Main\ServiceController::class, 'index'])->name('service');

        // LAYANAN VAKSIN
        Route::get('/layanan/vaksin/{id}', [App\Http\Controllers\Main\ServiceVaksinController::class, 'index'])->name('service.vaksin');
        Route::get('/layanan/vaksin/search/{id}', [App\Http\Controllers\Main\ServiceVaksinController::class, 'search'])->name('service.vaksin.search');
        Route::get('/layanan/vaksin/detail/{id}', [App\Http\Controllers\Main\ServiceVaksinController::class, 'detail'])->name('service.vaksin.detail');
        Route::get('/layanan/vaksin/create/{id}', [App\Http\Controllers\Main\ServiceVaksinController::class, 'create'])->name('service.create');
        Route::post('/layanan/vaksin/store', [App\Http\Controllers\Main\ServiceVaksinController::class, 'store'])->name('service.vaksin.store');
        Route::get('/layanan/vaksin/symptom/{id}', [App\Http\Controllers\Main\ServiceVaksinController::class, 'symptom'])->name('service.symptom');
        Route::post('/layanan/vaksin/update', [App\Http\Controllers\Main\ServiceVaksinController::class, 'update'])->name('service.vaksin.update');
        Route::post('/layanan/vaksin/destroy', [App\Http\Controllers\Main\ServiceVaksinController::class, 'destroy'])->name('service.vaksin.destroy');

        // LAYANAN ANC
        Route::get('/service/anc/{id}', [App\Http\Controllers\Main\ServiceANCController::class, 'index'])->name('service.anc');
        Route::get('/service/anc/create/{id}', [App\Http\Controllers\Main\ServiceANCController::class, 'create'])->name('service.anc.create');
        Route::post('/service/anc/store', [App\Http\Controllers\Main\ServiceANCController::class, 'store'])->name('service.anc.store');
        Route::get('/service/anc/edit/{id}/{anc}', [App\Http\Controllers\Main\ServiceANCController::class, 'edit'])->name('service.anc.edit');
        Route::post('/service/anc/update', [App\Http\Controllers\Main\ServiceANCController::class, 'update'])->name('service.anc.update');
        Route::post('/service/anc/destroy', [App\Http\Controllers\Main\ServiceANCController::class, 'destroy'])->name('service.anc.destroy');

        // LAYANAN DETAIL ANC
        Route::get('/service/anc/detail/{id}/{anc}', [App\Http\Controllers\Main\ServiceANCDetailController::class, 'index'])->name('service.anc.d');
        Route::post('/service/anc/detail/store', [App\Http\Controllers\Main\ServiceANCDetailController::class, 'store'])->name('service.anc.d.store');
        Route::post('/service/anc/detail/destroy', [App\Http\Controllers\Main\ServiceANCDetailController::class, 'destroy'])->name('service.anc.d.destroy');

        // LAYANAN ANC - ANC
        Route::get('/service/anc/detail/{id}/{anc}/{det}', [App\Http\Controllers\Main\ServiceANCancController::class, 'index'])->name('service.anc.anc');

        // LAYANAN ANC - ANAMNESA
        Route::get('/service/anc/anc/anamnesa/{id}/{anc}/{det}', [App\Http\Controllers\Main\ServiceANCAnamnesaController::class, 'index'])->name('service.anc.anc.anamnesa');
        Route::post('/service/anc/anc/anamnesa/store', [App\Http\Controllers\Main\ServiceANCAnamnesaController::class, 'store'])->name('service.anc.anc.anamnesa.store');

        // LAYANAN ANC - PHYSICAL
        Route::get('/service/anc/anc/physical/{id}/{anc}/{det}', [App\Http\Controllers\Main\ServiceANCPhysicalController::class, 'index'])->name('service.anc.anc.physical');
        Route::post('/service/anc/anc/physical/store', [App\Http\Controllers\Main\ServiceANCPhysicalController::class, 'store'])->name('service.anc.anc.physical.store');

        // LAYANAN ANC - LAB
        Route::get('/service/anc/anc/lab/{id}/{anc}/{det}', [App\Http\Controllers\Main\ServiceANCLabController::class, 'index'])->name('service.anc.anc.lab');
        Route::post('/service/anc/anc/lab/store', [App\Http\Controllers\Main\ServiceANCLabController::class, 'store'])->name('service.anc.anc.lab.store');
        Route::post('/service/anc/anc/lab/upload', [App\Http\Controllers\Main\ServiceANCLabController::class, 'upload'])->name('service.anc.anc.lab.upload');
        Route::get('/service/anc/anc/lab/destroy/{id}', [App\Http\Controllers\Main\ServiceANCLabController::class, 'destroy'])->name('service.anc.anc.lab.destroy');

        // LAYANAN ANC - KIE
        Route::get('/service/anc/anc/kie/{id}/{anc}/{det}', [App\Http\Controllers\Main\ServiceANCKieController::class, 'index'])->name('service.anc.anc.kie');
        Route::post('/service/anc/anc/kie/store', [App\Http\Controllers\Main\ServiceANCKieController::class, 'store'])->name('service.anc.anc.kie.store');

        // LAYANAN ANC - TREATMENT
        Route::get('/service/anc/anc/treatment/{id}/{anc}/{det}', [App\Http\Controllers\Main\ServiceANCTreatmentController::class, 'index'])->name('service.anc.anc.treatment');
        Route::post('/service/anc/anc/treatment/store', [App\Http\Controllers\Main\ServiceANCTreatmentController::class, 'store'])->name('service.anc.anc.treatment.store');
        Route::post('/service/anc/anc/treatment/obat', [App\Http\Controllers\Main\ServiceANCTreatmentController::class, 'obat'])->name('service.anc.anc.treatment.obat');
        Route::get('/service/anc/anc/treatment/destroy/{id}', [App\Http\Controllers\Main\ServiceANCTreatmentController::class, 'destroy'])->name('service.anc.anc.treatment.destroy');

        // LAYANAN ANC - DIAGNOSIS
        Route::get('/service/anc/anc/diag/{id}/{anc}/{det}', [App\Http\Controllers\Main\ServiceANCDiagnosisController::class, 'index'])->name('service.anc.anc.diag');
        Route::post('/service/anc/anc/diag/store', [App\Http\Controllers\Main\ServiceANCDiagnosisController::class, 'store'])->name('service.anc.anc.diag.store');

        // LAYANAN ANC - RISK
        Route::get('/service/anc/anc/risk/{id}/{anc}/{det}', [App\Http\Controllers\Main\ServiceANCRiskController::class, 'index'])->name('service.anc.anc.risk');
        Route::post('/service/anc/anc/risk/store', [App\Http\Controllers\Main\ServiceANCRiskController::class, 'store'])->name('service.anc.anc.risk.store');
        Route::post('/service/anc/anc/risk/icd', [App\Http\Controllers\Main\ServiceANCRiskController::class, 'icd'])->name('service.anc.anc.risk.icd');
        Route::get('/service/anc/anc/risk/destroy/{id}', [App\Http\Controllers\Main\ServiceANCRiskController::class, 'destroy'])->name('service.anc.anc.risk.destroy');
        Route::post('/service/anc/anc/risk/desposisi', [App\Http\Controllers\Main\ServiceANCRiskController::class, 'desposisi'])->name('service.anc.anc.risk.desposisi');

        // LAYANAN PERSALINAN
        Route::get('/service/anc/marital/{id}/{anc}/{det}', [App\Http\Controllers\Main\ServiceANCMarrController::class, 'index'])->name('service.anc.marr');
        Route::post('/service/anc/marital/store', [App\Http\Controllers\Main\ServiceANCMarrController::class, 'store'])->name('service.anc.marr.store');
        Route::post('/service/anc/marital/skl', [App\Http\Controllers\Main\ServiceANCMarrController::class, 'skl'])->name('service.anc.marr.skl');
        Route::get('/service/anc/marital/skl/create/{id}/{anc}/{det}/{id1}/{id2}', [App\Http\Controllers\Main\ServiceANCMarrController::class, 'create'])->name('service.anc.marr.skl.create');
        Route::get('/service/anc/marital/skl/destroy/{id}/{anc}/{det}/{id1}', [App\Http\Controllers\Main\ServiceANCMarrController::class, 'destroy'])->name('service.anc.marr.skl.destroy');
        Route::post('/service/anc/marital/desposisi', [App\Http\Controllers\Main\ServiceANCMarrController::class, 'desposisi'])->name('service.anc.marr.desposisi');

        // LAYANAN NIFAS OBSERVASI
        Route::get('/service/anc/no/{id}/{anc}/{det}', [App\Http\Controllers\Main\ServiceANCNifasObsController::class, 'index'])->name('service.anc.no');
        Route::get('/service/anc/no/create/{id}/{anc}/{det}/{idx}', [App\Http\Controllers\Main\ServiceANCNifasObsController::class, 'create'])->name('service.anc.no.create');
        Route::post('/service/anc/no/store', [App\Http\Controllers\Main\ServiceANCNifasObsController::class, 'store'])->name('service.anc.no.store');
        Route::get('/service/anc/no/destroy/{id}', [App\Http\Controllers\Main\ServiceANCNifasObsController::class, 'destroy'])->name('service.anc.no.destroy');
        Route::post('/service/anc/no/obat', [App\Http\Controllers\Main\ServiceANCNifasObsController::class, 'obat'])->name('service.anc.no.obat');
        Route::get('/service/anc/no/obathapus/{id}', [App\Http\Controllers\Main\ServiceANCNifasObsController::class, 'obathapus'])->name('service.anc.no.obathapus');

        // LAYANAN NIFAS KONTROL
        Route::get('/service/anc/con/{id}/{anc}/{det}', [App\Http\Controllers\Main\ServiceANCNifasConController::class, 'index'])->name('service.anc.con');
        Route::post('/service/anc/con/store', [App\Http\Controllers\Main\ServiceANCNifasConController::class, 'store'])->name('service.anc.con.store');
        Route::post('/service/anc/con/obat', [App\Http\Controllers\Main\ServiceANCNifasConController::class, 'obat'])->name('service.anc.con.obat');
        Route::get('/service/anc/con/obathapus/{id}', [App\Http\Controllers\Main\ServiceANCNifasConController::class, 'obathapus'])->name('service.anc.con.obathapus');

        // LAYANAN KB
        Route::get('/service/kb/{id}', [App\Http\Controllers\Main\ServiceKBController::class, 'index'])->name('service.kb');
        Route::get('/service/kb/craete/{id}/{xid}', [App\Http\Controllers\Main\ServiceKBController::class, 'craete'])->name('service.kb.craete');
        Route::post('/service/kb/store', [App\Http\Controllers\Main\ServiceKBController::class, 'store'])->name('service.kb.store');
        Route::get('/service/kb/edit/{id}/{xid}', [App\Http\Controllers\Main\ServiceKBController::class, 'edit'])->name('service.kb.edit');
        Route::post('/service/kb/update', [App\Http\Controllers\Main\ServiceKBController::class, 'update'])->name('service.kb.update');
        Route::get('/service/kb/destroy/{id}/{xid}', [App\Http\Controllers\Main\ServiceKBController::class, 'destroy'])->name('service.kb.destroy');

        // LAYANAN BABY
        Route::get('/service/baby/{id}', [App\Http\Controllers\Main\ServiceBabyController::class, 'index'])->name('service.baby');
        Route::get('/service/baby/create/{id}/{xid}', [App\Http\Controllers\Main\ServiceBabyController::class, 'create'])->name('service.baby.create');
        Route::post('/service/baby/store', [App\Http\Controllers\Main\ServiceBabyController::class, 'store'])->name('service.baby.store');
        Route::get('/service/baby/destroy/{id}/{xid}', [App\Http\Controllers\Main\ServiceBabyController::class, 'destroy'])->name('service.baby.destroy');

        // LAYANAN DESPOSISI
        Route::get('/service/desposisi/{id}', [App\Http\Controllers\Main\ServiceDesposisiController::class, 'index'])->name('service.desposisi');
        Route::get('/service/desposisi/edit/{norm}/{id}', [App\Http\Controllers\Main\ServiceDesposisiController::class, 'edit'])->name('service.desposisi.edit');
        Route::post('/service/desposisi/update', [App\Http\Controllers\Main\ServiceDesposisiController::class, 'update'])->name('service.desposisi.update');

        // LAYANAN NEONATAL
        Route::get('/service/neo/{id}', [App\Http\Controllers\Main\ServiceNeonatalController::class, 'index'])->name('service.neo');
        Route::get('/service/neo/create/{id}/{idx}', [App\Http\Controllers\Main\ServiceNeonatalController::class, 'create28'])->name('service.neo.create');
        Route::post('/service/neo/store28', [App\Http\Controllers\Main\ServiceNeonatalController::class, 'store28'])->name('service.neo.store28');
        Route::post('/service/neo/destroy28', [App\Http\Controllers\Main\ServiceNeonatalController::class, 'destroy28'])->name('service.neo.destroy28');
        Route::get('/service/neobb/create/{id}/{idx}', [App\Http\Controllers\Main\ServiceNeonatalController::class, 'create'])->name('service.neobb.create');
        Route::post('/service/neobb/store', [App\Http\Controllers\Main\ServiceNeonatalController::class, 'store'])->name('service.neo.store');
        Route::post('/service/neobb/destroy', [App\Http\Controllers\Main\ServiceNeonatalController::class, 'destroy'])->name('service.neo.destroy');

        // LAYANAN GRAPH
        Route::get('/service/graph/{id}', [App\Http\Controllers\Main\ServiceGraphController::class, 'index'])->name('service.gr');

        //REPORT IMUN
        Route::get('/report/imunisasi', [App\Http\Controllers\Main\ReportController::class, 'imunisasi'])->name('report.imunisasi');
        Route::post('/report/imunisasi/cek', [App\Http\Controllers\Main\ReportController::class, 'cek_imunisasi'])->name('report.imunisasi.cek');
        Route::get('/report/imunisasi/view/{month}/{year}', [App\Http\Controllers\Main\ReportController::class, 'view_imunisasi'])->name('report.imunisasi.view');

        // REPORT RUJUK
        Route::get('/report/rujuk', [App\Http\Controllers\Main\ReportController::class, 'cekrujuk'])->name('report.cekrujuk');
        Route::post('/report/rujuk/cek', [App\Http\Controllers\Main\ReportController::class, 'cekrujcek'])->name('report.cekrujcek');
        Route::get('/report/rujuk/view/{month}/{year}', [App\Http\Controllers\Main\ReportController::class, 'viewrujuk'])->name('report.viewrujuk');

        Route::get('/report/rujuk/{id}', [App\Http\Controllers\Main\ReportController::class, 'rujuk'])->name('report.rujuk');

        Route::get('/report/skl/{id}', [App\Http\Controllers\Main\ReportController::class, 'skl'])->name('report.skl');
    });

    // ALAMAT
    Route::get('/getadd/{id}', [App\Http\Controllers\Main\GetDataController::class, 'getadd'])->name('getadd');
    Route::get('/getinstansi/{id}', [App\Http\Controllers\Main\GetDataController::class, 'getinstansi'])->name('getinstansi');

    // REPORT KOHORT
    Route::get('/report/kohort', [App\Http\Controllers\Main\ReportController::class, 'kohort'])->name('report.kohort');
    Route::post('/report/cekkohort', [App\Http\Controllers\Main\ReportController::class, 'cekkohort'])->name('report.cekkohort');
    Route::get('/report/viewkohort/{awal}/{akhir}', [App\Http\Controllers\Main\ReportController::class, 'viewkohort'])->name('report.viewkohort');
    Route::post('/report/cekkohortkel', [App\Http\Controllers\Main\ReportController::class, 'cekkohortkel'])->name('report.cekkohortkel');
    Route::get('/report/viewkohortkel/{awal}/{akhir}', [App\Http\Controllers\Main\ReportController::class, 'viewkohortkel'])->name('report.viewkohortkel');

    // PWS
    Route::get('/report/pws', [App\Http\Controllers\Main\ReportController::class, 'pws'])->name('report.pws');
    Route::post('/report/cekpws', [App\Http\Controllers\Main\ReportController::class, 'cekpws'])->name('report.cekpws');
    Route::get('/report/viewpws/{month}/{year}', [App\Http\Controllers\Main\ReportController::class, 'viewpws'])->name('report.viewpws');
    Route::post('/report/cekpwssubdis', [App\Http\Controllers\Main\ReportController::class, 'cekpwssubdis'])->name('report.cekpwssubdis');
    Route::get('/report/viewpwssubdis/{month}/{year}', [App\Http\Controllers\Main\ReportController::class, 'viewpwssubdis'])->name('report.viewpwssubdis');

    // LB3
    Route::get('/report/lb3', [App\Http\Controllers\Main\ReportController::class, 'lb3'])->name('report.lb3');
    Route::post('/report/ceklb3', [App\Http\Controllers\Main\ReportController::class, 'ceklb3'])->name('report.ceklb3');
    Route::get('/report/viewlb3/{month}/{year}', [App\Http\Controllers\Main\ReportController::class, 'viewlb3'])->name('report.viewlb3');

    Route::post('/report/ceklb3rw', [App\Http\Controllers\Main\ReportController::class, 'ceklb3rw'])->name('report.ceklb3rw');
    Route::get('/report/viewlb3rw/{month}/{year}', [App\Http\Controllers\Main\ReportController::class, 'viewlb3rw'])->name('report.viewlb3rw');

    Route::post('/report/ceklb3sub', [App\Http\Controllers\Main\ReportController::class, 'ceklb3sub'])->name('report.ceklb3sub');
    Route::get('/report/viewlb3sub/{month}/{year}', [App\Http\Controllers\Main\ReportController::class, 'viewlb3sub'])->name('report.viewlb3sub');

    //Signature
    Route::get('/selection/sig', [App\Http\Controllers\Main\SelectSigController::class, 'index'])->name('sel.sig');
    Route::get('/selection/sig/create/{id}', [App\Http\Controllers\Main\SelectSigController::class, 'create'])->name('sel.sig.create');
    Route::post('/selection/sig/store', [App\Http\Controllers\Main\SelectSigController::class, 'store'])->name('sel.sig.store');
    Route::post('/selection/sig/destroy', [App\Http\Controllers\Main\SelectSigController::class, 'destroy'])->name('sel.sig.destroy');

    // REPORT KB
    Route::get('/report/kb', [App\Http\Controllers\Main\ReportController::class, 'kb'])->name('report.kb');
    Route::post('/report/kb/cek', [App\Http\Controllers\Main\ReportController::class, 'cek_kb'])->name('report.kb.cek');
    Route::get('/report/kb/view/{month}/{year}', [App\Http\Controllers\Main\ReportController::class, 'view_kb'])->name('report.kb.view');
    Route::post('/report/kbsubdis/cek', [App\Http\Controllers\Main\ReportController::class, 'cek_kb_subdis'])->name('report.kbsubdis.cek');
    Route::get('/report/kbsubdis/view/{month}/{year}', [App\Http\Controllers\Main\ReportController::class, 'view_kb_subdis'])->name('report.kbsubdis.view');
    Route::post('/report/kbvillage/cek', [App\Http\Controllers\Main\ReportController::class, 'cek_kb_village'])->name('report.kbvillage.cek');
    Route::get('/report/kbvillage/view/{month}/{year}', [App\Http\Controllers\Main\ReportController::class, 'view_kb_village'])->name('report.kbvillage.view');
});
