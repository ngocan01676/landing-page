<?php
namespace Modules\News\Controllers;

use Illuminate\Http\Request;
use Modules\FrontendController;
use Modules\Language\Models\Language;
use Modules\News\Models\News;
use Modules\News\Models\NewsCategory;
use Modules\News\Models\NewsTranslation;
use Modules\News\Models\Tag;
use Modules\News\Models\NewsLocation;
use Carbon\Carbon;
use Modules\News\Models\NewsComment;

class NewsController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {      
        $location = $request->input("location");
        $model_News = News::select('core_news.*')
        ->leftJoin('core_news_tag','core_news.id','core_news_tag.news_id')
        ->leftJoin('core_tags', 'core_tags.id','core_news_tag.tag_id')
        ->groupBy('core_news.id');
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $model_News->where("core_news.status", "publish");
        $tagLocation = NewsLocation::all();
        if (!empty($location)) {
            $model_News->where(function($query) use ($location) {
                $query->where('core_news.location_id', '=', $location);
            });
        }
        $orderBy = $request->input("sort-by");
        if (!empty($orderBy)) {
            $model_News->orderBy('core_news.due_date', $orderBy);
        }
        if (!empty($search = $request->input("s"))) {
            $model_News->where(function($query) use ($search) {
                $query->where('core_news.title', 'LIKE', '%' . $search . '%');
                $query->orWhere('core_news.content', 'LIKE', '%' . $search . '%');
            });            
            $title_page = __('Search results : ":s"', ["s" => $search]);
        }
        $data = [
            'rows'              => $model_News->with("getAuthor")->with('translations')->with("getCategory")->orderBy('created_at', 'desc')->paginate(12),
            'newest'              => $model_News->with("getAuthor")->with('translations')->with("getCategory")->orderBy('created_at', 'desc')->take(3)->get(),
            'model_category'    => NewsCategory::query()->where("status", "publish")->get(),
            'model_tag'         => Tag::query(),
            'model_news'        => News::query()->where("status", "publish"),
            'custom_title_page' => $title_page ?? "",
            'breadcrumbs'       => [
                [
                    'name'  => __('News'),
                    'url'  => route('news.index'),
                    'class' => 'active'
                ],
            ],
            "seo_meta" => News::getSeoMetaForPageList(),
            "languages"=>Language::getActive(false),
            "locale"=> app_get_locale(),
            'tagLocation'=>$tagLocation
        ];
        return view('News::frontend.index', $data);
    }

    public function detail(Request $request, $slug)
    {
        $row = News::where('slug', $slug)->where('status','publish')->first();
        $commentList = $row->getComment->toArray();
        $countComment = count($commentList);
        //dd($this->buildTreeFromArray($commentList));
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $rowRelated = News::where('status','publish')->where('cat_id',$row->cat_id);
        $rowRelated ->whereDate('due_date', '>=', $now)->take(3)->get();
        $model_News = News::select('core_news.*')->where("status", "publish")
            ->leftJoin('core_news_tag','core_news.id','core_news_tag.news_id')
            ->leftJoin('core_tags', 'core_tags.id','core_news_tag.tag_id')
            ->groupBy('core_news.id');
        if (empty($row)) {
            return redirect('/');
        }
        $data = [
            'row'               => $row,
            'newest'              => $model_News->with("getAuthor")->with('translations')->with("getCategory")->orderBy('created_at', 'desc')->take(3)->get(),
            'rowRelated'       => $rowRelated,
            "countComment"     => $countComment,
            'commentList'     => $this->buildTreeFromArray($commentList),
            'model_category'    => NewsCategory::where("status", "publish")->get(),
            'model_tag'         => Tag::query(),
            'model_news'        => News::where("status", "publish"),
            'custom_title_page' => $title_page ?? "",
            'breadcrumbs'       => [
                [
                    'name' => __('News'),
                    'url'  => route('news.index')
                ],
                [
                    //'name'  => $translation->title,
                    'class' => 'active'
                ],
            ],
            //'seo_meta'  => $row->getSeoMetaWithTranslation(app()->getLocale(),$translation),
        ];
        $this->setActiveMenu($row);
        return view('News::frontend.detail', $data);
    }

    function buildTreeFromArray($items) {

        $childs = [];
        if (count($items) == 0) return $childs;
        foreach ($items as &$item) $childs[$item['parent_id']][] = &$item;
        unset($item);
        foreach ($items as &$item) if (isset($childs[$item['id']]))
            $item['children'] = $childs[$item['id']];
        return $childs[0];
    }

    public function clientComment(Request $request) {
        $row = new NewsComment();
        $row->full_name = $request->input('name');
        $row->blog_id = $request->input('blog_id');
        $row->parent_id =  $request->input('parent_id') ?? 0;
        $row->comment = $request->input('comment');
        $row->email = $request->input('email');
        $row->save();
        return response()-> json(["status"=>200,"message"=>"Success !! Cảm ơn những ý kiến của bạn"]);
    }
}
