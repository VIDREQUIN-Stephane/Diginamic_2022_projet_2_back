<?php
class Avatar{

    private $image;
    public function __construct($string, $blocks = 5, $size = 50){
        $togenerate = ceil($blocks / 2);    // Contient le nombre de colonnes à générer

        $hash = md5($string);  // On créé le hash à partir de la chaîne de caractères
        $hashsize = $blocks * $togenerate; // On détérmine de combien de caractères on va avoir besoin pour générer notre avatar
        $hash = str_pad($hash, $hashsize, $hash);// On rajoute des caractères à $hash si c'est nécessaire
        $hash_split = str_split($hash);

        $color = substr($hash, 0, 6);// On récupère une couleur héxadécimale avec les 6 premiers caractères du hash
        $blocksize = $size / $blocks;// On détermine le côté d'un bloc (en pixels)

        // On déclare notre image et nos couleurs
        $image = imagecreate($size, $size);
        $color = imagecolorallocate($image, hexdec(substr($color,0,2)), hexdec(substr($color,2,2)), hexdec(substr($color,4,2)));
        $bg = imagecolorallocate($image, 255, 255, 255);

        // Pour chaque colonne :
        // Pour chaque ligne :
        for($i = 0; $i < $blocks; $i++){
            for($j = 0; $j < $blocks; $j++){
                if($i < $togenerate){ // Si l'on doit encore générer de NOUVELLES colonnes
                    // On récupère le caractère correspondant dans le hash (par exemple 1ière colonne 2ième ligne correspond au 2ième caractère)
                    // On décode sa valeur héxadécimale
                    // Si le nombre est pair $pixel vaut true sinon $pixel vaut false
                    $pixel = hexdec($hash_split[($i * 5) + $j]) % 2 == 0;
                }else{
                    // On récupère le caractère ayant servi à générer le carré de la colonne symétrique à celle où l'on se trouve
                    // $blocks - 1 - $x agit comme le 4 - $x sauf que là on calcule dynamiquement la valeur maximale que $x peut atteindre
                    $pixel = hexdec($hash_split[((4 - $i) * 5) + $j]) % 2 == 0;
                }
        // Par défaut le bloc est de même couleur que l'arrière-plan
                $pixelColor = $bg;
                // Mais si $pixel vaut true alors on "allume" ce bloc en lui donnant la couleur de $color
                if($pixel){
                    $pixelColor = $color;
                }
                // On place chaque bloc de l'image
                imagefilledrectangle($image, $i * $blocksize, $j * $blocksize, ($i + 1) * $blocksize, ($j + 1) * $blocksize, $pixelColor);
            }
        }
        // Au lieu d'afficher l'image, on la stock dans la variable d'instance $image pour pouvoir la manipuler avec d'autres méthodes
        ob_start();
        imagepng($image);
        $image_data = ob_get_contents();
        ob_end_clean ();
        $this->image = $image_data;
    }
    // Affiche l'image
    public function display(): void
    {
        header('Content-type: image/png');
        echo($this->image);
    }

    // Exporte l'image en base64
    public function base64(): string
    {
        return 'data:image/png;base64,' . base64_encode($this->image);
    }

    //Sauvegarde l'image dans un fichier
    public function save($filename){
        if(file_put_contents($filename, $this->image)){
            return $filename;
        }
    }

}
