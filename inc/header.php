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
    <title>WordPress Theme Generator | By Tyler Bailey</title>

    <meta property="og:url" content="http://theme-generator.elexicon.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="elexicon | WordPress Theme Generator" />
    <meta property="og:description" content="A basic WordPress theme generator for starter themes." />
    <meta property="og:image" content="http://theme-generator.elexicon.com/images/elexicon_bug.jpg" />

    <!-- Open Graph -->
	<meta property="og:title" content="elexicon | WordPress Theme Generator"/>
	<meta property="og:description" content="A basic WordPress theme generator for starter themes." />
   	<meta property="og:type" content="website"/>
   	<meta property="og:url" content="http://theme-generator.elexicon.com/"/>
   	<meta property="og:site_name" content="elexicon | WordPress Theme Generator"/>
   	<meta property="og:image" content="http://theme-generator.elexicon.com/images/elexicon_bug.jpg" />

   	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="elexicon | WordPress Theme Generator">
	<meta itemprop="description" content="A basic WordPress theme generator for starter themes.">
	<meta itemprop="image" content="http://theme-generator.elexicon.com/images/elexicon_bug.jpg">

	<!-- Twitter Card data -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@MakeThingsClear">
	<meta name="twitter:title" content="elexicon | WordPress Theme Generator">
	<meta name="twitter:description" content="A basic WordPress theme generator for starter themes.">
	<meta name="twitter:creator" content="@TyBailey23">
	<meta name="twitter:image:src" content="http://theme-generator.elexicon.com/images/elexicon_bug.jpg">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="//fast.fonts.net/cssapi/ffbed596-4b17-4cd1-82ae-19fb36781401.css?ver=4.7.3" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a href="https://github.com/TylerB24890/wp-theme-generator"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/38ef81f8aca64bb9a64448d0d70f1308ef5341ab/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png"></a>

    <header class="text-center">
        <img src="images/elexicon-logo.svg" onerror="this.src='images/flat-logo.png'; this.onerror=null;" alt="Elexicon, Inc." title="elexicon-logo">
    </header>
