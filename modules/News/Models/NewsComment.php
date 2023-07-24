<?php
namespace Modules\News\Models;

use App\BaseModel;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsComment extends BaseModel
{
    use SoftDeletes;
    //use NodeTrait;
    protected $table = 'ravi_comments';
    protected $fillable = [
        'blog_id',
        'full_name',
        'email',
        'comment'
    ];

    public function getDetailUrl($locale = false)
    {
        $locale = $locale ? $locale : app()->getLocale();
        return url(( $locale ? $locale.'/' : '').config('news.news_route_prefix')."/".config('news.news_category_route_prefix')."/".$this->slug);
    }

}