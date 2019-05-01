<?php
namespace app\api\controller\v1;

use app\api\model\Product as ProductModel;
use app\api\validate\Count;
use app\api\validate\IDMustBePositiveInt;
use app\api\validate\PagingParameter;
use app\lib\exception\ParameterException;
use app\lib\exception\ProductException;
use app\lib\exception\ThemeException;
use think\Controller;

class Product extends Controller
{
    protected $beforeActionList = [
        'checkSuperScope' => ['only' => 'createOne,deleteOne']
    ];

    /**
     * 获取某分类下全部商品(不分页）
     * @url /product/all?id=:category_id
     * @param int $id 分类id号
     * @return \think\Paginator
     * @throws ThemeException
     */
    public function getAllInCategory($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $products = ProductModel::getProductsByCategoryID($id);
        if ($products->isEmpty())
        {
            throw new ThemeException();
        }
        $data = $products->hidden(['summary'])->toArray();
        return $data;
    }

    /**
     * 获取指定数量的最近商品
     * @url /product/recent?count=:count
     * @param int $count
     * @return mixed
     * @throws ParameterException
     */
    public function getRecent($count = 15)
    {
        (new Count())->goCheck();
        $products = ProductModel::getMostRecent($count);
        if ($products->isEmpty())
        {
           throw new ParameterException();
        }
        $products = $products->hidden(
            [
                'summary'
            ])
            ->toArray();
        return $products;
    }

    /**
     * 获取商品详情
     * 如果商品详情信息很多，需要考虑分多个接口分布加载
     * @url /product/:id
     * @param int $id 商品id号
     * @return Product
     * @throws ProductException
     */
    public function getOne($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $product = ProductModel::getProductDetail($id);
        if (!$product)
        {
            throw new ProductException();
        }
        return $product;
    }

    public function createOne()
    {
        $product = new ProductModel();
        $product->save(
            [
                'id' => 1
            ]);
    }

    public function deleteOne($id)
    {
        ProductModel::destroy($id);
    }

}