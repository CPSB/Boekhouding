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
    protected $fillable = ['author_id', 'naam', 'type', 'bedrag', 'transactie_datum', 'beschrijving', 'factuur_path'];

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id')->withDefault([
            'name' => '(Verwijderde gebruiker)'
        ]);
    }
}
