<?php
namespace App\Repositories\User;

use App\Repositories\EloquentRepository;

class UserEloquentRepository extends EloquentRepository implements 
	UserRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\User::class;
    }
}