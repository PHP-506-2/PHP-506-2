<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pet_todolist</title>
</head>
<body>
    <div class="petlist_profile_container">
    </div>

    <div class="petlist_list_container">
        <h1><?php //echo $pet_profile['pet_name']; ?>의 TO DO LIST</h1>
        <!-- **부분은 사용자 지정 이름으로 교체될 예정 -->
        <table>
            <!-- <thead>
                <tr>
                    <th></th>
                    <th>제목</th> 
                </tr>
            </thead> -->
            <tbody>
                <tr>
                    <!-- 체크박스 -->
                    <!-- title누르면 디테일 페이지로 이동 -->
                    <td><a href="">제목<?php //echo $pet_list['list_title']; ?></a></td>
                    <!-- 마감일-현재날짜 -->
                    <td>Day-1<?php //echo $pet_list['list_end']?></td>
                    <!-- 현재 진행 상황 -->
                    <td>진행중<?php //echo $pet_list['list_comp_flg']; ?></td>
                </tr>
            </tbody>
        </table>
        
    </div>
</body>
</html>