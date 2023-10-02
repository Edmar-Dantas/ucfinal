@extends('layouts.main')
@section('title', 'Home')

@section('content')

<div class="container">
    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-2">           
                <div class="card">
                    @if (isset($book->volumeInfo->imageLinks->thumbnail))
                    <img style="height: 280px" src="{{ $book->volumeInfo->imageLinks->thumbnail }}" alt="{{ $book->volumeInfo->title }}">
                    @else
                    <img  style="height: 280px" src="/imagens/nofoto.jpg" >
                    @endif
                    <!-- Conteúdo do livro -->
                    <div class="card-body">
                    {{ Illuminate\Support\Str::limit($book->volumeInfo->title, $limite = 50, $terminador = '...') }}
                    </div>
                    @if(isset($book->volumeInfo->description))
                    <p class="card-text"><span class="description-card">{{ Illuminate\Support\Str::limit($book->volumeInfo->description, $limite = 70, $terminador = '...')}}</span></p><br>
                    @else
                    <p class="card-text">"Sem descrição"</p>
                    @endif
                    </p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $book->id}}">  
                    Avaliar
                    </button>

                    @include('modals.avaliarModal')
                    
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection