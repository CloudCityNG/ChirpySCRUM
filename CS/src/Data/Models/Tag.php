<?php
/**
 * Created by PhpStorm.
 * User: iemarjay <emarjay921@gmailcom>
 * Date: 11/23/16
 * Time: 7:45 AM
 */

namespace App\Data\Models;

use Framework\User;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * users that created/uses the tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * task that are assigned to this tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function task()
    {
        return $this->morphedByMany(Task::class, 'taggable');
    }

}