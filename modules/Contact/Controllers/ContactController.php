<?php
namespace Modules\Contact\Controllers;

use App\Helpers\ReCaptchaEngine;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Matrix\Exception;
use Modules\Contact\Emails\NotificationToAdmin;
use Modules\Contact\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Modules\Media\Controllers\MediaController;
use Modules\User\Models\Subscriber;
use Modules\Email\Emails\JobsEmail;
use Modules\Email\Emails\SubscriberEmail;

class ContactController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $data = [
            'page_title' => __("Contact Page")
        ];
        return view('Contact::index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'   => [
                'required',
                'max:255',
                'email'
            ],
            'name'    => ['required'],
            'message' => ['required']
        ]);
        /**
         * Google ReCapcha
         */
        if(ReCaptchaEngine::isEnable()){
            $codeCapcha = $request->input('g-recaptcha-response');
            if(!$codeCapcha or !ReCaptchaEngine::verify($codeCapcha)){
                return redirect()->back()->with('error',__('Please verify the captcha'));
            }
        }
        $row = new Contact($request->input());
        $row->status = 'sent';
        if ($row->save()) {
            $this->sendEmail($row);
            return redirect()->back()->with('success', __('Thank you for contacting us! We will get back to you soon'));
        }
    }

    protected function sendEmail($contact){
        if($admin_email = setting_item('admin_email')){
            try {
                Mail::to($admin_email)->send(new NotificationToAdmin($contact));
            }catch (Exception $exception){
                Log::warning("Contact Send Mail: ".$exception->getMessage());
            }
        }
    }

    public function t(){
        return new NotificationToAdmin(Contact::find(1));
    }

    public function sendMessage(Request $request) {
        $row = new Contact();
        $row->name = $request->input('name');
        $row->birthday = $request->input('birthday');
        $row->phone = $request->input('phone_number');
        $row->location_name = $request->input('location_name');
        $row->email = $request->input('email');
        $row->message = $request->input('message');
        $fileResult = new MediaController();
        $result = $fileResult->publicFileStore($request);
        $row->file_url = $result->getData()->data->path;
        $row->file_type = $result->getData()->data->file_type;
        $row->file_name = $result->getData()->data->name;
        $row->file_extension = $result->getData()->data->file_extension;
        $row->download = $result->getData()->data->download;
        $row->save();
        $mailReceive = setting_item("email_receive_jobs");
        $data = array(
            'name'=> (string)$request->input('name') ?? '',
            "email"=>(string)$request->input('email') ?? '',
            "phone" => (string)$request->input('phone_number') ?? '',
            "birthday" => (string)$request->input('birthday') ?? '',
            "location" => (string)$request->input('location_name') ?? '',
            "messages" => (string)$request->input('message') ?? '');
        try {
            Mail::to($mailReceive)->send(new JobsEmail($data,$result->getData()));
        } catch (\Exception $e) {
            throw $e;
        }
        return response()-> json(["status"=>200,"message"=>!empty(setting_item("ct_job_message")) ? setting_item("ct_job_message") : "Thành công, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất !!"]);
    }

    public function clientSubscriber(Request $request) {
        $existEmail = Subscriber::where("email",$request->input('email'))->get();
        if (count($existEmail) != 0) return response()-> json(["status"=>500,"message"=>"Email đã được đăng ký.Vui lòng chọn email khác"]);
        $row = new Subscriber();
        $row->full_name = $request->input('name');
        $row->phone_number = $request->input('phone');
        $row->email = $request->input('email');
        $row->save();
        $mailReceive = setting_item("email_receive_subscriber");
        $data = array('name'=>$request->input('name'),"email"=>$request->input('email'),"phone" => $request->input('phone'));
        // try {
        //     Mail::to($mailReceive)->send(new SubscriberEmail($data));
        // } catch (\Exception $e) {
        //     throw $e;
        // }
        return response()-> json(["status"=>200,"message"=> !empty(setting_item("ct_subscriber_message")) ? setting_item("ct_subscriber_message") : "Email đăng ký thành công!!"]);
    }

    public function viewFile($id) {
        $contact = Contact::find($id);
        $fileResult = new MediaController();
    }
}
