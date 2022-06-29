<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'Cargo',
        'estado',
        'idInstitucion',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    protected $with = ['roles', 'permissions'];

    public function scopeFiltros($query, array $filtros)
    {
        $query->when($filtros['name'] ?? null, function ($query, $name) {
            return $query->where('name', $name);
        })->when($filtros['email'] ?? null, function ($query, $email) {
            return $query->where('email', $email);
        });
    }

    public function scopeFiltro($query, $key)
    {
        return $query->orWhere('name', 'LIKE', "%{$key}%")
            ->orWhere('email', 'LIKE', "%{$key}%");
    }

    //
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(strtolower($value));
    }
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = ucfirst(strtolower($value));
    }

    public function getNameAttribute($value)
    {
        return strtolower($value);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getEstadoAttribute($value)
    {
        if ($value == 1) {
            return 'Activado';
        } else {
            return 'Desactivado';
        }
    }
    


    //Relacion inversa de uno a muchos
    public function personas()
    {
        return $this->belongsTo('App\Models\Persona', 'idPersona');
    }
    //Relacion de uno a muchos
public function users(){
    return $this->hasMany('App\Models\DetalleAdministrativo');
}

    public function institucion()
    {
        return $this->belongsTo('App\Models\Institucion', 'idInstitucion');
    }


    
}
