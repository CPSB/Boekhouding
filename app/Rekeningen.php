<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Rekeningen
 *
 * @package App
 */
class Rekeningen extends Model
{
    use SoftDeletes;

    /**
     * Mass-assign fields for the database table.
     *
     * @var array
     */
    protected $fillable = ['rekening_nr', 'beschrijving', 'author_id', 'rekening_naam'];

    /**
     * Data relatie voor de gebruiker die de rekening aangemaakt heeft.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Relatie om een transactie aan een rekening te koppelen.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function transactie()
    {
       return $this->belongsToMany(Transacties::class)->withTimestamps();
    }
}
