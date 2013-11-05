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
        <form action="search.php" method="post" class="search_form">
            <?php echo translate('What you are searching ?');?>

            <select name="search_category" class="search_cat">
                <option value="items" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'items' || (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'weapons' || (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'computers' || (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'hull' || (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'engine' || (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'ammo' || (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'resources' || (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'boosters' || (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'paints' || (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'mission') {
?>selected="selected"<?php 
}?>><?php echo translate('Items');?></option>
                <option value="ships" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'ships') {
?>selected="selected"<?php 
}?>><?php echo translate('Ships');?></option>
                <option value="systems" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'systems') {
?>selected="selected"<?php 
}?>><?php echo translate('Systems');?></option>
                <option value="assignments" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'assignments') {
?>selected="selected"<?php 
}?>><?php echo translate('Assignments');?></option>
                <option value="skills" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'skills') {
?>selected="selected"<?php 
}?>><?php echo translate('Skills');?></option>
            </select>
            <select name="item_type" class="items" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) != 'items' && (isset($this->scope["search"]) ? $this->scope["search"] : null)) {
?>style="display:none;"<?php 
}?>>
                <option value="all"><?php echo translate('All');?></option>
                <option value="weapon" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'items' && (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'weapon') {
?>selected="selected"<?php 
}?>><?php echo translate('Weapons');?></option>
                <option value="computer" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'items' && (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'computer') {
?>selected="selected"<?php 
}?>><?php echo translate('Computers');?></option>
                <option value="hull" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'items' && (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'hull') {
?>selected="selected"<?php 
}?>><?php echo translate('Hull');?></option>
                <option value="engine" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'items' && (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'engine') {
?>selected="selected"<?php 
}?>><?php echo translate('Engine');?></option>
                <option value="ammo" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'items' && (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'ammo') {
?>selected="selected"<?php 
}?>><?php echo translate('Ammo');?></option>
                <option value="resource" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'items' && (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'resource') {
?>selected="selected"<?php 
}?>><?php echo translate('Resources');?></option>
                <option value="booster" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'items' && (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'booster') {
?>selected="selected"<?php 
}?>><?php echo translate('Boosters');?></option>
                <option value="paint" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'items' && (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'paint') {
?>selected="selected"<?php 
}?>><?php echo translate('Paints');?></option>
                <option value="mission" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'items' && (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'mission') {
?>selected="selected"<?php 
}?>><?php echo translate('Mission');?></option>
            </select>
            <select name="race" class="race" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) != 'ships' && (isset($this->scope["search"]) ? $this->scope["search"] : null) != 'items' && (isset($this->scope["search"]) ? $this->scope["search"] : null)) {
?>style="display:none;"<?php 
}?>>
                <option value="all"><?php echo translate('All');?></option>
                <option value="1" <?php if ((isset($this->scope["race"]) ? $this->scope["race"] : null) == 1) {
?>selected="selected"<?php 
}?>><?php echo translate('Colonial');?></option>
                <option value="2" <?php if ((isset($this->scope["race"]) ? $this->scope["race"] : null) == 2) {
?>selected="selected"<?php 
}?>><?php echo translate('Cylon');?></option>
                <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'items') {
?><option value="3"><?php echo translate('Neutral');?></option><?php 
}?>

            </select>
            <select name="ships_type" class="ships_type" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) != 'ships') {
?>style="display:none;"<?php 
}?>>
                <option value="all"><?php echo translate('All');?></option>
                <option value="strike"><?php echo translate('Strike');?></option>
                <option value="escort"><?php echo translate('Escort');?></option>
                <option value="line"><?php echo translate('Line');?></option>
                <option value="currier"><?php echo translate('Currier');?></option>
            </select>
            <select name="skills_type" class="skills_type" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) != 'skills') {
?>style="display:none;"<?php 
}?>>
                <option value="all"><?php echo translate('All');?></option>
                <option value="weapon" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'skills' && (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'weapon') {
?>selected="selected"<?php 
}?>><?php echo translate('Weapon');?></option>
                <option value="hull" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'skills' && (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'hull') {
?>selected="selected"<?php 
}?>><?php echo translate('Hull');?></option>
                <option value="engine" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'skills' && (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'engine') {
?>selected="selected"<?php 
}?>><?php echo translate('Engine');?></option>
                <option value="computer" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'skills' && (isset($this->scope["subaction"]) ? $this->scope["subaction"] : null) == 'computer') {
?>selected="selected"<?php 
}?>><?php echo translate('Computer');?></option>
            </select>

            <input type="submit" value="<?php echo translate('Search');?>" />
        </form>

        <table>
            <thead>
                <tr>
                    <td class="name"><?php echo translate('Name');?></td>
                    <td width="50"><?php echo translate('Side');?></td>
                    <td width="100"><?php echo translate('Type');?></td>
                    <td width="90"><?php echo translate('Ship type');?></td>
                </tr>
            </thead>
            <tbody>
                <?php if ((isset($this->scope["search_results"]) ? $this->scope["search_results"] : null)) {
?>
                <?php 
$_fh1_data = (isset($this->scope["search_results"]) ? $this->scope["search_results"] : null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['item'])
	{
/* -- foreach start output */
?>
                <tr id="<?php echo $this->scope["item"]["id"];?>" <?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'systems' || (isset($this->scope["search"]) ? $this->scope["search"] : null) == 'assignments' || (isset($this->scope["search"]) ? $this->scope["search"] : null) == 'skills') {
?>type="<?php echo $this->scope["search"];?>"<?php 
}?> rel="<?php if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'systems' || (isset($this->scope["search"]) ? $this->scope["search"] : null) == 'assignments' || (isset($this->scope["search"]) ? $this->scope["search"] : null) == 'skills') {
?>info<?php 
}
if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'ships') {
?>ships<?php 
}
if ((isset($this->scope["search"]) ? $this->scope["search"] : null) == 'items') {
?>items<?php 
}?>">
                    <td class="name">
                        <img src="images/icons/<?php echo $this->scope["item"]["image"];?>-t.png" width="30" height="26" alt="<?php echo $this->scope["item"]["name"];?>"/>
                        <span><?php echo translate((isset($this->scope["item"]["name"]) ? $this->scope["item"]["name"]:null));?></span>
                    </td>
                    <td class="<?php if ((isset($this->scope["item"]["race"]) ? $this->scope["item"]["race"]:null) == 1) {
?>colonial<?php 
}
if ((isset($this->scope["item"]["race"]) ? $this->scope["item"]["race"]:null) == 2) {
?>cylon<?php 
}
if ((isset($this->scope["item"]["race"]) ? $this->scope["item"]["race"]:null) == 3) {
?>neutral<?php 
}?>"></td>
                    <td><?php echo ucfirst(translate((isset($this->scope["item"]["type"]) ? $this->scope["item"]["type"]:null)));?></td>
                    <td><?php echo ucfirst(translate((isset($this->scope["item"]["ship_type"]) ? $this->scope["item"]["ship_type"]:null)));?></td>
                </tr>
                <?php 
/* -- foreach end output */
	}
}?>

                <?php 
}
else {
?>
                <tr class="nonClickable">
                    <td colspan="4"><?php echo translate('No results.');?></td>
                </tr>
                <?php 
}?>

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
</script><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>