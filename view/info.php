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
            {if $type == 'skills'}<img src="images/icons/{$item.image}.png" width="40" height="35" alt="{$item.name}" />{/if}
            {if $type == 'assignments'}<img src="images/icons/assignments-icon.png" width="40" height="35" alt="{$item.name}" />{/if}
            {if $type == 'systems'}<img src="images/icons/systems-icon.png" width="40" height="35" alt="{$item.name}" />{/if}
            <span>{$item.name}</span>
        </h2>
        <div class="cont">
            <div class="desc">
                {translate '$item.description'}
            </div>
            {if $type == 'assignments'}
                <h3>{translate 'Objectives'}:</h2>
                {translate '$item.objectives'}
                <h3>{translate 'Rewords'}:</h2>
                {translate '$item.rewords'}
            {/if}
        </div>
        <div class="info">
            <div class="panel-top"></div>
            <div class="panel-body">
                <ul>
                    {if $type == 'skills'}<li><b>{translate 'Type:'}</b> {ucfirst(translate($item.type))}</li>{/if}
                    {if $item.action}<li><b>{translate 'Action'}:</b> {ucfirst(translate($item.action))}</li>{/if}
                    {if $item.race}<li><b>{translate 'Race'}:</b> <span class="{if $item.race == 1}colonial{/if}{if $item.race == 2}cylon{/if}">{if $item.race == 1}{translate 'Colonial'}{/if}{if $item.race == 2}{translate 'Cylon'}{/if}{if $item.race == 3}{translate 'Neutral'}{/if}</span></li>{/if}
                    {if $type == 'skills'}
                    <li><b>{translate 'Price'}:</b> {$item.price.1} {translate 'XP'}</li>
                    <li><b>{translate 'Training'}:</b> {$item.training.1} {translate 'min'}</li>
                    {/if}
                    {if $type == 'assignments'}
                    <li><b>{translate 'Sector'}:</b> {ucfirst(translate($item.sector))}</li>
                    {/if}
                </ul>
            </div>
        </div>
        <div class="table-body">
            <div class="nav">
                <a id="comments">{translate 'Comments'} ({sizeof $table.comments})</a>
                <a id="screenshots">{translate 'Screenshots'} ({sizeof $table.screenshots})</a>
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
        
    });
</script>