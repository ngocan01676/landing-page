@extends('admin.layouts.app')
@section('title','News')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("All comment")}}</h1>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                @if(!empty($rows))
                    <form method="post" action="{{url('admin/module/news/bulkEditComment')}}"
                          class="filter-form filter-form-left d-flex justify-content-start">
                        {{csrf_field()}}
                        <select name="action" class="form-control">
                            <option value="delete">{{__(" Delete ")}}</option>
                        </select>
                        <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                    </form>
                @endif
            </div>
        </div>
        <div class="text-right">
            <p><i>{{__('Found :total items',['total'=>$rows->total()])}}</i></p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="60px"><input type="checkbox" class="check-all"></th>
                                    <th class="title" width="100px"> {{ __('Full name')}}</th>
                                    <th width="100px"> {{ __('Email')}}</th>
                                    <th width="200px">{{  __('Comment')}}</th>
                                    <th width="200px">{{  __('View post')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($rows->total() > 0)
                                    @foreach($rows as $row)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check-item" name="ids[]" value="{{$row->id}}">
                                            </td>
                                            <td class="title">
                                                {{$row->full_name}}
                                            </td>
                                            <td class="email">
                                                {{$row->email}}
                                            </td>
                                            <td class="email">
                                                {{$row->comment}}
                                            </td>
                                            <?php
                                                $tmp = \Modules\News\Models\News::find($row->blog_id);
                                            ?>
                                            <td>
                                                <a href="{{ $tmp->getDetailUrl() }}" target="_blank">{{$tmp->title}}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">{{__("No data")}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            </div>
                        </form>
                        {{$rows->appends(request()->query())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
