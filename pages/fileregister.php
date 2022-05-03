<?php
function keppData($name, $value = '', $action = ''): void
{
    if (isset($_POST[$name]) && $_POST[$name] !== '' && $action === '') {
        echo $_POST[$name];
    }
    if (isset($_POST[$name]) && $_POST[$name] !== '' && $action !== '') {
        if (is_array($_POST[$name])) {
            if (in_array($value, $_POST[$name])) {
                echo $action;
            }
        } elseif ($_POST[$name] === $value) {
            echo $action;
        }
    }
}

if (isset($_FILES['fichier'])) {
    if ($_FILES['fichier']['name'] !== '') {
        echo '<div class="alert alert-success" role="alert">Fichier trouvé dans le formulaire !</div>';

        $type = $_FILES['fichier']['type'];
        $type = explode('/', $type);
        $type = $type[1];
        $accept = ['jpeg', 'png', 'pdf', 'jpg'];
        if (in_array($type, $accept)) {
            $upload = 'upload/';
            if ($directory = opendir($upload)) {
                echo  '<div class="alert alert-success" role="alert">Ouverture du fichier</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Impossible d\'ouvrire le fichier</div>';
            }
            $countFile = 0;
            while ($file = readdir($directory)) {
                if (!is_dir($file)) {
                    $temptype = explode('.', $file);
                    if (count($temptype) > 1) {
                        $temptype = $temptype[count($temptype) - 1];
                        if (in_array($temptype, $accept)) {
                            $countFile = $countFile + 1;
                        }
                    }
                }
            }
            $countFile = $countFile + 1;
            $date = date('YmdHms');
            if (!move_uploaded_file($_FILES['fichier']['tmp_name'], $upload . $date . $countFile . '.' . $type)) {
                echo '<div class="alert alert-danger" role="alert">Erreur de fichier dans le formulaire</div>';
            } else {
                echo  '<div class="alert alert-success" role="alert">Tout fonctionne !!!</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Erreur fichier non valide</div>';
        }
    }
}