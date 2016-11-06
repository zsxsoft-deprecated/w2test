<?php
function head($user, $title = '测试', $title2 = '') {
?>
<!DOCTYPE html>
<html lang="zh-Hans-cn">
<head>
  <meta charset="UTF-8">
  <title><?php echo $title;?></title>
</head>
<body>
  <div class="container">
    <p>
      <a href="?action=index">回首页</a>
      <?php 
        if ($user->id == '') {
      ?>
        <span><?php echo $title;?></span>
        <a href="javascript:history.go(-1);">返回来源</a>
      <?php
        } else {
      ?>
        <span><?php echo $user->username;?> <a href="#"><?php echo $title2;?></a></span>
        <a href="javascript:location.reload()">刷新</a><?php
        }
      ?>
      
      
    </p>
<?php
}

function foot() {
  $weeks = ["日", "一", "二", "三", "四", "五", "六"];
?>
  <footer>

  <section class="footer-time"><?php echo date('m月d日 H:m')?> 星期<?php echo $weeks[date('w')];?></section>
  <section class="footer-runtime">Runtime: <?php echo microtime(true) - $GLOBALS['startTime'];?>s
  <p><a href="/">[首页]</a> <a href="javascript:;">[顶部]</a></p>
  </footer>
  </div>
</body>
</html>
<?php
}
