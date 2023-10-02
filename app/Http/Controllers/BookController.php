<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Book;

class BookController extends Controller
{
    public function search(Request $request){
        $q = $request->input('q');
        $apiKey = 'AIzaSyDjqw6XsBbtmIghVRu0idl49Mf6lvbf5JI';
        $client = new Client();
        $response = $client->get('https://www.googleapis.com/books/v1/volumes', [
            'query' => [
                'q' => $q,
                'key' => $apiKey,
            ],
        ]);
         
        $cadastrados = Book::all();
        $books= json_decode($response->getBody())->items;

        return view('content', ['books' => $books, 'cadastrados' => $cadastrados]);
    }

    public function avaliar(Request $request){
        $id = $request->input('id');
        $reacao = $request->input('reacao');
        $book = Book::where('idGoogle', $id)->first();
        if($book){
            $book->increment($reacao, 1);
            return view('home');
        }else{
            $newBook = new Book;
            $newBook->idGoogle = $id;
            $newBook->$reacao = 1;
            $newBook->save();
            return view('home');
        }
    }
    
    public function buscarLivro(Request $request){
        $id = $request->input('id');
        $data = Book::where('idGoogle', $id)->first();
        return response()->json($dados);
    }
}
