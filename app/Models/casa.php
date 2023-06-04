<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class casa extends Model
{
    use HasFactory;

    protected $table = "casas";

    protected $fillable = ["imobiliaria", "endereco", "preco", "VouA"];
    protected $primaryKey = "codigo";
    public $timestamps = false;

}
