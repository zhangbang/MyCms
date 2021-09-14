<?php


namespace Addons\SiteMap\Controllers;


use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Storage;
use Modules\Cms\Models\ArticleTag;
use Modules\Cms\Service\ArticleService;

class SiteMapController extends MyController
{

    public function index()
    {
        return $this->view('admin.index');
    }

    public function make()
    {

        $xml = '<?xml version="1.0" encoding="utf-8"?>';
        $xml .= '<urlset>';

        foreach (cms_categories() as $category) {

            $url = cms_category_path($category->id);
            $xml .= "<url><loc>{$url}</loc></url>";

        }

        $ids = (new ArticleService())->ids();
        foreach ($ids as $id) {

            $url = cms_single_path($id);
            $xml .= "<url><loc>{$url}</loc></url>";

        }

        $ids = ArticleTag::select(['id'])->get()->toArray();
        foreach ($ids as $id) {

            $url = cms_tag_path($id);
            $xml .= "<url><loc>{$url}</loc></url>";

        }

        $xml .= '</urlset>';

        $result = Storage::disk('root')->put('public/sitemap/sitemap.xml',$xml);

        return $this->result($result);

    }

}
