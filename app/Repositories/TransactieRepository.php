<?php 

namespace App\Repositories;

use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use App\Transacties;

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
        return Transacties::class;
    }
}