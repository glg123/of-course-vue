<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\NotificationDataTable;
use App\Models\Notification;
use Illuminate\Support\Facades\Request;
use App\Repositories\NotificationRepository;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\Notification\StoreRequest;
use App\Models\Tag;
use App\Models\User;
use App\Services\SendPushNotificationService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;

class NotificationController extends BaseController
{
    use ApiResponse, AuthorizesRequests;
    /**
     * @var NotificationRepository
     */
    protected $notificationRepository;

    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->middleware('auth');
        $this->notificationRepository = $notificationRepository;
    }
    public function index(NotificationDataTable $dt)
    {
      //  $select2_customer_url=route('select2.customers');
        return $dt->render(
            'dashboard.page.notification.index',
            [
                'select2_customer_url' =>route('select2.customers'),
                'select2_tag_url' =>route('select2.tags'),
            ]
        );
    }



    public function store(StoreRequest $request)
    {
        $this->authorize('create', Notification::class);

        foreach (User::role('customer')->when(request('user_ids'), function ($q) {
            return $q->whereIn('id', request('user_ids'));
        })->when(request('tag_id') && !request('user_ids'), function ($q) {
            return $q->where('tag_id', request('tag_id'));
        })->when(request('gender') && !request('user_ids'), function ($q) {
            return $q->where('gender', request('gender'));
        })->get() as $key => $user) {
            $title = $request->contain_name ? 'اهلا ' . $user->first_name . $request->title : $request->title;
            $senderTitle = json_encode(["en" => " {$title} ", "ar" => " {$title} "], JSON_UNESCAPED_UNICODE);
            $senderBody = json_encode(["en" => " {$request->title} ", "ar" => " {$request->title} "], JSON_UNESCAPED_UNICODE);
            (new SendPushNotificationService)->send($user, [], $senderTitle, $senderBody, $key == 0 ? 'main_dashboard' : 'sub_dashboard');
        }
        return redirect()->back()->with('success', 'تم الانشاء بنجاح');
    }
}
