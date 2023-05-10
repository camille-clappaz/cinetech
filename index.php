<?php
// session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cinetech</title>
</head>

<body>


    <?php
    require("header.php");
    ?>
    <main>
        <section class="container">

            <div class="scroll_bloc hover">
                <h2>The most popular movies</h2>
                <article class="scroll_container popular_movie"></article>
            </div>

            <div class="scroll_bloc hover">
                <h2>The most popular tv</h2>
                <article class="scroll_container popular_tv"></article>
            </div>

            <div class="scroll_bloc hover">
                <h2>Top rated movies</h2>
                <article class="scroll_container top_rated_movie"></article>
            </div>

            <div class="scroll_bloc hover">
                <h2>Top rated tv</h2>
                <article class="scroll_container top_rated_series "></article>
            </div>

        </section>
    </main>

    <script>
        // recuperer les films populaires
        fetch('https://api.themoviedb.org/3/movie/popular?api_key=7c8573e07bc29f162cd95a3850c8b3b1', {
            method: 'GET'
        }).then((res) =>
            res.json()
        ).then((data) => {
            let popular_movie_container = document.querySelector('.popular_movie');
            data.results.filter(function(resultats) {
                console.log(resultats)
                const film = document.createElement('div')
                        let img = document.createElement('img');
                        let a = document.createElement("a");
                for (let i = 0; i < 20; i++) {
                    if (resultats.poster_path != null) {
                        
                        a.setAttribute("href", "detail.php?movie_id=" + resultats.id);
                        img.src = "https://image.tmdb.org/t/p/original" + resultats.poster_path;
                        a.append(img);
                        film.append(a);
                        film.className = "scroll_card"
                        popular_movie_container.append(film)
                    }
                }
            });
        })

        // récuperer les séries populaires
        fetch('https://api.themoviedb.org/3/tv/popular?api_key=7c8573e07bc29f162cd95a3850c8b3b1', {
            method: 'GET'
        }).then((res) =>
            res.json()
        ).then((data) => {
            let popular_tv_container = document.querySelector('.popular_tv');
            data.results.filter(function(resultats) {
                console.log(resultats)
                const serie = document.createElement('div')
                        let img = document.createElement('img');
                        let a = document.createElement("a");
                for (let i = 0; i < 20; i++) {
                    if (resultats.poster_path != null) {
                        
                        a.setAttribute("href", "detail.php?movie_id=" + resultats.id);
                        img.src = "https://image.tmdb.org/t/p/original" + resultats.poster_path;
                        a.append(img);
                        serie.append(a);
                        serie.className = "scroll_card"
                        popular_tv_container.append(serie)
                    }
                }
            });
        })
         // récuperer les films les mieux notées
         fetch('https://api.themoviedb.org/3/movie/top_rated?api_key=7c8573e07bc29f162cd95a3850c8b3b1', {
            method: 'GET'
        }).then((res) =>
            res.json()
        ).then((data) => {
            let TR_movie_container = document.querySelector('.top_rated_movie');
            data.results.filter(function(resultats) {
                console.log(resultats)
                const movieTr = document.createElement('div')
                        let img = document.createElement('img');
                        let a = document.createElement("a");
                for (let i = 0; i < 20; i++) {
                    if (resultats.poster_path != null) {
                        
                        a.setAttribute("href", "detail.php?movie_id=" + resultats.id);
                        img.src = "https://image.tmdb.org/t/p/original" + resultats.poster_path;
                        a.append(img);
                        movieTr.append(a);
                        movieTr.className = "scroll_card"
                        TR_movie_container.append(movieTr)
                    }
                }
            });
        })

         // récuperer les séries les mieux notées
         fetch('https://api.themoviedb.org/3/tv/top_rated?api_key=7c8573e07bc29f162cd95a3850c8b3b1', {
            method: 'GET'
        }).then((res) =>
            res.json()
        ).then((data) => {
            let TR_tv_container = document.querySelector('.top_rated_series');
            data.results.filter(function(resultats) {
                console.log(resultats)
                const movieTr = document.createElement('div')
                        let img = document.createElement('img');
                        let a = document.createElement("a");
                for (let i = 0; i < 20; i++) {
                    if (resultats.poster_path != null) {
                        
                        a.setAttribute("href", "detail.php?movie_id=" + resultats.id);
                        img.src = "https://image.tmdb.org/t/p/original" + resultats.poster_path;
                        a.append(img);
                        movieTr.append(a);
                        movieTr.className = "scroll_card"
                        TR_tv_container.append(movieTr)
                    }
                }
            });
        })
    </script>
</body>
</html>