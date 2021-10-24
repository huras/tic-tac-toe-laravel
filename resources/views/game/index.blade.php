@extends('layout.default')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-lg-12 col-12'>
                <div class='pre-game  m-auto' id='pre-game'>
                    <div class="card" style="width: 100%; border: 0;">
                        <div class="card-body">
                          <h5 class="card-title">Tic Tac Toe Laravel</h5>
                          <p class="card-text">Fill the fields below with the player's names and press <span class='text-success'>start</span> to play!</p>
                        </div>
                        <div class="mb-3 row">
                            <label for="p1-name" class="col-sm-2 col-form-label">Player 1's name:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name='player1' id="p1-name" value='juca'>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="p2-name" class="col-sm-2 col-form-label">Player 2's name:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name='player2' id="p2-name" value='pedro'>
                            </div>
                        </div>
                        <button class="btn btn-success" onclick="startGame()">Start</button>
                    </div>
                </div>
            </div>
            <div class='col-lg-3 col-12 m-auto in-game-holder' id='in-game-holder'>
                <div class='in-game  m-auto' id='in-game' style='display: none;'>
                    <div id="header">
                        <p>Player's turn: <strong id='current-player'> </strong> </p>
                        <img id="imgplayer" src="" border="0" height="25">
                    </div>

                    <div class="board " id='board'>
                        <div class='board-row'>
                            <div id="a1" class="position" movement=""></div>
                            <div id="a2" class="position" movement=""></div>
                            <div id="a3" class="position" movement=""></div>
                        </div>
                        <div class='board-row'>
                            <div id="b1" class="position" movement=""></div>
                            <div id="b2" class="position" movement=""></div>
                            <div id="b3" class="position" movement=""></div>
                        </div>
                        <div class='board-row'>
                            <div id="c1" class="position" movement=""></div>
                            <div id="c2" class="position" movement=""></div>
                            <div id="c3" class="position" movement=""></div>
                        </div>
                    </div>

                    <div class="card winner-card"  style="width: 100%; border: 0;">
                        <div class="card-body">
                          <h5 class="card-title" style='text-align: center;'><strong id='winner-name'>Luana</strong> is the winner!</h5>
                        </div>
                        <button class="btn btn-success " onclick="softReset()">Restart</button>
                        <button class="btn btn-primary mt-1" onclick="hardReset()">Change names</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function storeResultInDataBase(result){
            const token = document.querySelector('meta[name=csrf-token').getAttribute('content');
            fetch("{{route('store.result')}}",
                {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token": token
                    },
                    method: 'POST',
                    credentials: "same-origin",
                    body: JSON.stringify(result)
                }
            ).then(response => response.json())
            .then(data => console.log(data))
        }
    </script>
    <script type="text/javascript" src="{{ asset('/js/game.js')}}"></script>
@endsection
