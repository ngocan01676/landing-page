<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Site Information")}}</h3>
        <p class="form-group-desc">{{__('Information of your website for customer and goole')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <h3 class="form-group-title" hr-data-title>{{__("Site Information")}}
                <i class="fa fa-angle-left pull-right"></i>
            </h3>
            <div class="panel-body" hr-data-content>
                <div class="form-group">
                    <label class="">{{__("Site title")}}</label>
                    <div class="form-controls">
                        <input type="text" class="form-control" name="site_title" value="{{setting_item_with_lang('site_title',request()->query('lang'))}}">
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label>{{__("Site Desc")}}</label>
                    <div class="form-controls">
                        <textarea name="site_desc" class="form-control" cols="30" rows="7">{{setting_item_with_lang('site_desc',request()->query('lang'))}}</textarea>
                    </div>
                </div> -->

                @if(is_default_lang())
                <div class="form-group">
                    <label class="" >{{__("Favicon")}}</label>
                    <div class="form-controls form-group-image">
                        {!! \Modules\Media\Helpers\FileHelper::fieldUpload('site_favicon',$settings['site_favicon'] ?? "") !!}
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__("Date format")}}</label>
                    <div class="form-controls">
                        <input type="text" class="form-control" name="date_format" value="{{$settings['date_format'] ?? 'm/d/Y' }}">
                    </div>
                </div>
                @endif
                @if(is_default_lang())
                <div class="form-group">
                    <label>{{__("Timezone")}}</label>
                    @php
                        $path = resource_path('module/core/timezone.json');
                        $timezones = json_decode(\Illuminate\Support\Facades\File::get($path));
                    @endphp
                    <div class="form-controls">
                        <select name="site_timezone" class="form-control">
                            <option value="UTC">{{__("-- Default --")}}</option>
                            @if(!empty($timezones))
                                @foreach($timezones as $item=>$value)
                                    <option @if($item == ($settings['site_timezone'] ?? '') ) selected @endif value="{{$item}}">{{$value}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@if(is_default_lang())
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__('Language')}}</h3>
            <p class="form-group-desc">{{__('Change language of your websites')}}</p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <h3 hr-data-title class="form-group-title">{{__('Language')}}
                    <i class="fa fa-angle-left pull-right"></i>
                </h3>
                <div class="panel-body" hr-data-content>
                    <div class="form-group">
                        <label>{{__("Select default language")}}</label>
                        <div class="form-controls">
                            <select name="site_locale" class="form-control">
                                <option value="">{{__("-- Default --")}}</option>
                                @php
                                    $langs = \Modules\Language\Models\Language::getActive();
                                @endphp

                                @foreach($langs as $lang)
                                    <option @if($lang->locale == ($settings['site_locale'] ?? '') ) selected @endif value="{{$lang->locale}}">{{$lang->name}} - ({{$lang->locale}})</option>
                                @endforeach
                            </select>
                            <p><i><a href="{{url('admin/module/language')}}">{{__("Manage languages here")}}</a></i></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__("Enable Multi Languages")}}</label>
                        <div class="form-controls">
                            <label><input type="checkbox" @if(setting_item('site_enable_multi_lang') ?? '' == 1) checked @endif name="site_enable_multi_lang" value="1">{{__('Enable')}}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__("Config header homepage")}}</h3>
            <p class="form-group-desc">{{__('Config image,url,text,link....')}}</p>
        </div>
        <div class="col-sm-8">
        <div class="panel">
            <h3 hr-data-title class="form-group-title">{{__("Config header homepage")}}
                <i class="fa fa-angle-left pull-right"></i>
            </h3>
            <div class="panel-body" hr-data-content>
                @if(is_default_lang())
                    <div class="form-group">
                        <label>{{__("Header Image")}}</label>
                        <div class="form-controls form-group-image">
                            {!! \Modules\Media\Helpers\FileHelper::fieldUpload('header_image_id',$settings['header_image_id'] ?? '') !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__('Contact Information')}}</h3>
            <p class="form-group-desc">{{__('How your customer can contact to you')}}</p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <h3 hr-data-title class="form-group-title">{{__('Contact Information')}}
                    <i class="fa fa-angle-left pull-right"></i>
                </h3>
                <div class="panel-body" hr-data-content>
                    <div class="form-group">
                        <label>{{__("Admin Email")}}</label>
                        <div class="form-controls">
                            <input type="email" class="form-control" name="admin_email" value="{{$settings['admin_email'] ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__("Email Form Name")}}</label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="email_from_name" value="{{$settings['email_from_name'] ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__("Email Form Address")}}</label>
                        <div class="form-controls">
                            <input type="email" class="form-control" name="email_from_address" value="{{$settings['email_from_address'] ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__('Social settings')}}</h3>
            <p class="form-group-desc">{{__('Social facebook,youtube ... link')}}</p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <h3 hr-data-title class="form-group-title">{{__('Social settings')}}
                    <i class="fa fa-angle-left pull-right"></i>
                </h3>
                <div class="panel-body" hr-data-content>
                    <div class="form-group">
                        <label>{{__("Facebook")}}</label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="ravi_facebook_url" value="{{$settings['ravi_facebook_url'] ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__("Zalo")}}</label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="ravi_zalo_url" value="{{$settings['ravi_zalo_url'] ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__("Linkedin")}}</label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="ravi_linkedin_url" value="{{$settings['ravi_linkedin_url'] ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__("Instagram")}}</label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="ravi_instagram_url" value="{{$settings['ravi_instagram_url'] ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__('Form submit message')}}</h3>
            <p class="form-group-desc">{{__('Form submit message')}}</p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <h3 hr-data-title class="form-group-title">{{__('Form submit message')}}
                    <i class="fa fa-angle-left pull-right"></i>
                </h3>
                <div class="panel-body" hr-data-content>
                    <div class="form-group">
                        <label>{{__("Message success from subscriber")}}</label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="ct_subscriber_message" value="{{$settings['ct_subscriber_message'] ??  '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__("Message success from job")}}</label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="ct_job_message" value="{{$settings['ct_job_message'] ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__('Homepage')}}</h3>
            <p class="form-group-desc">{{__('Change your homepage content')}}</p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <h3 hr-data-title class="form-group-title">{{__('Homepage')}}
                    <i class="fa fa-angle-left pull-right"></i>
                </h3>
                <div class="panel-body" hr-data-content>
                    <div class="form-group">
                        <label>{{__("Page for Homepage")}}</label>
                        <div class="form-controls">
                            <?php
                            $template = !empty($settings['home_page_id']) ? \Modules\Page\Models\Page::find($settings['home_page_id']) : false;

                            \App\Helpers\AdminForm::select2('home_page_id', [
                                'configs' => [
                                    'ajax' => [
                                        'url'      => url('/admin/module/page/getForSelect2'),
                                        'dataType' => 'json'
                                    ]
                                ]
                            ],
                                !empty($template->id) ? [$template->id, $template->title] : false
                            )
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Header & Footer Settings')}}</h3>
        <p class="form-group-desc">{{__('Change your options')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <h3 hr-data-title class="form-group-title">{{__('Header & Footer Settings')}}
                <i class="fa fa-angle-left pull-right"></i>
            </h3>
            <div class="panel-body" hr-data-content>
                <div class="form-group">
                    <label>{{__("Footer phone text label")}}</label>
                    <div class="form-controls">
                        <input type="text" class="form-control" name="footer_phone_call" value="{{$settings['footer_phone_call'] ?? '' }}">
                    </div>
                    <div class="form-controls mt-3">
                        <label>{{__("Footer phone text")}}</label>
                        <input type="text" class="form-control" name="footer_phone_text" value="{{$settings['footer_phone_text'] ?? '' }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
{{-- <div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Page contact settings")}}</h3>
        <p class="form-group-desc">{{__('Settings for contact page')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <h3 hr-data-title class="form-group-title">{{__("Page contact settings")}}
                <i class="fa fa-angle-left pull-right"></i>
            </h3>
            <div class="panel-body" hr-data-content>
                <div class="form-group">
                    <label class="">{{__("Contact title")}}</label>
                    <div class="form-controls">
                        <input type="text" class="form-control" name="page_contact_title" value="{{setting_item_with_lang('page_contact_title',request()->query('lang'),"We'd love to hear from you")}}">
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__("Contact sub title")}}</label>
                    <div class="form-controls">
                        <input type="text" class="form-control" name="page_contact_sub_title" value="{{setting_item_with_lang('page_contact_sub_title',request()->query('lang'),"Send us a message and we'll respond as soon as possible")}}">
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__("Contact Desc")}}</label>
                    <div class="form-controls">
                        <textarea name="page_contact_desc" class="d-none has-ckeditor" cols="30" rows="7">{{setting_item_with_lang('page_contact_desc',request()->query('lang'),'<p>Tell. + 00 222 444 33</p>
<p>Email. hello@yoursite.com</p>
<p class="address">1355 Market St, Suite 900San, Francisco, CA 94103 United States</p>
<p>            <!--<p>Tell. + 00 222 444 33</p>
            <p>Email. hello@yoursite.com</p>
            <p class="address">1355 Market St, Suite 900San, Francisco, CA 94103 United States</p>-->
        </p>') }}</textarea>
                    </div>
                </div>
                @if(is_default_lang())
                    <div class="form-group">
                        <label>{{__("Contact Featured Image")}}</label>
                        <div class="form-controls form-group-image">
                            {!! \Modules\Media\Helpers\FileHelper::fieldUpload('page_contact_image',setting_item('page_contact_image')) !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div> --}}
@section('script.body')
    <script src="{{asset('libs/ace/src-min-noconflict/ace.js')}}" type="text/javascript" charset="utf-8"></script>
    <script>
        (function ($) {
            $('.ace-editor').each(function () {
                var editor = ace.edit($(this).attr('id'));
                editor.setTheme("ace/theme/"+$(this).data('theme'));
                editor.session.setMode("ace/mode/"+$(this).data('mod'));
                var me = $(this);

                editor.session.on('change', function(delta) {
                    // delta.start, delta.end, delta.lines, delta.action
                    me.next('textarea').val(editor.getValue());
                });
            });
            $("[hr-data-title]").on("click",function() {
                $(this).toggleClass("active");
                $(this).next().slideToggle(300);
            })
        })(jQuery)
    </script>
@endsection