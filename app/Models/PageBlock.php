<?php

namespace App\Models;

use App\Casts\BlockDataCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageBlock extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'type', 'position', 'data'];

    protected function casts(): array
    {
        return [
            'data' => BlockDataCast::class,
        ];
    }
}
