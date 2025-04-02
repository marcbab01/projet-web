{{ include('layouts/header.php', {title: 'User Create'})}}
<main class="connection">
        <div class="connection__conteneur">
            <form class="connection__form" method='post' enctype="multipart/form-data" novalidate>
                <label for="mainImage">Ajouter l'image principale</label>
                <input type="file" name="mainImage" id="mainImage">

                <label for="image1">Ajouter une image supplémentaire</label>
                <input type="file" name="image1" id="image1">

                <input type="submit" class="btn" value="save" name="submit">
            </form>
        </div>
    </main>
    {{ include('layouts/footer.php')}}