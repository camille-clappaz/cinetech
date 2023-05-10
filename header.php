<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
    <title>Document</title>
</head>

<body>

</body>

</html>
<?php
session_start();
?>
<header>

    <nav>
        <a href="index.php"><img id="logo" src="logo.png" alt=""></a>
        <div class="onglets">
            <a href="films.php">Films</a>
            <a href="series.php">Series</a>
            <?php
            if (!empty($_SESSION)) {
            ?>
                <a href="favoris.php">Favoris</a>
            <?php
            }
            ?>
            <?php
            if (empty($_SESSION)) {
            ?>
                <a href="inscription.php">Inscription</a>
                <a href="connexion.php">Connexion</a>
            <?php
            }
            if (!empty($_SESSION)) {
            ?>
                <a href="deconnexion.php">Deconnexion</a>
            <?php
            }
            ?>
        </div>
        <div class="search ">
            <input type="text" id="recherche" class="input form-control me-2" placeholder="Search ...">
            <button class="btn">
                <i class="fa-solid fa-magnifying-glass fa-xs" aria-hidden="true"></i>
            </button>
        </div>





        <!-- </div> -->
    </nav>
</header>
<?php

?>
<script>
    let search = document.getElementById("recherche");
    // console.log(searchValue);
    search.addEventListener("keyup", () => {
        let main = document.querySelector("main");
        let divSearch = document.createElement('div');
        let filmsSearch = document.createElement("div");
        filmsSearch.setAttribute("class", "filmsSearch");
        let seriesSearch = document.createElement("div");
        seriesSearch.setAttribute("class", "seriesSearch");
        let acteursSearch = document.createElement("div");
        acteursSearch.setAttribute("class", "acteursSearch");
        main.innerHTML = '';
        filmsSearch.textContent = "";
        seriesSearch.textContent = "";
        acteursSearch.textContent = "";
        // console.log(search.value); si je declare une let searchValue= search.value, il ne reconnait pas searchValue, pk?
        fetch('https://api.themoviedb.org/3/search/multi?api_key=7c8573e07bc29f162cd95a3850c8b3b1&language=en-US&page=1&include_adult=false&query=' + search.value, {
            method: 'GET'
        }).then((res) =>
            res.json()
        ).then((data) => {

            data.results.forEach(element => {
                console.log(element)

                divSearch.setAttribute("class", "recherche")
                let a = document.createElement("a");
                let img = document.createElement('img');

                if (element.profile_path != null || element.poster_path != null) { // pour que les sans images ne s'affichent pas
                    if (element.media_type == "movie") {
                        img.src = "https://image.tmdb.org/t/p/original" + element.poster_path;
                        a.setAttribute("href", "detail.php?movie_id=" + element.id);
                        a.append(img);
                        main.append(filmsSearch)
                        filmsSearch.append(a);
                    }
                    if (element.media_type == "tv") {
                        img.src = "https://image.tmdb.org/t/p/original" + element.poster_path;
                        a.setAttribute("href", "detail.php?tv_id=" + element.id);
                        a.append(img);
                        main.append(seriesSearch)
                        seriesSearch.append(a);
                    }
                    if (element.media_type == "person") {
                        img.src = "https://image.tmdb.org/t/p/original" + element.profile_path;
                        a.setAttribute("href", "detail.php?person_id=" + element.id);
                        a.append(img);
                        main.append(acteursSearch)
                        acteursSearch.append(a);
                    }
                }
            })
        })
    })
    const divSearch = document.querySelector(".search");
    const btn = document.querySelector(".btn");
    const input = document.querySelector(".input");

    btn.addEventListener("click", () => {
        divSearch.classList.toggle("active"); //toggle metode add and remove in the same time class
        input.focus(); //i put focus in my input
    })
</script>
<script src="https://kit.fontawesome.com/020a26a846.js" crossorigin="anonymous"></script>