<?php
namespace Modules\News\Models;

use App\BaseModel;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Models\SEO;

class NewsLocation extends BaseModel
{
    use SoftDeletes;
    use NodeTrait;
    protected $table = 'core_news_location';
    protected $fillable = [
        'name',
        'content',
        'status',
        'parent_id',
        'sub_title',
        'title'
    ];
    protected $slugField     = 'slug';
    protected $slugFromField = 'name';
    protected $seo_type = 'news_location';

    public static function getModelName()
    {
        return __("News Location");
    }

    public function filterbyLocation($id)
    {
        $posts = News::where('news_id', $this->id)->get();
        return $posts;
    }

    public static function searchForMenu($q = false)
    {
        $query = static::select('id', 'name');
        if (strlen($q)) {

            $query->where('title', 'name', "%" . $q . "%");
        }
        $a = $query->limit(10)->get();
        return $a;
    }

    public function getDetailUrl($locale = false)
    {
        $locale = $locale ? $locale : app()->getLocale();

        return url(( $locale ? $locale.'/' : '').config('news.news_route_prefix')."/".config('news.news_location_route_prefix')."/".$this->slug);
    }

}