<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use App\System;
use App\Pages;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class XaydungController extends Controller
{
    public function __construct()
    {
        $getSystemInfo = DB::table('systems')->first();
        View::share(['systemInfo' => $getSystemInfo]);
    }

    public function index()
    {
        $htmlSlider = '';
        //TODO get Slider
        $getSlider = DB::table('sliders')
            ->select('name', 'addSlug', 'images')
            ->where('active', 1)
            ->orderBy('weight', 'desc')
            ->get();
        foreach ($getSlider as $slider) {
            $htmlSlider .= '<div class="sliderBanner__item">';
            $htmlSlider .= '<div class="sliderBanner__item__image"><a href="' . $slider->addSlug . '" style="background-image: url(' . asset('uploads/sliders/' . $slider->images) . ');">';
            $htmlSlider .= '<img src="' . asset('uploads/sliders/' . $slider->images) . '" alt="' . $slider->images . '"></a></div>';
            $htmlSlider .= '<div class="sliderBanner__item__title">';
            $htmlSlider .= $slider->name;
            $htmlSlider .= '</div>';
            $htmlSlider .= '</div>';
        }

        return view('xaydung.index')->with(['thisSlider' => $htmlSlider]);
    }

    public function tinXaydung()
    {
        $htmlArticle = '';
        $htmlNew = '';
        $htmHoanThanh = '';
        $htmlDangThiCong = '';
        //TODO get slide news
        $getSlideNews = DB::table('news as n')
            ->leftjoin('categories as cate', 'cate.id', '=', 'n.Cate_id')
            ->select('n.id', 'name', 'title', 'n.alias', 'cate.alias as slug', 'summary', 'images', 'n.created_at as date')
            ->where([
                ['active', 1],
                ['hot', 1]
            ])
            ->orderBy('sort', 'desc')
            ->take(10)
            ->get();
        foreach ($getSlideNews as $slide) {
            $htmlArticle .= '<article class="slider-projects__item">';
            $htmlArticle .= '<figure class="clearfix">';
            $htmlArticle .= '<div class="image"><a href="#" style="background-image: url(' . asset('upload/thumbnail/' . $slide->images) . ');" tabindex="-1">';
            $htmlArticle .= '<img src="' . asset('upload/thumbnail/' . $slide->images) . '" alt="' . $slide->title . '">';
            $htmlArticle .= '</a>';
            $htmlArticle .= '</div>';
            $htmlArticle .= '<div class="text"><span class="date">' . $slide->name . '<i class="arrow_carrot-right"></i>' . date('d-m-Y', strtotime($slide->date)) . '</span>';
            $htmlArticle .= '<h3><a href="#" tabindex="-1">' . $slide->title . '</a></h3>';
            $htmlArticle .= '<p>' . truncateStringWords($slide->summary, 150) . '</p>';
            $htmlArticle .= '<a href="#" tabindex="-1">Xem thêm<i class="arrow_carrot-2right"></i></a>';
            $htmlArticle .= '</div>';
            $htmlArticle .= '</figure>';
            $htmlArticle .= '</article>';
        }
        //TODO get new news
        $getNewNews = DB::table('news as n')
            ->leftjoin('categories as cate','cate.id','=','n.Cate_id')
            ->select('n.id', 'title', 'n.alias', 'summary', 'images', 'n.created_at')
            ->where([
                ['active', 1],
                ['cate.cateType','XAYDUNG']
            ])
            ->orderBy('id', 'desc')
            ->take(8)
            ->get();
        foreach ($getNewNews as $item) {
            $htmlNew .= '<div class="col-lg-3 col-sm-4 col-xs-6 news-list__item">';
            $htmlNew .= '<a class="linkTo" href="#"></a>';
            $htmlNew .= '<div class="image" style="background-image: url(' . asset('upload/thumbnail/' . $item->images) . ')">';
            $htmlNew .= '<div class="overlay"></div>';
            $htmlNew .= '<img src="' . asset('upload/thumbnail/' . $item->images) . '" alt="Kh">';
            $htmlNew .= '<span></span>';
            $htmlNew .= '</div>';
            $htmlNew .= '<div class="des">';
            $htmlNew .= '<p class="date"><i class="arrow_carrot-right"></i>' . date('d-m-Y', strtotime($item->created_at)) . '</p>';
            $htmlNew .= '<p><a href="#">' . $item->title . '</a></p>';
            $htmlNew .= '</div>';
            $htmlNew .= '</div>';
        }
        //TODO get new da hoan thanh
        $getNewNews = DB::table('news as n')
            ->leftjoin('categories as cate', 'cate.id', '=', 'n.Cate_id')
            ->select('n.id', 'name', 'title', 'n.alias', 'cate.alias as slug', 'summary', 'images', 'n.created_at as date')
            ->where([
                ['active', 1],
                ['cate.id', 1]
            ])
            ->orderBy('n.id', 'desc')
            ->take(8)
            ->get();
        foreach ($getNewNews as $item) {
            $htmHoanThanh .= '<div class="col-lg-3 col-sm-4 col-xs-6 news-list__item">';
            $htmHoanThanh .= '<a class="linkTo" href="#"></a>';
            $htmHoanThanh .= '<div class="image" style="background-image: url(' . asset('upload/thumbnail/' . $item->images) . ')">';
            $htmHoanThanh .= '<div class="overlay"></div>';
            $htmHoanThanh .= '<img src="' . asset('upload/thumbnail/' . $item->images) . '" alt="Kh">';
            $htmHoanThanh .= '<span></span>';
            $htmHoanThanh .= '</div>';
            $htmHoanThanh .= '<div class="des">';
            $htmHoanThanh .= '<p class="date"><i class="arrow_carrot-right"></i>' . date('d-m-Y', strtotime($item->date)) . '</p>';
            $htmHoanThanh .= '<p><a href="#">' . $item->title . '</a></p>';
            $htmHoanThanh .= '</div>';
            $htmHoanThanh .= '</div>';
        }
        //TODO get new dang thi cong
        $getNewNews = DB::table('news as n')
            ->leftjoin('categories as cate', 'cate.id', '=', 'n.Cate_id')
            ->select('n.id', 'name', 'title', 'n.alias', 'cate.alias as slug', 'summary', 'images', 'n.created_at as date')
            ->where([
                ['active', 1],
                ['cate.id', 2]
            ])
            ->orderBy('n.id', 'desc')
            ->take(8)
            ->get();
        foreach ($getNewNews as $item) {
            $htmlDangThiCong .= '<div class="col-lg-3 col-sm-4 col-xs-6 news-list__item">';
            $htmlDangThiCong .= '<a class="linkTo" href="#"></a>';
            $htmlDangThiCong .= '<div class="image" style="background-image: url(' . asset('upload/thumbnail/' . $item->images) . ')">';
            $htmlDangThiCong .= '<div class="overlay"></div>';
            $htmlDangThiCong .= '<img src="' . asset('upload/thumbnail/' . $item->images) . '" alt="Kh">';
            $htmlDangThiCong .= '<span></span>';
            $htmlDangThiCong .= '</div>';
            $htmlDangThiCong .= '<div class="des">';
            $htmlDangThiCong .= '<p class="date"><i class="arrow_carrot-right"></i>' . date('d-m-Y', strtotime($item->date)) . '</p>';
            $htmlDangThiCong .= '<p><a href="#">' . $item->title . '</a></p>';
            $htmlDangThiCong .= '</div>';
            $htmlDangThiCong .= '</div>';
        }
        return view('xaydung.listNewsBuild')->with([
            'thisSlideNews' => $htmlArticle,
            'thisNewNews' => $htmlNew,
            'thisHoanThanh' => $htmHoanThanh,
            'thisDangThiCong' => $htmlDangThiCong
        ]);
    }
    public function tinBDS()
    {
        $htmlArticle = '';
        $htmlNew = '';
        $htmHoanThanh = '';
        $htmlDangThiCong = '';
        //TODO get slide news
        $getSlideNews = DB::table('news as n')
            ->leftjoin('categories as cate', 'cate.id', '=', 'n.Cate_id')
            ->select('n.id', 'name', 'title', 'n.alias', 'cate.alias as slug', 'summary', 'images', 'n.created_at as date')
            ->where([
                ['active', 1],
                ['hot', 1]
            ])
            ->orderBy('sort', 'desc')
            ->take(10)
            ->get();
        foreach ($getSlideNews as $slide) {
            $htmlArticle .= '<article class="slider-projects__item">';
            $htmlArticle .= '<figure class="clearfix">';
            $htmlArticle .= '<div class="image"><a href="#" style="background-image: url(' . asset('upload/thumbnail/' . $slide->images) . ');" tabindex="-1">';
            $htmlArticle .= '<img src="' . asset('upload/thumbnail/' . $slide->images) . '" alt="' . $slide->title . '">';
            $htmlArticle .= '</a>';
            $htmlArticle .= '</div>';
            $htmlArticle .= '<div class="text"><span class="date">' . $slide->name . '<i class="arrow_carrot-right"></i>' . date('d-m-Y', strtotime($slide->date)) . '</span>';
            $htmlArticle .= '<h3><a href="#" tabindex="-1">' . $slide->title . '</a></h3>';
            $htmlArticle .= '<p>' . truncateStringWords($slide->summary, 150) . '</p>';
            $htmlArticle .= '<a href="#" tabindex="-1">Xem thêm<i class="arrow_carrot-2right"></i></a>';
            $htmlArticle .= '</div>';
            $htmlArticle .= '</figure>';
            $htmlArticle .= '</article>';
        }
        //TODO get new news
        $getNewNews = DB::table('news as n')
            ->leftjoin('categories as cate','cate.id','=','n.Cate_id')
            ->select('n.id', 'title', 'n.alias', 'summary', 'images', 'n.created_at')
            ->where([
                ['active', 1],
                ['cate.id',3],
            ])
            ->orderBy('id', 'desc')
            ->take(8)
            ->get();
        foreach ($getNewNews as $item) {
            $htmlNew .= '<div class="col-lg-3 col-sm-4 col-xs-6 news-list__item">';
            $htmlNew .= '<a class="linkTo" href="#"></a>';
            $htmlNew .= '<div class="image" style="background-image: url(' . asset('upload/thumbnail/' . $item->images) . ')">';
            $htmlNew .= '<div class="overlay"></div>';
            $htmlNew .= '<img src="' . asset('upload/thumbnail/' . $item->images) . '" alt="Kh">';
            $htmlNew .= '<span></span>';
            $htmlNew .= '</div>';
            $htmlNew .= '<div class="des">';
            $htmlNew .= '<p class="date"><i class="arrow_carrot-right"></i>' . date('d-m-Y', strtotime($item->created_at)) . '</p>';
            $htmlNew .= '<p><a href="#">' . $item->title . '</a></p>';
            $htmlNew .= '</div>';
            $htmlNew .= '</div>';
        }
        //TODO get new da hoan thanh
        $getNewNews = DB::table('news as n')
            ->leftjoin('categories as cate', 'cate.id', '=', 'n.Cate_id')
            ->select('n.id', 'name', 'title', 'n.alias', 'cate.alias as slug', 'summary', 'images', 'n.created_at as date')
            ->where([
                ['active', 1],
                ['cate.id', 4]
            ])
            ->orderBy('n.id', 'desc')
            ->take(8)
            ->get();
        foreach ($getNewNews as $item) {
            $htmHoanThanh .= '<div class="col-lg-3 col-sm-4 col-xs-6 news-list__item">';
            $htmHoanThanh .= '<a class="linkTo" href="#"></a>';
            $htmHoanThanh .= '<div class="image" style="background-image: url(' . asset('upload/thumbnail/' . $item->images) . ')">';
            $htmHoanThanh .= '<div class="overlay"></div>';
            $htmHoanThanh .= '<img src="' . asset('upload/thumbnail/' . $item->images) . '" alt="Kh">';
            $htmHoanThanh .= '<span></span>';
            $htmHoanThanh .= '</div>';
            $htmHoanThanh .= '<div class="des">';
            $htmHoanThanh .= '<p class="date"><i class="arrow_carrot-right"></i>' . date('d-m-Y', strtotime($item->date)) . '</p>';
            $htmHoanThanh .= '<p><a href="#">' . $item->title . '</a></p>';
            $htmHoanThanh .= '</div>';
            $htmHoanThanh .= '</div>';
        }
        //TODO get new dang thi cong
        $getNewNews = DB::table('news as n')
            ->leftjoin('categories as cate', 'cate.id', '=', 'n.Cate_id')
            ->select('n.id', 'name', 'title', 'n.alias', 'cate.alias as slug', 'summary', 'images', 'n.created_at as date')
            ->where([
                ['active', 1],
                ['cate.id', 5]
            ])
            ->orderBy('n.id', 'desc')
            ->take(8)
            ->get();
        foreach ($getNewNews as $item) {
            $htmlDangThiCong .= '<div class="col-lg-3 col-sm-4 col-xs-6 news-list__item">';
            $htmlDangThiCong .= '<a class="linkTo" href="#"></a>';
            $htmlDangThiCong .= '<div class="image" style="background-image: url(' . asset('upload/thumbnail/' . $item->images) . ')">';
            $htmlDangThiCong .= '<div class="overlay"></div>';
            $htmlDangThiCong .= '<img src="' . asset('upload/thumbnail/' . $item->images) . '" alt="Kh">';
            $htmlDangThiCong .= '<span></span>';
            $htmlDangThiCong .= '</div>';
            $htmlDangThiCong .= '<div class="des">';
            $htmlDangThiCong .= '<p class="date"><i class="arrow_carrot-right"></i>' . date('d-m-Y', strtotime($item->date)) . '</p>';
            $htmlDangThiCong .= '<p><a href="#">' . $item->title . '</a></p>';
            $htmlDangThiCong .= '</div>';
            $htmlDangThiCong .= '</div>';
        }
        $flag= 2;
        return view('xaydung.listNewsBuild')->with([
            'thisSlideNews' => $htmlArticle,
            'thisNewNews' => $htmlNew,
            'thisHoanThanh' => $htmHoanThanh,
            'thisDangThiCong' => $htmlDangThiCong,
            'key'=>$flag
        ]);
    }

    public function getPage($pageSlug)
    {
        $keySlug = DB::table('pages')
            ->select('slug')
            ->get();
        foreach ($keySlug as $item) {
            if ($item->slug == $pageSlug) {
                $getData = DB::table('pages')
                    ->select('name', 'slug', 'content')
                    ->where('slug', $item->slug)
                    ->first();
            }
        }
        if (isset($getData)) {
            return view('xaydung.pages', compact('getData'));
        }
    }

    public function searchPage(Request $request)
    {
        $htmlSearch = '';
        $getKey = Input::get('txtSearch');
        if (isset($getKey)) {
            $search = DB::table('news')->where('title', 'like', '%' . $getKey . '%')
                ->select('id', 'title', 'alias', 'images', 'summary', 'created_at')
                ->where([
                    ['active', 1]
                ])
                ->take(10)->get();
        }

        foreach ($search as $item) {
            $htmlSearch .= '<div class="listPost__item">';
            $htmlSearch .= '<div class="listPost__item__image">';
            $htmlSearch .= '<div class="image" style="background-image:url(' . asset('upload/thumbnail/' . $item->images) . ')">';
            $htmlSearch .= '<img src="' . asset('upload/thumbnail/' . $item->images) . '" alt="name">';
            $htmlSearch .= '</div>';
            $htmlSearch .= '</div>';
            $htmlSearch .= '<div class="listPost__item__desc">';
            $htmlSearch .= '<h3>' . $item->title . '</h3>';
            $htmlSearch .= '<div class="text">';
            $htmlSearch .= '<p class="date">' . date('d-m-Y', strtotime($item->created_at)) . '</p>';
            $htmlSearch .= '<p class="short">' . truncateStringWords($item->summary, 150) . '</p>';
            $htmlSearch .= '</div><a href="#">Xem chi tiết</a>';
            $htmlSearch .= '</div>';
            $htmlSearch .= '</div>';
        }
        return view('xaydung.search')->with(['thisSearch' => $htmlSearch]);
    }
}
