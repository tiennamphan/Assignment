<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
        public function list(){
        $products = Product::query()
        ->orderBy('id', 'desc')
        ->paginate(5);

        return view('admin.products.list', compact('products'));
    }

    public function add(){
        $categories = Category::all();
        return view('admin.products.add', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'content' => 'required|nullable|string',

        ], [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'name.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'image.required' => 'Ảnh sản phẩm là bắt buộc.',
            'image.image' => 'Ảnh phải là một hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg, hoặc gif.',
            'image.max' => 'Ảnh không được lớn hơn 2MB.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là số.',
            'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 0.',
            'content.required' => 'Nội dung sản phẩm là bắt buộc.',
            'content.string' => 'Nội dung phải là chuỗi ký tự.',


        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Lưu hình ảnh vào thư mục 'public/images' và lưu đường dẫn
            $path_image = $request->file('image')->store('images', 'public');
            $data['image'] = $path_image;
        } else {
            $data['image'] = '';
        }

        Product::query()->create($data);
        return redirect()->route('admin.products.list')->with('message', 'Thêm dữ liệu thành công');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.list')->with('message', 'Xóa dữ liệu thành công');
    }


    public function edit(Product $product){

        $categories = Category::all();
        return view('admin.products.edit', compact('categories','product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'content' => 'required|nullable|string',

        ], [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'name.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'image.image' => 'Ảnh phải là một hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg, hoặc gif.',
            'image.max' => 'Ảnh không được lớn hơn 2MB.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là số.',
            'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 0.',
            'content.required' => 'Nội dung sản phẩm là bắt buộc.',
            'content.string' => 'Nội dung phải là chuỗi ký tự.',


        ]);
        $data = $request->except('image');

        // Lưu ảnh cũ
        $old_image = $product->image;

        // Xử lý ảnh mới nếu có
        if ($request->hasFile('image')) {
            // Lưu hình ảnh mới vào thư mục 'public/images' và lưu đường dẫn
            $path_image = $request->file('image')->store('images', 'public');
            $data['image'] = $path_image;

            // Xóa ảnh cũ nếu tồn tại
            // if (file_exists(storage_path('app/public/' . $old_image))) {
            //     unlink(storage_path('app/public/' . $old_image));
            // }
        } else {
            // Nếu không có ảnh mới, giữ nguyên ảnh cũ
            $data['image'] = $old_image;
        }

        // Cập nhật dữ liệu của product
        $product->update($data);

        return redirect()->route('admin.product.edit', $product)->with('message', 'Cập nhật dữ liệu thành công');
    }



}

