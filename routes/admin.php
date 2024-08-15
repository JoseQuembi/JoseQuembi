
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
        Route::get('{username}/role', App\Livewire\Admin\Users\Role::class)->name('settings.index');
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
    Route::prefix('clients')->name('clients.')->group(function(){
        Route::get('/', App\Livewire\Admin\Clients\Index::class)->name('index');
        Route::get('create', App\Livewire\Admin\Clients\Create::class)->name('create');
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
        Route::get('edit', App\Livewire\Admin\Profile\Edit::class)->name('edit');
        Route::get('security', App\Livewire\Admin\Profile\Security::class)->name('update');
    });
});
