<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $News = News::orderBy('id', 'desc')->paginate(5);
        return view('admin.news.list', compact('News'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Lấy tất cả các danh mục
        return view('admin.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_date' => 'required|date',
            'views' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;

        try {
            DB::transaction(function () use ($validatedData, &$imagePath) {
                if (request()->hasFile('image')) {
                    $imagePath = request()->file('image')->store('public');
                }

                News::create([
                    'category_id' => $validatedData['category_id'],
                    'title' => $validatedData['title'],
                    'content' => $validatedData['content'],
                    'published_date' => $validatedData['published_date'],
                    'views' => $validatedData['views'] ?? 0,
                    'image' => $imagePath,
                ]);
            }, 3);

            return redirect()->route('news.list')->with('success', 'Tin tức đã được tạo thành công!');
        } catch (Exception $exception) {
            // Xử lý lỗi và xóa hình ảnh nếu cần
            if ($imagePath && Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }

            return back()->with('error', 'Đã xảy ra lỗi: ' . $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.detail', compact('news'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail($id);
        $categories = Category::all();
        return view('admin.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_date' => 'required|date',
            'views' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $news = News::findOrFail($id);
        $imagePath = $news->image;

        try {
            DB::transaction(function () use ($news, $validatedData, &$imagePath) {
                if (request()->hasFile('image')) {
                    // Delete old image if exists
                    if ($news->image && Storage::exists($news->image)) {
                        Storage::delete($news->image);
                    }
                    $imagePath = request()->file('image')->store('public');
                }

                $news->update([
                    'category_id' => $validatedData['category_id'],
                    'title' => $validatedData['title'],
                    'content' => $validatedData['content'],
                    'published_date' => $validatedData['published_date'],
                    'views' => $validatedData['views'] ?? 0,
                    'image' => $imagePath,
                ]);
            }, 3);

            return redirect()->route('news.list')->with('success', 'Tin tức đã được cập nhật thành công!');
        } catch (Exception $exception) {
            return back()->with('error', 'Đã xảy ra lỗi: ' . $exception->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);

        try {
            DB::transaction(function () use ($news) {
                if ($news->image && Storage::exists($news->image)) {
                    Storage::delete($news->image);
                }

                // Delete the news item
                $news->delete();
            }, 3);

            return back()->with('success', 'Tin tức đã được xóa thành công!');
        } catch (Exception $exception) {
            return back()->with('error', 'Đã xảy ra lỗi: ' . $exception->getMessage());
        }
    }
}
