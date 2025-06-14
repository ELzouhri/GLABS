<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>stocks</title>
    <link rel="stylesheet" href="stocks.css" >
</head>
<body>
    <div class="menu">
        <ul>
            <li class="profile">
                <div class="img-box">
                    <img src="../media/imageProfile.png" alt="image de profile" >
                </div>
                <h2>Responsable</h2>
            </li>
            <li>
                <a href="http://localhost/GLABS/frant-end/respo/gestion%20des%20statistiques/statistiques.php">
                    <i class="material-icons">bar_chart</i>
                    <p>statistiques</p>
                </a>
            </li>
            <li>
                <a href="http://localhost/GLABS/frant-end/respo/gestion%20des%20stocks/stocks.php">
                    <i class="material-icons">local_shipping</i>
                    <p>stocks</p>
                </a>
            </li>
            <li>
                <a href="http://localhost/GLABS/frant-end/respo/gestion%20des%20utilisateurs/utilisateurs.php">
                    <i class="material-icons">person</i>
                    <p>utilisateurs</p>
                </a>
            </li>
            <li>
                <a href="http://localhost/GLABS/frant-end/respo/gestion%20des%20biologistes/biologistes.php">
                    <i class="material-icons">biotech</i>
                    <p>biologistes</p>
                </a>
            </li>
            <li>
                <a href="http://localhost/GLABS/frant-end/respo/gestion%20des%20RDV/RDV.php">
                    <i class="material-icons">event</i>
                    <p>Rendez_vous</p>
                </a>
            </li>
            <li>
                <a href="http://localhost/GLABS/frant-end/respo/communication/communication.php">
                    <i class="material-icons">chat</i>
                    <p>communication</p>
                </a>
            </li>
            <li class="log-out">
                <a href="http://localhost/GLABS/frant-end/Accueil/Accueil.html">
                    <i class="material-icons">logout</i>
                    <p>log out</p>
                </a>
            </li>
        </ul>
    </div>
    <div class="section">
        <div class="scrollable-content">
<fieldset>
             <div class="cruds">

        <div class="head text ">
            <P ><b style="color: #2a80b9;">product management system</b></P>
        </div>

        <div class="inputs text ">
            <input type="text" placeholder="title" id="title">
            <div class="price">
                <input onkeyup="getTotal()" type="number" placeholder="price" id="price">
                <input onkeyup="getTotal()" type="number" placeholder="taxes" id="taxes">
                <input onkeyup="getTotal()" type="number" placeholder="ads" id="ads">
                <input onkeyup="getTotal()" type="number" placeholder="discount" id="discount">
                <small id="total"></small>
            </div>
            <div class="count">
                <input type="number" placeholder="count" id="count">
            </div>
            <div class="category">
                <input type="text" placeholder="category" id="category">
            </div>
            <div>
                <button id="submit" class="btn ">Create</button>
            </div>
        </div>

        <div class="outputs text text-center">
            <div class="SerachBlock">
                <input type="text" placeholder="Search" id="Search">
            <div class="btnSearch">
                <button id="submit" class="btn " id="searchTitle">Search By Title</button>
                <button id="submit" class="btn " id="searchCategory">Search By Category</button>
                
            </div>
            </div>

            <table>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>price</th>
                    <th>taxes</th>
                    <th>ads</th>
                    <th>discount</th>
                    <th>total</th>
                    <th>category</th>
                    <th>update</th>
                    <th>delete</th>
                </tr>

                <tbody id="tbody">
                   
                     
                </tbody>
            </table>
</fieldset>
        </div>

    </div>
            
        </div>
    </div>
</body>
</html>