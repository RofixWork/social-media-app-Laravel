<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ["title", "description", "image", "tags", "user_id", "url"];
    protected $guarded = ["id"];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, "user_id");
    }

    public function comments() : HasMany {
        return $this->hasMany(Comment::class, "post_id");
    }
}
