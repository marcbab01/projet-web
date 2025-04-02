{{ include('layouts/header.php', {title: 'User Create'})}}
    <main class="connection">
        <div class="connection__conteneur">
            <form class="connection__form" method='post' enctype="multipart/form-data">
                {% if errors.titre is defined %}
                    <span>
                        {{errors.titre}}
                    </span>
                {% endif %}
                <label for="titre">
                    Titre
                </label>
                <input type="text" id="titre" name="titre" value="{{timbre.titre}}">

                {% if errors.date is defined %}
                    <span>
                        {{errors.date}}
                    </span>
                {% endif %}
                <label for="date">
                    Date d'impression
                </label>
                <input type="text" id="date" name="date" value="{{timbre.date}}">

                {% if errors.couleur_id is defined %}
                    <span>
                        {{errors.couleur_id}}
                    </span>
                {% endif %}
                <label for="couleur_id">
                    Couleur
                </label>
                <select name="couleur_id">
                    <option value="">Selectionner une couleur</option>
                    {% for c in couleur %}
                        <option value="{{c.id}}" {% if c.id == timbre.couleur_id %} selected {% endif %}>
                            {{c.nom}}
                        </option>
                    {% endfor %}
                </select>

                {% if errors.pays_id is defined %}
                    <span>
                        {{errors.pays_id}}
                    </span>
                {% endif %}
                <label for="pays_id">
                    Pays d'origine
                </label>
                <select name="pays_id">
                    <option value="">Selectionner un pays</option>
                    {% for p in pays %}
                        <option value="{{p.id}}" {% if p.id == timbre.pays_id %} selected {% endif %}>
                            {{p.nom}}
                        </option>
                    {% endfor %}
                </select>

                {% if errors.condition_id is defined %}
                    <span>
                        {{errors.condition_id}}
                    </span>
                {% endif %}
                <label for="condition_id">
                    Condition du timbre
                </label>
                <select name="condition_id">
                    <option value="">Selectionner une condition</option>
                    {% for condition in conditions %}
                        <option value="{{condition.id}}" {% if condition.id == timbre.condition_id %} selected {% endif %}>
                            {{condition.nom}}
                        </option>
                    {% endfor %}
                </select>

                {% if errors.tirage is defined %}
                    <span>
                        {{errors.tirage}}
                    </span>
                {% endif %}
                <label for="tirage">
                    Tirage
                </label>
                <input type="text" id="tirage" name="tirage" value="{{timbre.tirage}}">

                {% if errors.longueur is defined %}
                    <span>
                        {{errors.longueur}}
                    </span>
                {% endif %}
                <label for="longueur">
                    Longueur
                </label>
                <input type="text" id="longueur" name="longueur" value="{{timbre.longueur}}">

                {% if errors.largeur is defined %}
                    <span>
                        {{errors.largeur}}
                    </span>
                {% endif %}
                <label for="largeur">
                    Largeur
                </label>
                <input type="text" id="largeur" name="largeur" value="{{timbre.largeur}}">

                <label for="certificat">Coup de Coeur du Lord</label>
                <input type="checkbox" id="certificat" name="certificat" value="1" {% if timbre.certificat %}checked{% endif %}>

                <label for="mainImage">Ajouter l'image principale</label>
                <input type="file" name="mainImage" id="mainImage">
                
                <input type="submit" class="btn" value="save">
            </form>
        </div>
    </main>
    {{ include('layouts/footer.php')}}