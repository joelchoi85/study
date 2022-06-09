<head>
<style>
.themed {
  display: block;
  background: #00261e;
  color: grey;
}

@media (prefers-color-scheme: light) {
  .themed {
    background: white;
    color: black;
  }
}
</style>
</head>

<?php
echo "<body class='themed'>";
echo "<h1>테스트 페이지들</h1>";
echo "<ul>";

$dir_path = ".";



if(is_dir($dir_path) && $dir = scandir($dir_path)) {
    foreach( $dir as $file ) {
        if( is_dir($file) || $file == '.' || $file == '..' || $file == 'goBack.php' || $file =='index.php' ) continue;
        $f = explode('.', $file);
        echo "<li><a href='{$dir_path}/{$file}'>{$f[0]}</a></li>";
    }
} else echo strtoupper($dir_path)." is not folder";

echo "</ul>";

echo "</body>";
?>
