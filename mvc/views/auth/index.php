{{ include ('layouts/header.php', {title:'Registration'})}}
        <div class="container">
         {% if errors is defined %}
          <div class="error">
            <ul>
            {% for error in errors %}
                <li>{{ error }}</li>        
            {% endfor %}
            </ul>
          </div>
         {% endif %}
        </div>
    <main class="connection">
        <div class="connection__conteneur">
            <h2>Sign-In</h2>
            <form class="connection__form" method="post">
                <label for="username">
                    Nom d'utilisateur
                </label>
                <input type="text" id="username" name="username" value="{{user.username}}">
                <label for="password">
                    Mot de passe
                </label>
                <input type="password" id="password" name="password">
                <input type="submit">
            </form>
        </div>
    </main>
    {{ include('layouts/footer.php')}}