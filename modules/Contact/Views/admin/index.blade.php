@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{ __('Danh sách ứng tuyển')}}</h1>
        </div>
        @include('admin.message')
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left"> 
                @if(!empty($rows))
                <form method="post" action="{{url('admin/module/contact/bulkEdit')}}" class="filter-form filter-form-left d-flex justify-content-start">
                    {{csrf_field()}}
                    <select name="action" class="form-control">
                        <option value="">{{__(" Bulk Actions ")}}</option>
                        <option value="delete">{{__(" Delete ")}}</option>
                    </select>
                    <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                </form>
               @endif
               <button class="btn btn-primary mb-3">
                    <a class="text-white" href="{{url('admin/module/contact/export')}}">{{__("Export exel")}}</a>
               </button>
            </div>
            <div class="col-left">
               <form method="get" action="{{url('/admin/module/contact/')}} " class="filter-form filter-form-right d-flex justify-content-end" role="search">
                    <input  type="text" name="s" value="{{ Request()->s }}" placeholder="{{__('Search...')}}" class="form-control">
                    <button class="btn-info btn btn-icon btn_search"  type="submit">{{__('Search')}}</button>
                </form>
            </div>
        </div>
        <div class="panel"> 
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="60px"><input type="checkbox" class="check-all"></th>
                                <th >{{ __('Name')}}</th>
                                <th >{{ __('Phone')}}</th>
                                <th style="display:none;">{{ __('Location')}}</th>
                                <th style="display:none;">{{ __('Birthday')}}</th>
                                <th class="author">{{ __('Email')}} </th>
                                <th class="file_attachment">{{ __('File đính kèm')}} </th>
                                <th >{{ __('Content')}} </th>
                                <th style="display:none" class="date">{{__('Date')}} </th>
                                <th class="detail">{{__('Xem chi tiết')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($rows->total() > 0)
                                @foreach($rows as $row)
                                    <tr class="row-wrapper">
                                        <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}"></td>
                                        <td class="title" data-name="{{$row->name}}">
                                            {{$row->name}}
                                        </td>
                                        <td class="phone" data-phone="{{$row->phone}}">
                                            {{$row->phone}}
                                        </td>
                                        <td class="location" style="display:none" data-location="{{$row->location_name}}">{{$row->location_name ?? ''}} </td>
                                        <td class="birthday" style="display:none"  data-birthday="{{$row->birthday}}">{{$row->birthday ?? ''}} </td>
                                        <td class="author" data-email="{{$row->email}}">{{$row->email ?? ''}} </td>
                                        <td class="file_attachment">
                                            <div class="text-truncate" data-fileName="{{$row->file_name}}" title="{{$row->file_name ?? ''}}" style="width:100px">{{$row->file_name ?? ''}}</div>
                                            <a target="_blank" data-fileUrl="{{route('media.public.view',['id'=> $row->id])}}" href="{{route('media.public.view',['id'=> $row->id])}}">{{__("Tải file")}}</a>
                                            <?php
                                                $file_url = str_replace("public/","",$row->file_url);
                                                $url = Storage::disk('public')->url($file_url);
                                                $path = public_path($url);
                                            ?>
                                            <!-- <a href="javascript:void(0)" class="hr-view-file" data-type="{{$row->file_extension}}" data-file-url="{{$path}}">{{__("Xem file")}}</a> -->
                                        </div> </td>
                                        <td><div class="text-truncate" data-message="{{$row->message}}" title="{{$row->message}}" style="width:120px">{{$row->message}}</div></td>
                                        <td style="text-align:center"><a href="javascript:void(0)" class="show-detail-click"><i class="far fa-eye"></i></a></td>
                                        <td style="display:none" data-create class="date">{{ display_datetime($row->updated_at)}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">{{__("No data")}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </form>
                {{$rows->appends(request()->query())->links()}}
            </div>
        </div>
    </div>
    <div class="hr-popup-show">
        <div class="header">
            <h3 class="text-center">{{__("Xem Chi tiết")}}
                <span class="close-popup"><i class="fas fa-times-circle"></i></span>
            </h3>
        </div>
        <div class="content">
            <div class="item">
                <span class="key">{{__("Name")}}</span>
                <span class="value name"></span>
            </div>
            <div class="item">
                <span class="key">{{__("Email")}}</span>
                <span class="value email"></span>
            </div>
            <div class="item">
                <span class="key">{{__("Phone")}}</span>
                <span class="value phone"></span>
            </div>
            <div class="item">
                <span class="key">{{__("Birthday")}}</span>
                <span class="value birthday"></span>
            </div>
            <div class="item">
                <span class="key">{{__("Location")}}</span>
                <span class="value location"></span>
            </div>
            <div class="item">
                <span class="key">{{__("Message")}}</span>
                <span class="value message"></span>
            </div>
            <div class="item">
                <span class="key">{{__("Download file")}}</span>
                <span class="value"><span class="file-name"></span><a style="padding-left:6px" class="file-url" href="">{{__("Download file")}}</a></span>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // A $( document ).ready() block.
    $(document).ready(function() {
        $(".hr-view-file").on("click",function() {
            var fileUrl = $(this).attr("data-file-url");
            var fileType = $(this).attr("data-type");
            var iframe = `<iframe src="${fileUrl}" frameborder="0" style="width:100%;min-height:640px;"></iframe>`;
            if (fileType != "pdf") {
                var iframe = `<iframe src="https://view.officeapps.live.com/op/view.aspx?src=${fileUrl}" frameborder="0" style="width:100%;min-height:640px;"></iframe>`;
            }
            $(document).find('.hr-popup-show-file').append(iframe);
            $(document).find('.hr-popup-show-file').addClass('open');
        })

        $(".show-detail-click").on("click",function() {
            let me = $(this);
            let container = me.closest(".row-wrapper");
            let name = container.find("[data-name]").text();
            let phone = container.find("[data-phone]").text();
            let email = container.find("[data-email]").text();
            let position = container.find("[data-position]").text();
            let location = container.find("[data-location]").text();
            let birthday = container.find("[data-birthday]").text();
            let message = container.find("[data-message]").text();
            let createdDate = container.find("[data-create]").text();
            let popupContainer = $(".hr-popup-show");
            let dataFileName = container.find("[data-filename]").attr("data-filename");
            let dataFileUrl = container.find("[data-fileurl]").attr("data-fileurl");
            popupContainer.find(".item .name").text(name);
            popupContainer.find(".item .phone").text(phone);
            popupContainer.find(".item .email").text(email);
            popupContainer.find(".item .position").text(position);
            popupContainer.find(".item .location").text(location);
            popupContainer.find(".item .birthday").text(birthday);
            popupContainer.find(".item .message").text(message);
            popupContainer.find(".item .created").text(createdDate);
            popupContainer.find(".item .file-name").text(dataFileName);
            popupContainer.find(".item .file-url").attr("href",dataFileUrl)
            popupContainer.addClass("open-popup");
        });

        $(".hr-popup-show .close-popup").on("click",function() {
            $(".hr-popup-show").removeClass("open-popup");
        });
    });
</script>
