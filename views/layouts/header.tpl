<!DOCTYPE HTML>
<html>
<head>
    <title>Блог{if isset($title)} | {$title}{/if}</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!--[if lte IE 8]>
    <script src="/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="/assets/css/main.css"/>
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/assets/css/ie9.css"/><![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="/assets/css/ie8.css"/><![endif]-->
    <style>
        .cbalink {
            display: none;
        }
    </style>
</head>
<body>
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <h1><a href="/">Лого</a></h1>
        <nav class="main">
            <ul>
                <li class="search">
                    <a class="fa-search" href="#search">Пошук</a>
                    <form id="search" method="get" action="#">
                        <input type="text" name="query" placeholder="Пошук"/>
                    </form>
                </li>
                <li class="menu">
                    <a class="fa-bars" href="#menu">Menu</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Menu -->
    <section id="menu">

        <!-- Search -->
        <section>
            <form class="search" method="get" action="#">
                <input type="text" name="query" placeholder="Пошук"/>
            </form>
        </section>

        <!-- Links -->
        <section>
            {if $user}
                <h3>Привіт, {$user->name}</h3>
                <ul class="actions vertical">
                    <a href="/article/addArticle" class="button big fit">Додати статтю</a>
                    <a href="/logout" class="button big fit">Вийти</a>
                </ul>
            {else}
                <h3>Вхід</h3>
                <form id="login-form" method="post">
                    <div class="row uniform">
                        <div class="12u$">
                            <input type="text" name="login" id="login" value="admin" placeholder="Логін"/>
                        </div>
                        <div class="12u$">
                            <input type="password" name="password" id="password" value="admin" placeholder="Пароль"/>
                        </div>
                        <div class="12u$">
                            <ul class="actions vertical">
                                <button type="submit" class="button big fit">Увійти</button>
                            </ul>
                        </div>
                    </div>
                </form>
            {/if}
        </section>

    </section>