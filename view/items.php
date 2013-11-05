<div class="content">
    <div class="top_line">
        <div class="breadcrumbs">
            {foreach $breadcrumbs key=k item=b}
                <a href="{$b.link}">{translate $b.name}</a>
                {if $k+1 < sizeof($breadcrumbs)}
                <div class="breadcrumb_separator"></div>
                {/if}
            {/foreach}
        </div>
        <form class="search_box" action="" method="post">
            <input type="text" name="search" class="search_field" autocomplete="off"/>
            <input type="submit" name="submit_search" value="" class="submit_search"/>
        </form>
    </div>
    
    <div class="main_container">
        <h2>
            <img src="images/icons/{$item.image}.png" width="40" height="35" alt="{$item.name}" />
            <span>{$item.name}</span>
        </h2>
        <div class="cont">

            <div class="desc">
                {translate '$item.description'}
            </div>

            {if $item.type == 'weapon' || $item.type == 'computers' || $item.type == 'hull' || $item.type == 'engine'}
            <div class="stats">
                <h2>{translate 'Stats'}<label>{translate 'Level'} <span class="level">1</span></label></h2>
                <ul>
                    {foreach $item.stats key=n item=i}
                    <li class="{$n}">
                        <b>{translate $n}</b>
                        <span class="left" style="margin: 0;">{$item.prefix.$n}</span><span rel="{number_format $i,2,'.',''}">{number_format $i,2,'.',''}</span>{translate $item.suffix.$n}
                    </li>
                    {/foreach}
                </ul>
                <div class="level-nav">
                    <a class="down" id="arrow"></a>
                    {for i 1 15}
                    <a rel="{$i}" id="{if $i < 11}dot{else}star{/if}" class="{if $i == 1}active{/if} c{$i}"></a>
                    {/for}
                    <a class="up" id="arrow"></a>
                </div>
            </div>
            <div class="requirements">
                <ul>
                    <li><b>{translate 'Level <span class="level">1</span> price:'}</b> <span class="up-price"></span></li>
                    <li><b>{translate 'Total price:'}</b> <span class="tot-price"></span></li>
                    <li><b>{translate 'Sell:'}</b> <span class="sell"></span></li>
                    <li><b>{translate 'Requires:'}</b> <a href="" class="skill">{translate '<span class="name"></span>'}</a> - <span class="slevel"></span></li>
                </ul>
            </div>
            {/if}
        </div>
        <div class="info">
            <div class="panel-top"></div>
            <div class="panel-body">
                <ul>
                    <li><b>{translate 'Item type:'}</b> {ucfirst(translate($item.type))}</li>
                    {if $item.action}<li><b>{translate 'Action'}:</b> {ucfirst(translate($item.action))}</li>{/if}
                    {if $item.race}<li><b>{translate 'Race'}:</b> <span class="{if $item.race == 1}colonial{/if}{if $item.race == 2}cylon{/if}">{if $item.race == 1}{translate 'Colonial'}{/if}{if $item.race == 2}{translate 'Cylon'}{/if}{if $item.race == 3}{translate 'Neutral'}{/if}</span></li>{/if}
                    {if $item.ship_type}<li>{translate 'Used for <b>$item.ship_type</b> size ships'}</li>{/if}
                    {if $item.price}
                    <li>
                        <b>{translate 'Buy'}:</b> 
                        {foreach $item.price key=r item=p}
                        <span class="resource" style="background: url(images/resource-{$r}.png) left no-repeat; {if $r == 4}padding-left: 25px;{/if}">{$p}</span>
                        {/foreach}
                    </li>
                    {/if}
                    {if $item.sell}
                    <li>
                        <b>{translate 'Sell'}:</b> 
                        {foreach $item.sell key=r item=p}
                        <span class="resource" style="background: url(images/resource-{$r}.png) left no-repeat; {if $r == 4}padding-left: 25px;{/if}">{$p}</span>
                        {/foreach}
                    </li>
                    {/if}
                </ul>
            </div>
        </div>
        <div class="table-body">
            <div class="nav">
<!--                {if $table.see_also}<a id="see_also">{translate 'See Also'} ({sizeof $table.see_also})</a>{/if}-->
                <a id="comments">{translate 'Comments'} ({sizeof $table.comments})</a>
                <a id="screenshots">{translate 'Screenshots'} ({sizeof $table.screenshots})</a>
            </div>
            <div class="table-panel">
                <div class="pages"></div>
<!--                <table class="see_also tcont">
                    <thead>
                        <tr>
                            <td class="name">{translate 'Name'}</td>
                            <td width="50">{translate 'Side'}</td>
                            <td width="100">{translate 'Type'}</td>
                            <td width="90">{translate 'Ship type'}</td>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach $search_results item=item}
                        <tr id="{$item.id}">
                            <td class="name"><img src="" width="" height="" alt="" />{translate $item.name}</td>
                            <td class="{if $item.race == 1}colonial{/if}{if $item.race == 2}cylon{/if}"></td>
                            <td>{translate $item.type}</td>
                            <td>{translate $item.ship_type}</td>
                        </tr>
                        {/foreach}
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
            if({sizeof $table.comments} > 10)
                var p_show = 10
            else
                var p_show = {sizeof $table.comments};
            var p_all = {sizeof $table.comments};

        }
        if(show == 'screenshots') {
            if({sizeof $table.screenshots} > 10)
                var p_show = 10
            else
                var p_show = {sizeof $table.screenshots};
            var p_all = {sizeof $table.screenshots};
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
                id: {$item.id}
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

</script>