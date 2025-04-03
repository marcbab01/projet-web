{{ include('layouts/header.php', {title: 'User Create'})}}
    <main class="connection">
        <div class="connection__conteneur">
            <form class="connection__form" method="post">
                <label for="debut">
                    Date de debut
                </label>
                <input type="date" id="debut" name="debut" value="{{enchere.debut}}">

                <label for="debut">
                    Date de fin
                </label>
                <input type="date" id="fin" name="fin" value="{{enchere.fin}}">

                <label for="debut">
                    Prix du plancher
                </label>
                <input type="text" id="prix_plancher" name="prix_plancher" value="{{enchere.prix_plancher}}">

                <label for="timbre_id">
                    Timbre en enchere
                </label>
                <select name="timbre_id">
                    <option value="">Selectionner un timbre</option>
                    {% for t in timbre %}
                        <option value="{{t.id}}" {% if c.id == enchere.timbre_id %} selected {% endif %}>
                            {{t.titre}}
                        </option>
                    {% endfor %}
                </select>

                <input type="submit" class="btn" value="save">
            </form>
        </div>
    </main>
    {{ include('layouts/footer.php')}}