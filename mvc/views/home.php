{{ include('layouts/header.php', {title: 'User Create'})}}
    <main>
        <section>
            <h2 class="section__titre" style="margin:10px 10vw;">
                En Vedette
            </h2>
            <div class="carousel" style="display:flex; align-item:center; justify-content:center; gap:20px; background-color:#e0e0e0;">
                <img src="{{asset}}img/BluenoseMain.jpg" alt="" class="carousel__image" style="width: 200px">
                <img src="{{asset}}img/InvertedJennyMain.jpg" alt="" class="carousel__image" style="width: 200px">
                <img src="{{asset}}img/JfkMain.jpg" alt="" class="carousel__image" style="width: 200px">
                <img src="{{asset}}img/MountFujiMain.jpg" alt="" class="carousel__image" style="width: 200px">
            </div>
        </section>
        <section>
            <h2 class="section__titre" style="margin:10px 10vw;">
                Prochainement
            </h2>
            <div class="carousel" style="display:flex; align-item:center; justify-content:center; gap:20px; background-color:#e0e0e0;">
                <img src="{{asset}}img/BluenoseMain.jpg" alt="" class="carousel__image" style="width: 200px">
                <img src="{{asset}}img/InvertedJennyMain.jpg" alt="" class="carousel__image" style="width: 200px">
                <img src="{{asset}}img/JfkMain.jpg" alt="" class="carousel__image" style="width: 200px">
                <img src="{{asset}}img/MountFujiMain.jpg" alt="" class="carousel__image" style="width: 200px">
            </div>
        </section>
        <section>
            <h2 class="section__titre" style="margin:10px 10vw;">
                Actualités
            </h2>
            <div class="gallerie" style="display:flex; gap:30px; align-item:center; justify-content:center;">
                <div class="element">
                    <a href="" style="width:400px; height:500px">
                        <h3 style="position:absolute; top:50%; left:50%; transform: translate(-50%, -50%);">Timbres</h3>
                        <img src="{{asset}}img/timbres.jpg" alt="" style="position:relative; width:400px; height:500px">
                    </a>
                </div>
                <div class="element">
                    <a href="">
                        <img src="{{asset}}img/auctions.jpg" alt="" style="width:400px; height:500px">
                        <h3 style="position:absolute; top:50%; left:50%; transform: translate(-50%, -50%);">Enchères</h3>
                    </a>
                </div>
                <div class="element">
                    <a href="">
                        <img src="{{asset}}img/bridge.jpg" alt="" style="width:400px; height:500px">
                        <h3 style="position:absolute; top:50%; left:50%; transform: translate(-50%, -50%);">Bridge</h3>
                    </a>
                </div>
            </div>
        </section>
        <section>
            <header class="entete _bio" style="margin:20px 20px; padding:20px 0;">
                <h1 style="margin:0 20px; text-align:center;">Lord Reginald Stampee III</h1>
            </header>
            <p style="margin:15px 10vw;">Lord Reginald Stampee II, éminente figure contemporaine de l’aristocratie britannique, incarne à la fois l’héritage de ses illustres ancêtres et une modernité discrète mais affirmée. Héritier du domaine familial dans le Sussex et membre actif de la Chambre des Lords, il s’illustre par son engagement dans les questions culturelles et patrimoniales, ainsi que par son attachement aux institutions monarchiques. Diplomate de formation, il a représenté le Royaume-Uni lors de missions internationales, où son élégance naturelle et son érudition ont consolidé sa réputation d’homme d’influence au sein des cercles politiques et intellectuels.</p>
            <br>
            <p style="margin:15px 10vw;">Au-delà de ses fonctions officielles, Lord Stampee II est un passionné de philatélie, une tradition familiale qu’il perpétue avec ferveur. Gardien d’une collection prestigieuse initiée par ses aïeux, il l’a enrichie de pièces rares venues des quatre coins du monde, tout en promouvant activement l’étude des timbres à travers conférences, publications et expositions. Président actuel de la Royal Society of Philately, il milite pour que la philatélie soit reconnue comme une passerelle entre art, histoire et mémoire collective. Sa passion, toujours vivante, continue d’inspirer collectionneurs et curieux à travers le monde.</p>
        </section>
    </main>
    {{ include('layouts/footer.php')}}
