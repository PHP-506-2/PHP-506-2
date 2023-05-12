<?php

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="movie_detail.css">
    <title>Detail page</title>
</head>
<body>
<?php require_once("header.php")?>
<div class="container">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="https://img1.daumcdn.net/thumb/C408x596/?fname=https%3A%2F%2Ft1.daumcdn.net%2Fmovie%2F57ca90dcd1ac9a5c6696d41474c0ed87a668bab9" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">나는 여기에 있다</h5>
                <p class="card-text">
                    <div class="inner_cont">
                            <dl class="list_cont">
                                    <dt>개봉</dt>
                                <dd>2023.04.12</dd>
                            </dl>
                        <dl class="list_cont">
                            <dt>장르</dt>
                            <dd>범죄/액션/스릴러</dd>
                        </dl>
                        <dl class="list_cont">
                            <dt>국가</dt>
                            <dd>한국</dd>
                        </dl>
                            <dl class="list_cont">
                            <dt>등급</dt>
                            <dd>
                                15세이상관람가
                            </dd>
                            </dl>
                        <dl class="list_cont">
                        <dt>러닝타임</dt>
                        <dd>
                            81분
                        </dd>
                        </dl>
                    </div>
                </p>
                <div class="star-rating">
                    <input type="radio" id="5-stars" name="rating" value="5" />
                    <label for="5-stars" class="star">&#9733;</label>
                    <input type="radio" id="4-stars" name="rating" value="4" />
                    <label for="4-stars" class="star">&#9733;</label>
                    <input type="radio" id="3-stars" name="rating" value="3" />
                    <label for="3-stars" class="star">&#9733;</label>
                    <input type="radio" id="2-stars" name="rating" value="2" />
                    <label for="2-stars" class="star">&#9733;</label>
                    <input type="radio" id="1-star" name="rating" value="1" />
                    <label for="1-star" class="star">&#9733;</label>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>

<!-- <div class="box_basic" data-tiara-layer="main">
    <div class="info_poster">
        <a href="#photoId=1517543" class="thumb_img" data-tiara-layer="poster" data-tiara-copy="메인_포스터">
            <span class="bg_img" style="background-image:url(https://img1.daumcdn.net/thumb/C408x596/?fname=https%3A%2F%2Ft1.daumcdn.net%2Fmovie%2F57ca90dcd1ac9a5c6696d41474c0ed87a668bab9)"></span>
        </a>
    </div>
    <div class="info_detail">
        <div class="detail_tit">
            <h3 class="tit_movie">
                <span class="txt_tit">
                    나는 여기에 있다
                </span>
            </h3>
                <div class="head_origin">
                    <span class="txt_name">2021</span>
                </div>
        </div>
        <div class="detail_cont">
            <div class="inner_cont">
                        <dl class="list_cont">
                                <dt>개봉</dt>
                            <dd>2023.04.12</dd>
                        </dl>
                    <dl class="list_cont">
                        <dt>장르</dt>
                        <dd>범죄/액션/스릴러</dd>
                    </dl>
                    <dl class="list_cont">
                        <dt>국가</dt>
                        <dd>한국</dd>
                    </dl>
                        <dl class="list_cont">
                        <dt>등급</dt>
                        <dd>
                            15세이상관람가
                        </dd>
                        </dl>
                    <dl class="list_cont">
                    <dt>러닝타임</dt>
                    <dd>
                        81분
                    </dd>
                    </dl>
            </div>
            <div class="inner_cont">
                    <dl class="list_cont">
                    <dt>평점</dt>
                    <dd><span class="ico_movie ico_star"></span>6.6</dd>
                    </dl>
                    <dl class="list_cont">
                        <dt>누적관객</dt>
                        <dd>6,861명</dd>
                    </dl>
            </div>
        </div>
    </div>
</div> -->
</body>
</html>