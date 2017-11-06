<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transacties
 *
 * @package App
 */
class Transacties extends Model
{
    /**
     * Mass-assign fields for the database table.
     *
     * @var array
     */
    protected $fillable = ['author_id', 'naam', 'type', 'transactie_datum', 'beschrijving', 'factuur_path'];
}
