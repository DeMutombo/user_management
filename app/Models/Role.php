<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'label'];

    public function abilities()
    {
        return $this->belongsToMany(Ability::class)->withTimestamps();
    }

    // Assign abilities to a Role
    public function allowTo($ability)
    {
        //if an ability is passed in as a string
        if (is_string($ability)) {
            $ability = Ability::whereName($ability)->firstOrFail();
        }
        //Sync the data instead of save
        $this->abilities()->sync($ability, false);
    }
}
