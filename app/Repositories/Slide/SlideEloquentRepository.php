<?php
namespace App\Repositories\Slide;

use App\Repositories\EloquentRepository;

class SlideEloquentRepository extends EloquentRepository implements 
	SlideRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Slide::class;
    }
}