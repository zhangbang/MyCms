@include("system::admin.layouts._header")
<body>
<div class="layuimini-container">
    <div class="layuimini-main" id="app">

        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <li class="layui-this">SEO设置</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <form id="app-form" class="layui-form layuimini-form" method="post">
                        <div class="layui-form-item">
                            <label class="layui-form-label ">站点标题</label>
                            <div class="layui-input-block">
                                <input type="text" name="seo_site_title" class="layui-input" placeholder="填写站点标题" value="{{$seoConfig['seo_site_title'] ?? ''}}">
                                <tip>填写站点标题，<em style="color: red">{page}</em>:为 " - 第X页"</tip>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">站点关键词</label>
                            <div class="layui-input-block">
                                <input type="text" name="seo_site_keyword" class="layui-input"  placeholder="请输入站点关键词" value="{{$seoConfig['seo_site_keyword'] ?? ''}}">
                                <tip>请输入站点关键词</tip>
                            </div>
                        </div>

                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">站点描述</label>
                            <div class="layui-input-block">
                                <textarea name="seo_site_description" class="layui-textarea">{{$seoConfig['seo_site_description'] ?? ''}}</textarea>
                            </div>
                        </div>

                        <div class="hr-line"></div>

                        <div class="layui-form-item">
                            <label class="layui-form-label ">分类标题</label>
                            <div class="layui-input-block">
                                <input type="text" name="seo_category_title" class="layui-input" placeholder="填写分类标题" value="{{$seoConfig['seo_category_title'] ?? ''}}">
                                <tip>填写分类标题.<em style="color: red">{name}</em>:为分类名，<em style="color: red">{description}</em>为分类描述，<em style="color: red">{page}</em>:为 " - 第X页"</tip>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">分类关键词</label>
                            <div class="layui-input-block">
                                <input type="text" name="seo_category_keyword" class="layui-input"  placeholder="请输入分类关键词" value="{{$seoConfig['seo_category_keyword'] ?? ''}}">
                                <tip>请输入分类关键词</tip>
                            </div>
                        </div>

                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">分类描述</label>
                            <div class="layui-input-block">
                                <textarea name="seo_category_description" class="layui-textarea">{{$seoConfig['seo_category_description'] ?? ''}}</textarea>
                            </div>
                        </div>

                        <div class="hr-line"></div>

                        <div class="layui-form-item">
                            <label class="layui-form-label ">文章标题</label>
                            <div class="layui-input-block">
                                <input type="text" name="seo_single_title" class="layui-input" placeholder="填写文章标题" value="{{$seoConfig['seo_single_title'] ?? ''}}">
                                <tip>填写文章标题.<em style="color: red">{name}</em>:为文章标题，<em style="color: red">{description}</em>为文章描述，<em style="color: red">{tags}</em>:为文章标签，<em style="color: red">{category}</em>:为文章分类，<em style="color: red">{author}</em>:为文章作者</tip>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">文章关键词</label>
                            <div class="layui-input-block">
                                <input type="text" name="seo_single_keyword" class="layui-input"  placeholder="请输入文章关键词" value="{{$seoConfig['seo_single_keyword'] ?? ''}}">
                                <tip>请输入文章关键词</tip>
                            </div>
                        </div>

                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">文章描述</label>
                            <div class="layui-input-block">
                                <textarea name="seo_single_description" class="layui-textarea">{{$seoConfig['seo_single_description'] ?? ''}}</textarea>
                            </div>
                        </div>


                        <div class="hr-line"></div>

                        <div class="layui-form-item">
                            <label class="layui-form-label ">标签标题</label>
                            <div class="layui-input-block">
                                <input type="text" name="seo_tag_title" class="layui-input" placeholder="填写标签标题" value="{{$seoConfig['seo_tag_title'] ?? ''}}">
                                <tip>填写标签标题.<em style="color: red">{name}</em>:为标签名称，<em style="color: red">{description}</em>为标签描述，<em style="color: red">{page}</em>:为 " - 第X页"</tip>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">标签关键词</label>
                            <div class="layui-input-block">
                                <input type="text" name="seo_tag_keyword" class="layui-input"  placeholder="请输入标签关键词" value="{{$seoConfig['seo_tag_keyword'] ?? ''}}">
                                <tip>请输入标签关键词</tip>
                            </div>
                        </div>

                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">标签描述</label>
                            <div class="layui-input-block">
                                <textarea name="seo_tag_description" class="layui-textarea">{{$seoConfig['seo_tag_description'] ?? ''}}</textarea>
                            </div>
                        </div>



                        <div class="hr-line"></div>

                        <div class="layui-form-item">
                            <label class="layui-form-label ">搜索标题</label>
                            <div class="layui-input-block">
                                <input type="text" name="seo_search_title" class="layui-input" placeholder="填写搜索标题" value="{{$seoConfig['seo_search_title'] ?? ''}}">
                                <tip>填写搜索标题.<em style="color: red">{keyword}</em>:为关键词，<em style="color: red">{page}</em>:为 " - 第X页"</tip>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">搜索关键词</label>
                            <div class="layui-input-block">
                                <input type="text" name="seo_search_keyword" class="layui-input"  placeholder="请输入搜索关键词" value="{{$seoConfig['seo_search_keyword'] ?? ''}}">
                                <tip>请输入关键词</tip>
                            </div>
                        </div>

                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">搜索描述</label>
                            <div class="layui-input-block">
                                <textarea name="seo_search_description" class="layui-textarea">{{$seoConfig['seo_search_description'] ?? ''}}</textarea>
                            </div>
                        </div>



                        <div class="hr-line"></div>

                        <div class="layui-form-item">
                            <label class="layui-form-label ">商城标题</label>
                            <div class="layui-input-block">
                                <input type="text" name="seo_store_title" class="layui-input" placeholder="填写商城标题" value="{{$seoConfig['seo_store_title'] ?? ''}}">
                                <tip>填写商城标题.<em style="color: red">{page}</em>:为 " - 第X页"</tip>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">商城关键词</label>
                            <div class="layui-input-block">
                                <input type="text" name="seo_store_keyword" class="layui-input"  placeholder="请输入商城关键词" value="{{$seoConfig['seo_store_keyword'] ?? ''}}">
                                <tip>请输入关键词</tip>
                            </div>
                        </div>

                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">商城描述</label>
                            <div class="layui-input-block">
                                <textarea name="seo_store_description" class="layui-textarea">{{$seoConfig['seo_store_description'] ?? ''}}</textarea>
                            </div>
                        </div>



                        <div class="hr-line"></div>

                        <div class="layui-form-item">
                            <label class="layui-form-label ">商城分类标题</label>
                            <div class="layui-input-block">
                                <input type="text" name="seo_store_category_title" class="layui-input" placeholder="填写商城分类标题" value="{{$seoConfig['seo_store_category_title'] ?? ''}}">
                                <tip>填写商城分类标题.<em style="color: red">{name}</em>:为分类名，<em style="color: red">{description}</em>为分类描述，<em style="color: red">{page}</em>:为 " - 第X页"</tip>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">商城分类关键词</label>
                            <div class="layui-input-block">
                                <input type="text" name="seo_store_category_keyword" class="layui-input"  placeholder="请输入商城关键词" value="{{$seoConfig['seo_store_category_keyword'] ?? ''}}">
                                <tip>请输入分类关键词</tip>
                            </div>
                        </div>

                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">商城分类描述</label>
                            <div class="layui-input-block">
                                <textarea name="seo_store_category_description" class="layui-textarea">{{$seoConfig['seo_store_category_description'] ?? ''}}</textarea>
                            </div>
                        </div>


                        <div class="hr-line"></div>

                        <div class="layui-form-item">
                            <label class="layui-form-label ">商品标题</label>
                            <div class="layui-input-block">
                                <input type="text" name="seo_store_goods_title" class="layui-input" placeholder="填写商品标题" value="{{$seoConfig['seo_store_goods_title'] ?? ''}}">
                                <tip>填写商品标题.<em style="color: red">{name}</em>:为商品标题，<em style="color: red">{description}</em>为商品描述，<em style="color: red">{category}</em>:为商品分类</tip>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">商品关键词</label>
                            <div class="layui-input-block">
                                <input type="text" name="seo_store_goods_keyword" class="layui-input"  placeholder="请输入商品关键词" value="{{$seoConfig['seo_store_goods_keyword'] ?? ''}}">
                                <tip>请商品关键词</tip>
                            </div>
                        </div>

                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">商品描述</label>
                            <div class="layui-input-block">
                                <textarea name="seo_store_goods_description" class="layui-textarea">{{$seoConfig['seo_store_goods_description'] ?? ''}}</textarea>
                            </div>
                        </div>

                        <div class="hr-line"></div>
                        <div class="layui-form-item text-center">
                            <button type="submit" class="layui-btn layui-btn-normal layui-btn-sm" lay-submit>确认</button>
                            <button type="reset" class="layui-btn layui-btn-primary layui-btn-sm">重置</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>

    </div>
</div>
</body>
</html>
