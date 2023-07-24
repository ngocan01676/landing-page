@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{ __('Role')}}</h1>
            <div class="title-actions">
                <!-- <a href="{{route('user.admin.role.verifyFields')}}" class="btn btn-warning"><i class="fa fa-check-circle-o"></i> {{ __('Verify Configs')}}</a> -->
                <a href="{{url('admin/module/user/role/permission_matrix/')}}" class="btn btn-info">{{ __('Permission Matrix')}}</a>
                <a href="{{url('admin/module/user/role/create')}}" class="btn btn-primary">{{ __('Add new role')}}</a>
            </div>
        </div>
        @include('admin.message')
        <div class="panel">
            <div class="panel-title">{{ __('All Roles')}}</div>
        <div class="filter-div d-flex justify-content-between mt-3 ml-4">
            <div class="col-left">
                @if(!empty($rows))
                    <form method="post" action="{{route('user.admin.role.del')}}"
                          class="filter-form filter-form-left d-flex justify-content-start">
                        {{csrf_field()}}
                        <select name="action" class="form-control">
                            <option value="delete">{{__(" Delete ")}}</option>
                        </select>
                        <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                @endif
            </div>
        </div>
            <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="60px"><input type="checkbox" class="check-all"></th>
                            <th>{{ __('Name')}}</th>
                            <th>{{ __('Date')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $row)
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="{{$row->id}}" @if ($row->id == 3) disabled @endif /></td>
                                <td class="title">
                                    <a href="{{url('admin/module/user/role/edit/'.$row->id)}}">{{ucfirst($row->name)}}</a>
                                </td>
                                <td>{{ display_date($row->updated_at)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
                {{$rows->links()}}
            </div>
        </div>
    </div>
@endsection
