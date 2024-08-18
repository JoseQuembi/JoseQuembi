
<?php

use Illuminate\Support\Facades\Route;

Route::prefix('painel')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    // Dashboard do Administrador
    Route::get('/dashboard', App\Livewire\Admin\Dashboard::class)->name('dashboard');
    Route::get('/charts', App\Livewire\Admin\Charts::class)->name('chart');
    // Rotas CRUD para Usuários
    Route::prefix('users')->name('users.')->group(function(){
        Route::get('/', App\Livewire\Admin\Users\Index::class)->name('index');
        Route::get('create', App\Livewire\Admin\Users\Create::class)->name('create');
        Route::get('{username}/edit', App\Livewire\Admin\Users\Edit::class)->name('edit');
        Route::get('{username}/info', App\Livewire\Admin\Users\Show::class)->name('show');
        Route::get('{username}/role', App\Livewire\Admin\Users\Role::class)->name('roles');
    });
    Route::prefix('acesse')->name('acesse.')->group(function(){
        Route::get('/role', App\Livewire\Admin\Role\Role::class)->name('role');
        Route::get('/permission', App\Livewire\Admin\Role\Permission::class)->name('permission');
    });
    // Rotas CRUD para Projetos
    Route::prefix('projects')->name('projects.')->group(function(){
        Route::get('/', App\Livewire\Admin\Projects\Index::class)->name('index');
        Route::get('create', App\Livewire\Admin\Projects\Create::class)->name('create');
        Route::get('{slug}/edit', App\Livewire\Admin\Projects\Edit::class)->name('edit');
        Route::get('{slug}/show', App\Livewire\Admin\Projects\Show::class)->name('show');
        Route::get('{slug}/budget', App\Livewire\Admin\Projects\Budget::class)->name('budget');
        Route::get('{slug}/task', App\Livewire\Admin\Projects\Task::class)->name('task');
    });

    //Pagamentos
    Route::prefix('payments')->name('payments.')->group(function(){
        Route::get('/', App\Livewire\Admin\Create\PaymentList::class)->name('index');
        Route::get('create', App\Livewire\Admin\Create\Payment::class)->name('create');
        Route::get('{slug}/show', App\Livewire\Admin\Create\PaymentDetails::class)->name('show');
    });

    //Facturas
    Route::prefix('invoices')->name('invoices.')->group(function(){
        Route::get('/', App\Livewire\Admin\Create\InvoiceList::class)->name('index');
        Route::get('create', App\Livewire\Admin\Create\Invoice::class)->name('create');
        Route::get('{slug}/edit', App\Livewire\Admin\Create\InvoiceEdit::class)->name('edit');
        Route::get('{slug}/show', App\Livewire\Admin\Create\InvoiceShow::class)->name('show');
    });

    //Clientes
    Route::prefix('clients')->name('clients.')->group(function(){
        Route::get('/', App\Livewire\Admin\Clients\Index::class)->name('index');
        Route::get('create', App\Livewire\Admin\Clients\Create::class)->name('create');
        Route::get('{slug}/edit', App\Livewire\Admin\Clients\Edit::class)->name('edit');
        Route::get('{slug}/show', App\Livewire\Admin\Clients\Show::class)->name('show');
    });
    // Rotas CRUD para Recursos
    Route::prefix('resources')->name('resources.')->group(function(){
        Route::get('/', App\Livewire\Admin\Resources\Index::class)->name('index');
        Route::get('create', App\Livewire\Admin\Resources\Create::class)->name('create');
        Route::get('{slug}/edit', App\Livewire\Admin\Resources\Edit::class)->name('edit');
        Route::get('{slug}/show', App\Livewire\Admin\Resources\Show::class)->name('show');
    });

    // Configurações do Sistema
    Route::prefix('settings')->name('settings.')->group(function(){
        Route::get('/', App\Livewire\Admin\Settings\Index::class)->name('index');
        Route::get('/configure', App\Livewire\Admin\Settings\Configure::class)->name('configure');
    });

    // Perfil do Usuário
    Route::prefix('perfil')->name('profile.')->group(function(){
        Route::get('overview', App\Livewire\Admin\Profile\Show::class)->name('show');
        Route::get('{slug}/activity', App\Livewire\Admin\Profile\ProjectSchedule::class)->name('activity');
        Route::get('edit', App\Livewire\Admin\Profile\Edit::class)->name('edit');
        Route::get('security', App\Livewire\Admin\Profile\Security::class)->name('update');
    });

    //Novos Recursos

    //Milistone
    Route::prefix('milestones')->name('milestones.')->group(function(){
        Route::get('/', App\Livewire\Admin\Milestones\Index::class)->name('index');
        Route::get('create', App\Livewire\Admin\Milestones\Create::class)->name('create');
        Route::get('{milestone}/edit', App\Livewire\Admin\Milestones\Edit::class)->name('edit');
        Route::get('{milestone}/show', App\Livewire\Admin\Milestones\Show::class)->name('show');
    });

    //issues
    Route::prefix('issues')->name('issues.')->group(function(){
        Route::get('/', App\Livewire\Admin\Issues\Index::class)->name('index');
        Route::get('create', App\Livewire\Admin\Issues\Create::class)->name('create');
        Route::get('{issue}/edit', App\Livewire\Admin\Issues\Edit::class)->name('edit');
        Route::get('{issue}/show', App\Livewire\Admin\Issues\Show::class)->name('show');
    });

    //teams
    Route::prefix('teams')->name('teams.')->group(function(){
        Route::get('/', App\Livewire\Admin\Teams\Index::class)->name('index');
        Route::get('create', App\Livewire\Admin\Teams\Create::class)->name('create');
        Route::get('{team}/edit', App\Livewire\Admin\Teams\Edit::class)->name('edit');
        Route::get('{team}/show', App\Livewire\Admin\Teams\Show::class)->name('show');
    });

    //Risks
    Route::prefix('risks')->name('risks.')->group(function(){
        Route::get('/', App\Livewire\Admin\Risks\Index::class)->name('index');
        Route::get('create', App\Livewire\Admin\Risks\Create::class)->name('create');
        Route::get('{risk}/edit', App\Livewire\Admin\Risks\Edit::class)->name('edit');
        Route::get('{risk}/show', App\Livewire\Admin\Risks\Show::class)->name('show');
    });
});
