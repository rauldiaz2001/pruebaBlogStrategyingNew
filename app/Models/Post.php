<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function category()
    {
          return $this->belongsTo(Category::class, 'categoria_id');
    }

    protected $table = 'post';

    protected $primaryKey = 'id';

    protected $fillable = [
        'titulo',
        'subtitulo',
        'texto',
        'categoria_id',
        'foto',
        'name'
    ];
}
