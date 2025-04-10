{{ include('layouts/header.php', {title: 'Show Auction'})}}
<main>
    <section class="enchere">
        <div class="enchere__medaillon">
            <div class="enchere__entete">
                <h2>No de l'encan - Nom de l'Encan - DD/MM @ DD/MM</h2>
                <h4>Type d'encan (ex: Online Only)</h4>
            </div>
            <div class="enchere__contenu-general">
                <div class="enchere__gallerie">

                    <picture class="enchere__image-principale">
                        <img src="{{base}}/uploads/{{ mainImage.chemin }}" alt="Image principale du timbre" style="width: 200px;">
                    </picture>
                    <div class="enchere__carousel">
                        {% for image in images %}
                        <picture class="carousel__image" style="display:flex; gap:0px; margin:5px;">
                            <img src="{{base}}/uploads/{{ image.chemin }}" alt="Image timbre {{ loop.index }}" style="width: 50px;">
                        </picture>
                        {% endfor %}
                    </div>

                </div>
                <div class="enchere__produit">
                    <div class="timbre__infos _general">
                        <span>
                            <h3 class="timbre__titre">{{timbre.titre}}</h3>
                            <p><i>Condition: {{ conditions }}</i></p>
                            <p>Date d'impression: {{timbre.date}}</p>
                            <p><strong>Pays d'Origine: {{ pays }}</strong></p>
                        </span>
                    </div>
                    <div class="timbre__infos _general">
                        <span>
                            <h3 class="timbre__titre">Caractéristiques du timbre</h3>
                            <p>Prix Plancher : <strong>{{enchere.prix_plancher}}</strong></p>
                            <p><strong>Couleur:</strong> {{ couleur }}</p>
                            <p><strong>Longueur:</strong> {{timbre.longueur}}</p>
                            <p><strong>Largeur</strong> {{timbre.largeur}}</p>
                            <p><strong>Tirage:</strong> {{timbre.tirage}}</p>
                        </span>
                    </div>
                    <div class="timbre__infos _historique">
                        <span>
                            <h3 class="timbre__titre">Histoire de ce timbre</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi iusto dolores
                                dignissimos suscipit qui recusandae repudiandae nulla laboriosam labore deserunt,
                                quisquam consequatur hic odio, sequi praesentium atque impedit nemo quo vitae sunt
                                molestiae ipsam dolor totam. Aut ut quibusdam quas amet ex rerum atque quod quis
                                facere aspernatur modi, at recusandae dolorem iure unde ad voluptatem laudantium
                                nisi officiis a.</p>
                        </span>
                    </div>
                </div>
                <div class="enchere__action">
                    <span>
                        <h4>Temps restant de l'encan</h4>
                        <p><strong>00:00:00</strong></p>
                    </span>
                    <form method="post">
                        <input type="text" id="montant" name="montant" value="{{mise.montant}}" style="margin:15px; font-size:20px;">
                        <input type="hidden" name="enchere_id" value="{{enchere.id}}">
                        <input type="submit" class="enchere__btn" value="Miser">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="liste" style="margin:0 15vw; background-color: #e0e0e0; border:solid;">
        <div class="liste__contenu" style="display: flex; flex-direction:column-reverse; gap:15px; align-item:center; justify-content:center; padding:30px" >
            {% for mise in mises %}
                <p>{{mise.user}} à misé {{mise.montant}} $</p>
            {% endfor %}
        </div>
    </section>
</main>
{{ include('layouts/footer.php')}}