<?php

namespace App\Http\Controllers;

use App\Ayar;
use App\Kategori;
use App\Mail\iletisimformu;
use App\Sayfa;
use App\User;
use App\Yazi;
use App\Yorum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Newsletter;
use willvincent\Rateable\Rating;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Yazi::where('slider', '=', 'goster')->take(6)->get();
        $yazilar = Yazi::where('kategori_id', 2)->orderby('created_at', 'desc')->take(4)->skip(1)->get();
        $tekli = Yazi::where('kategori_id', 2)->orderby('created_at', 'desc')->first();
        $yeniler = Yazi::where('video',null)->orderby('created_at', 'desc')->take(5)->get();
        $enfazlayorumlar = Yazi::withCount('yorumlar')->orderby('yorumlar_count', 'desc')->take(4)->get();
        $renkler = array('1', '2', '3', '4', '5',);
        $videolar = Yazi::where('video', '!=',null)->take(6)->get();
        return view('anasayfa.index', compact('sliders', 'yazilar', 'tekli', 'yeniler', 'enfazlayorumlar', 'renkler','videolar'));
    }

    public function cikis()
    {
        auth()->logout();
        return redirect('/');
    }

    public function yazidetay($id)
    {
        $yazi = Yazi::find($id);

        $ilgililer = Yazi::where('id', '!=', $id)->take(3)->get();
        $yorumlar = Yorum::where('onay', 1)->where('yazi_id', $id)->get();
        $enfazlayorumlar = Yazi::withCount('yorumlar')->orderby('yorumlar_count', 'desc')->take(5)->get();
        $yeniyorumlar = Yorum::orderby('created_at', 'desc')->take(5)->get();
        return view('anasayfa.detay', compact('yazi', 'ilgililer', 'yorumlar', 'enfazlayorumlar', 'yeniyorumlar'));
    }

    public function yorumgonder(request $request)
    {

        $yorum = new Yorum();
        $yorum->user_id = Auth::user()->id;
        $yorum->yorum = request('yorum');
        $yorum->yazi_id = request('yazi');
        $yorum->rating = request('derece');

        if (Auth::user()->yetki='admin') {
            $yorum->onay = 1;

        }else{
                $yorum->onay = 0;
            }


        $yorum->save();

        $yazi = Yazi::find(request('yazi'));
        $rating = new Rating();
        $rating->rating = request('derece');
        $rating->user_id = Auth::user()->id;
        $yazi->ratings()->save($rating);

        alert()->success('Teşekkürler','Yorumunuz Onay Bekliyor');


        return back();

    }

    public function kategori($id)
    {
        $kategori = Kategori::find($id);
        $yazilar = Yazi::where('kategori_id', $id)->orderby('created_at', 'desc')->paginate(3);
        $enfazlayorumlar = Yazi::withCount('yorumlar')->orderby('yorumlar_count', 'desc')->take(5)->get();
        $yeniyorumlar = Yorum::orderby('created_at', 'desc')->take(5)->get();
        return view('anasayfa.kategori', compact('kategori', 'enfazlayorumlar', 'yeniyorumlar', 'yazilar'));
    }

    public function sayfa($id)
    {
        $sayfa = Sayfa::find($id);
        $enfazlayorumlar = Yazi::withCount('yorumlar')->orderby('yorumlar_count', 'desc')->take(5)->get();
        $yeniyorumlar = Yorum::orderby('created_at', 'desc')->take(5)->get();
        return view('anasayfa.sayfa', compact('sayfa', 'enfazlayorumlar', 'yeniyorumlar'));
    }

    public function arama(request $request)
    {
        $this->validate(request(), array('kelime' => 'required'));
        $kelime = request('kelime');
        $sonuclar = Yazi::where('baslik', 'LIKE', '%' . $kelime . '%')->latest()->paginate(5);
        $enfazlayorumlar = Yazi::withCount('yorumlar')->orderby('yorumlar_count', 'desc')->take(5)->get();
        $yeniyorumlar = Yorum::orderby('created_at', 'desc')->take(5)->get();
        return view('anasayfa.arama', compact('sonuclar', 'enfazlayorumlar', 'yeniyorumlar'));
    }

    public function profilim()
    {
        if (!Auth::check()) {
            return redirect()->route('anasayfa');
        } else {
            $kullanici = Auth::user()->id;
            $profilim = User::find($kullanici);
            return view('anasayfa.profil', compact('profilim'));
        }
    }

    public function profilguncelle($id)
    {
        $kullanici = User::find($id);
        $kullanici->name = request('name');
        $kullanici->email = request('email');
        if (!empty(request('password'))) {
            if (request('password') != request('password_tekrar')) {
                alert()->error('Hata', 'Şifreler Eşleşmiyor');


                return back();
            } else {
                $kullanici->password = Hash::make(request('password'));
            }
        }
        if (request()->hasFile('avatar')) {
            $this->validate(request(), array('avatar' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));


            $resim = request()->file('avatar');
            $dosya_adi = 'avatar' . '-' . time() . '.' . $resim->extension();

            if ($resim->isValid()) {
                $hedef_klasor = 'upload/dosyalar';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim->move($hedef_klasor, $dosya_adi);
                $kullanici->avatar = $dosya_yolu;
            }
        }
        $kullanici->save();
        if ($kullanici) {
            alert()->success('Başarılı', 'Profiliniz Güncellendi');


            return back();


        } else {
            alert()->error('Başarısız', 'Profiliniz Güncellenemedi');


            return back();
        }
    }

    public function aboneol(request $request)
    {

        $kayitlimi = Newsletter::isSubscribed(request('email'));
        if ($kayitlimi) {
            alert()->error('Hata', 'Email Adresiniz Zaten Kayıtlı');


            return back();
        } else {
            $aboneol = Newsletter::subscribe(request('email'));

            if ($aboneol) {
                alert()->success('Başarılı', 'Abone Oldunuz.');


                return back();
            }
        }

    }

    public function iletisim(){
        return view('anasayfa.iletisim');
    }

    public function iletisimkaydet(request $request){
        $this->validate(request(),array(
            'adsoyad'=>'required',
            'email'=>'required',
            'mesaj'=>'required'
        ));

        $ayar = Ayar::find(1);
        $adres = $ayar->baslik;
        $mailadresim = $ayar->email;

        $bilgiler = array(
            'adsoyad' =>request('adsoyad'),
            'email' =>request('email'),
            'mesaj' =>request('mesaj'),
            'sitebaslik' =>$adres,


        );

        Mail::to($mailadresim)->send(new iletisimformu($bilgiler));

        alert()->success('Başarılı','Email Gönderildi');


        return redirect()->route('anasayfa');
    }

    public function dildegistir($lang){
        Session::put('applocale',$lang);
        return redirect()->back();
    }

}

