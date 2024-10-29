<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','due_date','status','user_id'];

    /**
     * Tasks relation with user (Tasks Belongs to one user (One to Many))
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
