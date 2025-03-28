{{ include('layouts/header.php', {title: 'User Create'})}}
    <main>
        <section>
            <h2 class="section__titre">
                En Vedette
            </h2>
            <div class="carousel"></div>
        </section>
        <section>
            <h2 class="section__titre">
                À Venir
            </h2>
            <div class="carousel"></div>
        </section>
        <section>
            <h2 class="section__titre">
                Actualités
            </h2>
            <div class="gallerie">
                <div class="element">
                    <a href="">
                        <img src="" alt="">
                        <h3>Timbres</h3>
                    </a>
                </div>
                <div class="element">
                    <a href="">
                        <img src="" alt="">
                        <h3>Enchères</h3>
                    </a>
                </div>
                <div class="element">
                    <a href="">
                        <img src="" alt="">
                        <h3>Bridge</h3>
                    </a>
                </div>
            </div>
        </section>
        <section>
            <header class="entete _bio">
                <h1>Lord Reginald Stampee III</h1>
            </header>

        </section>
    </main>
    {{ include('layouts/footer.php')}}
