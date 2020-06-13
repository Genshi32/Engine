<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/user.css">
</head>
<body>

  
    <!-- ナビバー -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
    <a href="#" class="navbar-brand">TOP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
      </div>
  </nav>

  <!-- プロフィール -->
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
            <div class="card-deck">
                <div class="card">
                  <img class="card-img-top img-thumbnail" id="icon_image" src="../img/dog.png">
                  <div class="card-body">
                      <h4 class="card-name d-flex justify-content-center"><strong>{{$users->name}}</strong></h4>
                      <div id="follow-link" class="users-follow-link d-flex justify-content-center mt-3">
                        <a href="#" class="m-2">
                          <p class="text-center">0</p>
                          フォロー
                        </a>
                        <a href="#" class="m-2">
                          <p class="text-center">0</p>
                          フォロワー
                        </a>
                      </div>
                  </div>
                  <a href="edit">
                    <button class="btn btn-primary">プロフィール設定</button>
                  </a>
                  <div class="card-body border m-4">
                    <dt><u>学習内容</u></dt>
                    <ul class="list text-center">
                      <br>
                      <li class="list-item">
                        <div class="form-group">
                          <select class="custom-select" name="technology_master">
                            <option value="0" selected>選択する</option>
                            <option value="1">PHP</option>
                            <option value="2">Javascript</option>
                            <option value="3">Ruby</option>
                            <option value="4">Python</option>
                          </select>
                        </div>
                      </li>
                      <li class="list-item">
                        <div class="form-group">
                          <select class="custom-select" name="technology_master">
                            <option value="0" selected>選択する</option>
                            <option value="1">PHP</option>
                            <option value="2">Javascript</option>
                            <option value="3">Ruby</option>
                            <option value="4">Python</option>
                          </select>
                        </div>
                      </li>
                      <li class="list-item">
                        <div class="form-group">
                          <select class="custom-select" name="technology_master">
                            <option value="0" selected>選択する</option>
                            <option value="1">PHP</option>
                            <option value="2">Javascript</option>
                            <option value="3">Ruby</option>
                            <option value="4">Python</option>
                          </select>
                        </div>
                      </li>
                      <li class="list-item">
                        <div class="form-group">
                          <select class="custom-select" name="technology_master">
                            <option value="0" selected>選択する</option>
                            <option value="1">PHP</option>
                            <option value="2">Javascript</option>
                            <option value="3">Ruby</option>
                            <option value="4">Python</option>
                          </select>
                        </div>
                      </li>
                      <!-- <li class="list-item"><u>HTML</u></li>
                      <br>
                      <li class="list-item"><u>CSS</u></li>
                      <li class="list-item"><u>Laravel</u></li> -->
                    </ul>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">自己紹介</h5>
                    <br>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.This card has supporting text below as a natural lead-in to additional content.This card has supporting text below as a natural lead-in to additional content.This card has supporting text below as a natural lead-in to additional content.</p>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>

      <!-- フォローリスト -->
    <div class="container mt-5 "><h5><mark>フォロー</mark></h5></div>
    <div class="container border col-sm-9 col-md-7 col-lg-7 mx-auto">
      <div class="d-flex justify-content-center">
        <div class="p-2">
          <img class="card-img-top img-thumbnail" id="icon_image" src="../img/dog.png">
          <h5 class="card-name" style="display: flex; justify-content: center; align-items: center;">わん男</h5>
        </div>
        <div class="p-2">
          <img class="card-img-top img-thumbnail" id="icon_image" src="../img/dog.png">
          <h5 class="card-name" style="display: flex; justify-content: center; align-items: center;">わん男</h5>
        </div>
        <div class="p-2">
          <img class="card-img-top img-thumbnail" id="icon_image" src="../img/dog.png">
          <h5 class="card-name" style="display: flex; justify-content: center; align-items: center;">わん男</h5>
        </div>
        <div class="p-2">
          <img class="card-img-top img-thumbnail" id="icon_image" src="../img/dog.png">
          <h5 class="card-name" style="display: flex; justify-content: center; align-items: center;">わん男</h5>
        </div>
        <div class="p-2">
          <img class="card-img-top img-thumbnail" id="icon_image" src="../img/dog.png">
          <h5 class="card-name" style="display: flex; justify-content: center; align-items: center;">わん男</h5>
        </div>
      </div>
    </div>

    <!-- フォロワーリスト -->
    <div class="container mt-5 "><h5><mark>フォロワー</mark></h5></div>
    <div class="container border col-sm-9 col-md-7 col-lg-7 mx-auto">
      <div class="d-flex justify-content-center">
        <div class="p-2">
          <img class="card-img-top img-thumbnail" id="icon_image" src="../img/dog.png">
          <h5 class="card-name" style="display: flex; justify-content: center; align-items: center;">わん男</h5>
        </div>
        <div class="p-2">
          <img class="card-img-top img-thumbnail" id="icon_image" src="../img/dog.png">
          <h5 class="card-name" style="display: flex; justify-content: center; align-items: center;">わん男</h5>
        </div>
        <div class="p-2">
          <img class="card-img-top img-thumbnail" id="icon_image" src="../img/dog.png">
          <h5 class="card-name" style="display: flex; justify-content: center; align-items: center;">わん男</h5>
        </div>
        <div class="p-2">
          <img class="card-img-top img-thumbnail" id="icon_image" src="../img/dog.png">
          <h5 class="card-name" style="display: flex; justify-content: center; align-items: center;">わん男</h5>
        </div>
        <div class="p-2">
          <img class="card-img-top img-thumbnail" id="icon_image" src="../img/dog.png">
          <h5 class="card-name" style="display: flex; justify-content: center; align-items: center;">わん男</h5>
        </div>
      </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>