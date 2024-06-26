<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Đảm bảo rằng bạn đã thêm use DB
class ShopController extends Controller
{
    public function index(Category $category)
    {
        // Lấy tất cả các danh mục con của danh mục cha được chuyển vào
        $categories = Category::where('parent_id', $category->parent_id)->get();
        $shop = Product::orderBy('id', 'asc')->get();
        // Trả về view 'shop' với các biến dữ liệu compact
        return view('Fe.Shop.shop', compact('shop', 'categories'));
    }
    public function filterByCategory($id, Request $request)
    {
        try {
            $selectedCategories = $request->input('categories', []);
            $products = collect();
            if ($id == 'all') {
                $products = Product::orderBy('id', 'asc')->get();
            } elseif ($selectedCategories) {
                foreach ($selectedCategories as $categoryId) {
                    $category = Category::with('children.products.variants')->findOrFail($categoryId);
                    foreach ($category->children as $childCategory) {
                        $products = $products->merge($childCategory->products);
                    }
                }
            } else {
                $products = Product::orderBy('id', 'asc')->get();
            }
            $formattedProducts = $products->map(function ($product) {
                return [
                    'category' => $product->category->name ?? '',
                    'variants' => $product->variants->toArray(),
                ];
            });
            return response()->json([
                'products' => $products,
                'image_path' => asset('storage/images')
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function filter(Request $request)
    {
        try {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');

            $products = Product::whereHas('variants', function ($query) use ($minPrice, $maxPrice) {
                $query->whereBetween('price', [$minPrice, $maxPrice]);
            })->with('category')->get();
            $formattedProducts = $products->map(function ($product) {
                return [
                    'category' => $product->category->name ?? '',
                    'variants' => $product->variants->toArray(),
                ];
            });
            return response()->json([
                'products' => $products,
                'image_path' => asset('storage/images')
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Server Error'], 500);
        }
    }
    public function filter_name(Request $request)
    {
        $sort = $request->input('sort'); // Lấy giá trị của tham số 'sort' từ request

        $query = Product::with(['variants' => function ($query) {
            $query->select('id', 'product_id', 'price', 'sale_price'); // Chỉ lấy các trường id, product_id, price từ bảng variants
        }]);

        switch ($sort) {
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'price_asc':
                $query->orderBy(DB::raw('(SELECT MIN(sale_price)
                 FROM productvariants WHERE product_id = products.id)'), 'asc');
                // $query->leftJoin('productvariants', 'products.id', '=', 'productvariants.product_id')
                //     ->select('products.id', 'products.name', 'products.created_at', 'products.updated_at', DB::raw('MIN(productvariants.price) as min_price'))
                //     ->groupBy('products.id', 'products.name', 'products.created_at', 'products.updated_at')
                //     ->orderBy('min_price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy(DB::raw('(SELECT MAX(sale_price)
                FROM productvariants WHERE product_id = products.id)'), 'desc');
                break;
            case 'best_selling':
                // Giả sử bạn có một cột 'sales_count' trong bảng 'products'
                $query->orderBy('sales_count', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        $products = $query->get();
        $formattedProducts = $products->map(function ($product) {
            return [
                'category' => $product->category->name ?? '',
                'variants' => $product->variants->toArray(),
            ];
        });
        return response()->json([
            'products' => $products,
            'image_path' => asset('storage/images')
        ]);
    }
}
