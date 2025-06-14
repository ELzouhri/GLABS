<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>analyses</title>
    <link rel="stylesheet" href="Analyse.css" >
</head>
<body>
    <div class="menu">
        <ul>
            <li class="profile">
                <div class="img-box">
                    <img src="../media biologiste/bio.png" alt="image de profile" >
                </div>
                <h2>Biologiste</h2>
            </li>
  <li>
                <a href="http://localhost/GLABS/frant-end/biologiste/gestion%20des%20analyses/Analyse.php">
                    <i class="material-icons">description </i>
                    <p>analyses</p>
                </a>
            </li>
            <li>
                <a href="http://localhost/GLABS/frant-end/biologiste/gestion%20des%20patients/patient.php">
                    <i class="material-icons">personal_injury</i>
                    <p>patients</p>
                </a>
            </li>
             <li>
                <a href="http://localhost/GLABS/frant-end/biologiste/Notes/Notes.php">
                    <i class="material-icons">note_alt</i>
                    <p>Notes</p>
                </a>
            </li>
            <li>
                <a href="http://localhost/GLABS/frant-end/biologiste/gestion%20des%20echontillons/Echontillons.php">
                    <i class="material-icons">science</i>
                    <p>échantillons</p>
                </a>
            </li>
            <li>
                <a href="http://localhost/GLABS/frant-end/biologiste/communication/communication.php">
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
    </div>
    <div class="section">
        <div class="scrollable-content">
<fieldset class="ajouter">
<form>
    <table>
        <tr>
            <td><label for="cin" >CIN du patient:</label></td>
            <td><input type="text" id="cin" name="cin" class="data" required></td>
            <td><label for="patinet" >Nom du patient :</label></td>
            <td><input type="text" id="patient" name="patient" class="data" required></td>
            
        </tr>
        <tr>
            <td><label for="date" >Date de l'analyses :</label></td>
            <td><input type="date" id="date" name="date" class="data" required></td>
            <td><label>Résulta :</label></td>
            <td> <input type="text" id="res" name="res" class="data" required></td>

        </tr>
        <tr>
            <td><label>Nom du médecin :</label></td>
            <td><input type="text" id="medecin" class="data"></td>
            <td><label for="categorie" >catégorie analyse:</label></td>
            <td> <select id="type" name="type" >
                <option value="sang">biochimie</option>
                <option value="urine">hématologie</option>
                <option value="imagerie">immunologie</option>
              </select></td>
        </tr>
        <tr>
            <td><label>types d'analyse:</label></td>
            <td colspan="2">
                <input type="checkbox" name="type" id>CALCUM : calcium  <br>
                <input type="checkbox" name="type" id>TP : Taux de prothrombine <br>
                <input type="checkbox" name="type" id>ALAT : Enzyme hépatique (Alanine Aminotransférase)<br>
                <input type="checkbox" name="type" id>Bilirubine indirecte <br>
                <input type="checkbox" name="type" id>G-GT : Gamma-glutamyl transférase <br>
                <input type="checkbox" name="type" id>MAGAN : Probablement magnésium <br>
                <input type="checkbox" name="type" id>VDRL : Test de dépistage de la syphilis <br>
                <input type="checkbox" name="type" id>ASAT : Aspartate Aminotransférase <br>
                <input type="checkbox" name="type" id>BILI.TOTALE : Bilirubine totale  <br>
                <input type="checkbox" name="type" id>CRP : Protéine C-réactive <br>
                <input type="checkbox" name="type" id>GROUPAGE : Groupe sanguin <br>
                <input type="checkbox" name="type" id>TCK : Temps de céphaline activé (Temps de coagulation) <br>
                <input type="checkbox" name="type" id>UREE : Urée <br>
            </td>
            <td colspan="2">
                <input type="checkbox" name="type" id>HDL : Bon cholestérol (High-Density Lipoprotein)<br>
                <input type="checkbox" name="type" id>NFS : Numération formule sanguine<br>
                <input type="checkbox" name="type" id>ASLO : Antistreptolysines O <br>
                <input type="checkbox" name="type" id>CREA : Créatinine <br>
                <input type="checkbox" name="type" id>GPP : Peut désigner une analyse des protéines plasmatiques <br>
                <input type="checkbox" name="type" id>ACID URIQUE : Acide urique <br>
                <input type="checkbox" name="type" id>Triglycérides <br>
                <input type="checkbox" name="type" id>BILI DIRECTE : Bilirubine directe <br>
                <input type="checkbox" name="type" id>CHOL.TOTAL : Cholestérol total <br>
                <input type="checkbox" name="type" id>GAP : Gap anionique <br>
                <input type="checkbox" name="type" id>LDL : Mauvais cholestérol (Low-Density Lipoprotein) <br>
                <input type="checkbox" name="type" id>TPHO : Probablement une faute de frappe <br>
                <input type="checkbox" name="type" id>VS : Vitesse de sédimentation <br>
            </td>
        </tr>
        <tr>
            <td><label>observation :</label></td>
            <td colspan="4"><textarea id="observation"></textarea></td>
        </tr>
       <tr>
        <td><label>prix :</label></td>
        <td><input type="number" id="prix" name="prix" min="0" class="data" required></td>
       </tr>
        
        

    </table>
    <hr>
        <button type="submit" id="submit" >Enregistrer le rapport</button>
        <button type="reset">Effacer</button>
        <div class="search">
            <i class="material-icons">search</i>
            <input onkeyup="searchdata(this.value) " type="text" id="search" placeholder="search">
        </div>
    
</form>
</fieldset>


<div id="analyse" >
            <fieldset class="rapport">
            <table>
                <tr>
                    <td><label>CIN du patient:</label></td>
                    <td style="width: 600px;">cin</td>
                    <td><label>Nom du patient :</label></td>
                    <td>patient</td>
                </tr>
                <tr>
                    <td><label>Date de l'analyse:</label></td>
                    <td>date</td>
                    <td><label>Résultat :</label></td>
                    <td>res</td>
                </tr>
                <tr>
                    <td><label>Nom du médecin:</label></td>
                    <td>medecin</td>
                    <td><label>Catégorie analyse :</label></td>
                    <td>categorie</td>
                </tr>
                <tr>
                    <td><label>Types d'analyse:</label></td>
                    <td colspan="3">type</td>
                </tr>
                <tr>
                    <td><label>Observation :</label></td>
                    <td colspan="3">observation</td>
                </tr>
                <tr>
                    <td><label>Prix :</label></td>
                    <td>prix</td>
                </tr>
                <tr>
                    <td colspan="4">
                        <button onclick="deleteData()">🗑 Supprimer</button>
                        <button onclick="updateData()">✏️ Modifier</button>
                        <button onclick="window.print()">🖨️ Imprimer</button>
                    </td>
                </tr>
            </table>
        </fieldset>
</div>
    </div>
    </div>
<script src="Analyses.js"></script>
</body>
</html>