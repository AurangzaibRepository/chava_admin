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

    public function getAll(string $status = null, bool $draft = false): Collection
    {
        $data = $this->orderBy('id');

        if ($status !== null) {
            $data = $data->where('status', $status);
        }

        if ($draft) {
            $data = $data->where('published', 0);
        }

        return $data->get();
    }
}
