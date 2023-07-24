<?php
namespace Modules\News\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\News\Models\NewsLocation;
use Illuminate\Support\Str;

class LocationController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/news');
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->checkPermission('news_manage_others');

        $locationlist = new NewsLocation;
        if ($locationname = $request->query('s')) {
            $locationlist = $locationlist->where('name', 'LIKE', '%' . $locationname . '%');
        }
        $locationlist = $locationlist->orderby('name', 'asc');
        $rows = $locationlist->get();

        $data = [
            'rows'        => $rows->toTree(),
            'row'         => new NewsLocation(),
            'breadcrumbs' => [
                [
                    'name' => __('News'),
                    'url'  => 'admin/module/news'
                ],
                [
                    'name'  => __('Location'),
                    'class' => 'active'
                ],
            ],
        ];
        return view('News::admin.location.index', $data);
    }

    public function edit(Request $request, $id)
    {
        $this->checkPermission('news_manage_others');
        $row = NewsLocation::find($id);

        if (empty($row)) {
            return redirect('admin/module/news/location');
        }
        $data = [
            'row'     => $row,
            'parents' => NewsLocation::get()->toTree(),
            'enable_multi_lang'=>true
        ];
        return view('News::admin.location.detail', $data);
    }

    public function store(Request $request, $id){
        $this->checkPermission('news_manage_others');

        if($id>0){
            $row = NewsLocation::find($id);
            if (empty($row)) {
                return redirect(route('news.admin.location.index'));
            }
        }else{
            $row = new NewsLocation();
            $row->status = "publish";
        }

        $row->fill($request->input());
        $res = $row->saveOriginOrTranslation($request->input('lang'));

        if ($res) {
            if($id > 0 ){
                return back()->with('success',  __('Location updated') );
            }else{
                return redirect(route('news.admin.location.index'))->with('success', __('Location created') );
            }
        }
    }

    public function bulkEdit(Request $request)
    {
        $this->checkPermission('news_manage_others');
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('Please select at least 1 item!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select an Action!'));
        }
        if ($action == 'delete') {
            foreach ($ids as $id) {
                $query = NewsLocation::where("id", $id)->first();
                if(!empty($query)){
                    $query->delete();
                }
            }
        }
        return redirect()->back()->with('success', __('Update success!'));
    }

    public function getForSelect2(Request $request)
    {
        $pre_selected = $request->query('pre_selected');
        $selected = $request->query('selected');

        if($pre_selected && $selected){
            $item = NewsLocation::find($selected);
            if(empty($item)){
                return response()->json([
                    'text'=>''
                ]);
            }else{
                return response()->json([
                    'text'=>$item->name
                ]);
            }
        }
        $q = $request->query('q');
        $query = NewsLocation::select('id', 'name as text')->where("status","publish");
        if ($q) {
            $query->where('name', 'like', '%' . $q . '%');
        }
        $res = $query->orderBy('id', 'desc')->limit(20)->get();
        return response()->json([
            'results' => $res
        ]);
    }
}
