<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Local extends Model
{
    //

    /**
     * Campos que podem ser preenchidos do model
     *
     * @var array
     */
    protected $fillable = [
        'cep',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'user_creation_id',
    ];

    /**
     * Obtem o usuário criador do registro
     *
     * @return BelongsTo<User, Local>
     */
    public function userCreation(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_creation_id');
    }

    /**
     * Preenche automaticamente o id do usuário na criação
     */
    protected static function booted(): void
    {
        static::creating(function (Local $thisModel): void {
            if (Auth::check() && ! $thisModel->user_creation_id) {
                $thisModel->user_creation_id = Auth::id();
            }
        });

        // Filtra AUTOMATICAMENTE todas as queries pelo usuário logado
        static::addGlobalScope('user_creation', function (Builder $builder): void {
            if (Auth::check()) {
                $builder->where('user_creation_id', Auth::id());
            }
        });
    }
}
