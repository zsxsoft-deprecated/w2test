<?php head($user, '登录'); ?>
<form method="post">
  <div><input placeholder="用户名" name="username" /></div>
  <div><input placeholder="密码" name="password" type="password" /></div>
  <div><button type="submit">登录</button></div>
  <div><a href="?action=register">注册</a></div>
</form>
<?php foot(); ?>