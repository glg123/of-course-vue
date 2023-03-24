<?php

namespace App\Http\Controllers\Front;

use Illuminate\{
    Http\Request,
    Support\Facades\Session
};

use App\{
    Models\Item,
    Models\Setting,
    Models\Subscriber,
    Helpers\EmailHelper,
    Http\Controllers\Controller,
    Http\Requests\ReviewRequest,
    Http\Requests\SubscribeRequest,
    Repositories\Front\FrontRepository
};
use App\Helpers\SmsHelper;
use App\Models\Brand;
use App\Models\CampaignItem;
use App\Models\Category;
use App\Models\ChieldCategory;
use App\Models\Fcategory;
use App\Models\HomeCutomize;
use App\Models\Order;
use App\Models\Language;
use App\Models\Package;
use App\Models\Page;
use App\Models\Post;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Subcategory;
use App\Models\TrackOrder;
use App\Models\User;
use Illuminate\Support\Facades\Config;

use function GuzzleHttp\json_decode;

class FrontendController extends Controller
{


    public function __construct()
    {
 
        // $this->middleware('localize');
    }

    // -------------------------------- HOME ----------------------------------------

    public function index()
    {
        return view('front.index', [
            'packages'=>Package::active()->latest()->take(8)->get(),
            'celebrities'=>User::role('celebrity')->active()->latest()->take(8)->get(),
        ]);
    }
}
