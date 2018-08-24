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
        $htmlArticle= '';
        $getSlideNews= DB::table('news as n')
            ->leftjoin('categories as cate','cate.id','=','n.Cate_id')
            ->select('n.id','name','title','n.alias','cate.alias as slug','summary','images','n.created_at as date')
            ->where([
                ['active',1],
                ['hot',1]
            ])
            ->orderBy('sort','desc')
            ->take(10)
            ->get();
        foreach ($getSlideNews as $slide){
            $htmlArticle .= '<article class="slider-projects__item">';
            $htmlArticle .= '<figure class="clearfix">';
            $htmlArticle .= '<div class="image"><a href="#" style="background-image: url(' . asset('upload/thumbnail/' . $slide->images) . ');" tabindex="-1">';
            $htmlArticle .= '<img src="' . asset('upload/thumbnail/' . $slide->images) . '" alt="' . $slide->title . '">';
            $htmlArticle .= '</a>';
            $htmlArticle .= '</div>';
            $htmlArticle .= '<div class="text"><span class="date">'.$slide->name.'<i class="arrow_carrot-right"></i>'.date('d-m-Y', strtotime($slide->date)).'</span>';
            $htmlArticle .= '<h3><a href="#" tabindex="-1">'.$slide->title.'</a></h3>';
            $htmlArticle .= '<p>'.truncateStringWords($slide->summary, 150).'</p>';
            $htmlArticle .= '<a href="#" tabindex="-1">Xem thêm<i class="arrow_carrot-2right"></i></a>';
            $htmlArticle .= '</div>';
            $htmlArticle .= '</figure>';
            $htmlArticle .= '</article>';
        }
        return view('xaydung.listNewsBuild')->with([
            'thisSlideNews'=>$htmlArticle
        ]);
    }

    public function getPage($pageSlug)
    {
        $keySlug = DB::table('pages')
            ->select('slug')
            ->get();
        foreach ($keySlug as $item) {
            if ($item->slug == $pageSlug){
                $getData= DB::table('pages')
                    ->select('name','slug','content')
                    ->where('slug',$item->slug)
                    ->first();
            }
        }
        if (isset($getData)){
            return view('xaydung.pages',compact('getData'));
        }
    }

    public function searchPage(Request $request){
        $htmlSearch= '';
        $getKey = Input::get('txtSearch');
        if (isset($getKey)) {
            $search = DB::table('news')->where('title', 'like', '%' . $getKey . '%')
                ->select('id', 'title', 'alias', 'images', 'summary','created_at')
                ->where([
                    ['active',1]
                ])
                ->take(10)->get();
        }

        foreach ($search as $item) {
            $htmlSearch .= '<div class="listPost__item">';
            $htmlSearch .= '<div class="listPost__item__image">';
            $htmlSearch .= '<div class="image" style="background-image:url(' .asset('upload/thumbnail/'.$item->images).')">';
            $htmlSearch .= '<img src="' .asset('upload/thumbnail/'.$item->images).'" alt="name">';
            $htmlSearch .= '</div>';
            $htmlSearch .= '</div>';
            $htmlSearch .= '<div class="listPost__item__desc">';
            $htmlSearch .= '<h3>'.$item->title.'</h3>';
            $htmlSearch .= '<div class="text">';
            $htmlSearch .= '<p class="date">'.date('d-m-Y', strtotime($item->created_at)).'</p>';
            $htmlSearch .= '<p class="short">'. truncateStringWords($item->summary, 150).'</p>';
            $htmlSearch .= '</div><a href="#">Xem chi tiết</a>';
            $htmlSearch .= '</div>';
            $htmlSearch .= '</div>';
        }
        return view('xaydung.search')->with(['thisSearch'=>$htmlSearch]);
    }
}
