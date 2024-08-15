<?php

use Illuminate\Support\Facades\Route;



require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

Route::get('/', App\Livewire\Pages\Home\Index::class)->name('home');
Route::get('sobre-nos', App\Livewire\Pages\Home\About::class)->name('about');
Route::get('conta-equipa', App\Livewire\Pages\Home\TeamAccount::class)->name('account.team');
Route::get('contactos', App\Livewire\Pages\Home\Contact::class)->name('contacto');
Route::get('blogs', App\Livewire\Pages\Home\Blog::class)->name('blogs');
Route::get('trabalhos', App\Livewire\Pages\Home\Works::class)->name('works');
Route::get('overview', App\Livewire\Pages\Home\Overview::class)->name('overview');
Route::get('resources', App\Livewire\Pages\Home\Resources::class)->name('resources');
Route::get('platforms', App\Livewire\Pages\Home\Platforms::class)->name('platforms');
Route::get('pricing', App\Livewire\Pages\Home\Pricing::class)->name('pricing');
