<?php


namespace Addons\SiteMap\Controllers;


use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Storage;
use Modules\Cms\Models\Article;
use Modules\Cms\Models\ArticleCategory;
use Modules\Cms\Models\ArticleTag;
use Modules\Shop\Models\Goods;
use Modules\Shop\Models\GoodsCategory;

class SiteMapController extends MyController
{

    public function index()
    {
        return $this->view('admin.index');
    }

    public function make()
    {

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

        $siteUrl = system_config('site_url');
        $date = date("Y-m-d");

        $xml .= "<url><loc>{$siteUrl}</loc><lastmod>{$date}</lastmod><priority>1.00</priority></url>";

        $categories = ArticleCategory::select(['id','updated_at'])->get();;
        foreach ($categories as $category) {

            $date = date("Y-m-d",strtotime($category->updated_at));
            $url = category_path($category->id);
            $xml .= "<url><loc>{$url}</loc><lastmod>{$date}</lastmod><priority>0.80</priority></url>";

        }

        $articles = Article::select(['id','updated_at'])->get();;
        foreach ($articles as $article) {

            $date = date("Y-m-d",strtotime($article->updated_at));
            $url = single_path($article->id);
            $xml .= "<url><loc>{$url}</loc><lastmod>{$date}</lastmod><priority>0.80</priority></url>";

        }

        $tags = ArticleTag::select(['id','updated_at'])->get();
        foreach ($tags as $tag) {

            $date = date("Y-m-d",strtotime($tag->updated_at));
            $url = tag_path($tag->id);
            $xml .= "<url><loc>{$url}</loc><lastmod>{$date}</lastmod><priority>0.80</priority></url>";

        }

        $url = store_path();
        $xml .= "<url><loc>{$url}</loc><lastmod>{$date}</lastmod><priority>0.80</priority></url>";

        $goodsCategories = GoodsCategory::select(['id','updated_at'])->get();
        foreach ($goodsCategories as $category) {

            $date = date("Y-m-d",strtotime($category->updated_at));
            $url = store_category_path($category->id);
            $xml .= "<url><loc>{$url}</loc><lastmod>{$date}</lastmod><priority>0.80</priority></url>";

        }

        $goods = Goods::select(['id','updated_at'])->get();
        foreach ($goods as $item) {

            $date = date("Y-m-d",strtotime($item->updated_at));
            $url = goods_path($item->id);
            $xml .= "<url><loc>{$url}</loc><lastmod>{$date}</lastmod><priority>0.80</priority></url>";

        }

        $array = pipeline_func([],"site_map");

        foreach ($array as $item) {

            $xml .= "<url><loc>{$item['url']}</loc><lastmod>{$item['date']}</lastmod><priority>0.80</priority></url>";
        }

        $xml .= '</urlset>';

        $result = Storage::disk('root')->put('public/sitemap/sitemap.xml',$xml);

        return $this->result($result);

    }

}
