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
        <form action="search.php" method="post" class="search_form">
            {translate 'What you are searching ?'}
            <select name="search_category" class="search_cat">
                <option value="items" {if $search == 'items' || $subaction == 'weapons' || $subaction == 'computers' || $subaction == 'hull' || $subaction == 'engine' || $subaction == 'ammo' || $subaction == 'resources' || $subaction == 'boosters' || $subaction == 'paints' || $subaction == 'mission'}selected="selected"{/if}>{translate 'Items'}</option>
                <option value="ships" {if $search == 'ships'}selected="selected"{/if}>{translate 'Ships'}</option>
                <option value="systems" {if $search == 'systems'}selected="selected"{/if}>{translate 'Systems'}</option>
                <option value="assignments" {if $search == 'assignments'}selected="selected"{/if}>{translate 'Assignments'}</option>
                <option value="skills" {if $search == 'skills'}selected="selected"{/if}>{translate 'Skills'}</option>
            </select>
            <select name="item_type" class="items" {if $search != 'items' && $search}style="display:none;"{/if}>
                <option value="all">{translate 'All'}</option>
                <option value="weapon" {if $search == 'items' && $subaction == 'weapon'}selected="selected"{/if}>{translate 'Weapons'}</option>
                <option value="computer" {if $search == 'items' && $subaction == 'computer'}selected="selected"{/if}>{translate 'Computers'}</option>
                <option value="hull" {if $search == 'items' && $subaction == 'hull'}selected="selected"{/if}>{translate 'Hull'}</option>
                <option value="engine" {if $search == 'items' && $subaction == 'engine'}selected="selected"{/if}>{translate 'Engine'}</option>
                <option value="ammo" {if $search == 'items' && $subaction == 'ammo'}selected="selected"{/if}>{translate 'Ammo'}</option>
                <option value="resource" {if $search == 'items' && $subaction == 'resource'}selected="selected"{/if}>{translate 'Resources'}</option>
                <option value="booster" {if $search == 'items' && $subaction == 'booster'}selected="selected"{/if}>{translate 'Boosters'}</option>
                <option value="paint" {if $search == 'items' && $subaction == 'paint'}selected="selected"{/if}>{translate 'Paints'}</option>
                <option value="mission" {if $search == 'items' && $subaction == 'mission'}selected="selected"{/if}>{translate 'Mission'}</option>
            </select>
            <select name="race" class="race" {if $search != 'ships' && $search != 'items' && $search}style="display:none;"{/if}>
                <option value="all">{translate 'All'}</option>
                <option value="1" {if $race == 1}selected="selected"{/if}>{translate 'Colonial'}</option>
                <option value="2" {if $race == 2}selected="selected"{/if}>{translate 'Cylon'}</option>
                {if $search == 'items'}<option value="3">{translate 'Neutral'}</option>{/if}
            </select>
            <select name="ships_type" class="ships_type" {if $search != 'ships'}style="display:none;"{/if}>
                <option value="all">{translate 'All'}</option>
                <option value="strike">{translate 'Strike'}</option>
                <option value="escort">{translate 'Escort'}</option>
                <option value="line">{translate 'Line'}</option>
                <option value="currier">{translate 'Currier'}</option>
            </select>
            <select name="skills_type" class="skills_type" {if $search != 'skills'}style="display:none;"{/if}>
                <option value="all">{translate 'All'}</option>
                <option value="weapon" {if $search == 'skills' && $subaction == 'weapon'}selected="selected"{/if}>{translate 'Weapon'}</option>
                <option value="hull" {if $search == 'skills' && $subaction == 'hull'}selected="selected"{/if}>{translate 'Hull'}</option>
                <option value="engine" {if $search == 'skills' && $subaction == 'engine'}selected="selected"{/if}>{translate 'Engine'}</option>
                <option value="computer" {if $search == 'skills' && $subaction == 'computer'}selected="selected"{/if}>{translate 'Computer'}</option>
            </select>

            <input type="submit" value="{translate 'Search'}" />
        </form>

        <table>
            <thead>
                <tr>
                    <td class="name">{translate 'Name'}</td>
                    <td width="50">{translate 'Side'}</td>
                    <td width="100">{translate 'Type'}</td>
                    <td width="90">{translate 'Ship type'}</td>
                </tr>
            </thead>
            <tbody>
                {if $search_results}
                {foreach $search_results item=item}
                <tr id="{$item.id}" {if $search == 'systems' || $search == 'assignments' || $search == 'skills'}type="{$search}"{/if} rel="{if $search == 'systems' || $search == 'assignments' || $search == 'skills'}info{/if}{if $search == 'ships'}ships{/if}{if $search == 'items'}items{/if}">
                    <td class="name">
                        <img src="images/icons/{$item.image}-t.png" width="30" height="26" alt="{$item.name}"/>
                        <span>{translate $item.name}</span>
                    </td>
                    <td class="{if $item.race == 1}colonial{/if}{if $item.race == 2}cylon{/if}{if $item.race == 3}neutral{/if}"></td>
                    <td>{ucfirst(translate($item.type))}</td>
                    <td>{ucfirst(translate($item.ship_type))}</td>
                </tr>
                {/foreach}
                {else}
                <tr class="nonClickable">
                    <td colspan="4">{translate 'No results.'}</td>
                </tr>
                {/if}
            </tbody>
        </table>
    </div>
</div>
<script>
    $('select.search_cat').change(function(){
        var val = $(this).val();
        $('select').hide();
        $(this).show();
        if(val == 'items') {
            $('select.items').show();
            $('select.race').show();
        } else if(val == 'ships') {
            $('select.race').show();
            $('select.ships_type').show();
        } else if(val == 'skills') {
            $('select.skills_type').show();
        }
    });
    
    $('tbody tr').click(function(){
        var state = $(this).attr('class');
        if(state != 'nonClickable') {
            var id = $(this).attr('id');
            var direction = $(this).attr('rel');
            var type = $(this).attr('type');
            var link = direction + '.php?id=' + id;
            if(type)
                link = link + '&a=' + type;
            window.location = link;
        }
    });
</script>