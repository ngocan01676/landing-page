<?php
namespace Modules\News\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\FrontendController;
use Modules\News\Models\NewsCategory;
use Modules\News\Models\Tag;
use Modules\News\Models\News;

class CategoryNewsController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request, $slug)
    {
        $cat = NewsCategory::where('slug', $slug)->first();
        if (empty($cat)) {
            return redirect('/news');
        }
        $model_News = News::select('core_news.*')->where("status", "publish")
            ->leftJoin('core_news_tag','core_news.id','core_news_tag.news_id')
            ->leftJoin('core_tags', 'core_tags.id','core_news_tag.tag_id')
            ->groupBy('core_news.id');
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
            'newest'              => $model_News->with("getAuthor")->with('translations')->with("getCategory")->orderBy('created_at', 'desc')->take(3)->get(),
            'model_tag'         => Tag::query(),
            'model_news'        => News::where("status", "publish")->get(),
            'model_category'    => NewsCategory::where("status", "publish")->get(),
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