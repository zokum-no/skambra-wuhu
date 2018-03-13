<?php
if (!defined("ADMIN_DIR")) exit();
?>
<dl id='news'>
<?php
$news = SQLLib::selectRows("select * from intranet_news order by `date` desc");
foreach($news as $n) {
?>
<dt><?php print(date("Y-m-d",strtotime($n->date))); ?> - <?php print(_html($n->eng_title)); ?></dt>
<dd><?php print($n->eng_body); ?></dd>
<?php
}
?>
</dl>
