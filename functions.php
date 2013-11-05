<?php

function db_conn() {
    mysql_connect('localhost', 'root', '') or die("Грешка при свързване с базата данни");
    mysql_select_db('bsgwiki');
}

function query($query) {
    mysql_query('SET NAMES utf8');
    if(mysql_error())
        return mysql_error();
    return mysql_query($query);
}

function fetch($query) {
    return mysql_fetch_assoc($query);
}

function fetchAll($res) {
    while($rs = mysql_fetch_assoc($res))
        $result[] = $rs;
    return $result;
}

function pr($var) {
    echo '<pre>'.print_r($var, true).'</pre>';
}

function translate($str) {
    $st = explode(' ', $str);
    if(sizeof($st) > 1) {
        $str = null;
        $n = 0;
        foreach($st as $s) {
            $n++;
            if($n == sizeof($st)) {
                $dot = substr($s, -1);
                if($dot == '.')
                    $s = substr($s, 0, -1);
            }
            if(isset($_SESSION['lang'][$s][$_SESSION['language']]))
                $str .= $_SESSION['lang'][$s][$_SESSION['language']].' ';
            else
                $str .= $s.' ';
            if($dot == '.')
                $str = substr($str, 0, -1).'.';
        }
        return $str;
    } else {
        if(isset($_SESSION['lang'][$str][$_SESSION['language']]))
            return $_SESSION['lang'][$str][$_SESSION['language']];
        else
            return $str;
    }
}

function loadDwoo($action, $data) {
    include 'dwoo/dwooAutoload.php';
    $dwoo = new Dwoo();

    if(is_array($action))
        foreach($action as $act)
            $dwoo->output('view/'.$act.'.php', $data);
    else
        $dwoo->output('view/'.$action.'.php', $data);
}

function setBreadcrumb($key, $link) {
    $br['name'] = ucfirst($key);
    $br['key'] = $key;
    $br['link'] = $link;
    
    return $br;
}

function explodeItemStats($stats,$slash = null) {
    if($slash == true) {
        $s1 = explode('/', $stats);
        foreach($s1 as $s)
            $s2[] = explode('--', $s);
        foreach($s2 as $s)
            $s3[$s[0]] = $s[1];
        foreach($s3 as $k => $s) {
            $s5 = null;
            $s4 = explode(',', $s);
            foreach($s4 as $s)
                $s5[] = explode('-', $s);
            foreach($s5 as $s) {
                if($s[1] == 'minus')
                    $s[1] = '-';
                $res[$k][$s[0]] = $s[1];
            }
        }
    } else {
        $s1 = explode(',', $stats);

        foreach($s1 as $s)
            $s2[] = explode('-', $s);
        foreach($s2 as $s) {
            if($s[1] == 'minus')
                $s[1] = '-';
            $res[$s[0]] = $s[1];
        }
    }
    
    return $res;
}