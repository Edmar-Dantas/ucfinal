<!-- Modal -->

  <div class="modal fade" id="staticBackdrop-{{$book->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel{{ $book->volumeInfo->title }}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">{{$book->volumeInfo->title}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if(isset($book->volumeInfo->description))
            {{$book->volumeInfo->description}}
            @else
            Sem descrição
            @endif
        </div>
        <div class="modal-footer">
          <!--Emotions-->
          <!--Plot Twist-->
          <form method="POST" action="{{route('avaliar')}}">
            @csrf
            <input type="hidden" name="reacao" value="plot">
            <input type="hidden" name="id" value="{{$book->id}}"> <!--O ID do livro-->
              <button class="noconfig" >
                <picture>
                  <source srcset="https://fonts.gstatic.com/s/e/notoemoji/latest/1f92f/512.webp" type="image/webp">
                  <img src="https://fonts.gstatic.com/s/e/notoemoji/latest/1f92f/512.gif" alt="🤯" width="52" height="52">
                </picture>
                <?php $count = 0?>            
                @foreach($cadastrados as $cadastrado)
                @if($book->id == $cadastrado->idGoogle)
                <p>{{$cadastrado->plot}}</p>
                <?php
                $count = $count + 1;?>
                @endif
                @endforeach
                @if($count == 0)
                <p>0</p>
                @endif
              </button>
          </form>
            
          <!--Amei-->
          <form method="POST" action="{{route('avaliar')}}">
            @csrf
            <input type="hidden" name="reacao" value="amei">
            <input type="hidden" name="id" value="{{$book->id}}"> <!--O ID do livro-->
              <button class="noconfig"  type="submit">
                <picture>
                  <source srcset="https://fonts.gstatic.com/s/e/notoemoji/latest/1f60d/512.webp" type="image/webp">
                  <img src="https://fonts.gstatic.com/s/e/notoemoji/latest/1f60d/512.gif" alt="😍" width="52" height="52">
                </picture>
                <?php $count = 0?>
                @foreach($cadastrados as $cadastrado)
                @if($book->id == $cadastrado->idGoogle)
                <p>{{$cadastrado->amei}}</p>
                <?php
                $count = $count + 1;?>
                @endif
                @endforeach
                @if($count == 0)
                <p>0</p>
                @endif
              </button>
          </form>

          <!--Nojo-->
          <form method="POST" action="{{route('avaliar')}}">
            @csrf
            <input type="hidden" name="reacao" value="nojo">
            <input type="hidden" name="id" value="{{$book->id}}"> <!--O ID do livro-->
              <button class="noconfig" type="submit" >
                <picture>
                  <source srcset="https://fonts.gstatic.com/s/e/notoemoji/latest/1f922/512.webp" type="image/webp">
                  <img src="https://fonts.gstatic.com/s/e/notoemoji/latest/1f922/512.gif" alt="🤢" width="52" height="52">
                </picture>
                <?php $count = 0?>
                @foreach($cadastrados as $cadastrado)
                @if($book->id == $cadastrado->idGoogle)
                <p>{{$cadastrado->nojo}}</p>
                <?php
                $count = $count + 1;?>
                @endif
                @endforeach
                @if($count == 0)
                <p>0</p>
                @endif
              </button>
          </form>

          <!--Medo-->
          <form method="POST" action="{{route('avaliar')}}">
            @csrf
              <input type="hidden" name="reacao" value="medo">
              <input type="hidden" name="id" value="{{$book->id}}"> <!--O ID do livro-->
              <button class="noconfig" type="submit" >
                <picture>
                  <source srcset="https://fonts.gstatic.com/s/e/notoemoji/latest/1f628/512.webp" type="image/webp">
                  <img src="https://fonts.gstatic.com/s/e/notoemoji/latest/1f628/512.gif" alt="😨" width="52" height="52">
                </picture>
                <?php $count = 0?>
                @foreach($cadastrados as $cadastrado)
                @if($book->id == $cadastrado->idGoogle)
                <p>{{$cadastrado->medo}}</p>
                <?php
                $count = $count + 1;?>
                @endif
                @endforeach
                @if($count == 0)
                <p>0</p>
                @endif
              </button>
          </form>

          <!--Emocionante-->
          <form method="POST" action="{{route('avaliar')}}">
            @csrf
            <input type="hidden" name="reacao" value="emocao">
            <input type="hidden" name="id" value="{{$book->id}}"> <!--O ID do livro-->
              <button class="noconfig" >
                <picture>
                  <source srcset="https://fonts.gstatic.com/s/e/notoemoji/latest/1f979/512.webp" type="image/webp">
                  <img src="https://fonts.gstatic.com/s/e/notoemoji/latest/1f979/512.gif" alt="🥹" width="52" height="52">
                </picture>
                <?php $count = 0?>
                @foreach($cadastrados as $cadastrado)
                @if($book->id == $cadastrado->idGoogle)
                <p>{{$cadastrado->emocao}}</p>
                <?php
                $count = $count + 1;?>
                @endif
                @endforeach
                @if($count == 0)
                <p>0</p>
                @endif
              </button>
          </form>
        </div>
      </div>
    </div>
  </div>