<?php

namespace App\Http\Controllers\Api;

use App\Models\Review;
use App\Models\Product;
use App\Models\Dtos\ProductRateDto;
use App\Http\Controllers\Controller;
use App\Models\Dtos\ProductFilterDto;

class ProductFilterApi extends Controller
{

    public function productFilter()
    {
        //http://localhost/QLBanGiay/api/v1/product-filter?filter=(;gender=1-2;color=5-1;price=1000000-2000000;sort=Popularity;limit=3;currentPage=1;)
        $filterString = request('filter');

        $filterString = trim($filterString, '()');
        $filterArray = explode(';', $filterString);
        $query = Product::query();

        $this->handleFilter($filterArray, $query);
        $query = $this->setSort($filterString, $query);
        $count = $query->count();
        $products = new ProductFilterDto();
        $limit = $this->getLimitValue($filterString);
        $offset = $this->getOffsetValue($filterString,$limit,$count);
        if ($limit) {
            $query->offset($offset)->limit($limit);
            // dd();
            $products->setCurrentPage((int)(($offset+1)/ $limit) + 1);
            $products->setPageTotal((int)ceil($count / $limit));
        }else{
            $products->setCurrentPage(1);
            $products->setPageTotal(1);
        }

        $filteredProducts = $query->get()->toArray();
        $arrProducts = [];

        foreach ($filteredProducts as $fp) {
            $productRate = new ProductRateDto();
            $ratingQuery = clone $query; // Clone the query to avoid modifying the original

            $rating = Review::where('product_id', $fp['id'])->avg('rate');

            $productRate->setProduct($fp);
            
            if ($rating) {
                $formattedRating = round(floatval($rating), 1);
                $productRate->setRating($formattedRating);
            } else {
                $productRate->setRating(0.0);
            }
            

            $arrProducts[] = $productRate;
        }

        $products->setProducts($arrProducts);

        return response()->json($products);

    }

    private function handleFilter(array $filterArray, $query)
    {
        foreach ($filterArray as $filterItem) {
            $filterParts = explode('=', $filterItem, 2);
            if (count($filterParts) >= 2) {
                list($key, $value) = $filterParts;
                switch ($key) {
                    case 'color':
                        $colorArray = explode('-', str_replace(' ', '', $value));
                        $colorArray = array_filter($colorArray, 'strlen');
                        $query->whereIn('color_id', $colorArray);
                        break;
                    case 'gender':
                        $genderArray = explode('-', str_replace(' ', '', $value));
                        $genderArray = array_filter($genderArray, 'strlen');
                        $query->whereIn('gender_id', $genderArray);
                        break;
                    case 'price':
                        $priceArray = explode('-', str_replace(' ', '', $value));
                        $priceArray = array_filter($priceArray, 'strlen');
                        if (count($priceArray) == 1) {
                            $query->where('export_price', '>', $priceArray[0]);
                        } elseif (count($priceArray) == 2) {
                            $query->whereBetween('export_price', $priceArray);
                        }
                        break;
                }
            } else {
            }
        }
    }    

    private function setSort($filter, $query)
    {
        $sort = $this->getSortValue($filter);

        switch ($sort) {
            case 'Phổ biến':
                $query->orderByDesc(function ($query) {
                    return $query->from('order_details')
                        ->whereColumn('products.id', 'order_details.product_id')
                        ->selectRaw('COUNT(*)');
                });
                break;
            case 'Đánh giá trung bình':
                $query->orderByDesc(function ($query) {
                    return $query->from('reviews')
                        ->whereColumn('products.id', 'reviews.product_id')
                        ->selectRaw('AVG(rate)');
                });
                break;
            case 'Mới nhất':
                $query->orderBy('id', 'desc');
                break;
            case 'Giá: tăng dần':
                $query->orderBy('export_price', 'asc');
                break;
            case 'Giá: giảm dần':
                $query->orderBy('export_price', 'desc');
                break;
        }

       
        return $query;
    }

    private function getSortValue($filter)
    {
        $sort = null;
        $filters = explode(';', $filter);
    
        foreach ($filters as $filterItem) {
            $filterParts = explode('=', $filterItem, 2);
            if (count($filterParts) >= 2) {
                list($key, $value) = $filterParts;
                if ($key === 'sort') {
                    $sort = $value;
                    break;
                }
            } else {
            }
        }
    
        return $sort;
    }

    private function getLimitValue($filter)
    {
        $limit = null;
        $filters = explode(';', $filter);

        foreach ($filters as $filterItem) {
            $filterParts = explode('=', $filterItem, 2);
            if (count($filterParts) >= 2) {
                list($key, $value) = $filterParts;
                if ($key === 'limit') {
                    if (is_numeric($value) && (int)$value == $value) {
                        $limit = (int)$value;
                        break;
                    }
                }
            } else {
            }
        }

        return $limit;
    }
    
    private function getOffsetValue($filter,$limit,$total)
    {
        $offset = null;

        $filters = explode(';', $filter);

        foreach ($filters as $filterItem) {
            $filterParts = explode('=', $filterItem, 2);
            if (count($filterParts) >= 2) {
                list($key, $value) = $filterParts;
                if ($key === 'currentPage') {
                    if($limit){
                        if (is_numeric($value) && (int)$value == $value) {
                            $currentPage = (int)$value <= 0 ? 1 : (int)$value;
                            $offset = $limit * ($currentPage - 1) - 1;
                            $offset  = $offset <= 0 ? 0 : $offset; 
                            // dd($offset);
                            break;
                        }
                    }
                }
            }
        }
        return $offset;
    }

}