<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $fillable = ['nombre', 'apellido', 'tipo_empleado'];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            var_dump('hello');die;
            
            Validator::make($model->toArray(), $model->rules)->validate();
        });
    }


    public function salarios()
    {
        return $this->hasMany(Salario::class,'empleado_id');
    }

    public function __set($key, $value)
    {
        $this->setAttribute($key, $value);
    }
}
