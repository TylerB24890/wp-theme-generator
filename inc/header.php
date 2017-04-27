<?php

if(isset($_POST['submit_theme'])) {
    include_once('Create_Theme.php');

    $ctobj = new Create_Theme();
    $resp = $ctobj->process_form_submission($_POST);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WordPress Theme Maker - By Tyler Bailey</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>

    </header>
