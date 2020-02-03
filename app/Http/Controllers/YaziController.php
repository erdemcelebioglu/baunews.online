<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Yazi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YaziController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yazilar = Yazi::all();

        return view('admin.yazilar.index', compact('yazilar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriler = Kategori::all();
        return view('admin.yazilar.create', compact('kategoriler'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), array(
            'baslik' => 'required',
            'icerik' => 'required',
            'kategori' => 'required',
        ));

        $yazi = new Yazi();
        $yazi->baslik = request('baslik');
        $yazi->icerik = request('icerik');
        $yazi->user_id = Auth::user()->id;
        $yazi->kategori_id = request('kategori');
        $yazi->slider = request('slider');
        $yazi->video = request('video');
        $yazi->slug = str_slug(request('baslik'));
        $yazi->resim = '';


        if (request()->hasFile('resim')) {
            $this->validate(request(), array('resim' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));


            $resim = request()->file('resim');
            $dosya_adi = time() . '.' . $resim->extension();

            if ($resim->isValid()) {
                $hedef_klasor = 'upload/dosyalar';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim->move($hedef_klasor, $dosya_adi);
                $yazi->resim = $dosya_yolu;
            }
        }
        $yazi->save();
        if ($yazi) {
            alert()->success('Başarılı','Yazı Eklendi.');

            return back();


        } else {
            alert()->error('Başarısız','Yazı Eklenemedi.');
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $yazi = Yazi::find($id);
        $kategoriler = Kategori::where('id', '!=', $yazi->kategori)->get();
        return view('admin.yazilar.edit', compact('yazi', 'kategoriler'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), array(
            'baslik' => 'required',
            'icerik' => 'required',
            'kategori' => 'required',
        ));

        $yazi = Yazi::find($id);
        $kullanici = $yazi->user_id;
        $yazi->baslik = request('baslik');
        $yazi->icerik = request('icerik');
        $yazi->user_id = $kullanici;
        $yazi->kategori_id = request('kategori');
        $yazi->slider = request('slider');
        $yazi->video = request('video');
        $yazi->slug = str_slug(request('baslik'));

        if (request()->hasFile('resim')) {
            $this->validate(request(), array('resim' => 'image|mimes:png,jpg,jpeg,gif|max:2048'));


            $resim = request()->file('resim');
            $dosya_adi = time() . '.' . $resim->extension();

            if ($resim->isValid()) {
                $hedef_klasor = 'upload/dosyalar';
                $dosya_yolu = $hedef_klasor . '/' . $dosya_adi;
                $resim->move($hedef_klasor, $dosya_adi);
                $yazi->resim = $dosya_yolu;
            }
        }
        $yazi->save();
        if ($yazi) {
            alert()->success('Başarılı','Yazı Güncellendi.');

            return back();


        } else {
            alert()->error('Başarısız','Yazı Güncellenemedi.');
            return back();
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sil = Yazi::destroy($id);
        if ($sil) {
            alert()->success('Başarılı','Yazı Silindi.');

            return back();


        } else {
            alert()->error('Başarısız','Yazı Silinemedi.');
            return back();
        }
    }
}
