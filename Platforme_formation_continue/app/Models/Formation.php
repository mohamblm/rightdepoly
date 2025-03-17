<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etablissement;
use App\Models\Domaine;

class Formation extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 
        'description',
        'image',
        'etablissement_id',
        'domaine_id',
        'trend'
    ];
    
    // /**
    //  * Get the tags associated with the formation.
    //  */
    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class);
    // }
    
    /**
     * Get the establishment that owns the formation.
     */
    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }

    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    
    // /**
    //  * Get all tags as an array.
    //  * 
    //  * @return array
    //  */
    // public function getTagsAttribute()
    // {
    //     return $this->tags()->pluck('name')->toArray();
    // }
}