<?php

namespace Tests;

use App\User;

/**
 * Trait CreateUsers
 *
 * @package Tests
 */
trait CreateUsers
{
    /**
     * Create testing users in the database.
     *
     * @param  int $amount The amount of normal users u want to create.
     * @return mixed
     */
    public function createUser($amount = 1)
    {
        return factory(User::class, $amount)->create();
    }
}