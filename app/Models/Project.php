<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "title",
        "description",
        "date",
        "link",
        "type_id",
        "technologies[]",
        "cover_image"
    ];
        
    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function getCategoryBadge() { 
        return $this->type ? "<span class='badge' style= 'background-color: {$this->type->color}'> {$this->type->tag} </span>": "Non categorizzato" ;
    }
    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }

    public function getTechnologyBadge()
    {
        $tecnology_badges = '';

        foreach ($this->technologies as $technology) {
            $tecnology_badges .= "<span class='badge' style= 'background-color: {$technology->color}'> {$technology->label} </span>";
        }

        if(!count($this->technologies)) {
            $tecnology_badges .= "<span> Non ci sono tecnologie associate </span> ";
        }

        return $tecnology_badges;
    }

    public function getAbsUriImage() {
        return $this->cover_image ? Storage::url($this->cover_image) : null;
    }

    public function getAbstract($chars = 50)
    {
      return strlen($this->description) > $chars ? substr($this->description, 0, $chars) . "..." : $this->description;
    }
  
    
}
