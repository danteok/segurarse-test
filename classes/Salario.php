<?php
use Illuminate\Database\Eloquent\Model;

class Salario extends Model
{
    protected $table = 'salarios';
    protected $fillable = ['id', 'empleado_id', 'fecha_periodo','salario'];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class,'empleado_id');
    }
}
