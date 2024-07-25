<?php

namespace App\Models;

use App\Trait\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class PostCataloge extends Model
{
    use QueryScopes,HasFactory,NodeTrait;
    
    protected $table = 'post_cateloge';
    protected $primaryKey = 'id';
    protected $fillable = ['image','icon','album','status','order','user_id','follow','parent','LEFT','RIGHT',
'name','content','desc','meta_title','meta_desc','meta_keyword','canonical'
];
    


    public function posts() {
        return $this->belongsToMany(Post::class,'post_cateloge_post','post_cateloge_id','post_id');
    }

    public function getLftName()
    {
        return 'LEFT';
    }

    public function getRgtName()
    {
        return 'RIGHT';
    }

    public function getParentIdName()
    {
        return 'parent';
    }

    // Specify parent id attribute mutator
    public function setParentAttribute($value)
    {
        $this->setParentIdAttribute($value);   
    }
}
