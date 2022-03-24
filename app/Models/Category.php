<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'category',
        'status',
        'published'
    ];
    public $timestamps = false;

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

    public function saveRecord(Request $request): void
    {
        $this->create($request->all());
    }
}
