<?php


namespace Modules\Cms\Http\Controllers\Web;


use App\Helpers\ViewHelpers;
use App\Http\Controllers\MyController;
use Modules\Cms\Http\Requests\ArticleCommentRequest;
use Modules\Cms\Models\Article;
use Modules\Cms\Models\ArticleCategory;
use Modules\Cms\Models\ArticleComment;
use Modules\Cms\Models\ArticleTag;

class CmsController extends MyController
{

    use ViewHelpers;

    public function index()
    {
        is_home(system_config());

        return $this->theme('index');
    }

    public function category($id)
    {
        $category = ArticleCategory::find($id);

        if (empty($category)) {
            abort(404);
        }

        is_category($category);

        return $this->theme($this->cmsCategoryTemplate($category), compact('category'));
    }

    public function single($id)
    {
        $article = article($id);

        if (empty($article)) {
            abort(404);
        }

        is_single($article);

        $config = system_config([], 'cms');

        return $this->theme($this->cmsArticleTemplate($article), compact('article', 'config'));
    }


    public function tag($id)
    {
        $tag = ArticleTag::find($id);

        if (empty($tag)) {
            abort(404);
        }

        is_tag($tag);

        return $this->theme('tag', compact('tag'));
    }

    public function search($keyword)
    {
        $keyword = $this->filter($keyword, '');

        is_search($keyword);

        return $this->theme('search', compact('keyword'));
    }

    public function createComment(ArticleCommentRequest $request)
    {
        $config = system_config([], 'cms');

        if (isset($config['is_allow_comment']) && $config['is_allow_comment'] == 1) {

            $data = $request->validated();
            $content = strip_tags(paramFilter($data['content']));

            $article = Article::find($data['single_id']);

            if (!$article) {
                return $this->result(false, ['msg' => '非法参数.']);
            }

            $pid = $data['parent_id'];
            $rid = 0;

            if ($pid > 0) {

                $obj = comment($pid, $data['single_id']);

                if (!$obj) {
                    return $this->result(false, ['msg' => '非法参数.']);
                }

                $rid = $obj->parent_id == 0 ? $obj->id : $obj->root_id;
            }

            $comment = [
                'single_id' => $data['single_id'],
                'user_id' => auth()->user()->id,
                'root_id' => $rid,
                'parent_id' => $pid,
                'status' => isset($config['is_auto_status']) && $config['is_auto_status'] == 1 ? 1 : 0,
                'content' => $content,
            ];

            $result = (new ArticleComment())->store($comment);
            return $this->result($result);
        }

        return $this->result(false);

    }
}
