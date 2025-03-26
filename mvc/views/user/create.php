{{include('layouts/header.php', {title: 'Registration'})}}
    <main class="connection">
        <div class="connection__conteneur">
            <h2>Create an Account</h2>
            <form class="connection__form">
                <label for="name">
                    Nom Complet
                </label>
                <input type="text" id="name" name="name" value="{{user.nom}}">
                <label for="username">
                    Nom d'utilisateur
                </label>
                <input type="text" id="username" name="username" value="{{user.username}}">
                <label for="password">
                    Mot de passe
                </label>
                <input type="text" id="password" name="password" value="{{user.password}}">
                <label for="email">
                    Adresse courriel
                </label>
                <input type="email" id="email" name="email" value="{{user.email}}">
                <label for="phone">
                    No de telephone
                </label>
                <input type="text" id="phone" name="phone" value="{{user.phone}}">
                <label for="postal">
                    Code Postal
                </label>
                <input type="text" id="postal" name="postal" value="{{user.zipCode}}">
                <label for="privilege">
                    Privilege
                </label>
                <select name="privilege_id">
                    <option value="">Selectionner un privilège</option>
                    {% for privilege in privileges %}
                        <option value="{{privilege.id}}" {% if privilege.id == user.privilege.id %} selected {% endif %}>
                            {{privilege.privilege}}
                        </option>
                    {% endfor %}
                </select>
                <input type="submit" class="btn" value="save">
            </form>
        </div>
    </main>
</body>
</html>