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
    <header></header>
    <main>
        <div id="films"></div>
        <div class="series"></div>
    </main>
    
    <script>
        

             
                fetch('https://api.themoviedb.org/3/movie/popular?api_key=7c8573e07bc29f162cd95a3850c8b3b1', { method: 'GET' }).then((res) => 
                res.json()
            ).then((data) => {
                data.results.filter(function(resultats){
                    // console.log(resultats);
                    let films= document.getElementById("films");
                    let p = document.createElement('p'); 
                    let img = document.createElement('img');
                    img.src= "https://image.tmdb.org/t/p/original"+resultats.poster_path;
                    p.innerHTML += resultats.title  ;
                    p.append(img);
                        //    console.log(p.innerHTML);
                    films.append(p);
                });
            })
               
            // })
// let p = document.createElement("p");

// p.textContent=data.title;
// films.append("p");
// for(i=2; i<10; i++){
// fetch('https://api.themoviedb.org/3/movie/'+i+'?api_key=7c8573e07bc29f162cd95a3850c8b3b1', { method: 'GET' }).then(res=> res.json()).then(data =>console.log(data.title));
// }


          
    </script>
</body>
</html>