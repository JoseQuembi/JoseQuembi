<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'company_name',
        'username',
        'token_access'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    protected static function booted()
    {
        static::creating(function ($client) {
            // Gerar um username único baseado no nome do cliente
            $client->username = $client->generateUniqueUsername($client->name);

            // Gerar um token de acesso único de 6 dígitos
            $client->token_access = $client->generateUniqueToken();
        });
    }

    /**
     * Gera um username único baseado no nome do cliente.
     *
     * @param string $name
     * @return string
     */
    protected function generateUniqueUsername($name)
    {
        // Remove caracteres especiais e espaços
        $username = preg_replace('/[^A-Za-z0-9]/', '', strtolower($name));

        // Verifica se o username já existe
        $existingUser = static::where('username', $username)->first();
        if ($existingUser) {
            // Se existir, adiciona um sufixo numérico para garantir a exclusividade
            $username .= '_' . time();
        }

        return $username;
    }
    /**
     * Gera um token de acesso único de 6 dígitos.
     *
     * @return string
     */
    protected function generateUniqueToken()
    {
        // Gera um token de 6 dígitos
        do {
            $token = Str::random(6);
        } while (static::where('token_access', $token)->exists());

        return $token;
    }
}
