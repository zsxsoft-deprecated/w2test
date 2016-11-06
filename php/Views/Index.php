<?php head($user, '登录', '切换聊天室'); ?>
<form method="post" action="?action=post">
  <section>
  <div><textarea name="content" id="content"></textarea></div>
  <div><button type="submit">快速发言</button></div>
  </section>
</form>
<section>
  <?php foreach ($threads as $thread) {?>
    <hr />
    <p> <?php echo $thread->id;?> <?php echo htmlspecialchars($thread->content);?></p>
    <p>(<?php echo htmlspecialchars($thread->user->username);?>) <a data-username="<?php echo htmlspecialchars($thread->user->username);?>" class="a-at-him" href="javascript:;">@Ta</a> <?php echo date('m-d h:m:s', $thread->timestamp)?> 
      <?php if ($thread->user->id == $model->uid) {?>
        <a href="?action=delete&id=<?php echo $thread->id?>">[删]</a>
      <?php }?>
    </p>
  <?php }?>
</section>
<hr />
<div>第<?php echo $model->page;?>/<?php echo ceil($count / $GLOBALS['config']->pagesize)?>页，共<?php echo $count?>楼  
  <input type="text" name="skip" placeholder="跳页" id="input-skip-page" value="<?php echo $model->page?>">
</div>

<script>
[].forEach.call(document.getElementsByClassName("a-at-him"), function (element) {
  element.addEventListener('click', function (e) {
    document.getElementById("content").value += "@" + this.getAttribute("data-username") + " ";
  })
});
document.getElementById("input-skip-page").addEventListener("keyup", function (e) {
  if (e.keyCode == 13) {
    location.href = "?page=" + this.value;
  }
})
</script>
<?php foot(); ?>