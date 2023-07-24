<?php
namespace Modules\News\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\FrontendController;
use Modules\News\Models\NewsLocation;
use Modules\News\Models\Tag;
use Modules\News\Models\News;

class LocationNewsController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request, $slug)
    {
        $cat = NewsLocation::where('slug', $slug)->first();
        if (empty($cat)) {
            return redirect('/news');
        }
        $listNews = News::query();
        $listNews->select("core_news.*")
                ->join('core_news_category', function ($join) use($cat) {
                    $join->on('core_news_category.id', '=', 'core_news.cat_id')
                         ->where('core_news_category._lft', '>=', $cat->_lft)
                         ->where('core_news_category._rgt', '<=', $cat->_rgt);
                })
                ->where("core_news.status", "publish")
                ->groupBy('core_news.id');


        //$translation = $cat->translateOrOrigin(app()->getLocale());

        $data = [
            'rows'           => $listNews->with("getAuthor")->with("getCategory")->orderBy('created_at', 'desc')->paginate(12),
            'model_category'    => NewsLocation::where("status", "publish"),
            'model_tag'         => Tag::query(),
            'model_news'        => News::where("status", "publish"),
            'breadcrumbs'    => [
                [
                    'name' => __('News'),
                    'url'  => route('news.index')
                ],
                [
                    //'name'  => $translation->name,
                    'class' => 'active'
                ],
            ],
            'cates' => $cat
            //'page_title'=>$translation->name,
            // 'seo_meta'  => $cat->getSeoMetaWithTranslation(app()->getLocale(),$translation),
            // 'translation'=>$translation
        ];
        return view('News::frontend.index', $data);
    }
}