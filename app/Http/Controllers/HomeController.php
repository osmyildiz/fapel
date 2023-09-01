<?php

namespace App\Http\Controllers;


use App\Models\About;
use App\Models\AboutUs;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Booking;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Form;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Reservation;
use App\Models\Seo;
use App\Models\Slider;
use App\Models\Subscriber;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{

    protected $url;

    public function __construct()
    {

        $this->url = url()->current();
    }


    public function root()
    {
        return view('home');
    }

    public function homepage()
    {


        $sliders = Slider::where('is_active', 1)
            ->where('page_name', 'home')
            ->orderBy('priority', 'ASC')
            ->get();
        $branches = Branch::where('is_active',1)->get();

        $about = AboutUs::find(1);
        $contact = Contact::find(1);

        $menu_categories = MenuCategory::where('is_active',1)->orderBy('priority','ASC')->get();
        $menus = Menu::where('is_active',1)->orderBy('priority','ASC')->get();
        $blogs = BlogPost::join('blog_categories','blog_categories.id','blog_posts.category_id')
            ->selectRaw('blog_categories.name_tr as category_name_tr,blog_categories.name_en as category_name_en,blog_categories.name_ar as category_name_ar,blog_posts.*')->where('blog_posts.is_active',1)
            ->orderBy('updated_at','DESC')
            ->limit(3)
            ->get();
        $galleries = Gallery::where('is_active',1)->orderBy('priority','ASC')->limit(4)->get();
        $galleriesJS = $galleries->map(function ($gallery) {
            return [
                'image_path' => asset($gallery->image_path),
                'title' => $gallery->title
            ];
        });
        $seo = Seo::where('page_name','home')
            ->first();
        $this->setSEO($seo);
        return view('home', compact('sliders', 'about','contact','branches','menu_categories','menus','blogs','galleries','galleriesJS'));
    }



    public function contact()
    {
        $contact = Contact::find(1);
        $slider = Slider::where('is_active',1)
            ->where('page_name','contact')
            ->first();
        $seo = Seo::where('page_name','contact')
            ->first();
        $branches = Branch::where('is_active',1)->get();

        $this->setSEO($seo);
        return view('contact',compact('contact','slider','branches'));


    }
    public function blog()
    {
        $currentLang = app()->getLocale();
        $slider = Slider::where('is_active',1)
            ->where('page_name','blog')
            ->first();
        $seo = Seo::where('page_name','blog')
            ->first();
        $branches = Branch::where('is_active',1)->get();
        $blog_categories = BlogCategory::where('is_active',1)->get();
        $blogs = BlogPost::join('blog_categories','blog_categories.id','blog_posts.category_id')
            ->selectRaw('blog_categories.name_tr as category_name_tr,blog_categories.name_en as category_name_en,blog_categories.name_ar as category_name_ar,blog_posts.*')
            ->where('blog_posts.is_active',1)
            ->orderBy('updated_at','DESC')
            ->paginate(10);
        $recent_posts = BlogPost::join('blog_categories','blog_categories.id','blog_posts.category_id')
            ->selectRaw('blog_categories.name_tr as category_name_tr,blog_categories.name_en as category_name_en,blog_categories.name_ar as category_name_ar,blog_posts.*')
            ->where('blog_posts.is_active',1)
            ->orderBy('updated_at','DESC')
            ->limit(3)
            ->get();
        $tags = explode(',', $seo->{'keywords_' . $currentLang});



        $this->setSEO($seo);
        return view('blog',compact('slider','branches','blogs','blog_categories','recent_posts','tags'));


    }
    public function blogDetails($slug)
    {

        $currentLang = app()->getLocale(); // Bu şekilde doğru dil bilgisini elde edersiniz.
        $columnSlugName = 'blog_posts.slug_' . $currentLang;

        $blog = BlogPost::join('blog_categories','blog_categories.id','blog_posts.category_id')
            ->selectRaw('blog_categories.name_tr as category_name_tr,blog_categories.name_en as category_name_en,blog_categories.name_ar as category_name_ar,blog_posts.*')
            ->where($columnSlugName, $slug)
            ->first();


        $slider = Slider::where('is_active',1)
            ->where('page_name','blog')
            ->first();
        $seo = Seo::where('page_name','blog')
            ->first();
        $blog_categories = BlogCategory::where('is_active',1)->get();
        $blogs = BlogPost::join('blog_categories','blog_categories.id','blog_posts.category_id')
            ->selectRaw('blog_categories.name_tr as category_name_tr,blog_categories.name_en as category_name_en,blog_categories.name_ar as category_name_ar,blog_posts.*')
            ->where('blog_posts.is_active',1)
            ->orderBy('updated_at','DESC')
            ->limit(3)
            ->get();
        $recent_posts = BlogPost::join('blog_categories','blog_categories.id','blog_posts.category_id')
            ->selectRaw('blog_categories.name_tr as category_name_tr,blog_categories.name_en as category_name_en,blog_categories.name_ar as category_name_ar,blog_posts.*')
            ->where('blog_posts.is_active',1)
            ->orderBy('updated_at','DESC')
            ->limit(3)
            ->get();
        $tags = explode(',', $seo->{'keywords_' . $currentLang});



        $this->setSEO($seo);

        return view('blog_details', compact('blog','slider','blog_categories','blogs','tags','recent_posts'));
    }
    public function privacy()
    {
        $slider = Slider::where('is_active',1)
            ->where('page_name','privacy')
            ->first();

        return view('privacy',compact('slider'));

    }

    public function about()
    {
        $slider = Slider::where('is_active',1)
            ->where('page_name','about')
            ->first();
        $about = AboutUs::find(1);
        $seo = Seo::where('page_name','aboutus')
            ->first();

        $contact = Contact::find(1);
        $galleries = Gallery::where('is_active',1)->orderBy('priority','ASC')->limit(4)->get();
        $galleriesJS = $galleries->map(function ($gallery) {
            return [
                'image_path' => asset($gallery->image_path),
                'title' => $gallery->title
            ];
        });

        $this->setSEO($seo);

        return view('about',compact('about','slider','contact','galleriesJS','galleries'));


    }
    public function booking()
    {
        $slider = Slider::where('is_active',1)
            ->where('page_name','reservation')
            ->first();
        $seo = Seo::where('page_name','reservation')
            ->first();
        $branches = Branch::where('is_active',1)->get();

        $this->setSEO($seo);
        return view('booking',compact('slider','branches'));


    }


    public function gallery()
    {
        $slider = Slider::where('is_active',1)
            ->where('page_name','gallery')
            ->first();
        $gallery_categories = GalleryCategory::where('is_active',1)->get();

        $galleries = Gallery::where('is_active',1)->get();

        $galleriesJS = $galleries->map(function ($gallery) {
            return [
                'image_path' => asset($gallery->image_path),
                'title' => $gallery->title
            ];
        });

        $seo = Seo::where('page_name','gallery')
            ->first();
        $this->setSEO($seo);
        return view('gallery',compact('slider','galleries','gallery_categories','galleriesJS'));


    }
    public function menu()
    {
        $slider = Slider::where('is_active',1)
            ->where('page_name','menu')
            ->first();
        $seo = Seo::where('page_name','menu')
            ->first();
        $menu_categories = MenuCategory::where('is_active',1)->orderBy('priority','ASC')->get();
        $menus = Menu::where('is_active',1)->orderBy('priority','ASC')->get();
        $this->setSEO($seo);

        return view('menu',compact('menus','menu_categories','slider'));


    }
    public function menu_single($slug)
    {
        $slider = Slider::where('is_active',1)
            ->where('page_name','menu')
            ->first();

        $menus=Menu::selectRaw('categories.name as category_name,menus.*')
            ->join('categories', 'categories.id', '=', 'menus.category_id')
            ->where('menus.is_active',1)
            ->where('categories.is_active',1)
            ->where('categories.slug',$slug)
            ->orderBy('menus.priority','ASC')
            ->get();
        $category_name = Category::where('slug',$slug)->first();

        $seo = Seo::find(3);

        $this->setSEO($seo);

        return view('menu_single',compact('slider','menus','category_name'));


    }
    public function book_a_table_form1(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',                        // just a normal required validation
            'email' => 'required|email',     // required and must be unique in the ducks table
            'phone' => 'required',
            'branch' => 'required|not_in:99',
            'guest_number' => 'required|numeric',          // required and has to match the password field
            'time' => 'required',          // required and has to match the password field
            'res_date' => 'required',          // required and has to match the password field


        ],
            [
                'name.required' => 'Ad alanı gereklidir.',
                'branch.not_in' => 'Lütfen şube seçiniz.',
                'email.required' => 'E-posta adresi gereklidir.',
                'branch.required' => 'Şube gereklidir.',
                'guest_number.required' => 'Misafir sayısı gereklidir.',
                'email.email' => 'Geçerli bir e-posta adresi giriniz.',
                'phone.required' => 'Telefon numarası gereklidir.',
                'time.required' => 'Saat gereklidir.',
                'res_date.required' => 'Tarih gereklidir.',
                'name.regex' => 'Ad alanı sadece harf içermelidir.',
                'guest_number.numeric' => 'Misafir sayısı numerik bir değer olmalıdır.'
            ]

        );

        if ($validator->fails()) {
            return redirect(url()->previous() .'#reservation')
                ->withErrors($validator)
                ->withInput();
        }

        //$check_mail = Form::where('email', $request->email)->first();
        //if ($check_mail) {
        //    return redirect()->back()->with('danger', 'Email address already subscribed.');
        //    //return back()->with('danger', 'Bu email ile daha önce kayıt olunmuş. Lütfen farklı bir email ile deneyiniz!');
        //}
        $hasHttpLink = preg_match('/\b(?:https?|ftp):\/\/\S+\b/', $request->message);

        if ($hasHttpLink) {
            return redirect()->back()->with(['message' => "Teşekkür ederiz, mesajınızı aldık. Ekibimizden biri yakında sizinle iletişime geçecek...", 'alert' => 'success']);
        }
        $spamKeywords = [
            'spam',
            'advertisement',
            'promotions',

            'guaranteed',
            'limited time',
            'act now',
            'buy now',
            'cash',
            'earn money',
            'extra income',

            'credit card',
            'lottery',
            'prize',
            'win',
            'enlargement',
            'viagra',
            'cialis',
            'online pharmacy',
            'make money fast',
            'weight loss',
            'investment opportunity',
            'million dollars',
            'nigerian prince',
            'inheritance',
            'urgent',
            'exclusive offer',
        ];

        foreach ($spamKeywords as $keyword) {
            if (stripos($request->message, $keyword) !== false) {
                return redirect()->back()->with(['message' => "Thank you,We've received your message. Someone from our team will contact you soon...", 'alert' => 'success']);
            }
        }
        $phoneNumber = $request->phone;


        $form = new Reservation();
        $form->name = $request->name;
        $form->time = $request->time;
        $form->guest_number = $request->guest_number;
        $form->res_date = date('Y-m-d',strtotime($request->res_date));
        $form->email = $request->email;
        $form->phone = $request->phone;
        $form->message = $request->message;
        $form->created_at = date('Y-m-d H:i:s');
        $form->updated_at = date('Y-m-d H:i:s');
        $save = $form->save();

        $data = [
            'subject1' => 'Fapel Ocakbaşı Rezervasyon',
            'email1' => $request->email,
            'email' => "fapelgida@gmail.com",
            'email' => "osmyildiz@gmail.com",
            'name' => $request->name,
            'time' => $request->time,
            'res_date' => $request->res_date,
            'guest_number' => $request->guest_number,
            'phone' => $request->phone,
            'branch' => $request->branch,
            'message1' => $request->message,
        ];





        Mail::send('emailbooking', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject($data['subject1'])
                ->replyTo($data['email1'], $data['name']);
        });



        if($save){

            return redirect(url()->previous() .'#reservation')->with(['message' => "Thank you for your reservation! We can't wait to host you and make your dining experience unforgettable.", 'alert' => 'success']);

        }
        return redirect(url()->previous() .'#reservation')->with(['message' => 'An unexpected error has occurred. Please try again.!', 'alert' => 'danger']);

    }
    public function book_a_table_form(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email',
            'phone' => 'required',
            'branch' => 'required|not_in:99',
            'guest_number' => 'required|numeric',
            'time' => 'required',
            'res_date' => 'required',
        ]);

        // Eğer validasyon başarısız olursa
        if ($validator->fails()) {
            return redirect(url()->previous() .'#reservation')
                ->withErrors($validator)
                ->withInput();
        }



        $form = new Reservation();
        $form->name = $request->name;
        $form->reservation_time = $request->time;
        $form->guest_count = $request->guest_number;
        $form->reservation_date = date('Y-m-d',strtotime($request->res_date));
        $form->email = $request->email;
        $form->branch = $request->branch;
        $form->phone_number = $request->phone;
        $form->created_at = date('Y-m-d H:i:s');
        $form->updated_at = date('Y-m-d H:i:s');
        $save = $form->save();

        $data = [
            'subject1' => 'Fapel Ocakbaşı Rezervasyon',
            'email1' => $request->email,
            'email' => "fapelgida@gmail.com",
            'email' => "osmyildiz@gmail.com",
            'name' => $request->name,
            'time' => $request->time,
            'res_date' => $request->res_date,
            'guest_number' => $request->guest_number,
            'phone' => $request->phone,
            'branch' => $request->branch,
        ];





        Mail::send('emailbooking', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject($data['subject1'])
                ->replyTo($data['email1'], $data['name']);
        });



        if($save) {
            return redirect(url()->previous() .'#reservation')->with(['message' => __('messages.reservation_success'), 'alert' => 'success']);
        }
        return redirect(url()->previous() .'#reservation')->with(['message' => __('messages.reservation_error'), 'alert' => 'danger']);

    }

    public function add_subscriber(Request $request)
    {
        $validator = Validator::make($request->only('email'), [
            'email' => 'required|email|unique:subscribers,email',     // required and must be unique in the ducks table
        ], [
            'email.required' => 'Email address is required.',
            'email.email' => 'Enter a valid email address.',
            'email.unique' => 'Email address already subscribed.',
        ]);

        if ($validator->fails()) {
            return redirect(url()->previous() .'#footer')
                ->withErrors($validator)
                ->withInput();
        }

        $form = new Subscriber();
        $form->email = $request->email;
        $form->created_at = date('Y-m-d H:i:s');
        $form->updated_at = date('Y-m-d H:i:s');
        $save = $form->save();

        $data = [
            'email1' => $request->email,
            //'email' => "osmyildiz@gmail.com",
            'email' => "the.tcr.bar@gmail.com",
            'subject' => "New Subscriber",
        ];

        Mail::send('emailsubscriber', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject($data['subject']);
        });

        if($save) {
            return redirect(url()->previous() .'#footer')
                ->with(['message' => "Welcome to TCR Bar. We're so glad you've joined us.", 'alert' => 'success']);
        }

        return redirect(url()->previous() .'#footer')->
        with(['message' => 'An unexpected error has occurred. Please try again.!', 'alert' => 'danger']);
    }
    public function add_send_contact_form(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required',                        // just a normal required validation
            'email' => 'required|email',     // required and must be unique in the ducks table
            'phone' => 'required',


        ],
            [
                'name.required' => 'Name is required.',                        // just a normal required validation
                'email.required' => 'Email address is required.',     // required and must be unique in the ducks table
                'email.email' => 'Enter a valid email address.',     // required and must be unique in the ducks table
                'phone.required' => 'Phone is required.',

            ]
        );

        if ($validator->fails()) {
            return redirect(url()->previous() .'#contactform')
                ->withErrors($validator)
                ->withInput();
        }

        $recaptchaResponse = $request->input('g-recaptcha-response');
        $secret = config('services.recaptcha.secret_key');

        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => $secret,
                'response' => $recaptchaResponse,
            ],
        ]);


        $recaptcha = json_decode($response->getBody());

        if (!$recaptcha->success) {
            return redirect()->back()
                ->withInput($request->all()) // Girilmiş değerleri formda döndürmek için
                ->with(['message' => 'reCAPTCHA verification failed. Please try again.', 'alert' => 'danger']);

        }


        //$check_mail = Form::where('email', $request->email)->first();
        //if ($check_mail) {
        //    return redirect()->back()->with('danger', 'Email address already subscribed.');
        //    //return back()->with('danger', 'Bu email ile daha önce kayıt olunmuş. Lütfen farklı bir email ile deneyiniz!');
        //}

        $hasHttpLink = preg_match('/\b(?:https?|ftp):\/\/\S+\b/', $request->message);

        if ($hasHttpLink) {
            return redirect()->back()->with(['message' => "Thank you,We've received your message. Someone from our team will contact you soon...", 'alert' => 'success']);
        }
        $spamKeywords = [
            'spam',
            'advertisement',
            'promotions',

            'guaranteed',
            'limited time',
            'act now',
            'buy now',
            'cash',
            'earn money',
            'extra income',

            'credit card',
            'lottery',
            'prize',
            'win',
            'enlargement',
            'viagra',
            'cialis',
            'online pharmacy',
            'make money fast',
            'weight loss',
            'investment opportunity',
            'million dollars',
            'nigerian prince',
            'inheritance',
            'urgent',
            'exclusive offer',
        ];

        foreach ($spamKeywords as $keyword) {
            if (stripos($request->message, $keyword) !== false) {
                return redirect()->back()->with(['message' => "Thank you,We've received your message. Someone from our team will contact you soon...", 'alert' => 'success']);
            }
        }
        $phoneNumber = $request->phone;

        $validPhonePattern = '/^(\+4407|\+4402|07|02)/'; // Telefon numarası için geçerli desen

        if (!preg_match($validPhonePattern, $phoneNumber)) {
            return redirect()->back()->with(['message' => "Thank you,We've received your message. Someone from our team will contact you soon...", 'alert' => 'success']);
        }
        $form = new Form();
        $form->name = $request->name;
        $form->email = $request->email;
        $form->phone = $request->phone;
        $form->message = $request->message;
        $form->created_at = date('Y-m-d H:i:s');
        $form->updated_at = date('Y-m-d H:i:s');
        $save = $form->save();

        $data = [
            'subject1' => 'Contact Form',
            'email1' => $request->email,
            'email' => "the.tcr.bar@gmail.com",
            //'email' => "osmyildiz@gmail.com",
            'name' => $request->name,
            'phone' => $request->phone,
            'message1' => $request->message,
        ];


        Mail::send('emailcontact', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject("Contact Form");
        });


        if($save){

            return redirect()->back()->with(['message' => "Thank you for contacting us. We appreciate your message and will get back to you as soon as possible.", 'alert' => 'success']);

        }
        return redirect()->back()->with(['message' => 'An unexpected error has occurred. Please try again.!', 'alert' => 'danger']);

    }

    protected function setSEO($seo)
    {
        $currentLang = app()->getLocale();

        $title = $seo->{'title_' . $currentLang};
        $description = $seo->{'description_' . $currentLang};
        $canonical = $seo->{'canonical_' . $currentLang};
        $keywords = explode(',', $seo->{'keywords_' . $currentLang});

        SEOMeta::setTitle($title, false);
        SEOMeta::setDescription($description);
        SEOMeta::setCanonical($canonical);
        SEOMeta::setKeywords($keywords);
        SEOMeta::addMeta('article:modified_time', date("Y-m-d H:i:s"), 'property');


        OpenGraph::setDescription($description);
        OpenGraph::setTitle($title);
        OpenGraph::setUrl($canonical);
        OpenGraph::addImage($seo->logo_url);

        TwitterCard::setTitle($title);
        TwitterCard::addImage($seo->logo_url);

        JsonLd::setTitle($title);
        JsonLd::setDescription($description);
    }



}
