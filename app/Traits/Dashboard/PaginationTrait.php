<?php

namespace App\Traits\Dashboard;

trait PaginationTrait {

    public function scopeDoPaginate($query, $per_page ){

        return $query
            ->paginate($per_page)
            ->appends(['search' => request()->query('search') ]);
    }


}
