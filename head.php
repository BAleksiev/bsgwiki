<?php

$action = substr($_SERVER['PHP_SELF'],9,-4);
$url = substr($_SERVER['REQUEST_URI'],9);

include 'config.php';
include 'functions.php';
db_conn();


$lan = fetchAll(query('SELECT * FROM langs'));
foreach($lan as $l)
    $langs[$l['key']] = $l['language'];

$_SESSION['language'] = 'en';

if($_COOKIE['lang']) {
    $tl = null;
    foreach($langs as $k => $l)
        if($k == $_COOKIE['lang'])
            $tl = true;
    if($tl == true)
        $_SESSION['language'] = $_COOKIE['lang'];
}

if(!$_SESSION['lang']) {
    $translations = fetchAll(query('SELECT * FROM languages'));
    foreach($translations as $t)
        foreach($langs as $k => $l)
            $_SESSION['lang'][$t['key']][$k]=$t[$k];
}

if(!$_SESSION['db']) {
    $_SESSION['db']['ships'] = fetchAll(query('SELECT * FROM ships'));
    $_SESSION['db']['systems'] = fetchAll(query('SELECT * FROM systems'));
    $skills = fetchAll(query('SELECT * FROM skills'));
    foreach($skills as $s)
        $_SESSION['db']['skills'][$s['type']][$s['id']] = $s;
}

$data['resources'] = $_SESSION['resources'];
$data['breadcrumbs'][] = setBreadcrumb('database','search.php');
$data['lang'] = $_SESSION['language'];
$data['langs'] = $langs;
$data['action'] = $action;
$data['url'] = $url;
$data['db'] = $_SESSION['db'];