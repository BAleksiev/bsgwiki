<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div class="index_logo"></div>
<form class="index_search_box" action="search.php" method="post">
    <input type="text" name="search" class="search_field" autocomplete="off"/>
    <input type="submit" name="submit_search" value="" class="submit_search"/>
</form><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>