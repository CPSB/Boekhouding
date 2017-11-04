<?php 

namespace App\Repositories;

use Transactiespace\Transactie;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class TransactieRepository
 *
 * @package App\Repositories
 */
class TransactieRepository extends Repository
{

    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return Transactie::class;
    }
}