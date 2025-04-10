<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'date', 'createdby'];

    public function reads(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'announcement_reads');
    }
}
