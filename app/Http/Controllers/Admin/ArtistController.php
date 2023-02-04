<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Artist;


class ArtistController extends Controller
{
    public function add()
    {
        return view('artist.create');
    }
    
    public function create(Request $request)
    {
        //validationを行う
        $this->validate($request, Artist::$rules);
        
        $artist =new Artist;
        $form = $request->all();
        
        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
         if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $artist->image_path = basename($path);
        } else {
            $artist->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $artist->fill($form);
        $artist->save();

        return redirect('artist/create');
    }

    public function index()
    {
        $posts = Artist::all();
        return view('artist.index', ['artists' => $posts]);
    }
    
    public function edit(Request $request)
    {
        $artist = Artist::find($request->id);
        if (empty($artist)) {
            abort(404);
        }
        return view('artist.edit', ['artist_form' => $artist]);
    }

    public function update(Request $request)
    {
         $this->validate($request, Artist::$rules);
        // News Modelからデータを取得する
        $artist = Artist::find($request->id);
        // 送信されてきたフォームデータを格納する
        $artist_form = $request->all();
        
         if ($request->remove == 'true') {
             $artist_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $artist_form['image_path'] = basename($path);
        } else {
            $artist_form['image_path'] = $artist->image_path;
        }

        unset($artist_form['image']);
        unset($artist_form['remove']);
        unset($artist_form['_token']);
        
        $artist->fill($artist_form)->save();
        
        return redirect('artist');
    }
    
    public function delete(Request $request)
    {
        $artist = Artist::find($request->id);

        $artist->delete();

        return redirect('artist');
    }
}
