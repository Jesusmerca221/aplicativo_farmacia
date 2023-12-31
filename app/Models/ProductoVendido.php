<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoVendido extends Model
{
    protected $table = "productos_vendidos";
    protected $fillable = ["id_venta", "descripcion", "codigo", "precio", "cantidad"];
}
