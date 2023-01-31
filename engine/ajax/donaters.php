<?php 
$donaters = $Engine->query("SELECT * FROM `orders` WHERE `status` = 1 ORDER BY `id` DESC LIMIT 8");
while($donater = $donaters->fetch_object()) { ?>
<div class="lastBought" style="color: white;">
   <img src="https://minotar.net/avatar/<?=$donater->nick?>/80" class="center-block img-circle img-responsive" data-html="true" data-toggle="tooltip" data-placement="top" title="Игрок: <b><?=$donater->nick?></b><br>Товар: <?=$donater->group?><br>Дата: <?=$Engine->date($donater->date." ".$donater->time)?>">
   <div class="lastBought-nickname">
      <h4><?=$donater->nick?></h4>
      <small>[<?=$donater->group?>]<br><?=$Engine->date($donater->date." ".$donater->time)?></small>
   </div>
</div>
<? } ?>