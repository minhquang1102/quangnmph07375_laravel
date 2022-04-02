<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Tra ve danh sach cac ban ghi product
    public function index()
    {
        // Eloquent
        // all: lay ra toan bo cac ban ghi
        $news = News::all();
        // get: lay ra toan bo cac ban ghi, ket hop dc cac dieu kien #
        // get se nam cuoi cung cua doan truy van
        // lay danh sach va kem ban ghi quan he
        // with() ngay trong cau truy van
        $newsGet = News::select('id', 'name', 'description', 'category_id')
            ->withCount('newsProducts')
            ->with('newsProducts:id,name')
            ->with('categoryNews',function($query) {
                $query->select('id','name');
            })
            ->paginate(10);

        return view('news.index', ['news' => $newsGet]);
        // dd('Danh sach category', $categories, $categoriesGet);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Tao ban ghi product moi
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Tra ve thong tin ban ghi product theo id
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Cap nhat thong tin cua 1 ban ghi
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Xoa 1 ban ghi product
    public function delete(News $id_news)
    {
        // Neu muon su dung model binding
        // 1. Dinh nghia kieu tham so truyen vao la model tuong ung
        // 2. Tham so o route === ten tham so truyen vao ham
        if ($pro->delete()) {
            return redirect()->route('news.index');
        }
    }
}
