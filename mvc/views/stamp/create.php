{{ include('layouts/header.php', {title: 'User Create'})}}
    <main class="connection">
        <div class="connection__conteneur">
            <form class="connection__form" method='post'>

                <label for="couleur_id">
                    Couleur
                </label>
                <select name="couleur_id">
                    <option value="">Selectionner une couleur</option>
                    {% for c in couleur %}
                        <option value="{{c.id}}" {% if c.id == timbre.couleur.id %} selected {% endif %}>
                            {{c.nom}}
                        </option>
                    {% endfor %}
                </select>

                <label for="pays_id">
                    Pays d'origine
                </label>
                <select name="pays_id">
                    <option value="">Selectionner un pays</option>
                    {% for p in pays %}
                        <option value="{{p.id}}" {% if p.id == timbre.pays.id %} selected {% endif %}>
                            {{p.nom}}
                        </option>
                    {% endfor %}
                </select>

                <label for="condition_id">
                    Condition du timbre
                </label>
                <select name="condition_id">
                    <option value="">Selectionner une condition</option>
                    {% for condition in conditions %}
                        <option value="{{condition.id}}" {% if condition.id == timbre.condition.id %} selected {% endif %}>
                            {{condition.nom}}
                        </option>
                    {% endfor %}
                </select>

                <label for="tirage">
                    Tirage
                </label>
                <input type="text" id="tirage" name="tirage" value="{{timbre.tirage}}">

                <label for="longueur">
                    Longueur
                </label>
                <input type="text" id="longueur" name="longueur" value="{{timbre.longueur}}">

                <label for="largeur">
                    Largeur
                </label>
                <input type="text" id="largeur" name="largeur" value="{{timbre.largeur}}">

                <label for="">Coup de Coeur du Lord</label>
                <input type="checkbox" name="certificat[{{ timbre.id }}]" value="1" {% if timbre.certificat %}checked{% endif %}>
                
                <input type="submit" class="btn" value="save">
            </form>
        </div>
    </main>
    {{ include('layouts/footer.php')}}