<?php 

namespace App\Repositories;

use Rekeningenspace\Rekeningen;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class RekeningenRepository
 *
 * @package App\Repositories
 */
class RekeningenRepository extends Repository
{

    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return Rekeningen::class;
    }
}