<?php


namespace Modules\Shop\Http\Requests;


use App\Http\Requests\MyRequest;

class GoodsRequest extends MyRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required'],
            'goods_name' => ['required', 'max:255'],
            'goods_image' => ['required', 'max:255'],
            'shop_price' => ['required', 'numeric'],
            'market_price' => ['numeric'],
            'content' => ['required'],
            'description' => ['max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => '请选择分类',
            'goods_image.required' => '请上传缩略图',
            'goods_name.required' => '名称必须填写',
            'goods_name.max' => '名称长度错误',
            'shop_price.required' => '售价必须填写',
            'shop_price.numeric' => '售价格式错误',
            'market_price.numeric' => '市场价格式错误',
            'description.max' => '描述长度错误',
            'content.required' => '请输入内容',
        ];
    }
}
