<?php


namespace Addons\SiteMap\Controllers;


use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Storage;
use Modules\Cms\Models\Article;
use Modules\Cms\Models\ArticleTag;

class SiteMapController extends MyController
{

    public function index()
    {
        return $this->view('admin.index');
    }

    public function make()
    {

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $siteUrl = system_config('site_url');
        $date = date("Y-m-d");

        $xml .= "<url><loc>{$siteUrl}</loc><lastmod>{$date}</lastmod></url>";

        foreach (cms_categories() as $category) {

            $date = date("Y-m-d",strtotime($category->updated_at));
            $url = cms_category_path($category->id);
            $xml .= "<url><loc>{$url}</loc><lastmod>{$date}</lastmod></url>";

        }

        $articles = Article::select(['id','updated_at'])->get();;
        foreach ($articles as $article) {

            $date = date("Y-m-d",strtotime($article->updated_at));
            $url = cms_single_path($article->id);
            $xml .= "<url><loc>{$url}</loc><lastmod>{$date}</lastmod></url>";

        }

        $tags = ArticleTag::select(['id','updated_at'])->get();
        foreach ($tags as $tag) {

            $date = date("Y-m-d",strtotime($tag->updated_at));
            $url = cms_tag_path($tag->id);
            $xml .= "<url><loc>{$url}</loc><lastmod>{$date}</lastmod></url>";

        }

        $xml .= '</urlset>';

        $result = Storage::disk('root')->put('public/sitemap/sitemap.xml',$xml);

        return $this->result($result);

    }

}
