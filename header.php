<?php 
session_start();
?>
<header>

    <nav>
        <a href="index.php">Accueil</a>
        <a href="films.php">Films</a>
        <a href="series.php">Series</a>
        <?php
if(!empty($_SESSION)){
        ?>
        <a href="favoris.php">Favoris</a>
        <?php
}
        ?>
        <?php
if(empty($_SESSION)){
        ?>
        <a href="inscription.php">Inscription</a>
        <a href="connexion.php">Connexion</a>
        <?php
}
if(!empty($_SESSION)){
        ?>
                <a href="deconnexion.php">Deconnexion</a>
                <?php
}
        ?>
        <!-- <div class="searchInputWrapper wrapper2"> -->
            <!-- <form class="search-input" action="" method="get"> -->
                <a href="" target="_blank" hidden></a>
                <input type="text" id="recherche" class="form-control me-2" placeholder="Search your favorite climber..">
                <!-- <div class="autocom-box3"> -->
                    <!-- here list are inserted from javascript -->
                <!-- </div> -->
                
            <!-- </form> -->
        <!-- </div> -->
    </nav>
</header>
<?php
// if (isset($_GET['recherche'])) {
//     $recherche = $_GET['recherche'];
//     $requete = $bdd->prepare('SELECT * FROM grimpeurs WHERE prenom LIKE :recherche OR nom LIKE :recherche');
//     $requete->execute(array('recherche' => $recherche . '%'));
//     $result = $requete->fetchAll(PDO::FETCH_ASSOC);
//     echo json_encode($result);
// }
// 
?>
<script>
    //     const list3 = document.querySelector('.autocom-box3');

    //     if (recherche) {
    //     recherche.addEventListener("keyup", (e) => {
    //         list3.innerHTML = "";
    //         if (e.target.value != '') {
    //             fetch('recherche.php?recherche=' + e.target.value).then((res) => {
    //                 return res.json()
    //             }).then((data) => {
    //                 data.forEach(element => {
    //                     let p = document.createElement('p');
    //                     p.innerHTML = '<a href="element.php?id=' + element.id + '">' + element.prenom + " " + element.nom + '</a>';
    //                     list3.append(p);
    //                 });
    //             }).catch((err) => {
    //                 console.log(err);
    //             })

    //         }
    //     })

    // }
    // 
</script>