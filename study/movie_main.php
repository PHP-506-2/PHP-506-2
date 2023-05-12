<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="movie_main.css">
    <title>bootstrap</title>
</head>
<body>
<?php require_once("header.php")?>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://caching2.lottecinema.co.kr/lotte_image/2023/SS/SS_1920774.jpg" class="d-block w-100" alt="..." style="width: 100%; height: 1fr;">
        </div>
        <div class="carousel-item">
            <img src="https://caching2.lottecinema.co.kr/lotte_image/2023/UL/UL_1920774.jpg" class="d-block w-100" alt="..." style="width: 100%; height: 1fr;">
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="search">
        <input type="text" placeholder="검색어 입력" class="input_search">
        <img src="https://s3.ap-northeast-2.amazonaws.com/cdn.wecode.co.kr/icon/search.png" class="img_search">
    </div>
    <div class="container">
        <h2 class="h2_rank">영화 순위</h2>
        <div class="row row-cols-5">
            <div class="col">
                <div class="card mt-4" style="width: 100%; border: none;">
                    <p class="rank">1</p>
                    <img src="https://caching.lottecinema.co.kr//Media/MovieFile/MovieImg/202304/19643_103_1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h2 class="card-text">나는 여기에 있다</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card  mt-4" style="width: 100%; border: none;">
                    <p class="rank">2</p>
                    <img src="https://caching.lottecinema.co.kr//Media/MovieFile/MovieImg/202304/19662_103_1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h2 class="card-text">드림</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card  mt-4" style="width: 100%; border: none;">
                    <p class="rank">3</p>
                    <img src="https://caching.lottecinema.co.kr//Media/MovieFile/MovieImg/202305/19168_103_1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h2 class="card-text">슈퍼 마리오 브라더스</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mt-4" style="width: 100%; border: none;">
                    <p class="rank">4</p>
                    <img src="https://caching.lottecinema.co.kr//Media/MovieFile/MovieImg/202305/19753_103_1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h2 class="card-text">극장판 짱구는 못말려: 동물소환 닌자 배꼽수비대</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mt-4" style="width: 100%; border: none;">
                    <p class="rank">5</p>
                    <img src="https://caching.lottecinema.co.kr//Media/MovieFile/MovieImg/202304/19683_103_1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h2 class="card-text">존 윅 4</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mt-4" style="width: 100%; border: none;">
                    <p class="rank">6</p>
                    <img src="https://caching.lottecinema.co.kr//Media/MovieFile/MovieImg/202305/19715_103_1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h2 class="card-text">유랑지구2</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mt-4" style="width: 100%; border: none;">
                    <p class="rank">7</p>
                    <img src="https://caching.lottecinema.co.kr//Media/MovieFile/MovieImg/202305/19731_103_1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h2 class="card-text">칠중주: 홍콩 이야기</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mt-4" style="width: 100%; border: none;">
                    <p class="rank">8</p>
                    <img src="https://caching.lottecinema.co.kr//Media/MovieFile/MovieImg/202304/19606_103_1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h2 class="card-text">리바운드</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mt-4" style="width: 100%; border: none;">
                    <p class="rank">9</p>
                    <img src="https://caching.lottecinema.co.kr//Media/MovieFile/MovieImg/202305/19747_103_1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h2 class="card-text">바람개비</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mt-4" style="width: 100%; border: none;">
                    <p class="rank">10</p>
                    <img src="https://caching.lottecinema.co.kr//Media/MovieFile/MovieImg/202304/19723_103_1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h2 class="card-text">렌필드</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>