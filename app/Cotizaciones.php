<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizaciones extends Model
{
  
  protected $fillable = [
      'base', 'moneda', 'cotizacion'
  ];
}
