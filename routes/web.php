<?php

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

//Route::get('/', function () {
    //return view('illimitis/calendrier');
//});


Route::get('/catalogue_formations', 'AdfController@ajout_formulaireAdf')->name('ajout_formulaireAdf');
Route::post('/catalogue_formation', 'AdfController@store_formulaireAdf')->name('store_formulaireAdf');

Route::get('/','AdminController@calendrier');
Route::get('/catalogues','AdminController@catalogues');
Route::get('/formation','AdminController@formation');
Route::get('/innovations','AdminController@inovation');
Route::get('/contact','AdminController@contact');
Route::get('/document_cata/{document}/edit', 'AdminController@document_cata')->name('document_cata.editer');
Route::get('/document_cata_ins/{document}/edit', 'AdminController@document_cata_ins')->name('document_cata_ins.editer');
Route::post('/save_document_prospect', 'AdminController@save_document_prospect')->name('document.prospect');
Route::post('/save_document_prospect_ins', 'AdminController@save_document_prospect_ins')->name('document.prospect_ins');
Route::get('/calendrier_for/{document}/edit', 'AdminController@calendrier_for')->name('calendrier_for.editer');
Route::post('/save_inscription', 'AdminController@save_inscription')->name('inscription.formation');
Route::post('/send_contact', 'AdminController@send_contact')->name('send.contact');
Route::get('/document_catafl/{document}/edit', 'AdminController@document_catafl')->name('document_catafl.editer');
Route::post('/save_document_prospectfl', 'AdminController@save_document_prospectfl')->name('document.prospectfl');
Route::get('/page_ok','AdminController@page_ok');
Route::get('/page_okfl','AdminController@page_okfl');
Route::get('/page_okins','AdminController@page_okins');

Route::get('download/rapport_reunion','DirectionController@download');

Route::get('/connexion', 'UserController@login');  
Route::post('/connexion', 'UserController@login');

Route::get('/inscription', 'UserController@inscription');
Route::post('/inscription', 'UserController@inscriptions')->name('inscription.register');

Route::group(['middleware' => 'Connecter'], function(){

Route::resource('actions', 'ActionController');
Route::resource('reunions', 'ReunionController');
Route::resource('decissions', 'DecissionController');
Route::resource('directions', 'DirectionController');
Route::resource('services', 'ServiceController'); 
Route::resource('themes', 'ThemeController');
Route::resource('suivi_actions', 'Suivi_actionController');
Route::resource('suivi_indicateurs', 'Suivi_indicateurController');
Route::resource('indicateurs', 'IndicateurController');
Route::resource('suivi_modules', 'Suivi_moduleController');
Route::resource('modules', 'ModuleController');
Route::resource('roles', 'RoleController');
Route::resource('users', 'UserController');
Route::resource('annonces', 'AnnonceController');
Route::get('/action_user/{action}/edit', 'UserController@edit_action')->name('action_user.editer');
Route::patch('/action_user/{action}', 'UserController@update_action')->name('action_user.update');
Route::get('/action_responsable/{action}/edit', 'UserController@edit_action_responsable')->name('action_responsable.editer');
Route::patch('/action_responsable/{action}', 'UserController@update_action_responsable')->name('action_responsable.update');
Route::get('/action_user_d/{action}/edit', 'UserController@edit_action_d')->name('action_user_d.editer');
Route::patch('/action_user_d/{action}', 'UserController@update_action_d')->name('action_user_d.update');
Route::get('/action_user_a/{action}/edit', 'UserController@edit_action_user')->name('action_user_a.editer');
Route::patch('/action_user_a/{action}', 'UserController@update_action_user')->name('action_user_a.update');
Route::get('/action_responsable_a/{action}/edit', 'UserController@edit_action_responsab')->name('action_responsable_a.editer');
Route::patch('/action_responsable_a/{action}', 'UserController@update_action_responsab')->name('action_responsable_a.update');
Route::get('/admin/banSuivi', 'UserController@banSuivi');

Route::get('/action_user_fresponsable/{action}/edit', 'UserController@edit_action_fresponsable')->name('action_user_fresponsable.editer');
Route::patch('/action_user_fresponsable/{action}', 'UserController@update_action_fresponsable')->name('action_user_fresponsable.update');

Route::get('/action_user_futilisateur/{action}/edit', 'UserController@edit_action_futilisateur')->name('action_user_futilisateur.editer');
Route::patch('/action_user_futilisateur/{action}', 'UserController@update_action_futilisateur')->name('action_user_futilisateur.update');

Route::get('/action_user_fdirecteur/{action}/edit', 'UserController@edit_action_fdirecteur')->name('action_user_fdirecteur.editer');
Route::patch('/action_user_fdirecteur/{action}', 'UserController@update_action_fdirecteur')->name('action_user_fdirecteur.update');

Route::get('/action_user_frapporteur/{action}/edit', 'UserController@edit_action_frapporteur')->name('action_user_frapporteur.editer');
Route::patch('/action_user_frapporteur/{action}', 'UserController@update_action_frapporteur')->name('action_user_frapporteur.update');

Route::get('/profil_user/{profil_user}/edit', 'UserController@profil_user')->name('profil_user.editer');
Route::patch('/profil_user/{profil_user}', 'UserController@update_profil_user')->name('profil_user.update');

Route::get('/profil_rap/{profil_rap}/edit', 'UserController@profil_rap')->name('profil_rap.editer');
Route::patch('/profil_rap/{profil_rap}', 'UserController@update_profil_rap')->name('profil_rap.update');

Route::get('/profil_responsable/{profil_responsable}/edit', 'UserController@profil_responsable')->name('profil_responsable.editer');
Route::patch('/profil_responsable/{profil_responsable}', 'UserController@update_profil_responsable')->name('profil_responsable.update');

Route::get('/profil_dg/{profil_dg}/edit', 'UserController@profil_dg')->name('profil_dg.editer');
Route::patch('/profil_dg/{profil_dg}', 'UserController@update_profil_dg')->name('profil_dg.update');

Route::get('/action_responsable_reasigner/{action}/edit', 'UserController@edit_action_responsabreasigner')->name('action_responsable_reasigner.editer');
Route::patch('/action_responsable_reasigner/{action}', 'UserController@update_action_responsabreasigner')->name('action_responsable_reasigner.update');

Route::get('/action_rap_reasigner/{action}/edit', 'UserController@edit_action_rapreasigner')->name('action_rap_reasigner.editer');
Route::patch('/action_rap_reasigner/{action}', 'UserController@update_action_rapreasigner')->name('action_rap_reasigner.update');

Route::get('/action_dg_reasigner/{action}/edit', 'UserController@edit_action_dgreasigner')->name('action_dg_reasigner.editer');
Route::patch('/action_dg_reasigner/{action}', 'UserController@update_action_dgreasigner')->name('action_dg_reasigner.update');

Route::get('/action_responsable_asigner/{action}/edit', 'UserController@edit_action_responsabasigner')->name('action_responsable_asigner.editer');
Route::patch('/action_responsable_asigner/{action}', 'UserController@update_action_responsabasigner')->name('action_responsable_asigner.update');

Route::get('/action_rap_asigner/{action}/edit', 'UserController@edit_action_rapasigner')->name('action_rap_asigner.editer');
Route::patch('/action_rap_asigner/{action}', 'UserController@update_action_rapasigner')->name('action_rap_asigner.update');

Route::get('/action_dg_asigner/{action}/edit', 'UserController@edit_action_dgasigner')->name('action_dg_asigner.editer');
Route::patch('/action_dg_asigner/{action}', 'UserController@update_action_dgasigner')->name('action_dg_asigner.update');

Route::get('/dashboardDirecteur', function () {
    return view('v2.dashboard');
});

Route::get('/dashboardResponsable', function () {
    return view('v2.res_dash');
});

Route::get('/admin/dashboard', 'UserController@dashboard');
Route::get('/admin/dashboard/user', 'UserController@dashboard_user');
Route::get('/admin/dashboard/directeur', 'UserController@dashboard_directeur');
Route::get('/admin/dashboard/rapporteur', 'UserController@dashboard_rapporteur');
Route::get('/admin/dashboard/responsable', 'UserController@dashboard_responsable');
Route::get('/admin/dashboard/tech', 'UserController@tech');
Route::get('/admin/dashboard/marketing', 'UserController@marketing');
Route::get('/admin/dashboard/assistant', 'UserController@assistant');
Route::get('/admin/dashboard/secretaire', 'UserController@secretaire');
Route::post('/save_action', 'UserController@save_action');
Route::get('/voir_history/{id}', 'UserController@history')->name('history.voir');
Route::get('/voir_history_responsable/{id}', 'UserController@history_responsable')->name('history_responsable.voir');

Route::get('/voir_history_d/{id}', 'UserController@history_d')->name('history_d.voir');
Route::post('/save_action_d', 'UserController@save_action_d');
Route::get('/voir_direction/{id}', 'UserController@direction')->name('direction.voir');
Route::get('/voir_agent/{id}', 'UserController@agent')->name('agent.voir');
Route::get('/voir_user_agent/{id}', 'UserController@user_agent')->name('user_agent.voir');
Route::get('/voir_responsable_agent/{id}', 'UserController@responsable_agent')->name('responsable_agent.voir');

Route::get('/voir_user_agent_rap/{id}', 'UserController@user_agent_rap')->name('user_agent_rap.voir');
Route::get('/voir_history_r/{id}', 'UserController@history_r')->name('history_r.voir');
Route::post('/save_action_r', 'UserController@save_action_r');
Route::post('/save_action_responsable', 'UserController@save_action_responsable');
Route::get('/action_user_r/{action}/edit', 'UserController@edit_action_r')->name('action_user_r.editer');;
Route::patch('/action_user_r/{action}', 'UserController@update_action_r')->name('action_user_r.update');
Route::get('/action_user_rap/{action}/edit', 'UserController@edit_action_rap')->name('action_user_rap.editer');;
Route::patch('/action_user_rap/{action}', 'UserController@update_action_rap')->name('action_user_rap.update');
Route::get('/user_action_r', 'UserController@user_action_r');
Route::get('/user_actionA_r', 'UserController@user_actionA_r');
Route::get('/user_annonce_r', 'UserController@user_annonce_r');
Route::get('/ajout_annonce_r', 'UserController@ajout_annonce_r');
Route::post('/ajout_annonce_r', 'UserController@ajout_annonceA_r')->name('ajout.annonce_r');

Route::get('/user_annonce_res', 'UserController@user_annonce_res');
Route::get('/user_annonce_user', 'UserController@user_annonce_user');

Route::get('/user_reunion', 'UserController@user_reunion');
Route::get('/user_action', 'UserController@user_action');
Route::get('/user_actionA', 'UserController@user_actionA');

Route::get('/responsable_reunion', 'UserController@responsable_reunion')->name('ajout.reunion');
Route::get('/responsable_action', 'UserController@responsable_action');
Route::get('/responsable_actionA', 'UserController@responsable_actionA');

Route::get('/user_reunion_dg', 'UserController@user_reunion_dg');
Route::get('/user_action_dg', 'UserController@user_action_dg');
Route::get('/user_actionA_dg', 'UserController@user_actionA_dg');
Route::get('/user_annonce', 'UserController@user_annonce');

Route::get('/ajout_annonce', 'UserController@ajout_annonce');
Route::post('/ajout_annonce', 'UserController@ajout_annonceA')->name('ajout.annonce');

Route::get('/search_a', 'UserController@my_filter');
Route::get('/search', 'ActionController@filter');
Route::get('/search_ag', 'AgentController@filter_ag');
Route::get('/action_direct/{id}', 'ActionController@showDirection')->name('direction.vue');   

Route::get('/ajout_action_dg', 'ActionController@ajout_action_dg');
Route::post('/ajout_action_dg', 'ActionController@ajout_actionDG')->name('ajout.action_dg');
Route::get('/voir_action_dg', 'ActionController@voir_action_dg');
Route::get('/search_action', 'ActionController@filter_action_dg');

Route::get('/contactss', 'MailController@contact');
Route::get('/contactss', 'MailManuController@contact');

Route::post('send/email', 'MailController@sendemail')->name('contact.store');
Route::post('send/emails', 'MailManuController@sendemail')->name('contactm.store');

Route::get('/responsable_actionAcloture', 'UserController@responsable_actionAcloture');
Route::get('/rapporteur_actionAcloture', 'UserController@rapporteur_actionAcloture');
Route::get('/directeur_actionAcloture', 'UserController@directeur_actionAcloture');

Route::get('/ajout_action_asigne', 'ActionController@ajout_action_asigneRES');
Route::post('/ajout_action_asigne', 'ActionController@ajout_actionAsigneRES')->name('ajout.action_asigneRES');

Route::get('/ajout_action_asigneR', 'ActionController@ajout_action_asigneRAP');
Route::post('/ajout_action_asigneR', 'ActionController@ajout_actionAsigneRAP')->name('ajout.action_asigneRAP');

Route::get('/ajout_action_asignerespon', 'ActionController@ajout_action_asignerespon');
Route::post('/ajout_action_asignerespon', 'ActionController@ajout_actionAsignerespon')->name('ajout.action_asignerespon');

Route::get('/ajout_action_asigneresponR', 'ActionController@ajout_action_asigneresponRAP');
Route::post('/ajout_action_asigneresponR', 'ActionController@ajout_actionAsigneresponRAP')->name('ajout.action_asigneresponRAP');

Route::get('/ajout_action_user_moi', 'ActionController@ajout_action_user_moi');
Route::post('/ajout_action_user_moi', 'ActionController@ajout_actionAuser_moi')->name('ajout.action_user_moi');

Route::get('/ajout_action_rap_moi', 'ActionController@ajout_action_rap_moi');
Route::post('/ajout_action_rap_moi', 'ActionController@ajout_actionArap_moi')->name('ajout.action_rap_moi');

Route::get('/ajout_action_responsable_moi', 'ActionController@ajout_action_responsable_moi');
Route::post('/ajout_action_responsable_moi', 'ActionController@ajout_actionAresponsable_moi')->name('ajout.action_responsable_moi');

Route::get('/ajout_action_dg_moi', 'ActionController@ajout_action_dg_moi');
Route::post('/ajout_action_dg_moi', 'ActionController@ajout_actionAdg_moi')->name('ajout.action_dg_moi');

Route::post('/cloture/{id}', 'UserController@status_cloture')->name('visibilite.cloture');
Route::post('/valider/{id}', 'UserController@status_valider')->name('visibilite.valider');
Route::post('/refuser/{id}', 'UserController@status_refuser')->name('visibilite.refuser');

Route::get('/res_reunion/{reunion}/edit', 'ReunionController@edit_res_reunion')->name('res_reunion.editer');
Route::patch('/res_reunion/{reunion}', 'ReunionController@update_res_reunion')->name('res_reunion.update');
Route::DELETE('res_reunion/{res_reunion}', 'ReunionController@res_supprimer')->name('res_reunion.destroy');

Route::get('/dg_reunion/{reunion}/edit', 'ReunionController@edit_dg_reunion')->name('dg_reunion.editer');
Route::patch('/dg_reunion/{reunion}', 'ReunionController@update_dg_reunion')->name('dg_reunion.update');
Route::DELETE('dg_reunion/{dg_reunion}', 'ReunionController@dg_supprimer')->name('dg_reunion.destroy');

Route::get('/res_annonce/{annonce}/edit', 'AnnonceController@edit_res_annonce')->name('res_annonce.editer');
Route::patch('/res_annonce/{annonce}', 'AnnonceController@update_res_annonce')->name('res_annonce.update');
Route::DELETE('res_annonce/{dg_annonce}', 'AnnonceController@res_supprimer')->name('res_annonce.destroy');

Route::get('/dg_annonce/{annonce}/edit', 'AnnonceController@edit_dg_annonce')->name('dg_annonce.editer');
Route::patch('/dg_annonce/{annonce}', 'AnnonceController@update_dg_annonce')->name('dg_annonce.update');
Route::DELETE('dg_annonce/{dg_annonce}', 'AnnonceController@dg_supprimer')->name('dg_annonce.destroy');


Route::get('/list_resultats', 'ObjectifController@list_objectifs');
Route::get('/search_dg_axe', 'ObjectifController@dgs_filter');

Route::get('/list_indicateurs', 'IndicateurController@list_indicateurs');
Route::get('/search_in_dgstr', 'IndicateurController@stra_dg_filter');
Route::get('/search_in_dgdir', 'IndicateurController@dir_dg_filter');

Route::get('/list_actions', 'ActionController@list_action');
Route::get('/search_act_stra', 'ActionController@stra_dg_filter');
Route::get('/search_act_in', 'ActionController@in_dg_filter');

Route::get('/DG/dashboard', 'ObjectifController@dg');
Route::get('/search_stra_dg', 'ObjectifController@stra_dg_filter');
Route::get('/search_dir_dg', 'ObjectifController@dir_dg_filter');


Route::get('/DIRECTEUR/dashboard', 'ObjectifController@dir');
Route::get('/search_dir', 'ObjectifController@dir_filter');

Route::get('/AGENT/dashboard', 'ObjectifController@ag');
Route::get('/search_ag', 'ObjectifController@ag_filter');

Route::get('/ADMIN/dashboard', 'ObjectifController@adm');
Route::get('/search_adm', 'ObjectifController@adm_filter');

Route::get('/ajout_act_ind/{action}/edit', 'ObjectifController@ajout_act_ind')->name('action.indi_edit');
Route::post('/ajout_act_ind', 'ObjectifController@ajout_act_inds')->name('action.indi');

Route::get('/ajout_act_list', 'ObjectifController@ajout_act_list');
Route::post('/ajout_act_list', 'ObjectifController@ajout_act_lists')->name('action.list');

Route::get('/ajout_act_list_dir', 'ObjectifController@ajout_act_list_dir');
Route::post('/ajout_act_list_dir', 'ObjectifController@ajout_act_lists_dir')->name('action.list_dir');

Route::get('/comment/{action}/edit', 'ObjectifController@note')->name('action.note');
Route::post('/comment/{id}', 'ObjectifController@comment')->name('comment.action');

Route::get('/comment_dir/{action}/edit', 'ObjectifController@note_dir')->name('action.note_dir');
Route::post('/comment_dir/{id}', 'ObjectifController@comment_dir')->name('comment.action_dir');
Route::get('/comment_dirAct/{action}/edit', 'ObjectifController@note_dirAct')->name('action.note_dirAct');
Route::post('/comment_dirAct/{id}', 'ObjectifController@comment_dirAct')->name('comment.action_dirAct');
Route::get('/action_indicateurs_dir{action_indicateurs_dir}/edit', 'ObjectifController@action_indicateurs_edit_dir')->name('action.indicateurs_dir');

Route::get('/action_indicateurs{action_indicateurs}/edit', 'ObjectifController@action_indicateurs_edit')->name('action.indicateurs');
Route::get('/action_indicateurs', 'ObjectifController@action_indicateurs');

Route::get('/stra_indicateurs{stra_indicateurs}/edit', 'ObjectifController@stra_indicateurs_edit')->name('stra.indicateurs');

Route::get('/list_actions_dir', 'ActionController@list_action_dir');
Route::get('/search_DirS', 'ActionController@DirS_filter');

Route::get('/list_indicateurs_dir', 'ObjectifController@list_indicateurs_dir');
Route::get('/search_DirI', 'ObjectifController@DirI_filter');

Route::get('/list_actions_ag', 'ActionController@list_action_ag');
Route::get('/search_AG', 'ActionController@AG_filter');

Route::get('/comment_ag_voir/{action}/edit', 'ObjectifController@voir_comment')->name('action.voir_comment');
Route::get('/maj_ag/{action}/edit', 'ObjectifController@maj_ags')->name('action.maj_ag');
Route::post('/maj_ag/{id}', 'ObjectifController@maj_ag')->name('maj.action_ag');
Route::get('/action_indicateurs_ag{action_indicateurs_ag}/edit', 'ObjectifController@action_indicateurs_edit_ag')->name('action.indicateurs_ag');


Route::get('/liste_objectif', 'ObjectifController@index');
Route::get('/ajouter_objectif', 'ObjectifController@create');
Route::post('/ajouter_objectif', 'ObjectifController@store')->name('objectif.store');
Route::get('/objectif/{objectif}/edit', 'ObjectifController@edit')->name('objectif.edit');
Route::patch('/objectif/{objectif}', 'ObjectifController@update')->name('objectif.update');
Route::DELETE('objectif/{objectif}', 'ObjectifController@destroy')->name('objectif.destroy');

Route::get('/liste_axe', 'AxeController@index');
Route::get('/ajouter_axe', 'AxeController@create');
Route::post('/ajouter_axe', 'AxeController@store')->name('axe.store');
Route::get('/axe/{axe}/edit', 'AxeController@edit')->name('axe.edit');
Route::patch('/axe/axe}', 'AxeController@update')->name('axe.update');
Route::DELETE('/axe/{axe}', 'AxeController@destroy')->name('axe.destroy');

Route::post('/indi_cle/{id}', 'IndicateurController@cle')->name('indi.cle');
Route::post('/indi_non_cle/{id}', 'IndicateurController@non_cle')->name('indi.non_cle');

Route::post('/action_ter/{id}', 'ActionController@action_ter')->name('action.ter');
Route::post('/action_non_ter/{id}', 'ActionController@action_non_ter')->name('action.non_ter');

Route::get('/list_tous_indicateurs', 'IndicateurController@list_tous_indicateurs');

Route::get('/administrateur', function () {
    return view('dashboard.index');
});
Route::get('/action_agent{indicateur}/edit', 'ObjectifController@action_agent')->name('action_agent.show');

Route::get('/indicat_up/{indicateur}/edit', 'ObjectifController@indicat_up')->name('indicat_up.edit');
Route::post('/indicat_up/{id}', 'ObjectifController@indicat_ups')->name('indicat_up.update');

// ILLIMITIS ROUTES
Route::resource('prospects', 'ProspectController');

Route::get('/ADMIN/DASHBOARD', 'AdminController@admin');

Route::resource('formations', 'FormationController');
Route::resource('sessions', 'SessionController');  
Route::resource('pays', 'PayController');
Route::resource('agents', 'AgentController');  
Route::resource('clients', 'ClientController');
Route::resource('inscriptions', 'InscriptionController');  
Route::resource('feedbacks', 'FeedbackController');
Route::resource('documents', 'DocumentController');  
Route::resource('contacts', 'ContactController');
Route::resource('categories', 'CategorieController');
Route::resource('destinataires', 'DestinataireController');  


Route::post('/danger/{id}', 'InscriptionController@danger')->name('danger.sta');
Route::post('/warning/{id}', 'InscriptionController@warning')->name('warning.sta');
Route::post('/success/{id}', 'InscriptionController@success')->name('success.sta');


Route::get('/search_formation', 'InscriptionController@for_filter');

Route::get('/export-excel', 'UserController@exportintoexcel');
Route::get('/export-csv', 'UserController@exportintoCSV');


});

Auth::routes();  

Route::get('/home', 'HomeController@index')->name('home');
//Clear route cache:
 Route::get('/route-cache', function() {
     $exitCode = Artisan::call('route:cache');
     return 'Routes cache cleared';
 });

 //Clear config cache:
 Route::get('/config-cache', function() {
     $exitCode = Artisan::call('config:cache');
     return 'Config cache cleared';
 }); 

// Clear application cache:
 Route::get('/clear-cache', function() {
     $exitCode = Artisan::call('cache:clear');
     return 'Application cache cleared';
 });

 // Clear view cache:
 Route::get('/view-clear', function() {
     $exitCode = Artisan::call('view:clear');
     return 'View cache cleared';
 });
