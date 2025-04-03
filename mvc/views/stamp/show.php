{{ include('layouts/header.php', {title: 'User Create'})}}
    <main>
        <div class="container">
            <h1>Timbre</h1>
            <p><strong>Titre: </strong>{{ timbre.titre }}</p>
            <p><strong>Date d'impression: </strong>{{ timbre.date }}</p>
            <p><strong>Condition: </strong>{{ conditions }}</p>
            <p><strong>Tirage: </strong>{{ timbre.tirage }}</p>
            <p><strong>Longueur: </strong>{{ timbre.longueur }}</p>
            <p><strong>Largeur: </strong>{{ timbre.largeur }}</p>
            <p><strong>Couleur: </strong>{{ couleur }}</p>
            <p><strong>Pays: </strong>{{ pays }}</p>
            <p><strong>Certificat: </strong>{{ timbre.certificat }}</p>
        </div>
    </main>
    {{ include('layouts/footer.php')}}