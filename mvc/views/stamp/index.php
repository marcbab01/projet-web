{{ include('layouts/header.php', {title: 'User Create'})}}
    <main>
        <h1>Stamps</h1>
        <table>
            <tr>
                <th>Titre</th>
                <th>Date d'impression</th>
                <th>Couleur</th>
                <th>Pays d'origine</th>
                <th>Condition</th>
                <th>Tirage</th>
                <th>Dimensions</th>
                <th>Coup de coeur du Lord</th>
            </tr>
            {% for timbre in timbre %}
        <tr>
            <td><a href="{{base}}/stamp/show?id={{timbre.id}}">{{timbre.titre}}</a></td>
            <td>{{timbre.date}}</td>
            <td>{{timbre.couleur_id}}</td>
            <td>{{timbre.pays_id}}</td>
            <td>{{timbre.condition_id}}</td>
            <td>{{timbre.tirage}}</td>
            <td>{{timbre.longueur}}</td>
            <td>{{timbre.largeur}}</td>
            <td>{{timbre.certificat}}</td>
        </tr>
        {% endfor %}
        </table>
    </main>
    {{ include('layouts/footer.php')}}