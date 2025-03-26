<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset}}css/style.css">
</head>
<body>
    <nav class="navigation _secondaire">

    {% if guest %}
        <div class="connect__btn">
            <p><a href="{{base}}/login">Sign Up</a> or <a href="{{base}}/user/create">Create An Account</a></p>
        </div>
    {% else %}
        <div class="connect__btn">
            <p><a href="#">Logout</a></p>
        </div>
    {% endif %}

        <ul class="navigation__contenu">
            <li class="navigation__li">
                <a href="#">Aide</a>
                <ul class="menu-deroulant">
                    <li class="menu-deroulant__li"><a href="">Aide "Profil"</a></li>
                    <li class="menu-deroulant__li"><a href="">Placer une offre</a></li>
                    <li class="menu-deroulant__li"><a href="">Suivre une enchere</a></li>
                    <li class="menu-deroulant__li"><a href="">Trouver une enchere</a></li>
                    <li class="menu-deroulant__li"><a href="">Contacter le webmestre</a></li>
                </ul>
            </li>
            <li class="navigation__li">
                <a href="#">Contactez-nous</a>
                <ul class="menu-deroulant">
                    <li class="menu-deroulant__li"><a href="">Angleterre</a></li>
                    <li class="menu-deroulant__li"><a href="">Canada</a></li>
                    <li class="menu-deroulant__li"><a href="">USA</a></li>
                    <li class="menu-deroulant__li"><a href="">Australie</a></li>
                    <li class="menu-deroulant__li"><a href="">Termes et conditions</a></li>
                </ul>
            </li>
            <li class="navigation__li">
                <a href="#">English</a>
                <ul class="menu-deroulant">
                    <li class="menu-deroulant__li"><a href="">French</a></li>
                    <li class="menu-deroulant__li"><a href="">Spanish</a></li>
                    <li class="menu-deroulant__li"><a href="">German</a></li>
                    <li class="menu-deroulant__li"><a href="">Russian</a></li>
                    <li class="menu-deroulant__li"><a href="">Italian</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <header class="entete">
        <div class="entete__contenu">
            <a href="index.html" class="logo"><h1>Stampee Auction</h1></a>
            <form class="searchBar">
                <input type="search">
                <input type="submit">
            </form>
        </div>
    </header>
    <nav class="navigation _principale">
        <ul class="navigation__contenu">
            <li class="navigation__li">
                <a href="#">A propos de Lord Reginald Stampee III</a>
                <ul class="menu-deroulant">
                    <li class="menu-deroulant__li"><a href="">La philatelie, c'est la vie</a></li>
                    <li class="menu-deroulant__li"><a href="">Biographie du Lord</a></li>
                    <li class="menu-deroulant__li"><a href="">Historique familial</a></li>
                </ul>
            </li>
            <li class="navigation__li">
                <a href="#">Actualites</a>
                <ul class="menu-deroulant">
                    <li class="menu-deroulant__li"><a href="">Timbres</a></li>
                    <li class="menu-deroulant__li"><a href="">Encheres</a></li>
                    <li class="menu-deroulant__li"><a href="">Bridge</a></li>
                </ul>
            </li>
            <li class="navigation__li">
                <a href="#">Archives</a>
                <ul class="menu-deroulant">
                    <li class="menu-deroulant__li"><a href="">Timbres</a></li>
                    <li class="menu-deroulant__li"><a href="">Encheres</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <hr>