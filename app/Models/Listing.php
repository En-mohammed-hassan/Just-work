<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "title", "email", "description", "tags", "company", "location", "website", "logo"];

    public function scopeFilter($query, array $filters)
    {
        if ($filters["tag"] ?? false) {

            $query->where("tags", "like", "%" . request("tag") . "%");
        }
        if ($filters["search"] ?? false) {
            $query->where("description", "like", "%" . request("search") . "%")->
                orwhere("tags", "like", "%" . request("search") . "%")->
                orwhere("company", "like", "%" . request("search") . "%")->
                orwhere("location", "like", "%" . request("search") . "%");
        }
    }


    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}