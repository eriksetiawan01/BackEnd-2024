<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan semua data berita
        $news = News::all();

        // Jika data berita kosong
        if ($news->isEmpty()) {
            return response()->json([
                'message' => 'Data is empty'
            ], 404);
        }

        // Mengembalikan data berita
        return response()->json([
            'message' => 'Get All Resource',
            'data' => $news
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function search($title) 
    {
    // Mencari berita berdasarkan title / judul
    $news = News::where('title', $title)->get();

    // Menghandel jika data berita tidak ditemukan
    if ($news->isEmpty()) {
        return response()->json([
            'message' => 'Resource not found'
        ], 404);
    }

    // Jika ditemukan, kembalikan hasil pencarian
    return response()->json([
        'message' => 'Get searched resource',
        'data' => $news
    ], 200);
}

    public function getSportNews()
    {
        // mencari berita berdasarkan kategori sport
        $news = News::where('category', 'sport')->get();
        $count = $news->count();

        // Menghandle jika data tidak ada / tidak ditemukan
        if ($news->isEmpty()) {
            return response()->json([
                'message' => 'No news found in sport category'
            ], 404);
        }

        // jika data ditemukan
        return response()->json([
            'message' => 'Get sport resource',
            'total' => $count . ' Berita',
            'data' => $news
        ], 200);
    }

    public function getFinanceNews()
    {
        // Mencari berita berdasarkan kategori finance 
        $news = News::where('category', 'finance')->get();
        $count = $news->count();

        // Menghandle jika data tidak ada / tidak ditemukan
        if ($news->isEmpty()) {
            return response()->json([
                'message' => 'No news found in finance category'
            ], 404);
        }

        // Jika Data Ditemukan
        return response()->json([
            'message' => 'Get finance resource',
            'total' => $count . ' Berita',
            'data' => $news
        ], 200);
    }

    public function getAutomotiveNews()
    {
        // Mencari berita berdasarkan kategori automotive
        $news = News::where('category', 'automotive')->get();
        $count = $news->count();
        
        // Menghandle jika data tidak ada / tidak ditemukan
        if ($news->isEmpty()) {
            return response()->json([
                'message' => 'No news found in finance category'
            ], 404);
        }

        // Jika Data Ditemukan
        return response()->json([
            'message' => 'Get automotive resource',
            'total' => $count . ' Berita',
            'data' => $news
        ], 200);
    }


    public function store(Request $request)
    {
        // Memvalidasi data
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'content' => 'required',
            'url' => 'required',
            'url_image' => 'required',
            'published_at' => 'date|required',
            'category' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = News::create($request->all());

        $data = [
            'message' => 'Resource is added successfully',
            'data' => $data,
        ];

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mencari data berdasarkan id
        $news = News::find($id);

        if ($news) {
            $data = [
                'message' => 'Get Detail Resource',
                'data' => $news,
            ];

            // Mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found',
            ];

            //Mengembalikan data (json) dan kode 404
            return response()->json($data, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Cari student berdasarkan ID
    $news = News::find($id);

    if ($news) {
        
        $input = [
            'title' => $request->title ?? $news->title,
            'author' => $request->author ?? $news->author,
            'description' => $request->description ?? $news->description,
            'content' => $request->content ?? $news->content,
            'url' => $request->url ?? $news->url,
            'url_image' => $request->url_image ?? $news->url_image,
            'published_at' => $request->published_at ?? $news->published_at,
            'category' => $request->category ?? $news->category,
        ];

    // Mengubah data berita
    $news->update($input);

    $data = [
        'message' => 'Resource is update successfully',
        'data' => $news
    ];

    // mengembalikan data (json) dan kode 200
    return response()->json($data, 200);
    } else {
        $data = [
            'message' => 'Resource not found'
        ];

        return response()->json($data, 404);
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari data berita berdasarkan id
    $news = News::find($id);

    if ($news) {
        // Hapus berita tersebut
        $news->delete();

        $data = [
            'message' => 'Resource is delete successfully'
        ];

        // Mengembalikan data (json) dan kode 200
        return response()->json($data, 200);
    } else {
        $data = [
            'message' => 'Resource not found'
        ];

        return response()->json($data, 404);
    }
    }
}
