<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfController;
use App\Http\Controllers\ChefServiceController;
use App\Http\Controllers\ChefServiceRapportController;
use App\Http\Controllers\DashFonctionController;
use App\Http\Controllers\DirecteurController;
use App\Http\Controllers\DirecteurDashController;
use App\Http\Controllers\EditBackController;
use App\Http\Controllers\FonctionnaireController;
use App\Http\Controllers\FonctionnairController;
use App\Http\Controllers\FonctionnaireProfController;
use App\Http\Controllers\FonctionnaireProfileController;
use App\Http\Controllers\InformationRapportController;
use App\Http\Controllers\ProfilEditController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Proposition;
use App\Http\Controllers\PropositionController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\SearchActionController;
use App\Http\Controllers\SearchAllController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UpdatePassword;
use App\Http\Controllers\validerInformationsController;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/test',function(){
    return view('layouts.testSid');
});
Route::get('/testEdit',function(){
    return view('user.testEdit');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin',[UserController::class,'index'])->name('admin')->middleware('admin');

Route::get('/directeur',[DirecteurController::class,'index'])->name('directeur')->middleware('directeur');



Route::get('forgot_password',[FonctionnaireController::class,'forgotPassword'])->name('forgotPassword');
Route::post('forgot_password',[FonctionnaireController::class,'forgotPasswordPost'])->name('forgotPasswordPost');
Route::get('reset_password/{token}',[FonctionnaireController::class,'resetPassword'])->name('resetPassword');

//DIRECTEUR
Route::group(['middleware'=>['admin']],function(){
    Route::get('admin/profil/edit',[AdminProfController::class,'edit'])->name('admin.profil.edit');
    Route::post('admin/profil/update',[AdminProfController::class,'update'])->name('admin.profil.update');
    Route::post('admin/update/password',[AdminProfController::class,'updatePassword'])->name('admin.password.update');   
    Route::resource('fonctionnaire',FonctionnaireController::class);
    Route::resource('service',ServiceController::class);
    Route::resource('user',UserController::class);

    Route::get('search',[AdminProfController::class,'search'])->name('search');
    
});


//CHEFSERVICE
Route::group(['middleware'=>['chefService']],function(){
    Route::get('/chefService',[ChefServiceController::class,'AfficherListF'])->name('afficherListFonct');
    Route::get('InformationSaisies/{id}',[ChefServiceController::class,'afficherInformationSaisies'])->name('InformationSaisies');
    Route::get('ValiderActivite/{activite}/{user}',[ChefServiceController::class,'valider'])->name('validerA');
    Route::get('updateActiv/{activite}/{user}',[ChefServiceController::class,'updatActv'])->name('updateActiv');
    Route::put('RegeterActivite/{activite}/{user}',[ChefServiceController::class,'regeter'])->name('regeterA');
    Route::get('validerAction/{action}/user/{user}',[validerInformationsController::class,'editAction'])->name('validerActionIn');
    
    
    Route::put('RegeterAction/{action}/{user}',[ChefServiceController::class,'regeterAction'])->name('regeterAction');
    Route::get('UpdateAction/{action}/{user}',[ChefServiceController::class,'validerAction'])->name('updateActions');  
    Route::get('editProp/{prop}/{user}',[ChefServiceController::class,'editProp'])->name('editProp');
    Route::get('validerProp/{prop}/{user}',[ChefServiceController::class,'validerProp'])->name('validerProp');
    Route::put('regeterProp/{prop}/{user}',[ChefServiceController::class,'regeterProp'])->name('regeterProp');   
    Route::get('returnBackActivite',[ChefServiceController::class,'backk'])->name('returnBackActivite');
    Route::get('searchFonc',[ChefServiceController::class,'searchFonc'])->name('searchFonc');
    Route::get('searchActivite',[ChefServiceController::class,'searchActivite'])->name('searchActivite'); 
    Route::get('SearchPropposition',[ChefServiceController::class,'SearchPropposition'])->name('SearchPropposition');
    Route::get('searchAction',[ChefServiceController::class,'searchAction'])->name('searchAction');
    Route::post('chef/update/profile',[ChefServiceController::class,'update'])->name('update.chef.profile');
    Route::get('chef/edit/profile',[ChefServiceController::class,'editChef'])->name('edit.chef.profil');
    Route::post('chef/update/password',[ChefServiceController::class,'updatePassword'])->name('update.chef.password');
    //Create rapport   
    Route::get('addActivite',[ChefServiceController::class,'addActivite'])->name('addActivite');
    Route::get('addAction',[ChefServiceController::class,'addAction'])->name('addAction');
    Route::get('addContraint',[ChefServiceController::class,'addContraint'])->name('addContraint');
    Route::get('addProposition',[ChefServiceController::class,'addProposition'])->name('addProposition');
    Route::post('chef/storActivite',[ChefServiceController::class,'storActivite'])->name('chef.storActivite');   
    Route::post('chef/storAction',[ChefServiceController::class,'storAction'])->name('chef.storAction');    
    Route::post('chef/storContraint',[ChefServiceController::class,'storContraint'])->name('chef.storContraint');
    Route::post('chef/storProposition',[ChefServiceController::class,'StorProposition'])->name('chef.storPropposition');
    
    
});




Route::group(['middleware'=>['fonctionnaire']],function(){
    //DASHFONCTIONNAIRE
    Route::get('/fonctionnaireDash',[FonctionnairController::class,'dashFonct'])->name('fonctionnaireDash');
    //REMPLIR RAPPORT
    Route::get('RemplirRapport',[FonctionnairController::class,'index'])->name('RemplirRapport');
    Route::get('remplirActivite',[FonctionnairController::class,'indexActivite'])->name('remplirActivite');
    Route::post('StorActivite',[FonctionnairController::class,'StorActivite'])->name('StorActivite');
    Route::get('remplirAction',[FonctionnairController::class,'remplirAction'])->name('remplirAction');
    Route::post('StorAction',[FonctionnairController::class,'StorAction'])->name('StorAction');
    Route::get('remplirProposition',[FonctionnairController::class,'remplirProposition'])->name('remplirProposition');
    Route::post('StorProposition',[FonctionnairController::class,'StorProposition'])->name('StorProposition');
    Route::get('remplirContraint',[FonctionnairController::class,'indexContraint'])->name('remplirContraint');
    Route::post('StorContraint',[FonctionnairController::class,'StorContraint'])->name('StorContraint'); 
    //CONSULTER INFORMATIONS SAISIS
    Route::get('finformations',[FonctionnairController::class,'informations'])->name('information');
    Route::get('modifier/activite/{activite}',[FonctionnairController::class,'editActivite'])->name('modifier.activite');
    Route::put('update/activite/{activite}',[FonctionnairController::class,'UpdateActivite'])->name('edit.activite');
    Route::get('modifier/action/{action}',[FonctionnairController::class,'editAction'])->name('modifier.action');
    Route::put('updateAction/action/{action}',[FonctionnairController::class,'updateAction'])->name('updateAction'); 
    Route::get('informationActions',[FonctionnairController::class,'informationAction'])->name('actionInformations');
    Route::get('informationProppositions',[FonctionnairController::class,'informationProppositions'])->name('proppositionsInformations');
    Route::get('contraintsInformations',[FonctionnairController::class,'informationsContraints'])->name('contraintsInformations');
    Route::get('consultation',[FonctionnairController::class,'consult'])->name('consultaion');
    Route::post('informations/imprimer',[FonctionnairController::class,'imprimer'])->name('informations.imprimer');
    Route::get('activite/show/{activite}',[FonctionnairController::class,'showActivite'])->name('showActivite');
    Route::get('action/show/{action}',[FonctionnairController::class,'showAction'])->name('showAction');
    Route::get('proposition/show/{proposition}',[FonctionnairController::class,'showProposition'])->name('showProposition');
    Route::get('modifier/proposition/{proposition}',[FonctionnairController::class,'editProposition'])->name('modifier.proposition');
    Route::put('update/proposition/{proposition}',[FonctionnairController::class,'updateProposition'])->name('proposition.update');
    //UPDATE PROFIL
    Route::get('user/edit/profile',[FonctionnairController::class,'edit'])->name('edit.user.profile');
    Route::post('user/update/profile',[FonctionnairController::class,'update'])->name('update.user.profile');
    Route::post('user/update/password',[FonctionnairController::class,'updatePassword'])->name('update.user.password');
});


Route::group(['middleware'=>['directeur']],function(){
    Route::get('searchD',[DirecteurController::class,'search'])->name('searchD');
    Route::get('rappor/show/{id}',[DirecteurController::class,'directeurShowRapports'])->name('directeurShowRapports');
    Route::get('imprimerPDF/{user}',[DirecteurController::class,'imprimer'])->name('imprimerPDF');
    
    Route::get('showEmplye/{id}',[DirecteurController::class,'showEmploye'])->name('showEmploye');
    Route::get('archiveRapport/{id}/{date}',[DirecteurController::class,'archiveRapport'])->name('archiveRapport');
});