<?php
include 'head.php';

if($_GET) {
    $filter = ' WHERE 1 ';
    
    if($_GET['s'])
        $cat = $_GET['s'];
    
    if($_GET['a']) {
        $filter .= 'AND type = "'.$_GET['a'].'" ';
        $subaction = $_GET['a'];
    }
    if($_GET['r']) {
        $filter .= 'AND race = '.$_GET['r'].' ';
        $race = $_GET['r'];
    }
    
} else if($_POST) {
    $filter = ' WHERE 1 ';
    $cat = $_POST['search_category'];
    
    if($_POST['item_type'] && $_POST['item_type'] != 'all' && $cat == 'items') {
        $filter .= 'AND type = "'.$_POST['item_type'].'" ';
        $subaction = $_POST['item_type'];
    }
    if($_POST['race'] && $_POST['race'] != 'all' && ($cat == 'items' || $cat == 'ships'))
        $filter .= 'AND race = '.$_POST['race'].' ';
    if($_POST['ships_type'] && $_POST['ships_type'] != 'all' && $cat == 'ships')
        $filter .= 'AND type = "'.$_POST['ships_type'].'" ';
    if($_POST['skills_type'] && $_POST['skills_type'] != 'all' && $cat == 'skills') {
        $filter .= 'AND type = "'.$_POST['skills_type'].'" ';
        $subaction = $_POST['skills_type'];
    }
}

if($cat == 'items' || $cat == 'ships' || $cat == 'systems' || 
        $cat == 'assignments' || $cat == 'skills') {
    
    if($cat != 'database') {
        $data['breadcrumbs'][] = setBreadcrumb($cat, 'search.php?s='.$cat);
        if($subaction)
            $data['breadcrumbs'][] = setBreadcrumb($subaction,'?search.phps='.$cat.'&a='.$subaction);
        
        $search_results = fetchAll(query('SELECT * FROM '.$cat.$filter));
    }
}

$data['search'] = $cat;
$data['subaction'] = $subaction;
$data['race'] = $race;
$data['search_results'] = $search_results;

$act[] = 'header';
$act[] = 'search';
$act[] = 'popups';
$act[] = 'footer';

loadDwoo($act, $data);