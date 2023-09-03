<?php

namespace App\Http\Controllers;


use App\Models\About;
use App\Models\AboutUs;
use App\Models\BlogCategory;
use App\Models\BlogPost;
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
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;



class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function root()
    {

        return view('admin.index');

    }
    public function home()
    {

        return view('admin.index');

    }
    public function contact()
    {
        $record = Contact::find(1);
        $slider = slider::where('is_active',1)
            ->where('page_name','contact')
            ->first();
        return view('admin.contact',compact('record','slider'));

    }
    public function contact_update(Request $request)
    {


        $validatedData = $request->validate([
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'email' => 'required|email|max:255',
            'instagram_link' => 'nullable|string|max:255',
            'facebook_link' => 'nullable|string|max:255',
            'twitter_link' => 'nullable|string|max:255',
            'linkedin_link' => 'nullable|string|max:255',
            'weekday_opening_time' => 'required|string|max:255',
            'weekend_opening_time' => 'required|string|max:255',
        ]);

        // Veritabanından ilgili kaydı bul.
        $contact = Contact::find(1);

        // Formdan gelen verileri kayda at.
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->email = $request->email;
        $contact->instagram_link = $request->instagram_link;
        $contact->facebook_link = $request->facebook_link;
        $contact->twitter_link = $request->twitter_link;
        $contact->linkedin_link = $request->linkedin_link;
        $contact->weekday_opening_time = $request->weekday_opening_time;
        $contact->weekend_opening_time = $request->weekend_opening_time;


        // Güncelleme işlemini gerçekleştir.
        $contact->save();

        return back()->with('success', 'Kayıt başarıyla güncellendi.');
    }
    public function contactforms()
    {
        $records = Form::orderBy('id','DESC')->get();

        return view('admin.contactforms',compact('records'));

    }
    public function subscribers()
    {
        $records = Subscriber::orderBy('id','DESC')->get();

        return view('admin.subscribers',compact('records'));

    }


    public function bookings()
    {
        // Bugüne ait rezervasyonlar.
        $today_reservations = Reservation::whereDate('reservation_date', Carbon::today())
            ->orderBy('reservation_time', 'ASC')
            ->get();

        // Yarına ait rezervasyonlar.
        $tomorrow_reservations = Reservation::whereDate('reservation_date', Carbon::tomorrow())
            ->orderBy('id', 'DESC')
            ->get();

        // Önümüzdeki günler için rezervasyonlar (yarından sonrası).
        $upcoming_reservations = Reservation::where('reservation_date', '>', Carbon::tomorrow())
            ->orderBy('id', 'DESC')
            ->get();

        // Geçmiş rezervasyonlar (dünden öncekiler).
        $past_reservations = Reservation::where('reservation_date', '<', Carbon::today())
            ->orderBy('id', 'DESC')
            ->get();

        return view('admin.bookings', compact('today_reservations', 'tomorrow_reservations', 'upcoming_reservations', 'past_reservations'));
    }

    public function about()
    {
        $record = AboutUs::find(1);
        $slider = Slider::where('is_active',1)
            ->where('page_name','about')
            ->first();
        return view('admin.about',compact('record','slider'));

    }
    public function about_update(Request $request)
    {

        $messages = [
            'required' => ':attribute alanı gereklidir.',

        ];


        $validator = Validator::make($request->all(), [
            'content_tr' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
            'short_content_tr' => 'required',
            'short_content_en' => 'required',
            'short_content_ar' => 'required',
            'slider_img' => 'image',
        ], $messages);

        // Eğer doğrulama başarısız olursa, hatalarla birlikte geri döner
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $record = AboutUs::find(1);
        $record->content_tr = $request->content_tr;
        $record->content_en = $request->content_en;
        $record->content_ar = $request->content_ar;
        $record->short_content_tr = $request->short_content_tr;
        $record->short_content_en = $request->short_content_en;
        $record->short_content_ar = $request->short_content_ar;
        $record->updated_at= date('Y-m-d H:i:s');
        $record->created_at= date('Y-m-d H:i:s');

        $record->save();


        return back()->with('success', 'Kayıt başarıyla güncellendi.');
    }



    public function slider()
    {
        $sliders = Slider::orderBy('priority','ASC')->get();

        return view('admin.slider',compact('sliders'));

    }
    public function add_slider(Request $request)
    {
        // Doğrulama Kuralları
        $validatedData = $request->validate([
            'first_title_tr' => 'required|string',
            'first_title_en' => 'required|string',
            'first_title_ar' => 'required|string',
            'second_title_tr' => 'required|string',
            'second_title_en' => 'required|string',
            'second_title_ar' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'priority' => 'required|integer',
        ]);

        $slider = new Slider();

        $slider->page_name = "home"; // Sabit olarak "home" atanıyor, değişebilir.
        $slider->first_title_tr = $request->first_title_tr;
        $slider->first_title_en = $request->first_title_en;
        $slider->first_title_ar = $request->first_title_ar;
        $slider->second_title_tr = $request->second_title_tr;
        $slider->second_title_en = $request->second_title_en;
        $slider->second_title_ar = $request->second_title_ar;

        $slider->is_active = $request->has('is_active') ? 1 : 0;
        $slider->priority = $request->priority;

        if($request->hasFile('img')) {
            $id = mt_rand(1000, 9999);
            $imageName = $id."_".time().'.'.$request->img->extension();
            $image = Image::make($request->img);
            $image->fit(1400, 630);
            $image->save(public_path("/assets1/images/" . $imageName));
            $slider->img = "/assets1/images/".$imageName;
        }

        if($slider->save()){
            return back()->with('success', 'Yeni slider başarıyla eklendi.');
        }

        return back()->with('danger', 'Beklenmeyen bir hata oluştu. Lütfen tekrar deneyin!');
    }

    public function slider_edit($id)
    {
        $slider = Slider::find($id);

        return view('admin.slider-edit',compact('slider'));

    }
    public function slider_update(Request $request, $id)
    {
        if($request->is_active == "on"){
            $is_active = 1;
        } else {
            $is_active = 0;
        }

        $slider = Slider::find($id);

        foreach (['tr', 'en', 'ar'] as $lang) {
            $slider->{'first_title_' . $lang} = $request->input('first_title_' . $lang);
            $slider->{'second_title_' . $lang} = $request->input('second_title_' . $lang);
        }

        $slider->is_active = $is_active;
        $slider->priority = $request->priority;

        if($request->hasFile('img')) {
            $id = mt_rand(1000, 9999);
            $imageName = $id."_".time().'.'.$request->img->extension();
            $image = Image::make($request->img);
            $image->fit(1400, 630);
            $image->save(public_path("/assets1/images/" . $imageName));
            $slider->img = "/assets1/images/".$imageName;
        }

        $save = $slider->save();

        if($save) {
            return back()->with('success', 'Slider başarıyla güncellendi.');
        }

        return back()->with('danger', 'Beklenmedik bir hata oluştu. Lütfen tekrar deneyin!');
    }

    public function slider_delete($id)
    {
        $slider = Slider::find($id);
        $pageName = $slider->page_name;
        $count = Slider::where('page_name', $pageName)->count();

        if ($count === 1) {
            return back()->with('warning', 'Tek bir slayt kaldığından bu slayt silinemez. Sadece düzenleme yapabilirsiniz.');
        }

        $res = Slider::destroy($id);

        if ($res) {
            return back()->with('success', 'Seçili slayt başarıyla silindi.');
        }

        return back()->with('danger', 'An unexpected error occured. Please try again!');
    }

    public function admin_photos(Request $request)
    {

            $categories = GalleryCategory::where('is_active',1)->orderBy('id','ASC')->get();

                $photos = Gallery::
                    join('gallery_categories', 'gallery_categories.id', '=', 'galleries.category_id')
                    ->select('gallery_categories.name_tr as name_tr','galleries.*')
                    ->orderBy('galleries.category_id','ASC')->paginate(30);

                return view('admin.admin-photos',compact('photos','categories'));



    }
    public function add_photos(Request $request)
    {

        $request->validate([
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png,webp'
        ]);

        if($request->category ==0){


            return back()->with('danger', 'Kategori Seçiniz');

        }
        $priority=Gallery::selectRaw('max(priority) as pri')->get();
        $pri = $priority[0]->pri;


        if($files = $request->file('image')){


            foreach($files as $key=>$file){
                $id = mt_rand(100, 999);
                $file_name = preg_replace('/(.*)\\.[^\\.]*/', '$1', $file->getClientOriginalName());
                $name = $file_name."-".$id.'.'.$file->extension();
                $file->move(public_path('/assets1/images/gallery/'), $name);
                $url = "/assets1/images/gallery/".$name;
                $save=Gallery::insert([
                    'image_path' => $url,
                    'category_id' => $request->category,
                    'is_active' => 1,
                    'priority' => $key+1+$pri,
                    'created_at'=>date('Y-m-d'),
                    'updated_at'=>date('Y-m-d')
                ]);

            }


        }


        if($save){
            return back()->with('success', 'Tüm Görsel(ler) Eklendi');

        }

        return back()->with('danger', 'An unexpected error occured. Please try again.!!');

    }
    public function update_photo(Request $request, $id)
    {
        try {
            if ($request->is_active == "on") {
                $is_active = 1;
            } else {
                $is_active = 0;
            }

            $photo = Gallery::find($id);

            if ($request->hasFile('img1')) {
                try {
                    $id = mt_rand(1000, 9999);
                    $imageName =  "Test_" . time() . '.webp';
                    $image = Image::make($request->img1);
                    $image->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image = $image->encode('webp', 80);

                    $image->save(public_path("/assets1/images/gallery/" . $imageName));
                    $photo->image_path = "/assets1/images/gallery/" . $imageName;
                } catch (\Exception $e) {
                    // Hata oluştuğunda bu bloğa girer
                    return back()->with('danger', 'An error occurred: ' . $e->getMessage());
                }
            }



            $photo->category_id = $request->category;
            $photo->is_active = $is_active;

            $save = $photo->save();

            if ($save) {
                return back()->with('success', 'Görsel güncellendi.');
            }

            return back()->with('danger', 'An unexpected error occured. Please try again.!!');
        } catch (\Exception $e) {
            // log the error
            Log::error($e);
            return back()->with('danger', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function edit_photo(Request $request,$id)
    {

        $photo = Gallery::find($id);
        $kategori = GalleryCategory::where('id',$photo->category_id)->first();
        $kategori_all = GalleryCategory::get();

        return view('admin.photo-edit',compact('photo','kategori_all','kategori'));

    }
    public function delete_photo($id)
    {

        $res = Gallery::destroy($id);


        if($res){
            return back()->with('success', 'Kayıt Silindi');

        }

        return back()->with('danger', 'An unexpected error occured. Please try again.!!');


    }
    public function delete_photo_category($id)
    {
        // Öncelikle kategoriye ait resimler bulunuyor
        $photos = Gallery::where('category_id', $id)->get();

        // Kategoriye ait resimlerin veritabanı kayıtlarını soft delete yapma
        foreach ($photos as $photo) {
            $photo->delete();  // Veritabanı kaydını soft delete yapma
        }

        $res = GalleryCategory::destroy($id);

        if ($res) {
            return back()->with('success', 'Kayıt Silindi');
        }

        return back()->with('danger', 'An unexpected error occured. Please try again.!!');
    }


    public function edit_photocategory($id)
    {
        $res = GalleryCategory::find($id);

        return view('admin.photocategory-edit',compact('res'));

    }
    public function update_photocategory(Request $request,$id)
    {

        $photocategory = GalleryCategory::find($id);
        $photocategory->name_tr = $request->name_tr;
        $photocategory->name_en = $request->name_en;
        $photocategory->name_ar = $request->name_ar;
        $photocategory->priority = $request->priority;
        if($request->is_active=="on"){
            $photocategory->is_active =1;
        }else{
            $photocategory->is_active =0;
        }

        $save = $photocategory->save();

        if($save){
            return back()->with('success', 'Kayıt Güncellendi');
        }

        return back()->with('danger', 'An unexpected error occured. Please try again.!!');

    }
    public function add_photo_category(Request $request)
    {


        $photo_category = new GalleryCategory();
        $photo_category->name_tr = $request->name_tr;
        $photo_category->name_en = $request->name_en;
        $photo_category->name_ar = $request->name_ar;
        $photo_category->slug_tr = Str::slug($request->name_tr, '-');
        $photo_category->slug_en = Str::slug($request->name_en, '-');
        $photo_category->slug_ar = Str::slug($request->name_ar, '-');



        $save = $photo_category->save();

        if($save){
            return back()->with('success', 'Yeni kategori eklendi.');

        }

        return back()->with('danger', 'An unexpected error occured. Please try again.!!');

    }

    public function admin_menu($id)
    {

        if($id==2){
            $kategori_all = MenuCategory::where('id', '!=', 1)->orderBy('id', 'ASC')->get();

            if(count($kategori_all)>0){
                $kategori1 = $kategori_all[0];
                $menu_all = Menu::
                    join('menu_categories', 'menu_categories.id', '=', 'menus.category_id')
                    ->select('menu_categories.name_tr','menu_categories.name_en','menu_categories.name_ar','menus.*')
                    ->where('menus.category_id',"=",$kategori_all[0]->id)
                    ->orderBy('menus.category_id','ASC')
                    ->orderBy('menus.priority','ASC')

                    ->paginate(30);

                $data = 1;
                return view('admin.menu-admin',compact('menu_all','kategori_all','kategori1','data'));

            }else{
                $data = 0;
                return view('admin.menu-admin',compact('data'));

            }

        }else{
            $kategori_all = MenuCategory::where('id', '!=', 1)->orderBy('id', 'ASC')->get();
            $kategori1 = MenuCategory::find($id);
            $menu_all = Menu::
            join('menu_categories', 'menu_categories.id', '=', 'menus.category_id')
                ->select('menu_categories.name_tr','menu_categories.name_en','menu_categories.name_ar','menus.*')
                ->where('menus.category_id',"=",$id)
                ->orderBy('menus.category_id','ASC')
                ->orderBy('menus.priority','ASC')
                ->paginate(30);

            $data = 1;
            return view('admin.menu-admin',compact('menu_all','kategori_all','kategori1','data'));

        }
    }
    public function add_menu(Request $request)
    {
        // Doğrulama kurallarını tanımlayalım
        $rules = [
            'name_tr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_tr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'price' => 'required|integer|min:1', // Price için doğrulama
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'category_id' => 'required|integer|exists:menu_categories,id', // Kategori için doğrulama
        ];

        // Gelen veriyi doğrulayalım
        $validatedData = $request->validate($rules);

        // Eğer bir hata yoksa, formdan gelen veriyi Menu modeli aracılığıyla veritabanına kaydedelim
        $menu = new Menu;
        $menu->name_tr = $validatedData['name_tr'];
        $menu->name_en = $validatedData['name_en'];
        $menu->name_ar = $validatedData['name_ar'];
        $menu->description_tr = $validatedData['description_tr'];
        $menu->description_en = $validatedData['description_en'];
        $menu->description_ar = $validatedData['description_ar'];
        $menu->price = $validatedData['price']; // Price bilgisini kaydedelim
        $menu->category_id = $validatedData['category_id']; // Kategori bilgisini kaydedelim

        // Resim dosyasını işleyelim
        if ($request->hasFile('img')) {
            // Adı Seo uyumlu yap
            $nameSlug = Str::slug($request->input('name_tr')); // Menü adını URL dostu formatına dönüştürür

            // Dosya uzantısı
            $extension = $request->img->extension();

            // Benzersiz bir dosya adı oluştur
            $imageName = $nameSlug . "_"  . mt_rand(1000, 9999) . '.' . $extension;

            // Resmi işle
            $image = Image::make($request->img);
            $image->fit(500, 500);
            $image->save(public_path("/assets1/images/menu/" . $imageName));

            // Dosya yolunu kaydet
            $menu->img = "/assets1/images/menu/" . $imageName;
        }else{
            $menu->img="/assets1/images/menu/menu-default.png";
        }



        $save = $menu->save();

        if($save){
            return back()->with('success', 'Menü başarıyla eklendi.');

        }

        return back()->with('danger', 'An unexpected error occured. Please try again.!!');

    }




    public function add_foodtype(Request $request)
    {
        // Define validation rules
        $rules = [
            'name_tr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_tr' => 'nullable|string|max:255',
            'description_en' => 'nullable|string|max:255',
            'description_ar' => 'nullable|string|max:255',
            'priority' => 'required|integer',
        ];

        // Validate incoming request data
        $validatedData = $request->validate($rules);

        // Create new MenuCategory instance and set its fields
        $foodtype = new MenuCategory();

        if($request->is_active=="on"){
            $foodtype->is_active =1;
        }else{
            $foodtype->is_active =0;
        }
        $foodtype->name_tr = $validatedData['name_tr'];
        $foodtype->name_en = $validatedData['name_en'];
        $foodtype->name_ar = $validatedData['name_ar'];
        $foodtype->slogan_tr = $validatedData['name_tr'];
        $foodtype->slogan_en = $validatedData['name_en'];
        $foodtype->slogan_ar = $validatedData['name_ar'];
        $foodtype->description_tr = $validatedData['description_tr'];
        $foodtype->description_en = $validatedData['description_en'];
        $foodtype->description_ar = $validatedData['description_ar'];
        $foodtype->priority = $validatedData['priority'];

        // Save the MenuCategory instance
        $save = $foodtype->save();

        if ($save) {
            return back()->with('success', 'Yeni menü kategori eklendi');
        }

        return back()->with('danger', 'An unexpected error occurred. Please try again.!!');
    }

    public function edit_menu($id)
    {
        $res = Menu::find($id);
        $kategori_all = MenuCategory::orderBy('id','ASC')->get();
        $kategori1 = MenuCategory::find($res->category_id);


        return view('admin.menu-edit',compact('res','kategori_all','kategori1'));

    }
    public function edit_foodtype($id)
    {
        $res = MenuCategory::find($id);

        return view('admin.foodtype-edit',compact('res'));

    }
    public function menu_update_priority(Request $request)
    {
        $newPriorities = $request->input('newPriority');

        foreach ($newPriorities as $item) {
            $menu = Menu::find($item['id']);
            $menu->priority = $item['priority'];
            $menu->save();
        }

        return response()->json(['status' => 'success', 'message' => 'Priorities updated successfully.']);
    }
    public function update_menu(Request $request, $id)
    {
        $is_active = $request->is_active == "on" ? 1 : 0;

        $menu = Menu::find($id);
        $menu->category_id = $request->category;
        $menu->price = $request->price;
        $menu->name_tr = $request->name_tr;
        $menu->name_en = $request->name_en;
        $menu->name_ar = $request->name_ar;
        $menu->description_tr = $request->description_tr;
        $menu->description_en = $request->description_en;
        $menu->description_ar = $request->description_ar;
        $menu->is_active = $is_active;
        $menu->priority = $request->priority;
        if ($request->hasFile('img')) {
            // Adı Seo uyumlu yap
            $nameSlug = Str::slug($request->input('name_tr')); // Menü adını URL dostu formatına dönüştürür

            // Dosya uzantısı
            $extension = $request->img->extension();

            // Benzersiz bir dosya adı oluştur
            $imageName = $nameSlug . "_"  . mt_rand(1000, 9999) . '.' . $extension;

            // Resmi işle
            $image = Image::make($request->img);
            $image->fit(500, 500);
            $image->save(public_path("/assets1/images/menu/" . $imageName));

            // Dosya yolunu kaydet
            $menu->img = "/assets1/images/menu/" . $imageName;
        }else{
            $menu->img="/assets1/images/menu/menu-default.png";
        }

        $save = $menu->save();

        if ($save) {
            return back()->with('success', 'Kayıt başarıyla güncellendi.');
        }

        return back()->with('danger', 'Beklenmedik bir hata oluştu. Lütfen tekrar deneyin!');
    }

    public function update_foodtype(Request $request, $id)
    {
        // Validate the request with your rules
        $request->validate([
            'name_tr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_tr' => 'nullable|string|max:255',
            'description_en' => 'nullable|string|max:255',
            'description_ar' => 'nullable|string|max:255',
            'priority' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $is_active = $request->is_active == "on" ? 1 : 0;
        $foodtype = MenuCategory::find($id);

        // Assign the values from the form to the model
        $foodtype->name_tr = $request->name_tr;
        $foodtype->name_en = $request->name_en;
        $foodtype->name_ar = $request->name_ar;
        $foodtype->description_tr = $request->description_tr;
        $foodtype->description_en = $request->description_en;
        $foodtype->description_ar = $request->description_ar;
        $foodtype->priority = $request->priority;
        $foodtype->is_active = $is_active;

        // Try to save the model and redirect with a success or error message
        if ($foodtype->save()) {
            return back()->with('success', 'Kayıt başarıyla güncellendi.');
        }

        return back()->with('danger', 'Beklenmedik bir hata oluştu. Lütfen tekrar deneyin!');
    }
    public function delete_menu($id)
    {
        $res = Menu::destroy($id);


        if($res){
            return back()->with('success', 'Kayıt başarıyla silindi.');

        }

        return back()->with('danger', 'An unexpected error occured. Please try again.!!');

    }
    public function delete_foodtype($id)
    {
        // Kategoriye ait menülerin sayısını kontrol ediyoruz
        $menus = Menu::where('category_id', $id)->get();

        foreach ($menus as $menu) {
            $menu->delete();
        }

        $res = MenuCategory::destroy($id);

        if ($res) {
            return back()->with('success', 'Kategori Silindi');
        }

        return back()->with('danger', 'An unexpected error occured. Please try again.!!');
    }



    public function admin_seo(Request $request)
    {

        $seos = Seo::get();

        return view('admin.admin-seo',compact('seos'));

    }
    public function edit_seo(Request $request,$id)
    {

        $seo = Seo::find($id);
        return view('admin.admin-seo-edit',compact('seo'));

    }
    public function update_seo(Request $request, $id)
    {

        $validatedData = $request->validate([
            'title_tr' => 'required|string',
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'description_tr' => 'required|string',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'keywords_tr' => 'required|string',
            'keywords_en' => 'required|string',
            'keywords_ar' => 'required|string',
            'canonical_tr' => 'required|string',
            'canonical_en' => 'required|string',
            'canonical_ar' => 'required|string',
            'twitter_name' => 'nullable|string',
            'logo_url' => 'nullable|string',
        ]);

        $seo = Seo::find($id);



        $seo->title_tr = $request->title_tr;
        $seo->title_en = $request->title_en;
        $seo->title_ar = $request->title_ar;
        $seo->description_tr = $request->description_tr;
        $seo->description_en = $request->description_en;
        $seo->description_ar = $request->description_ar;
        $seo->keywords_tr = $request->keywords_tr;
        $seo->keywords_en = $request->keywords_en;
        $seo->keywords_ar = $request->keywords_ar;
        $seo->canonical_tr = $request->canonical_tr;
        $seo->canonical_en = $request->canonical_en;
        $seo->canonical_ar = $request->canonical_ar;
        $seo->twitter_name = $request->twitter_name;
        $seo->logo_url = $request->logo_url;

        $save = $seo->save();

        if ($save) {
            return back()->with('success', 'Kayıt başarıyla güncellendi');
        }

        return back()->with('danger', 'Beklenmedik bir hata oluştu. Lütfen tekrar deneyin.');
    }
    public function admin_blog($id = null)
    {
        $categories = BlogCategory::all();
        $selectedCategory = null;
        $blogPosts = BlogPost::query();

        if ($id !== null) {
            // Eğer id verilmişse, belirtilen kategoriye ait blogları getir
            $selectedCategory = BlogCategory::find($id);
            if ($selectedCategory) {
                $blogPosts->where('category_id', $selectedCategory->id);
            }
        }

        $blogs = $blogPosts->paginate(30);

        return view('admin.admin-blogs', compact('categories', 'blogs', 'selectedCategory'));
    }


    public function add_blog(Request $request)
    {
        // Doğrulama kurallarını tanımlayalım
        $rules = [
            'title_tr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'slug_ar' => 'required|string|max:255',

            'content_tr' => 'required|string',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
            'seo_title_tr' => 'nullable|string|max:255',
            'seo_title_en' => 'nullable|string|max:255',
            'seo_title_ar' => 'nullable|string|max:255',
            'seo_description_tr' => 'nullable|string',
            'seo_description_en' => 'nullable|string',
            'seo_description_ar' => 'nullable|string',
            'seo_keywords_tr' => 'nullable|string|max:255',
            'seo_keywords_en' => 'nullable|string|max:255',
            'seo_keywords_ar' => 'nullable|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'category' => 'required|integer|exists:blog_categories,id', // Kategori için doğrulama
            'priority' => 'nullable|integer',
        ];

        // Gelen veriyi doğrulayalım
        $validatedData = $request->validate($rules);

        $blog = new BlogPost;
        $blog->is_active=1;
        // Eğer bir hata yoksa, formdan gelen veriyi BlogPost modeli aracılığıyla veritabanına kaydedelim

        $blog->title_tr = $validatedData['title_tr'];
        $blog->title_en = $validatedData['title_en'];
        $blog->title_ar = $validatedData['title_ar'];
        $blog->content_tr = $validatedData['content_tr'];
        $blog->content_en = $validatedData['content_en'];
        $blog->content_ar = $validatedData['content_ar'];
        $blog->seo_title_tr = $validatedData['seo_title_tr'];
        $blog->seo_title_en = $validatedData['seo_title_en'];
        $blog->seo_title_ar = $validatedData['seo_title_ar'];
        $blog->seo_description_tr = $validatedData['seo_description_tr'];
        $blog->seo_description_en = $validatedData['seo_description_en'];
        $blog->seo_description_ar = $validatedData['seo_description_ar'];
        $blog->seo_keywords_tr = $validatedData['seo_keywords_tr'];
        $blog->seo_keywords_en = $validatedData['seo_keywords_en'];
        $blog->seo_keywords_ar = $validatedData['seo_keywords_ar'];
        $blog->category_id = $validatedData['category'];
        if (preg_match('/^[a-zA-Z\s]+$/', $validatedData['title_ar'])) {
            $blog->slug_ar = Str::slug($request->slug_ar);
        } else {
            $slug_ar = Str::slug($validatedData['title_ar'], '-');
            $blog->slug_ar = $slug_ar;
        }
        $blog->slug_tr = Str::slug($blog->title_tr);
        $blog->slug_en = Str::slug($blog->title_en);

        // Resim dosyasını işleyelim
        if ($request->hasFile('img')) {
            // Adı Seo uyumlu yap
            $nameSlug = Str::slug($validatedData['title_tr']); // Başlığı URL dostu formatına dönüştürür

            // Dosya uzantısı
            $extension = $request->img->extension();

            // Benzersiz bir dosya adı oluştur
            $imageName = $nameSlug . "_". mt_rand(1000, 9999) . '.' . $extension;

            // Resmi işle
            $image = Image::make($request->img);
            //$image->fit(500, 500);
            $image->save(public_path("/assets1/images/blog/" . $imageName));

            // img_home için 420x420 boyutunda resim oluştur
            $imageHomeName = $nameSlug . "_home_" . mt_rand(1000, 9999) . '.' . $extension;
            $imageHome = Image::make($request->img);
            $imageHome->fit(420, 420, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imageHome->save(public_path("/assets1/images/blog/" . $imageHomeName));

            // Dosya yolunu kaydet
            $blog->img = "/assets1/images/blog/" . $imageName;
            $blog->img_home = "/assets1/images/blog/" . $imageHomeName;

        }else{
            $blog->img="/assets1/images/blog/blog-default.jpg";
            $blog->img_home="/assets1/images/blog/blog-default.jpg";
        }


        $blog->priority = $validatedData['priority'] ?? 0; // Varsa değeri al, yoksa 0

        $save = $blog->save();



        if ($save) {
            return back()->with('success', 'Blog başarıyla eklendi.');
        }

        return back()->with('danger', 'Beklenmedik bir hata oluştu. Lütfen tekrar deneyin!');
    }




    public function add_blogcategory(Request $request)
    {
        $rules = [
            'name_tr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'priority' => 'required|integer',
        ];

        // Validate incoming request data
        $validatedData = $request->validate($rules);

        // Create new MenuCategory instance and set its fields
        $record = new BlogCategory();
        if($request->is_active=="on"){
            $record->is_active =1;
        }else{
            $record->is_active =0;
        }
        $record->name_tr = $validatedData['name_tr'];
        $record->name_en = $validatedData['name_en'];
        $record->name_ar = $validatedData['name_ar'];
        $record->slug_tr = $validatedData['name_tr'];
        $record->slug_en = $validatedData['name_en'];
        $record->slug_ar = $validatedData['name_ar'];
        $record->priority = $validatedData['priority'];


        // Save the MenuCategory instance
        $save = $record->save();

        if ($save) {
            return back()->with('success', 'Yeni blog kategori eklendi');
        }
    }

    public function edit_blog($id)
    {
        $res = BlogPost::find($id);
        $kategori_all = BlogCategory::orderBy('id','ASC')->get();
        $kategori1 = BlogCategory::find($res->category_id);


        return view('admin.blog-edit',compact('res','kategori_all','kategori1'));

    }
    public function edit_blogcategory($id)
    {
        $res = BlogCategory::find($id);

        return view('admin.blogcategory-edit',compact('res'));

    }
    public function blog_update_priority(Request $request)
    {
        $newPriorities = $request->input('newPriority');

        foreach ($newPriorities as $item) {
            $menu = Menu::find($item['id']);
            $menu->priority = $item['priority'];
            $menu->save();
        }

        return response()->json(['status' => 'success', 'message' => 'Priorities updated successfully.']);
    }
    public function update_blog(Request $request, $id)
    {
        $is_active = $request->is_active == "on" ? 1 : 0;

        $blog = BlogPost::find($id);
        $blog->category_id = $request->category;

        $blog->title_tr = $request->title_tr;
        $blog->title_en = $request->title_en;
        $blog->title_ar = $request->title_ar;

        $blog->content_tr = $request->content_tr;
        $blog->content_en = $request->content_en;
        $blog->content_ar = $request->content_ar;

        if (!empty($request->title_ar)) {
            if (preg_match('/^[a-zA-Z\s]+$/', $request->title_ar)) {
                $blog->slug_ar = $request->slug_en;
            } else {
                $slug = str_replace(' ', '-', $request->title_ar);
                $blog->slug_ar = $slug;
            }
        }

        $blog->seo_title_tr = $request->seo_title_tr;
        $blog->seo_title_en = $request->seo_title_en;
        $blog->seo_title_ar = $request->seo_title_ar;

        $blog->seo_description_tr = $request->seo_description_tr;
        $blog->seo_description_en = $request->seo_description_en;
        $blog->seo_description_ar = $request->seo_description_ar;

        $blog->seo_keywords_tr = $request->seo_keywords_tr;
        $blog->seo_keywords_en = $request->seo_keywords_en;
        $blog->seo_keywords_ar = $request->seo_keywords_ar;


        $blog->is_active = $is_active;
        $blog->priority = $request->priority;

        if ($request->hasFile('img')) {
            // Adı Seo uyumlu yap
            $nameSlug = Str::slug($request->title_tr); // Başlığı URL dostu formatına dönüştürür

            // Dosya uzantısı
            $extension = $request->img->extension();

            // Benzersiz bir dosya adı oluştur
            $imageName = $nameSlug . "_". mt_rand(1000, 9999) . '.' . $extension;

            // Resmi işle
            $image = Image::make($request->img);
            //$image->fit(500, 500);
            $image->save(public_path("/assets1/images/blog/" . $imageName));

            // img_home için 420x420 boyutunda resim oluştur
            $imageHomeName = $nameSlug . "_home_" . mt_rand(1000, 9999) . '.' . $extension;
            $imageHome = Image::make($request->img);
            $imageHome->fit(420, 420, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $imageHome->save(public_path("/assets1/images/blog/" . $imageHomeName));

            // Dosya yolunu kaydet
            $blog->img = "/assets1/images/blog/" . $imageName;
            $blog->img_home = "/assets1/images/blog/" . $imageHomeName;

        }else{
            $blog->img="/assets1/images/blog/blog-default.jpg";
            $blog->img_home="/assets1/images/blog/blog-default.jpg";
        }


        $save = $blog->save();

        if ($save) {
            return back()->with('success', 'Kayıt başarıyla güncellendi.');
        }

        return back()->with('danger', 'Beklenmedik bir hata oluştu. Lütfen tekrar deneyin!');
    }


    public function update_blogcategory(Request $request, $id)
    {

        $is_active = $request->is_active == "on" ? 1 : 0;
        $record = BlogCategory::find($id);

        // Assign the values from the form to the model
        $record->name_tr = $request->name_tr;
        $record->name_en = $request->name_en;
        $record->name_ar = $request->name_ar;
        $record->slug_tr = Str::slug($request->name_tr);
        $record->slug_en = Str::slug($request->name_en);
        $record->slug_ar = Str::slug($request->name_ar);
        $record->priority = $request->priority;
        $record->is_active = $is_active;

        // Try to save the model and redirect with a success or error message
        if ($record->save()) {
            return back()->with('success', 'Kayıt başarıyla güncellendi.');
        }

        return back()->with('danger', 'Beklenmedik bir hata oluştu. Lütfen tekrar deneyin!');
    }
    public function delete_blog($id)
    {
        $res = BlogPost::destroy($id);


        if($res){
            return back()->with('success', 'Kayıt başarıyla silindi.');

        }

        return back()->with('danger', 'An unexpected error occured. Please try again.!!');

    }
    public function delete_blogcategory($id)
    {
        // Kategoriye ait menülerin sayısını kontrol ediyoruz
        $blogs = BlogPost::where('category_id', $id)->get();

        foreach ($blogs as $blog) {
            $blog->delete();
        }

        $res = BlogCategory::destroy($id);

        if ($res) {
            return back()->with('success', 'Kategori Silindi');
        }

        return back()->with('danger', 'An unexpected error occured. Please try again.!!');
    }

}
