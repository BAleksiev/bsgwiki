<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/general.css" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/general.js"></script>
        <script type="text/javascript" src="js/jquery.tools.min.js"></script>
        <title>BSG Wiki</title>
    </head>
    <body>
        <div id="top_nav">
            <ul class="main_nav">
                <li>
                    <a><span class="menu"><?php echo translate('Database');?></span></a>
                    <ul class="sub">
                        <li class="first">
                            <a class="menu" href="search.php?s=items"><span><?php echo translate('Items');?></span></a>
                            <ul class="sub">
                                <li class="first"><a href="search.php?s=items&a=weapon"><span><?php echo translate('Weapons');?></span></a></li>
                                <li><a href="search.php?s=items&a=computer"><span><?php echo translate('Computers');?></span></a></li>
                                <li><a href="search.php?s=items&a=hull"><span><?php echo translate('Hull');?></span></a></li>
                                <li><a href="search.php?s=items&a=engine"><span><?php echo translate('Engine');?></span></a></li>
                                <li><a href="search.php?s=items&a=ammo"><span><?php echo translate('Ammo');?></span></a></li>
                                <li><a href="search.php?s=items&a=resource"><span><?php echo translate('Resources');?></span></a></li>
                                <li><a href="search.php?s=items&a=booster"><span><?php echo translate('Boosters');?></span></a></li>
                                <li><a href="search.php?s=items&a=paint"><span><?php echo translate('Paints');?></span></a></li>
                                <li class="last"><a href="search.php?s=items&a=mission"><span><?php echo translate('Mission');?></span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="menu" href="search.php?s=ships"><span><?php echo translate('Ships');?></span></a>
                            <ul class="sub">
                                <li class="first"><a href="search.php?s=ships&r=1"><span><?php echo translate('Colonial');?></span></a></li>
                                <li class="last"><a href="search.php?s=ships&r=2"><span><?php echo translate('Cylon');?></span></a></li>
                            </ul>
                        </li>
                        <li><a href="search.php?s=systems"><span><?php echo translate('Systems');?></span></a></li>
                        <li><a href="search.php?s=assignments"><span><?php echo translate('Assignments');?></span></a></li>
                        <li class="last">
                            <a class="menu" href="search.php?s=skills"><span><?php echo translate('Skills');?></span></a>
                            <ul class="sub">
                                <?php echo $this->assignInScope(0, 'n');?>

                                <?php 
$_fh1_data = (isset($this->scope["db"]["skills"]) ? $this->scope["db"]["skills"]:null);
if ($this->isArray($_fh1_data) === true)
{
	foreach ($_fh1_data as $this->scope['k']=>$this->scope['s'])
	{
/* -- foreach start output */
?>
                                <?php echo $this->assignInScope(((isset($this->scope["n"]) ? $this->scope["n"] : null) + 1), 'n');?>

                                <li class="<?php if ((isset($this->scope["n"]) ? $this->scope["n"] : null) == 1) {
?>first<?php 
}?> <?php if ((isset($this->scope["n"]) ? $this->scope["n"] : null) == sizeof((isset($this->scope["db"]["skills"]) ? $this->scope["db"]["skills"]:null)) || sizeof((isset($this->scope["db"]["skills"]) ? $this->scope["db"]["skills"]:null)) == 2) {
?>last<?php 
}?>">
                                    <a class="menu" href="search.php?s=skills&a=<?php echo $this->scope["k"];?>"><span><?php echo ucfirst(translate((isset($this->scope["k"]) ? $this->scope["k"] : null)));?></span></a>
                                    <ul class="sub">
                                        <?php echo $this->assignInScope(0, 'r');?>

                                        <?php 
$_fh0_data = $this->readVar("db.skills.".(isset($this->scope["k"]) ? $this->scope["k"] : null));
if ($this->isArray($_fh0_data) === true)
{
	foreach ($_fh0_data as $this->scope['skill'])
	{
/* -- foreach start output */
?>
                                        <?php echo $this->assignInScope(((isset($this->scope["r"]) ? $this->scope["r"] : null) + 1), 'r');?>

                                        <li class="<?php if ((isset($this->scope["r"]) ? $this->scope["r"] : null) == 1) {
?>first<?php 
}?> <?php if ((isset($this->scope["r"]) ? $this->scope["r"] : null) == sizeof($this->readVar("db.skills.".(isset($this->scope["k"]) ? $this->scope["k"] : null))) || sizeof($this->readVar("db.skills.".(isset($this->scope["k"]) ? $this->scope["k"] : null))) == 2) {
?>last<?php 
}?>"><a href="info.php?a=skills&id=<?php echo $this->scope["skill"]["id"];?>"><span><?php echo translate((isset($this->scope["skill"]["name"]) ? $this->scope["skill"]["name"]:null));?></span></a></li>
                                        <?php 
/* -- foreach end output */
	}
}?>

                                    </ul>
                                </li>
                                <?php 
/* -- foreach end output */
	}
}?>

                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="news.php"><span><?php echo translate('News');?></span></a></li>
                <li><a href="guides.php"><span><?php echo translate('Guides');?></span></a></li>
                <li>
                    <a><span class="menu"><?php echo translate('More');?></span></a>
                    <ul class="sub">
                        <li class="first"><a href="help.php"><span><?php echo translate('Help');?></span></a></li>
                        <li class="last"><a href="advertise.php"><span><?php echo translate('Advertise');?></span></a></li>
                    </ul>
                </li>
            </ul>
            <ul class="right_nav">
                <li><a class="profile" rel="#login"><span><?php echo translate('Login');?></span></a></li><b>|</b>
                <li><a class="feedback" rel="#feedback"><span><?php echo translate('Feedback');?></span></a></li><b>|</b>
                <li>
                    <a class="language"><span class="menu"><?php echo translate($this->readVar("langs.".(isset($this->scope["lang"]) ? $this->scope["lang"] : null)));?></span></a>
                    <ul class="sub">
                        <?php echo $this->assignInScope(0, 'n');?>

                        <?php 
$_fh2_data = (isset($this->scope["langs"]) ? $this->scope["langs"] : null);
if ($this->isArray($_fh2_data) === true)
{
	foreach ($_fh2_data as $this->scope['k']=>$this->scope['l'])
	{
/* -- foreach start output */
?>
                        <?php if ((isset($this->scope["k"]) ? $this->scope["k"] : null) != (isset($this->scope["lang"]) ? $this->scope["lang"] : null)) {
?>
                        <?php echo $this->assignInScope(((isset($this->scope["n"]) ? $this->scope["n"] : null) + 1), 'n');?>

                        <li class="<?php if ((isset($this->scope["n"]) ? $this->scope["n"] : null) == 1) {
?>first<?php 
}?> <?php if ((isset($this->scope["n"]) ? $this->scope["n"] : null) == sizeof((isset($this->scope["langs"]) ? $this->scope["langs"] : null)) || sizeof((isset($this->scope["langs"]) ? $this->scope["langs"] : null)) == 2) {
?>last<?php 
}?>"><a href="<?php echo $this->scope["url"];?>" onclick="changeLanguage('<?php echo $this->scope["k"];?>');"><span><?php echo $this->scope["l"];?></span></a></li>
                        <?php 
}?>

                        <?php 
/* -- foreach end output */
	}
}?>

                    </ul>
                </li>
            </ul>
        </div>
        <div id="layout">
            <?php if ((isset($this->scope["action"]) ? $this->scope["action"] : null) != 'index') {
?>
            <div class="top">
                <a href="index.php" class="logo"></a>
                <div class="banner-hor-long"></div>
            </div>
            <?php 
}
 /* end template body */
return $this->buffer . ob_get_clean();
?>