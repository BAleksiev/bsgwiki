<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div class="content">
    <div class="top_line">
        <div class="breadcrumbs">
            <?php 
$_fh0_data = (isset($this->scope["breadcrumbs"]) ? $this->scope["breadcrumbs"] : null);
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['k']=>$this->scope['b'])
	{
/* -- foreach start output */
?>
                <a href="<?php echo $this->scope["b"]["link"];?>"><?php echo translate((isset($this->scope["b"]["name"]) ? $this->scope["b"]["name"]:null));?></a>
                <?php if (((isset($this->scope["k"]) ? $this->scope["k"] : null) + 1) < sizeof((isset($this->scope["breadcrumbs"]) ? $this->scope["breadcrumbs"] : null))) {
?>
                <div class="breadcrumb_separator"></div>
                <?php 
}?>

            <?php 
/* -- foreach end output */
	}
}?>

        </div>
        <form class="search_box" action="" method="post">
            <input type="text" name="search" class="search_field" autocomplete="off"/>
            <input type="submit" name="submit_search" value="" class="submit_search"/>
        </form>
    </div>
    
    <div class="main_container">
        <h2>
            <?php if ((isset($this->scope["type"]) ? $this->scope["type"] : null) == 'skills') {
?><img src="images/icons/<?php echo $this->scope["item"]["image"];?>.png" width="40" height="35" alt="<?php echo $this->scope["item"]["name"];?>" /><?php 
}?>

            <?php if ((isset($this->scope["type"]) ? $this->scope["type"] : null) == 'assignments') {
?><img src="images/icons/assignments-icon.png" width="40" height="35" alt="<?php echo $this->scope["item"]["name"];?>" /><?php 
}?>

            <?php if ((isset($this->scope["type"]) ? $this->scope["type"] : null) == 'systems') {
?><img src="images/icons/systems-icon.png" width="40" height="35" alt="<?php echo $this->scope["item"]["name"];?>" /><?php 
}?>

            <span><?php echo $this->scope["item"]["name"];?></span>
        </h2>
        <div class="cont">
            <div class="desc">
                <?php echo translate(''.(isset($this->scope["item"]["description"]) ? $this->scope["item"]["description"]:null).'');?>

            </div>
            <?php if ((isset($this->scope["type"]) ? $this->scope["type"] : null) == 'assignments') {
?>
                <h3><?php echo translate('Objectives');?>:</h2>
                <?php echo translate(''.(isset($this->scope["item"]["objectives"]) ? $this->scope["item"]["objectives"]:null).'');?>

                <h3><?php echo translate('Rewords');?>:</h2>
                <?php echo translate(''.(isset($this->scope["item"]["rewords"]) ? $this->scope["item"]["rewords"]:null).'');?>

            <?php 
}?>

        </div>
        <div class="info">
            <div class="panel-top"></div>
            <div class="panel-body">
                <ul>
                    <?php if ((isset($this->scope["type"]) ? $this->scope["type"] : null) == 'skills') {
?><li><b><?php echo translate('Type:');?></b> <?php echo ucfirst(translate((isset($this->scope["item"]["type"]) ? $this->scope["item"]["type"]:null)));?></li><?php 
}?>

                    <?php if ((isset($this->scope["item"]["action"]) ? $this->scope["item"]["action"]:null)) {
?><li><b><?php echo translate('Action');?>:</b> <?php echo ucfirst(translate((isset($this->scope["item"]["action"]) ? $this->scope["item"]["action"]:null)));?></li><?php 
}?>

                    <?php if ((isset($this->scope["item"]["race"]) ? $this->scope["item"]["race"]:null)) {
?><li><b><?php echo translate('Race');?>:</b> <span class="<?php if ((isset($this->scope["item"]["race"]) ? $this->scope["item"]["race"]:null) == 1) {
?>colonial<?php 
}
if ((isset($this->scope["item"]["race"]) ? $this->scope["item"]["race"]:null) == 2) {
?>cylon<?php 
}?>"><?php if ((isset($this->scope["item"]["race"]) ? $this->scope["item"]["race"]:null) == 1) {

echo translate('Colonial');

}
if ((isset($this->scope["item"]["race"]) ? $this->scope["item"]["race"]:null) == 2) {

echo translate('Cylon');

}
if ((isset($this->scope["item"]["race"]) ? $this->scope["item"]["race"]:null) == 3) {

echo translate('Neutral');

}?></span></li><?php 
}?>

                    <?php if ((isset($this->scope["type"]) ? $this->scope["type"] : null) == 'skills') {
?>
                    <li><b><?php echo translate('Price');?>:</b> <?php echo $this->scope["item"]["price"]["1"];?> <?php echo translate('XP');?></li>
                    <li><b><?php echo translate('Training');?>:</b> <?php echo $this->scope["item"]["training"]["1"];?> <?php echo translate('min');?></li>
                    <?php 
}?>

                    <?php if ((isset($this->scope["type"]) ? $this->scope["type"] : null) == 'assignments') {
?>
                    <li><b><?php echo translate('Sector');?>:</b> <?php echo ucfirst(translate((isset($this->scope["item"]["sector"]) ? $this->scope["item"]["sector"]:null)));?></li>
                    <?php 
}?>

                </ul>
            </div>
        </div>
        <div class="table-body">
            <div class="nav">
                <a id="comments"><?php echo translate('Comments');?> (<?php echo sizeof((isset($this->scope["table"]["comments"]) ? $this->scope["table"]["comments"]:null));?>)</a>
                <a id="screenshots"><?php echo translate('Screenshots');?> (<?php echo sizeof((isset($this->scope["table"]["screenshots"]) ? $this->scope["table"]["screenshots"]:null));?>)</a>
            </div>
            <div class="table-panel">
                <div class="pages"></div>
                <div class="comments tcont">
                    
                </div>
                <div class="screenshots tcont">
                    
                </div>
                <div class="pages"></div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function(){
        
        $('.table-body .nav a:first').addClass('active');
        var show = $('.table-body .nav a.active').attr('id');
        $('.table-body .table-panel .'+show).show();
        
        if(show == 'comments') {
            if(<?php echo sizeof((isset($this->scope["table"]["comments"]) ? $this->scope["table"]["comments"]:null));?> > 10)
                var p_show = 10
            else
                var p_show = <?php echo sizeof((isset($this->scope["table"]["comments"]) ? $this->scope["table"]["comments"]:null));?>;
            var p_all = <?php echo sizeof((isset($this->scope["table"]["comments"]) ? $this->scope["table"]["comments"]:null));?>;

        }
        if(show == 'screenshots') {
            if(<?php echo sizeof((isset($this->scope["table"]["screenshots"]) ? $this->scope["table"]["screenshots"]:null));?> > 10)
                var p_show = 10
            else
                var p_show = <?php echo sizeof((isset($this->scope["table"]["screenshots"]) ? $this->scope["table"]["screenshots"]:null));?>;
            var p_all = <?php echo sizeof((isset($this->scope["table"]["screenshots"]) ? $this->scope["table"]["screenshots"]:null));?>;
        }
        $('.pages').html(p_show + ' - ' + p_all);
        
        $('.table-body .nav a').click(function(){
            if($(this).attr('class') != 'active') {
                $('.table-body .nav a').removeClass('active');
                $(this).addClass('active');
                var view = $(this).attr('id');
                console.log('.table-body .table-panel .'+view);
                $('.table-body .table-panel .tcont').hide();
                $('.table-body .table-panel .' + view).show();
            }
        });
        
    });
</script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>