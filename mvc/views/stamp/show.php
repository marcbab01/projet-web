{{ include('layouts/header.php', {title: 'User Create'})}}
    <main>
        <div class="container">
            <h1>Timbre</h1>
            <p><strong>Titre: </strong>{{ timbre.titre }}</p>
            <p><strong>Date d'impression: </strong>{{ timbre.date }}</p>
        </div>
    </main>
    {{ include('layouts/footer.php')}}