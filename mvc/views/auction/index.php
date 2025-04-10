{{ include('layouts/header.php', {title: 'User Create'})}}
<main>
        <header class="_contenu-principal">
            <h1 class="entete__titre">Gallerie des encans</h1>
            <form class="entete__triage">
                <label for="tri">Triez par :
                    <select name="pays" id="tri" class="selection-triage">
                        <option value="" selected disabled>choissisez un type</option>
                        <option value="asc-alpha">Ordre A-Z</option>
                        <option value="desc-alpha">Ordre Z-A</option>
                        <option value="asc-prix">Prix croissant</option>
                        <option value="desc-prix">Prix décroissant</option>
                        <option value="asc-temps">Temps restant le plus court</option>
                        <option value="desc-temps">Temps restant le plus long</option>
                        <option value="asc-date">Date émission plus vieux</option>
                        <option value="desc-date">Date émission plus récent</option>
                    </select>
                </label>
                <label>
                    <a href="#" class="format__liste"><img src="assets/img/image.png" alt="" style="width: 20px;"></a>
                </label>
                <label>
                    <a href="#" class="format__gallerie"><img src="assets/img/menu.png" alt="" style="width: 20px;"></a>
                </label>
            </form>
        </header>
        <div class="contenu-principal">
            <aside class="filtres">
                <div class="filtre">
                    <div class="filtre__contenu filtre_checkbox">
                        <h3>Conditions</h3>
                        <label>Mint/Near-Mint<input type="checkbox" class="filtre__input"></label>
                        <label>Légèrement Usé<input type="checkbox" class="filtre__input"></label>
                        <label>Modérément Usé<input type="checkbox" class="filtre__input"></label>
                        <label>Très Usé<input type="checkbox" class="filtre__input"></label>
                        <label>Endommagé<input type="checkbox" class="filtre__input"></label>
                    </div>
                </div>
                <hr>
                <div class="filtre">
                    <div class="filtre__contenu filtre_checkbox">
                        <h3>Pays d'origine</h3>
                        <label>Canada<input type="checkbox" class="filtre__input"></label>
                        <label>États-Unis<input type="checkbox" class="filtre__input"></label>
                        <label>France<input type="checkbox" class="filtre__input"></label>
                        <label>Grande-Bretagne<input type="checkbox" class="filtre__input"></label>
                        <label>Allemagne<input type="checkbox" class="filtre__input"></label>
                    </div>
                </div>
                <hr>
                <div class="filtre">
                    <div class="filtre__contenu filtre_checkbox">
                        <h3>Thèmes</h3>
                        <label>Histoire<input type="checkbox" class="filtre__input"></label>
                        <label>Faune et flore<input type="checkbox" class="filtre__input"></label>
                        <label>Fêtes et évènements<input type="checkbox" class="filtre__input"></label>
                        <label>Art et culture<input type="checkbox" class="filtre__input"></label>
                        <label>Personalités et lieux<input type="checkbox" class="filtre__input"></label>
                    </div>
                </div>
                <hr>
                <div class="filtre">
                    <div class="filtre__contenu filtre_checkbox">
                        <h3>Papier</h3>
                        <label>Vélin<input type="checkbox" class="filtre__input"></label>
                        <label>Vergé<input type="checkbox" class="filtre__input"></label>
                        <label>Granité<input type="checkbox" class="filtre__input"></label>
                    </div>
                </div>
                <hr>
                <div class="filtre">
                    <div class="filtre__contenu"></div>
                </div>
            </aside>
            <div class="grille">
                <div class="grille__contenu">

                    {% for enchere in enchere %}
                        <div class="carte">

                            <div class="carte__img" style="display:flex; justify-content:center; align-item:center;"><img src="{{base}}/uploads/{{ enchere.timbre.image.chemin }}" alt="" style="width:200px;"></div>

                            <h2>{{enchere.timbre.titre}}</h2>

                            <p><i>{{enchere.timbre.condition}}</i></p>

                            <p>{{enchere.timbre.pays}}</p>

                            <p>{{timbre.date}}</p>

                            <div class="carte__details">
                                <p>Debut de l'encan:</p>
                                <p>{{ enchere.debut }}</p>
                            </div>

                            <div class="carte__details">
                                <p>Fin de l'encan:</p>
                                <p>{{ enchere.fin }}</p>
                            </div>

                            <div class="carte__details">
                                <p>Mise de depart:</p>
                                <p>{{ enchere.prix_plancher}}</p>
                            </div>

                            <div class="carte__btn"><a href="{{base}}/auction/show?id={{enchere.timbre_id}}" class="carte__btn">Miser</a></div>
                        </div>
                    {% endfor %}

                    <!-- {% for enchere in enchere %}
                        <p>{{enchere.debut}}</p>
                    {% endfor %} -->

                </div>
            </div>
            <aside class="banniere">
                <picture class="banniere__event">
                    <img src="#" alt="">
                </picture>
                <picture class="banniere__event">
                    <img src="#" alt="">
                </picture>
            </aside>
        </div>
    </main>
    {{ include('layouts/footer.php')}}