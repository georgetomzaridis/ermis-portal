<?php
session_start();
include 'Portal.php';
$Portal = new Portal();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ermis - Πύλη Ψηφιακών Εφαρμογών</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css">
    <link rel="stylesheet" href="index.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-light bg-light" id="navbar-main">
      <a class="navbar-brand" href="http://apps.3gel.network" style="font-size: 17px;">
      	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 21v-6h-18v6h18zm-3-4c.553 0 1 .448 1 1s-.447 1-1 1c-.552 0-1-.448-1-1s.448-1 1-1zm-7.806 0h1.275l-.864 2h-1.274l.863-2zm-2.141 0h1.275l-.863 2h-1.275l.863-2zm-2.19 0h1.275l-.863 2h-1.275l.863-2zm-4.863.941c-2.253-.29-4-2.194-4-4.524 0-2.252 1.626-4.121 3.767-4.506.177-3.294 2.895-5.911 6.233-5.911s6.056 2.617 6.233 5.911c2.005.361 3.541 2.029 3.729 4.089h-1.991c-.279-2.105-2.674-2.333-3.65-2.401.117-1.958-.555-5.599-4.321-5.599-4.438 0-4.359 4.75-4.321 5.599-.945-.037-3.679.341-3.679 2.818 0 1.223.856 2.245 2 2.511v2.013z"/></svg> Ermis/Πύλη Ψηφιακών Εφαρμογών
      </a>
    </nav>
    <div class="jumbotron">
        <h3 style="text-align: center;">Καλωσορίσατε στην πύλη ψηφιακών εφαρμογών του 3ου ΓΕΛ Ευόσμου</h3><br>
        <?php
            $return_apps_list = $Portal->getAppsList();
            //print_r($return_apps_list);
            if($return_apps_list != "404"){

                ?>
                <div class="row">
                <?php
                foreach ($return_apps_list as $value) {
                   $final_value = explode("(~)", $value);
                   ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $final_value[4]; ?> <?php echo $final_value[1]; ?></h5>
                                <p><?php echo $final_value[2]; ?></p>
                                <?php
                                    if($final_value[3] == "1"){
                                        echo '<p>Κατάσταση: <b style="color: green;">Διαθέσιμο</b></p>';
                                    }elseif ($final_value[3] == "2") {
                                        echo '<p>Κατάσταση: <b style="color: red;">Μή Διαθέσιμο</b></p>';
                                    }else{
                                        echo '<p>Κατάσταση: <b style="color: darkorange;">Σε Συντήρηση</b></p>';
                                    }
                                ?>
                                <?php
                                    if($final_value[3] == "1"){
                                        echo '<a href="'.$final_value[5].'" class="btn btn-primary">Είσοδος</a>';
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                    <?php

                }
                ?>
                </div>
                <?php
            }else{
                ?>
                <div class="alert alert-primary" role="alert" style="color: black;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: black;"><path d="M12 24c6.627 0 12-5.373 12-12s-5.373-12-12-12-12 5.373-12 12 5.373 12 12 12zm1-6h-2v-8h2v8zm-1-12.25c.69 0 1.25.56 1.25 1.25s-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25.56-1.25 1.25-1.25z"/></svg>
                    Δεν υπάρχουν διαθέσιμες ψηφιακές εφαρμογές, παρακαλώ δοκιμάστε ξανά αργότερα.
                </div>
                <?php
            }

        ?>
        <!--
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M2 9l-1-7h5.694c1.265 1.583 1.327 2 3.306 2h13l-1 5h-4.193l-3.9-3-1.464 1.903 1.428 1.097h-1.971l-3.9-3-2.307 3h-3.693zm-2 2l2 11h20l2-11h-24z"/></svg> Συστημα Διαχείρισης Πόρων</h5>
                      <p>Αναζήτηση & Αίτημα χρήσης εξοπλισμού που διαθέτει το σχολείο.</p>
                      <p>Κατάσταση: <b style="color: orange;">Σε συντήρηση</b></p>
                      <a href="http://apps.3gel.network/rms" class="btn btn-primary">Είσοδος</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.308 11.794c.418.056.63.328.63.61 0 .323-.277.66-.844.705-.348.027-.434.312-.016.406.351.08.549.326.549.591 0 .314-.279.654-.913.771-.383.07-.421.445-.016.477.344.026.479.146.479.312 0 .466-.826 1.333-2.426 1.333-2.501.001-3.407-1.499-6.751-1.499v-4.964c1.766-.271 3.484-.817 4.344-3.802.239-.831.39-1.734 1.187-1.734 1.188 0 1.297 2.562.844 4.391.656.344 1.875.468 2.489.442.886-.036 1.136.409 1.136.745 0 .505-.416.675-.677.755-.304.094-.444.404-.015.461z"/></svg> Σύστημα Ηλεκτρονικής Ψηφοφορίας</h5>
                        <p class="card-text">Διεξαγωγή ψηφοφοριών και άμεση έκδοση αποτελεσμάτων</p>
                        <p>Κατάσταση: <b style="color: red;">Μη Διαθέσιμο</b></p>
                        <a href="http://apps.3gel.network/vote" class="btn btn-primary">Είσοδος</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M14 9v2h-4v-2c0-1.104.897-2 2-2s2 .896 2 2zm10 3c0 6.627-5.373 12-12 12s-12-5.373-12-12 5.373-12 12-12 12 5.373 12 12zm-8-1h-1v-2c0-1.656-1.343-3-3-3s-3 1.344-3 3v2h-1v6h8v-6z"/></svg> Σύστημα Ταυτοποίησης</h5>
                        <p class="card-text">Διαχείριση χρηστών, ταυτοποίηση και εκδοσή πιστοποιητικών.</p>
                        <p>Κατάσταση: <b style="color: orange;">Σε συντήρηση</b></p>
                        <a href="http://apps.3gel.network/pithia" class="btn btn-primary">Είσοδος</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M10 23c0-1.105.895-2 2-2h2c.53 0 1.039.211 1.414.586s.586.884.586 1.414v1h-6v-1zm8 0c0-1.105.895-2 2-2h2c.53 0 1.039.211 1.414.586s.586.884.586 1.414v1h-6v-1zm-11.241-14c.649 0 1.293-.213 1.692-.436.755-.42 2.695-1.643 3.485-2.124.216-.131.495-.083.654.113l.008.011c.165.204.146.499-.043.68-.622.597-2.443 2.328-3.37 3.213-.522.499-.822 1.183-.853 1.904-.095 2.207-.261 6.912-.331 8.833-.017.45-.387.806-.837.806h-.001c-.444 0-.786-.347-.836-.788-.111-.981-.329-3.28-.426-4.212-.04-.384-.28-.613-.585-.615-.304-.001-.523.226-.549.609-.061.921-.265 3.248-.341 4.22-.034.442-.397.786-.84.786h-.001c-.452 0-.824-.357-.842-.808-.097-2.342-.369-8.964-.369-8.964l-1.287 2.33c-.14.253-.445.364-.715.26h-.001c-.279-.108-.43-.411-.349-.698l1.244-4.393c.122-.43.515-.727.962-.727h4.531zm6.241 7c1.242 0 2.25 1.008 2.25 2.25s-1.008 2.25-2.25 2.25-2.25-1.008-2.25-2.25 1.008-2.25 2.25-2.25zm8 0c1.242 0 2.25 1.008 2.25 2.25s-1.008 2.25-2.25 2.25-2.25-1.008-2.25-2.25 1.008-2.25 2.25-2.25zm3-1h-14v-2h7v-1h3v1h2v-11h-20v4.356l-2 2v-8.356h24v15zm-7-5h-3v-1h3v1zm-11.626-6c1.241 0 2.25 1.008 2.25 2.25s-1.009 2.25-2.25 2.25c-1.242 0-2.25-1.008-2.25-2.25s1.008-2.25 2.25-2.25zm14.626 4h-6v-1h6v1zm0-2h-6v-1h6v1z"/></svg> Σύστημα Διαχείρισης Τάξεων</h5>
                        <p class="card-text">Διαχείριση αιτημάτων, προβλημάτων και ανακοινώσεων.</p>
                        <p>Κατάσταση: <b style="color: red;">Μη Διαθέσιμο</b></p>
                        <a href="http://apps.3gel.network/cms" class="btn btn-primary">Είσοδος</a>
                    </div>
                </div>
            </div>

        </div>
        !--->
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>