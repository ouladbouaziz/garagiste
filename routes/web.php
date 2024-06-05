<?php

use App\Http\Controllers\Mecanicien;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ReparationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Symfony\Component\VarDumper\Command\Descriptor\CliDescriptor;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('admin/dashboard', [AuthController::class, 'dashboard']); 
Route::get('client/dashboard', [AuthController::class, 'dashboard']); 
Route::get('mecanicien/dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// Route::get('/clientPage',function(){
//     return view('clientPage');
// })->name('clientPage');

Route::get('/mecanicien',function(){
    return view('mecanicien');
})->name('mecanicien');


Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


//crud client par admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/clients/index', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/admin/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/admin/clients/show', [ClientController::class, 'show'])->name('clients.show');
    Route::post('/admin/clients/search', [ClientController::class, 'search'])->name('clients.search');
    Route::post('/admin/clients/store', [ClientController::class, 'store'])->name('clients.store');
    Route::post('/admin/clients/delete', [ClientController::class, 'delete'])->name('clients.delete');
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']); 
    Route::get('/admin/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/admin/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::get('/admin/generate-pdfc', [PDFController::class, 'generatePDFc'])->name('generate-pdfc');
    Route::controller(ClientController::class)->group(function(){
        Route::get('/admin/clients', 'index')->name('clients.index');
        Route::get('/admin/clients-export', 'export')->name('clients.export');
        Route::post('/admin/clients-import', 'import')->name('clients.import');
    });

// crud mecanciens par admin
    Route::get('/admin/mecaniciens/index',[Mecanicien::class,'index'])->name('mecaniciens.index');
    Route::get('/admin/mecaniciens/create',[Mecanicien::class,'create'])->name('mecaniciens.create');
    Route::post('/admin/mecaniciens/show',[Mecanicien::class,'show'])->name('mecaniciens.show');
    Route::post('/admin/mecaniciens/search',[Mecanicien::class,'search'])->name('mecaniciens.search');
    Route::post('/admin/mecaniciens/store',[Mecanicien::class,'store'])->name('mecaniciens.store');
    Route::post('/admin/mecaniciens/delete',[Mecanicien::class,'delete'])->name('mecaniciens.delete');
    Route::get('/admin/mecaniciens/{id}/edit', [Mecanicien::class, 'edit'])->name('mecaniciens.edit');
    Route::put('/admin/mecaniciens/{id}', [Mecanicien::class, 'update'])->name('mecaniciens.update');
    Route::get('/admin/generate-pdfm', [PDFController::class, 'generatePDFm'])->name('generate-pdfm');
    Route::controller(Mecanicien::class)->group(function(){
        Route::get('/admin/mecaniciens', 'index')->name('mecaniciens.index');
        Route::get('/admin/mecaniciens-export', 'export')->name('mecaniciens.export');
        Route::post('/admin/mecaniciens-import', 'import')->name('mecaniciens.import');
    });

    

    //crud pieces par admin
    Route::get('/admin/pieces/index',[PieceController::class,'index'])->name('pieces.index');
    Route::get('/admin/pieces/create',[PieceController::class,'create'])->name('pieces.create');
    Route::post('/admin/pieces/show',[PieceController::class,'show'])->name('pieces.show');
    Route::post('/admin/pieces/search',[PieceController::class,'search'])->name('pieces.search');
    Route::post('/admin/pieces/store',[PieceController::class,'store'])->name('pieces.store');
    Route::post('/admin/pieces/delete',[PieceController::class,'delete'])->name('pieces.delete');
    Route::get('/admin/pieces/{id}/edit', [PieceController::class, 'edit'])->name('pieces.edit');
    Route::put('/admin/pieces/{id}', [PieceController::class, 'update'])->name('pieces.update');
    Route::get('/admin/generate-pdfp', [PDFController::class, 'generatePDFp'])->name('generate-pdfp');

    //crud pieces par mecanicien
    Route::get('/mecanicien/pieces/index',[PieceController::class,'indexm'])->name('pieces.indexm');
    Route::get('/mecanicien/pieces/create',[PieceController::class,'createm'])->name('pieces.createm');
    Route::post('/mecanicien/pieces/show',[PieceController::class,'showm'])->name('pieces.showm');
    Route::post('/mecanicien/pieces/search',[PieceController::class,'searchm'])->name('pieces.searchm');
    Route::post('/mecanicien/pieces/store',[PieceController::class,'storem'])->name('pieces.storem');
    Route::post('/mecanicien/pieces/delete',[PieceController::class,'deletem'])->name('pieces.deletem');
    Route::get('/mecanicien/pieces/{id}/edit', [PieceController::class, 'editm'])->name('pieces.editm');
    Route::put('/mecanicien/pieces/{id}', [PieceController::class, 'updatem'])->name('pieces.updatem');
    Route::get('/mecanicien/generate-pdfp', [PDFController::class, 'generatePDFp'])->name('generate-pdfp');



    //crud reparations par admin
    Route::get('/admin/reparations/index',[ReparationController::class,'index'])->name('reparations.index');
    Route::get('/admin/reparations/create',[ReparationController::class,'create'])->name('reparations.create');
    Route::post('/admin/reparations/show',[ReparationController::class,'show'])->name('reparations.show');
    Route::post('/admin/reparations/search',[ReparationController::class,'search'])->name('reparations.search');
    Route::post('/admin/reparations/store',[ReparationController::class,'store'])->name('reparations.store');
    Route::post('/admin/reparations/delete',[ReparationController::class,'delete'])->name('reparations.delete');
    Route::get('/admin/reparations/{id}/edit', [ReparationController::class, 'edit'])->name('reparations.edit');
    Route::put('/admin/reparations/{id}', [ReparationController::class, 'update'])->name('reparations.update');
    Route::get('/admin/generate-pdfp', [PDFController::class, 'generatePDFp'])->name('generate-pdfp');





    //crud vehicules par admin
    Route::get('/admin/vehicules/index',[VehiculeController::class,'index'])->name('vehicules.index');
    Route::get('/admin/vehicules/create',[VehiculeController::class,'create'])->name('vehicules.create');
    Route::post('/admin/vehicules/show',[VehiculeController::class,'show'])->name('vehicules.show');
    Route::post('/admin/vehicules/search',[VehiculeController::class,'search'])->name('vehicules.search');
    Route::post('/admin/vehicules/store',[VehiculeController::class,'store'])->name('vehicules.store');
    Route::post('/admin/vehicules/delete',[VehiculeController::class,'delete'])->name('vehicules.delete');
    Route::get('/admin/vehicules/{id}/edit', [VehiculeController::class, 'edit'])->name('vehicules.edit');
    Route::put('/admin/vehicules/{id}', [VehiculeController::class, 'update'])->name('vehicules.update');
    Route::get('/admin/generate-pdfp', [PDFController::class, 'generatePDFp'])->name('generate-pdfp');
    Route::controller(VehiculeController::class)->group(function(){
        Route::get('/admin/vehicules', 'index')->name('vehicules.index');
        Route::get('/admin/vehicules-export', 'export')->name('vehicules.export');
        Route::post('/admin/vehicules-import', 'import')->name('vehicules.import');
    });


        //crud vehicules par client
        Route::get('/client/vehicules/index',[VehiculeController::class,'indexcl'])->name('vehicules.indexcl');
        Route::get('/client/vehicules/create',[VehiculeController::class,'createcl'])->name('vehicules.createcl');
        Route::post('/client/vehicules/show',[VehiculeController::class,'showcl'])->name('vehicules.showcl');
        Route::post('/client/vehicules/search',[VehiculeController::class,'searchcl'])->name('vehicules.searchcl');
        Route::post('/client/vehicules/store',[VehiculeController::class,'storecl'])->name('vehicules.storecl');
        Route::post('/client/vehicules/delete',[VehiculeController::class,'deletecl'])->name('vehicules.deletecl');
        Route::get('/client/vehicules/{id}/edit', [VehiculeController::class, 'editcl'])->name('vehicules.editcl');
        Route::put('/client/vehicules/{id}', [VehiculeController::class, 'updatecl'])->name('vehicules.updatecl');
        Route::get('/client/generate-pdfp', [PDFController::class, 'generatePDFp'])->name('generate-pdfp');
        Route::controller(VehiculeController::class)->group(function(){
            Route::get('/client/vehicules', 'indexcl')->name('vehicules.indexcl');
            Route::get('/client/vehicules-export', 'export')->name('vehicules.export');
            Route::post('/client/vehicules-import', 'import')->name('vehicules.import');
        });

        //crud reparations par client
        Route::get('/client/reparations/index',[ReparationController::class,'indexcl'])->name('reparations.indexcl');
        Route::get('/client/reparations/create',[ReparationController::class,'createcl'])->name('reparations.createcl');
        Route::post('/client/reparations/show',[ReparationController::class,'showcl'])->name('reparations.showcl');
        Route::post('/client/reparations/search',[ReparationController::class,'searchcl'])->name('reparations.searchcl');
        Route::post('/client/reparations/store',[ReparationController::class,'storecl'])->name('reparations.storecl');
        Route::post('/client/reparations/delete',[ReparationController::class,'deletecl'])->name('reparations.deletecl');
        Route::get('/client/reparations/{id}/edit', [ReparationController::class, 'editcl'])->name('reparations.editcl');
        Route::put('/client/reparations/{id}', [ReparationController::class, 'updatecl'])->name('reparations.updatecl');
        Route::get('/client/generate-pdfp', [PDFController::class, 'generatePDFp'])->name('generate-pdfp');

        //crud reparations par mecanicien
        Route::get('/mecanicien/reparations/index',[ReparationController::class,'indexm'])->name('reparations.indexm');
        Route::get('/mecanicien/reparations/create',[ReparationController::class,'createm'])->name('reparations.createm');
        Route::post('/mecanicien/reparations/show',[ReparationController::class,'showm'])->name('reparations.showm');
        Route::post('/mecanicien/reparations/search',[ReparationController::class,'searchm'])->name('reparations.searchm');
        Route::post('/mecanicien/reparations/store',[ReparationController::class,'storem'])->name('reparations.storem');
        Route::post('/mecanicien/reparations/delete',[ReparationController::class,'deletem'])->name('reparations.deletem');
        Route::get('/mecanicien/reparations/{id}/edit', [ReparationController::class, 'editm'])->name('reparations.editm');
        Route::put('/mecanicien/reparations/{id}', [ReparationController::class, 'updatem'])->name('reparations.updatem');
        Route::get('/mecanicien/generate-pdfp', [PDFController::class, 'generatePDFp'])->name('generate-pdfp');

        //crud facture par client
        Route::get('/client/factures/index',[FactureController::class,'indexcl'])->name('factures.indexcl');
        Route::get('/client/factures/create',[FactureController::class,'createcl'])->name('factures.createcl');
        Route::post('/client/factures/show',[FactureController::class,'showcl'])->name('factures.showcl');
        Route::post('/client/factures/search',[FactureController::class,'searchcl'])->name('factures.searchcl');
        Route::post('/client/factures/store',[FactureController::class,'storecl'])->name('factures.storecl');
        Route::post('/client/factures/delete',[FactureController::class,'deletecl'])->name('factures.deletecl');
        Route::get('/client/factures/{id}/edit', [FactureController::class, 'editcl'])->name('factures.editcl');
        Route::put('/client/factures/{id}', [FactureController::class, 'updatecl'])->name('factures.updatecl');
        Route::get('/client/generate-pdfp', [PDFController::class, 'generatePDFp'])->name('generate-pdfp');

        //crud facture par mecanicien
        Route::get('/mecanicien/factures/index',[FactureController::class,'indexm'])->name('factures.indexm');
        Route::get('/mecanicien/factures/create',[FactureController::class,'createm'])->name('factures.createm');
        Route::post('/mecanicien/factures/show',[FactureController::class,'showm'])->name('factures.showm');
        Route::post('/mecanicien/factures/search',[FactureController::class,'searchm'])->name('factures.searchm');
        Route::post('/mecanicien/factures/store',[FactureController::class,'storem'])->name('factures.storem');
        Route::post('/mecanicien/factures/delete',[FactureController::class,'deletem'])->name('factures.deletem');
        Route::get('/mecanicien/factures/{id}/edit', [FactureController::class, 'editm'])->name('factures.editm');
        Route::put('/mecanicien/factures/{id}', [FactureController::class, 'updatem'])->name('factures.updatem');
        Route::get('/mecanicien/generate-pdfp', [PDFController::class, 'generatePDFp'])->name('generate-pdfp');

        //crud facture par admin
        Route::get('/admin/factures/index',[FactureController::class,'index'])->name('factures.index');
        Route::get('/admin/factures/create',[FactureController::class,'create'])->name('factures.create');
        Route::post('/admin/factures/show',[FactureController::class,'show'])->name('factures.show');
        Route::post('/admin/factures/search',[FactureController::class,'search'])->name('factures.search');
        Route::post('/admin/factures/store',[FactureController::class,'store'])->name('factures.store');
        Route::post('/admin/factures/delete',[FactureController::class,'delete'])->name('factures.delete');
        Route::get('/admin/factures/{id}/edit', [FactureController::class, 'edit'])->name('factures.edit');
        Route::put('/admin/factures/{id}', [FactureController::class, 'update'])->name('factures.update');
        Route::get('/admin/generate-pdfp', [PDFController::class, 'generatePDFp'])->name('generate-pdfp');



    
});






Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify'); 

Route::get('/changeLocale/{locale}',function($locale){
    session()->put('locale',$locale);
    return redirect()->back();
})->name('clients.changeLocale');

