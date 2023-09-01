<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LanguageController extends Controller
{

    public function switchLang($lang)
    {
        if (in_array($lang, ['tr', 'en', 'ar'])) {
            session()->put('app_locale', $lang);
        }

        // Aktif dildeki aynı sayfaya yönlendirme yapmak istediğimizi varsayarak:
        $routeName = \Route::currentRouteName();
        return redirect()->route($routeName, $lang);
    }

    public function switchLang4($lang)
    {
        if (!in_array($lang, ['tr', 'en', 'ar'])) {
            return redirect()->back();
        }
        session()->put('app_locale', $lang);

        $segments = request()->segments();
        $segments[0] = $lang;  // URL'deki dil önekinde değişiklik yap

        return redirect()->to(implode('/', $segments));
    }



    public function switchLang5($lang)
    {
        if (!in_array($lang, ['tr', 'en', 'ar'])) {
            return redirect()->back();
        }

        Session::put('locale', $lang);
        app()->setLocale($lang);

        $previousUrl = URL::previous();
        $segments = explode('/', $previousUrl);

        $lastSegment = end($segments);

        // Önceki dil için segment anahtarını bulun
        $currentLocale = app()->getLocale();
        $routeSegments = __('static_text.routes', [], $currentLocale);
        $segmentKey = array_search($lastSegment, $routeSegments);

        // Yeni dil için segmenti al
        $newSegment = __('static_text.routes.' . $segmentKey, [], $lang);

        // Önceki URL'deki eski segmenti yeni segment ile değiştir
        $newUrl = str_replace($lastSegment, $newSegment, $previousUrl);

        return redirect($newUrl);
    }


    public function switchLang2($lang, $previousLang)
    {
        Log::info('switchLang fonksiyonu çağrıldı.');

        if (!in_array($lang, ['tr', 'en', 'ar'])) {
            Log::info('Geçersiz dil kodu: ' . $lang);
            return redirect()->back();
        }

        // Dil bilgisini güncelle
        Session::put('locale', $lang);
        app()->setLocale($lang);

        $previousUrl = URL::previous();
        Log::info('Önceki URL: ' . $previousUrl);

        $lastSegment = last(explode('/', $previousUrl));

        // Önceki dil için segment anahtarını bul
        $routeSegments = __('static_text.routes', [], $previousLang);
        $segmentKey = array_search($lastSegment, $routeSegments);

        if ($segmentKey === false) {
            Log::info('Segment anahtarı bulunamadı: ' . $lastSegment);
            return redirect()->back();
        }

        // Yeni dil için segment anahtarını kullanarak yeni segmenti al
        $newSegment = __('static_text.routes.' . $segmentKey);

        // Önceki URL'deki eski segmenti yeni segment ile değiştir
        $newUrl = str_replace($lastSegment, $newSegment, $previousUrl);


        return redirect($newUrl);
    }

    public function switchLang1($lang)
    {
        // Mevcut dil ayarını geçici bir değişkene kaydedin
        $currentLocale = app()->getLocale();

        // Mevcut dildeki URL segmentini alın
        $currentUrlSegment = request()->segment(count(request()->segments()));

        // Mevcut dildeki static_text.routes dizisini al
        app()->setLocale($currentLocale);
        $routeSegmentsCurrentLocale = __('static_text.routes');
        $segmentKey = array_search($currentUrlSegment, $routeSegmentsCurrentLocale);

        // Eğer segment anahtarı bulunursa, bu anahtarı hedef dildeki static_text.routes dizisiyle eşleştirin
        if ($segmentKey !== false) {
            app()->setLocale($lang);
            $routeSegmentsNewLocale = __('static_text.routes');
            $newUrlSegment = $routeSegmentsNewLocale[$segmentKey];
        } else {
            $newUrlSegment = $currentUrlSegment;
        }

        // URL segmentini güncelleyin
        $newUrl = str_replace("/$currentUrlSegment", "/$newUrlSegment", url()->previous());

        // Dil ayarını kaydedin ve güncellenmiş URL'ye yönlendirin
        Session::put('locale', $lang);
        return redirect($newUrl);
    }








}
