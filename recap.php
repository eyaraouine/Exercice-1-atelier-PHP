<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
<div class="container">
<p class="fs-5 p-3 mb-2 bg-danger text-white">

<?PHP
$nom=htmlspecialchars($_POST["nom"]);
$prenom=htmlspecialchars($_POST["prenom"]);
$adresse=htmlspecialchars($_POST["adresse"]);
$nb_sandwichs=$_POST["nb_sandwichs"];

echo "Bonjour  $nom $prenom <br><br>";
echo "Votre adresse est: $adresse <br><br>";
echo "Le nombre de sandwichs commandés est: $nb_sandwichs<br><br>";
$type=$_POST["type"];
echo"Le type des sandwichs commandés est :$type <br><br>";
isset($_POST["sup1"])?$sup1=$_POST["sup1"]:$sup1="";
isset($_POST["sup2"]) ? $sup2=$_POST["sup2"] : $sup2="";
isset($_POST["sup3"]) ? $sup3=$_POST["sup3"] :$sup3="";
echo"Les ingredients supplementaires à ajouter dans les sandwichs sont: $sup1 $sup2 $sup3 <br> <br>";
$nb_sandwichs< 10 ? $prix=4*$nb_sandwichs: $prix=0.9*4*$nb_sandwichs ;
echo "Le montant total de la commande est : $prix dinars <br> <br>";
$file=$_FILES["fichier"];

$extensionsValides=[".jpeg",".png",".jpg",".gif"];
$fileName=$file["name"];
$fileExtension="." .strtolower(substr(strrchr($fileName,"."),1));
if (!in_array($fileExtension,$extensionsValides)){
    echo "Le fichier n'est pas une image de CIN !";
    die;
}

$nomUnique=md5(uniqid(rand(),true));
$fileName="uploads/$nomUnique$fileExtension";

$resultatUpload=move_uploaded_file($file["tmp_name"],$fileName);
if ($resultatUpload){
    echo"upload terminé";
}

?>
</p>

</div>

