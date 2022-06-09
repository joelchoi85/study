<?php
include './dbconn.php';
if( !$_SESSION['ss_mb_id']) {
    echo "<script>alert('로그인 후 볼 수 있는 페이지');</script>";
    echo "<script>location.replace('./index.php');</script>";
    exit;
}
$sql = "SELECT count(*) as `cnt` from member";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total = $row['cnt'];

$result->free();

$sql = "SELECT * from member order by mb_datetime desc";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 목록</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
</head>
<body>
    <div class="container">
        <h4 class="display-4 text-center">회원목록</h4>
        <div class="box">
            <table class="table table-striped">
                <caption>Total <?= number_format($total) ?>명</caption>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>Email</th>
                        <th>Job</th>
                        <th>Gender</th>
                        <th>Languages</th>
                        <th>Join</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=1; $row=$result->fetch_assoc(); $i++): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['mb_id'] ?></td>
                        <td><?= $row['mb_name'] ?></td>
                        <td><?= $row['mb_email'] ?></td>
                        <td><?= $row['mb_job'] ?></td>
                        <td><?= $row['mb_gender'] ?></td>
                        <td><?= $row['mb_language'] ?></td>
                        <td><?= $row['mb_datetime'] ?></td>
                    </tr>
                    <?php endfor; ?>
                    <?php if( $total ) echo ''; else echo '<tr><td colspan="8">회원이 어딨노?</td></tr>'; ?>
                </tbody>
            </table>

            <a href="./register.php" class="btn btn-primary">회원정보수정</a>
            <a href="./logout.php" class="btn btn-danger">로그아웃</a>
        </div>
    </div>
<?php
$result->free();
$conn->close();
?>
</body>
</html>