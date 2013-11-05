<!DOCTYPE html>
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
                    <a><span class="menu">{translate 'Database'}</span></a>
                    <ul class="sub">
                        <li class="first">
                            <a class="menu" href="search.php?s=items"><span>{translate 'Items'}</span></a>
                            <ul class="sub">
                                <li class="first"><a href="search.php?s=items&a=weapon"><span>{translate 'Weapons'}</span></a></li>
                                <li><a href="search.php?s=items&a=computer"><span>{translate 'Computers'}</span></a></li>
                                <li><a href="search.php?s=items&a=hull"><span>{translate 'Hull'}</span></a></li>
                                <li><a href="search.php?s=items&a=engine"><span>{translate 'Engine'}</span></a></li>
                                <li><a href="search.php?s=items&a=ammo"><span>{translate 'Ammo'}</span></a></li>
                                <li><a href="search.php?s=items&a=resource"><span>{translate 'Resources'}</span></a></li>
                                <li><a href="search.php?s=items&a=booster"><span>{translate 'Boosters'}</span></a></li>
                                <li><a href="search.php?s=items&a=paint"><span>{translate 'Paints'}</span></a></li>
                                <li class="last"><a href="search.php?s=items&a=mission"><span>{translate 'Mission'}</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="menu" href="search.php?s=ships"><span>{translate 'Ships'}</span></a>
                            <ul class="sub">
                                <li class="first"><a href="search.php?s=ships&r=1"><span>{translate 'Colonial'}</span></a></li>
                                <li class="last"><a href="search.php?s=ships&r=2"><span>{translate 'Cylon'}</span></a></li>
                            </ul>
                        </li>
                        <li><a href="search.php?s=systems"><span>{translate 'Systems'}</span></a></li>
                        <li><a href="search.php?s=assignments"><span>{translate 'Assignments'}</span></a></li>
                        <li class="last">
                            <a class="menu" href="search.php?s=skills"><span>{translate 'Skills'}</span></a>
                            <ul class="sub">
                                {assign 0 n}
                                {foreach $db.skills key=k item=s}
                                {assign $n+1 n}
                                <li class="{if $n == 1}first{/if} {if $n == sizeof($db.skills) || sizeof($db.skills) == 2}last{/if}">
                                    <a class="menu" href="search.php?s=skills&a={$k}"><span>{ucfirst(translate($k))}</span></a>
                                    <ul class="sub">
                                        {assign 0 r}
                                        {foreach $db.skills.$k item=skill}
                                        {assign $r+1 r}
                                        <li class="{if $r == 1}first{/if} {if $r == sizeof($db.skills.$k) || sizeof($db.skills.$k) == 2}last{/if}"><a href="info.php?a=skills&id={$skill.id}"><span>{translate $skill.name}</span></a></li>
                                        {/foreach}
                                    </ul>
                                </li>
                                {/foreach}
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="news.php"><span>{translate 'News'}</span></a></li>
                <li><a href="guides.php"><span>{translate 'Guides'}</span></a></li>
                <li>
                    <a><span class="menu">{translate 'More'}</span></a>
                    <ul class="sub">
                        <li class="first"><a href="help.php"><span>{translate 'Help'}</span></a></li>
                        <li class="last"><a href="advertise.php"><span>{translate 'Advertise'}</span></a></li>
                    </ul>
                </li>
            </ul>
            <ul class="right_nav">
                <li><a class="profile" rel="#login"><span>{translate 'Login'}</span></a></li><b>|</b>
                <li><a class="feedback" rel="#feedback"><span>{translate 'Feedback'}</span></a></li><b>|</b>
                <li>
                    <a class="language"><span class="menu">{translate $langs.$lang}</span></a>
                    <ul class="sub">
                        {assign 0 n}
                        {foreach $langs key=k item=l}
                        {if $k != $lang}
                        {assign $n+1 n}
                        <li class="{if $n == 1}first{/if} {if $n == sizeof($langs) || sizeof($langs) == 2}last{/if}"><a href="{$url}" onclick="changeLanguage('{$k}');"><span>{$l}</span></a></li>
                        {/if}
                        {/foreach}
                    </ul>
                </li>
            </ul>
        </div>
        <div id="layout">
            {if $action != 'index'}
            <div class="top">
                <a href="index.php" class="logo"></a>
                <div class="banner-hor-long"></div>
            </div>
            {/if}