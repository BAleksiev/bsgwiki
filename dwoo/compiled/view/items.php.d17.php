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
            <img src="images/icons/<?php echo $this->scope["item"]["image"];?>.png" width="40" height="35" alt="<?php echo $this->scope["item"]["name"];?>" />
            <span><?php echo $this->scope["item"]["name"];?></span>
        </h2>
        <div class="cont">

            <div class="desc">
                <?php echo translate(''.(isset($this->scope["item"]["description"]) ? $this->scope["item"]["description"]:null).'');?>

            </div>

            <?php if ((isset($this->scope["item"]["type"]) ? $this->scope["item"]["type"]:null) == 'weapon' || (isset($this->scope["item"]["type"]) ? $this->scope["item"]["type"]:null) == 'computers' || (isset($this->scope["item"]["type"]) ? $this->scope["item"]["type"]:null) == 'hull' || (isset($this->scope["item"]["type"]) ? $this->scope["item"]["type"]:null) == 'engine') {
?>
            <div class="stats">
                <h2><?php echo translate('Stats');?><label><?php echo translate('Level');?> <span class="level">1</span></label></h2>
                <ul>
                    <?php 
$_fh1_data = (isset($this->scope["item"]["stats"]) ? $this->scope["item"]["stats"]:null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['n']=>$this->scope['i'])
	{
/* -- foreach start output */
?>
                    <li class="<?php echo $this->scope["n"];?>">
                        <b><?php echo translate((isset($this->scope["n"]) ? $this->scope["n"] : null));?></b>
                        <span class="left" style="margin: 0;"><?php echo $this->readVar("item.prefix.".(isset($this->scope["n"]) ? $this->scope["n"] : null));?></span><span rel="<?php echo number_format((isset($this->scope["i"]) ? $this->scope["i"] : null), 2, '.', '');?>"><?php echo number_format((isset($this->scope["i"]) ? $this->scope["i"] : null), 2, '.', '');?></span><?php echo translate($this->readVar("item.suffix.".(isset($this->scope["n"]) ? $this->scope["n"] : null)));?>

                    </li>
                    <?php 
/* -- foreach end output */
	}
}?>

                </ul>
                <div class="level-nav">
                    <a class="down" id="arrow"></a>
                    <?php 
$_for0_from = 1;
$_for0_to = 15;
$_for0_step = abs(1);
if (is_numeric($_for0_from) && !is_numeric($_for0_to)) { $this->triggerError('For requires the <em>to</em> parameter when using a numerical <em>from</em>'); }
$tmp_shows = $this->isArray($_for0_from, true) || (is_numeric($_for0_from) && (abs(($_for0_from - $_for0_to)/$_for0_step) !== 0 || $_for0_from == $_for0_to));
if ($tmp_shows)
{
	if ($this->isArray($_for0_from, true)) {
		$_for0_to = is_numeric($_for0_to) ? $_for0_to - $_for0_step : count($_for0_from) - 1;
		$_for0_from = 0;
	}
	if ($_for0_from > $_for0_to) {
				$tmp = $_for0_from;
				$_for0_from = $_for0_to;
				$_for0_to = $tmp;
			}
	for ($this->scope['i'] = $_for0_from; $this->scope['i'] <= $_for0_to; $this->scope['i'] += $_for0_step)
	{
/* -- for start output */
?>
                    <a rel="<?php echo $this->scope["i"];?>" id="<?php if ((isset($this->scope["i"]) ? $this->scope["i"] : null) < 11) {
?>dot<?php 
}
else {
?>star<?php 
}?>" class="<?php if ((isset($this->scope["i"]) ? $this->scope["i"] : null) == 1) {
?>active<?php 
}?> c<?php echo $this->scope["i"];?>"></a>
                    <?php /* -- for end output */
	}
}
?>

                    <a class="up" id="arrow"></a>
                </div>
            </div>
            <div class="requirements">
                <ul>
                    <li><b><?php echo translate('Level <span class="level">1</span> price:');?></b> <span class="up-price"></span></li>
                    <li><b><?php echo translate('Total price:');?></b> <span class="tot-price"></span></li>
                    <li><b><?php echo translate('Sell:');?></b> <span class="sell"></span></li>
                    <li><b><?php echo translate('Requires:');?></b> <a href="" class="skill"><?php echo translate('<span class="name"></span>');?></a> - <span class="slevel"></span></li>
                </ul>
            </div>
            <?php 
}?>

        </div>
        <div class="info">
            <div class="panel-top"></div>
            <div class="panel-body">
                <ul>
                    <li><b><?php echo translate('Item type:');?></b> <?php echo ucfirst(translate((isset($this->scope["item"]["type"]) ? $this->scope["item"]["type"]:null)));?></li>
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

                    <?php if ((isset($this->scope["item"]["ship_type"]) ? $this->scope["item"]["ship_type"]:null)) {
?><li><?php echo translate('Used for <b>'.(isset($this->scope["item"]["ship_type"]) ? $this->scope["item"]["ship_type"]:null).'</b> size ships');?></li><?php 
}?>

                    <?php if ((isset($this->scope["item"]["price"]) ? $this->scope["item"]["price"]:null)) {
?>
                    <li>
                        <b><?php echo translate('Buy');?>:</b> 
                        <?php 
$_fh2_data = (isset($this->scope["item"]["price"]) ? $this->scope["item"]["price"]:null);
if ($this->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $this->scope['r']=>$this->scope['p'])
	{
/* -- foreach start output */
?>
                        <span class="resource" style="background: url(images/resource-<?php echo $this->scope["r"];?>.png) left no-repeat; <?php if ((isset($this->scope["r"]) ? $this->scope["r"] : null) == 4) {
?>padding-left: 25px;<?php 
}?>"><?php echo $this->scope["p"];?></span>
                        <?php 
/* -- foreach end output */
	}
}?>

                    </li>
                    <?php 
}?>

                    <?php if ((isset($this->scope["item"]["sell"]) ? $this->scope["item"]["sell"]:null)) {
?>
                    <li>
                        <b><?php echo translate('Sell');?>:</b> 
                        <?php 
$_fh3_data = (isset($this->scope["item"]["sell"]) ? $this->scope["item"]["sell"]:null);
if ($this->isArray($_fh3_data) === true)
{
	foreach ($_fh3_data as $this->scope['r']=>$this->scope['p'])
	{
/* -- foreach start output */
?>
                        <span class="resource" style="background: url(images/resource-<?php echo $this->scope["r"];?>.png) left no-repeat; <?php if ((isset($this->scope["r"]) ? $this->scope["r"] : null) == 4) {
?>padding-left: 25px;<?php 
}?>"><?php echo $this->scope["p"];?></span>
                        <?php 
/* -- foreach end output */
	}
}?>

                    </li>
                    <?php 
}?>

                </ul>
            </div>
        </div>
        <div class="table-body">
            <div class="nav">
<!--                <?php if ((isset($this->scope["table"]["see_also"]) ? $this->scope["table"]["see_also"]:null)) {
?><a id="see_also"><?php echo translate('See Also');?> (<?php echo sizeof((isset($this->scope["table"]["see_also"]) ? $this->scope["table"]["see_also"]:null));?>)</a><?php 
}?>-->
                <a id="comments"><?php echo translate('Comments');?> (<?php echo sizeof((isset($this->scope["table"]["comments"]) ? $this->scope["table"]["comments"]:null));?>)</a>
                <a id="screenshots"><?php echo translate('Screenshots');?> (<?php echo sizeof((isset($this->scope["table"]["screenshots"]) ? $this->scope["table"]["screenshots"]:null));?>)</a>
            </div>
            <div class="table-panel">
                <div class="pages"></div>
<!--                <table class="see_also tcont">
                    <thead>
                        <tr>
                            <td class="name"><?php echo translate('Name');?></td>
                            <td width="50"><?php echo translate('Side');?></td>
                            <td width="100"><?php echo translate('Type');?></td>
                            <td width="90"><?php echo translate('Ship type');?></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
$_fh4_data = (isset($this->scope["search_results"]) ? $this->scope["search_results"] : null);
if ($this->isArray($_fh4_data) === true)
{
	foreach ($_fh4_data as $this->scope['item'])
	{
/* -- foreach start output */
?>
                        <tr id="<?php echo $this->scope["item"]["id"];?>">
                            <td class="name"><img src="" width="" height="" alt="" /><?php echo translate((isset($this->scope["item"]["name"]) ? $this->scope["item"]["name"]:null));?></td>
                            <td class="<?php if ((isset($this->scope["item"]["race"]) ? $this->scope["item"]["race"]:null) == 1) {
?>colonial<?php 
}
if ((isset($this->scope["item"]["race"]) ? $this->scope["item"]["race"]:null) == 2) {
?>cylon<?php 
}?>"></td>
                            <td><?php echo translate((isset($this->scope["item"]["type"]) ? $this->scope["item"]["type"]:null));?></td>
                            <td><?php echo translate((isset($this->scope["item"]["ship_type"]) ? $this->scope["item"]["ship_type"]:null));?></td>
                        </tr>
                        <?php 
/* -- foreach end output */
	}
}?>

                    </tbody>
                </table>-->
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
        
        $.ajax({
            url: 'items.php',
            type: 'post',
            data: {
                ajaxReq: 1,
                id: <?php echo $this->scope["item"]["id"];?>

            },
            dataType: 'json'
        }).done(function(data){
            window.updata = data;
        });
        
        $('.level-nav a').click(function() {
            var upgrades = updata['upgrades'];
            var flst = updata['flst'];
            
            var cLevel = $('.level-nav a.active:last').attr('rel');
            var type = $(this).attr('id');

            if(type == 'arrow') {
                var aType = $(this).attr('class');
                if(aType == 'up' && cLevel < 15) {
                    cLevel++;
                    $('.level-nav a.c'+cLevel).addClass('active');
                }
                if(aType == 'down' && cLevel > 1) {
                    $('.level-nav a.c'+cLevel).removeClass('active');
                    cLevel--;
                }
            } else {
                var cLevel = $(this).attr('rel');
                $('.level-nav a').removeClass('active');
                for(i=1; i<=cLevel; i++) {
                    $('.level-nav a.c'+i).addClass('active');
                }
            }
            
            $('.stats h2 span.level, .requirements span.level').html(cLevel);
            $('.requirements span.name').html(upgrades['skill'][cLevel]['name']);
            $('.requirements span.slevel').html(upgrades['skill'][cLevel]['level']);
            $('.requirements a.skill').attr('href', 'info.php?a=skills&id='+upgrades['skill'][cLevel]['id']);
            
            if(cLevel == 1)
                var ar_key = 1;
            if(cLevel > 0 && cLevel < 11)
                var ar_key = '2-10';
            if(cLevel > 10 && cLevel < 16)
                var ar_key = '11-15';
            
            $.each(upgrades[ar_key], function(key, up) {
                var cVal = parseFloat($('.stats li.' + key + ' span').html());
                console.log(key);
                if(cVal > 0) {
                    if(cLevel > 0 && cLevel < 11)
                        stats = parseInt(upgrades[1][key]) + ((cLevel-1) * parseFloat(up));
                    if(cLevel > 10 && cLevel < 16)
                        stats = (parseInt(upgrades[1][key]) + (9 * parseFloat(upgrades['2-10'][key]))) + ((cLevel - 10) * parseFloat(up));
                    $('.stats li.'+key+' span').html((stats).toFixed(2));
                }
            });
            
            var price='';
            $.each(upgrades['price'][cLevel], function(res, val){
                if(res == 1) {
                    var tylPrice = '<span class="resource" style="background: url(images/resource-'+res+'.png) left no-repeat;">'+val+'</span>';
                    price = price + tylPrice;
                } else if(res == 2) {
                    var cubPrice = '<span class="resource" style="background: url(images/resource-'+res+'.png) left no-repeat;">'+val+'</span>';
                    price = price + cubPrice;
                } else if(res == 3) {
                    var tkPrice = '<span class="resource" style="background: url(images/resource-'+res+'.png) left no-repeat;">'+val+'</span>';
                    price = price + tkPrice;
                } else if(res == 4) {
                    var merPrice = '<span class="resource" style="background: url(images/resource-'+res+'.png) left no-repeat;padding-left:25px;">'+val+'</span>';
                    price = price + merPrice;
                }
            });
            
            $('.requirements span.up-price').html(price);
            
            $.ajax({
                url: 'items.php',
                type: 'post',
                data: {
                    ajaxReq: 2,
                    level: cLevel,
                    upgrades: upgrades
                },
                dataType: 'json'
            }).done(function(totPrice){
                var price = '';
                if(totPrice['tyl'] > 0)
                    price = price + '<span class="resource" style="background: url(images/resource-1.png) left no-repeat;">'+totPrice['tyl']+'</span>';
                if(totPrice['cub'] > 0)
                    price = price + '<span class="resource" style="background: url(images/resource-2.png) left no-repeat;">'+totPrice['cub']+'</span>';
                if(totPrice['tk'] > 0)
                    price = price + '<span class="resource" style="background: url(images/resource-3.png) left no-repeat;">'+totPrice['tk']+'</span>';
                if(totPrice['mer'] > 0)
                    price = price + '<span class="resource" style="background: url(images/resource-4.png) left no-repeat;">'+totPrice['mer']+'</span>';

                $('.requirements span.tot-price').html(price);
            });
        });
    });

</script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>