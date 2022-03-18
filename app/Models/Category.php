<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Category extends Model
{
    protected $table = 'categories';

    public function getListing(): Collection
    {
        $data = $this
                    ->orderBy('id')
                    ->get();

        return $data;
    }
}
