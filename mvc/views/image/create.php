{{ include('layouts/header.php', {title: 'User Create'})}}
<main class="connection">
        <div class="connection__conteneur">
            <form class="connection__form" method='post'>

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