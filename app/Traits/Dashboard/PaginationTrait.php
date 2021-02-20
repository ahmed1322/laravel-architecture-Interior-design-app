<?php

namespace App\Traits\Dashboard;

trait PaginationTrait {

    public function scopeDoPaginate($query, $per_page = 5 ){

        return $query
            ->paginate($per_page)
            ->appends(['search' => request()->query('search') ]);
    }


}
