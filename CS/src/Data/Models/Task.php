<?php
/**
 * Created by PhpStorm.
 * User: iemarjay
 * Date: 11/23/16
 * Time: 7:46 AM
 */

namespace App\Data\Models;


use Framework\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * columns that are mass assignable
     *
     * @var array
     */
    protected  $fillable    = ['subject', 'status', 'due_date', 'parent_task_id', 'priority', 'description', 'user_id'];

    /**
     * tags for the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignedTo()
    {
        return $this->belongsToMany(User::class, 'task_pivots');
    }
}