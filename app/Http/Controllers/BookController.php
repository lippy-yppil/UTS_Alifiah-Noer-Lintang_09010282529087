<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'max:255'],
            'author'      => ['required', 'string', 'max:255'],
            'publisher'   => ['required', 'string', 'max:255'],
            'year'        => ['required', 'integer', 'min:1000', 'max:' . date('Y')],
            'stock'       => ['required', 'integer', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }

    public function index(Request $request)
    {
        $books = Book::with('category')
            ->when($request->q, function ($query, $search) {
                $query->where(function ($w) use ($search) {
                    $w->where('title', 'like', "%{$search}%")
                      ->orWhere('author', 'like', "%{$search}%");
                });
            })
            ->when($request->category, fn ($query, $cat) => $query->where('category_id', $cat))
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('books.index', [
            'books'      => $books,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function create()
    {
        return view('books.create', ['categories' => Category::orderBy('name')->get()]);
    }

    public function store(Request $request)
    {
        Book::create($request->validate($this->rules()));

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(Book $book)
    {
        $book->load('category');

        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', [
            'book'       => $book,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->validate($this->rules()));

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}