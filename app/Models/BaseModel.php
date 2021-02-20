<?php

namespace App\Models;
use App\Traits\Dashboard\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Dashboard\PaginationTrait;

abstract class BaseModel extends Model
{
    use SearchTrait, PaginationTrait;

}
