<?php
include('./dbconn.php');
if( isset($_SESSION['ss_mb_id'])) {
    $mode = 'modify';
    $title = '회원수정';
    $modify_mb_info = 'readonly';
    $href="./member_list.php";

    $id = $_SESSION['ss_mb_id'];
    $sql = "select * from member where mb_id = '$id'";
    $result = $conn->query($sql);

    $mb = $result->fetch_assoc();


    $result->free();
    $conn->close();
} else {
    $mode = "insert";
    $title = '회원가입';
    $modify_mb_info = '';
    $href="./index.php";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
</head>
<body>
    <div class="container">
        <h4 class="display-4 text-center"><?=$title ?></h4>
        <form action ="./register_update.php" method="post">
            <input type="hidden" name="mode" value="<?=$mode?>"/>
            <label for="mb_id">아이디</label>
            <div class="mb-3">
                <input type="text" id="mb_id" name="mb_id" class="form-control" value="<?php echo $mb['mb_id'] ?? '' ?>" <?=$modify_mb_info?> />
            </div>
            <label for="mb_password">비밀번호</label>
            <div class="mb-3">
                <input type="password" id="mb_pw" name="mb_pw" class="form-control" />
            </div>
            <label for="mb_password">비밀번호 확인</label>
            <div class="mb-3">
                <input type="password" id="mb_pw_confirm" name="mb_pw_confirm" class="form-control" />
            </div>
            <label for="mb_name">이름</label>
            <div class="mb-3">
                <input type="name" id="mb_name" name="mb_name" class="form-control" value="<?php echo $mb['mb_name'] ?? '' ?>" />
            </div>
            <label for="mb_id">이메일</label>
            <div class="mb-3">
                <input type="text" id="mb_email" name="mb_email" class="form-control" value="<?php echo $mb['mb_email'] ?? '' ?>" />
            </div>
            <label>직업</label>
            <div class="mb-3">
                <select class="form-select" name="mb_job">
                    <option value="">선택하세요</option>
                    <option value="학생" <?php echo ($mb['mb_job'] =='학생') ? "selected" : '';?>>학생</option>
                    <option value="회사원" <?php echo ($mb['mb_job'] =='회사원') ? "selected" : '';?>>회사원</option>
                    <option value="공무원" <?php echo ($mb['mb_job'] =='공무원') ? "selected" : '';?>>공무원</option>
                    <option value="주부" <?php echo ($mb['mb_job'] =='주부') ? "selected" : '';?>>주부</option>
                    <option value="무직" <?php echo ($mb['mb_job'] =='무직') ? "selected" : '';?>>무직</option>
                    <option value="기타" <?php echo ($mb['mb_job'] =='기타') ? "selected" : '';?>>기타</option>
                </select>
            </div>
            <label>성별</label>
            <div class="mb-3">
               <div class="form-check form-check-inline">
                    <input type="radio" id="mb_gender" name="mb_gender" id="male" class="form-check-input" value="male" <?php echo ($mb['mb_gender'] == 'male' ) ? "checked":""; ?> />
                    <label for="male">남자</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="mb_gender" name="mb_gender" id="female" class="form-check-input" value="female" <?php echo ($mb['mb_gender'] == 'female' ) ? "checked":""; ?> />
                    <label for="female">여자</label>
                </div>
            </div>

            <label>관심언어</label>
            <div class="mb-3">
            <div class="form-check form-check-inline">
                    <input type="checkbox" id="mb_language1" name="mb_language[]" id="mb_language1" class="form-check-input" value="HTML" <?php echo str_contains($mb['mb_language'], 'HTML') ? "checked":""; ?>/>
                    <label for="mb_language1">HTML</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" id="mb_language2" name="mb_language[]" id="mb_language2" class="form-check-input" value="CSS" <?php echo str_contains($mb['mb_language'], 'CSS') ? "checked":""; ?>/>
                    <label for="mb_language2">CSS</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" id="mb_language3" name="mb_language[]" id="mb_language3" class="form-check-input" value="PHP" <?php echo str_contains($mb['mb_language'], 'PHP') ? "checked":""; ?>/>
                    <label for="mb_language3">PHP</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="checkbox" id="mb_language4" name="mb_language[]" id="mb_language4" class="form-check-input" value="MySQL" <?php echo str_contains($mb['mb_language'], 'MySQL') ? "checked":""; ?>/>
                    <label for="mb_language4">MySQL</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><?=$title?></button>
            <a href="<?=$href?>" class="btn btn-danger">취소</a>
        </form>
    </div>
            
</body>
</html>