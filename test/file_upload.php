<!DOCTYPE html>
<?php
include './goBack.php';

$uploads_dir = './uploads';

$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');

is_dir($uploads_dir) ?: mkdir($uploads_dir, 0777) ?: die("coudn't make directory{$uploads_dir}");

isset($_FILES['myfile']) ?: die("there is no uploadable file.");

$error = $_FILES['myfile']['error'];
$name = $_FILES['myfile']['name'];

$result = match( $error ) {
    UPLOAD_ERR_OK => "업로드 정상($error)",
    UPLOAD_ERR_INI_SIZE => "php.ini에 최대 파일 크기 초과($error)",
    UPLOAD_ERR_FROM_SIZE => "HTML 폼에 설정된 최대 파일 크기 초과($error)",
    UPLOAD_ERR_PARTIAL => "파일 일부만 업로드 됨(깨짐)($error)",
    UPLOAD_ERR_NO_FILE => "업로드 할 파일 없음($error)",
    UPLOAD_ERR_NO_TMP_DIR => "웹서버에 임시폴더 없음($error)",
    UPLOAD_ERR_CANT_WRITE => "웹서버에 파일 쓸 수 없음($error)",
    UPLOAD_ERR_EXTENSION => "PHP 확장기능에 의한 업로드($error)"
};

if( $error != UPLOAD_ERR_OK) {
    echo $result;
    exit;
}

$upload_file = $uploads_dir.'/'.$name;
$fileinfo = pathinfo($upload_file);
$ext = strtolower($fileinfo['extension']);


$i = 1;

while(is_file($upload_file)){
    $name = $fileinfo['filename']."-{$i}.".$fileinfo['extension'];
    $upload_file = $uploads_dir.'/'.$name;
    $i++;
}

if( !in_array($ext, $allowed_ext)) { 
    echo "허용되지 않은 확장자";
    exit;
}

if( !move_uploaded_file($_FILES['myfile']['tmp_name'], $upload_file)) {
    echo "파일이 업로드 되지 않음";
    exit;
}

?>
<html>
<head>
<title>File Upload</title>
</head>
<body>
    <h1>File Upload Example</h1>
    <h2>파일 정보</h2>
    <ul>
        <li>결과 : <?php echo $result; ?></li>
        <li>파일명 : <?php echo $name; ?></li>
        <li>확장자 : <?php echo $ext; ?></li>
        <li>파일형식 : <?php echo $_FILES['myfile']['type']; ?></li>
        <li>파일크기 : <?php echo number_format($_FILES['myfile']['size']); ?> bytes</li>
    </ul>
    <a href="./file_download.php?file=<?php echo $name; ?>">다운로드</a>
    <img src="<?php echo $upload_file ?>"/>
    <?php echo "<a href='".$_SERVER['HTTP_REFERER']."'>이전으로</a>"; ?>
</body>
</html>