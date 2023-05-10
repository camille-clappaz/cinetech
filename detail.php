<?php
require("header.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="detail.css">
    <title>Cinetech</title>
</head>

<body class="bodyElmt">
    <main>
        <section class="container">
            <div id="mediaDetail">
                <div id="mediaInfo">
             
                </div>
            </div>
        </section>
        <div class="filmDetail">

        </div>
    </main>


</body>

</html>
<?php
// header('location:films.php');
?>

<?php
if (isset($_GET['tv_id'])) { ?>
    <script>
        let id = window.location.href.split('='); // recupere l'id du film 
        console.log(window.location.href);
        fetch('https://api.themoviedb.org/3/tv/' + id[1] + '?api_key=7c8573e07bc29f162cd95a3850c8b3b1&language=en-US' + id[1]).then((res) => {
            return res.json()
        }).then((data) => {
            let detail = document.getElementById("mediaDetail");
            let info = document.getElementById("mediaInfo");
            let img = document.createElement('img');
            let title = document.createElement('h1');
            let runtime = document.createElement('p');
            let resume = document.createElement('p');
            title.textContent = data.name;
            runtime.textContent = data.episode_run_time +"min";
            resume.textContent = data.overview;
            img.setAttribute("class", "poster");
            img.src = "https://image.tmdb.org/t/p/original" + data.backdrop_path;
            detail.setAttribute("style", "background-image: url(" + img.src + ")")
            info.append(title);
            info.append(runtime);
            info.append(resume);


        })
    </script>
<?php
}
if (isset($_GET['movie_id'])) { ?>
    <script>
        let idMovie = window.location.href.split('='); // recupere l'id du film 
        console.log(window.location.href);
        fetch('https://api.themoviedb.org/3/movie/' + idMovie[1] + '?api_key=7c8573e07bc29f162cd95a3850c8b3b1&language=en-US').then((res) => {
            return res.json()
        }).then((data) => {
            let detail = document.getElementById("mediaDetail");
            let info = document.getElementById("mediaInfo");
            let img = document.createElement('img');
            let title = document.createElement('h1');
            let runtime = document.createElement('p');
            let resume = document.createElement('p');
            title.textContent = data.title;
            runtime.textContent = data.runtime +"min";
            resume.textContent = data.overview;
            img.src = "https://image.tmdb.org/t/p/original" + data.backdrop_path;
            detail.setAttribute("style", "background-image: url(" + img.src + ")")
            info.append(title);
            info.append(runtime);
            info.append(resume);


        })
    </script>
<?php
} ?>