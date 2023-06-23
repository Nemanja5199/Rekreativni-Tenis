<?php
if (!session_id()) {
  session_start();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Rekreativni tenis | O autorima</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href='fullcalendar/main.css' rel='stylesheet' />
  <script src="fullcalendar/main.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

  <article>

    <?php

    if (isset($_SESSION['username']) && $_SESSION['user_type'] == 1)
      include '../includes/header_player.php';

    else if (isset($_SESSION['username']) && $_SESSION['user_type'] == 2)

      include '../includes/header_admin.php';

    else

      include '../includes/header.php';
    ?>
<br><br>
    <h1 class="text-center">Autori</h1>


    <div class="container mt-5" style="color: white; background-color: #4cb01e; padding: 5%; box-shadow: 0px 0px 32px -16px rgba(0, 0, 0, 0.267);border: 1px solid rgb(241, 241, 241); border-radius: 1rem;">
      <a href="https://drive.google.com/file/d/1RvJJRJURJlYB2bmkuJ6pV-P296XR-2gw/view?usp=sharing" style="text-decoration:none;color:white"><h2 class="text-center mb-5">Grupa 6 - Gost</h1></a>
        <div class="row">
          <div class="text-center col-lg-6">
            <img class="img-fluid" style="height: 150px; border-radius: 50%;border: 1px solid rgb(241, 241, 241);" alt="Rade Petrovic" src="../img/rade.jpg">
            <h4 class="mt-2">Rade Petrović</h4>
            <p>Moje ime je Rade Petrović, imam 22 godine i dolazim iz Čačka, gde sam završio Tehničku školu, smer informacione tehnologije. Trenutno sam završna godina studija na smeru informacione tehnologije na Fakultetu tehničkih nauka u Čačku. U slobodno vreme volim pratiti tenis.</p>
          </div>
          <div class="text-center col-lg-6">
            <img class="img-fluid" style="height: 150px; border-radius: 50%;border: 1px solid rgb(241, 241, 241);" alt="Teodora Popovic" src="../img/teodora.png">
            <h4 class="mt-2">Teodora Popović</h4>
            <p>Moje ime je Teodora Popović, imam 22 godine i dolazim iz Gornjeg Milanovca. Završila sam srednju Medicinsku školu u Čačku, smer farmaceutski tehničar, 2018. godine upisala sam Fakultet tehničkih nauka, smer informacione tehnologije. Najviše me interesuje backend programiranje i u tom pravcu bih volela da nastavim usavršavanje.</p>
          </div>
        </div>
    </div>

    <div class="container mt-5" style="color: white; background-color: #4cb01e; padding: 5%; box-shadow: 0px 0px 32px -16px rgba(0, 0, 0, 0.267);border: 1px solid rgb(241, 241, 241); border-radius: 1rem;">
    <a href="https://drive.google.com/file/d/1RvJJRJURJlYB2bmkuJ6pV-P296XR-2gw/view?usp=sharing" style="text-decoration:none;color:white"><h2 class="text-center mb-5">Grupa 2 - Admin</h1></a>
        <div class="row">
          <div class="text-center col-lg-6">
            <img class="img-fluid" style="height: 150px; border-radius: 50%;border: 1px solid rgb(241, 241, 241);" alt="Nemanja Bogojevic" src="https://i.imgur.com/yXPuq4U.jpg">
            <h4 class="mt-2">Nemanja Bogojević</h4>
            <p>Moje ime je Nemanja Bogojevic, imam 21 godinu i trenutno sam student 4 godina akademskih studija smer racunarsko inzinjerstvo. 
            Osnovnu skolu "Jovo Kursula" i srednju skolu "ESTS Nikola tesla" smer eletrotehnicar racunara zavrsio sam u Kraljevu. U slobodno vreme
            volim da se bavim sportom i programiranjem.</p>
          </div>
          <div class="text-center col-lg-6">
            <img class="img-fluid" style="height: 150px; border-radius: 50%;border: 1px solid rgb(241, 241, 241);" alt="Vladimir Dukanac" src="https://i.imgur.com/RaUPDiP.jpg">
            <h4 class="mt-2">Vladimir Dukanac</h4>
            <p>Moje ime je Dukanac Vladimir, 22 godine i iz Čačka sam. Srednju školu sam završio u Čačku, Gimnaziju prirodno-matematički smer. Fakultet tehničkih nauka upisao sam 2018. godine, smer: elektrotehničko i računarsko inženjerstvo, koje smatram veoma perspketivnom profesijom.</p>
          </div>
        </div>
    </div>

    <div class="container mt-5" style="color: white; background-color: #4cb01e; padding: 5%; box-shadow: 0px 0px 32px -16px rgba(0, 0, 0, 0.267);border: 1px solid rgb(241, 241, 241); border-radius: 1rem;">
    <a href="https://drive.google.com/file/d/1XoSCl8ioOfl-ZjFAuJulXIg6reg8EnUt/view?usp=sharing" style="text-decoration:none;color:white"><h2 class="text-center mb-5">Grupa 12 - Igrači</h1></a>
        <div class="row">
          <div class="text-center col-lg-6">
            <img class="img-fluid" style="height: 150px; border-radius: 50%;border: 1px solid rgb(241, 241, 241);" alt="Nebojsa Nikolic" src="https://i.imgur.com/JNIdslG.jpg">
            <h4 class="mt-2">Nebojša Nikolić</h4>
            <p>Moje ime je Nebojša Nikolić, rođen sam u Valjevu gde sam završio osnovnu i srednu Tehničku školu, smer administrator računarskih mreža. Logičan izbor za dalje školova bio je Fakultet tehničkih nauka u Čačku, smer Informacione tehnologije. Veoma sam zadovoljan dosadašnjim školovanjem i želeo bih da upišem master studije na ovom fakultetu. U slobodno vreme volim da programiram i igram igrice na računaru.</p>
          </div>
          <div class="text-center col-lg-6">
            <img class="img-fluid" style="height: 150px; border-radius: 50%;border: 1px solid rgb(241, 241, 241);" alt="Milica Stevanic" src="https://i.imgur.com/1lwM1om.jpg">
            <h4 class="mt-2">Milica Stevanić</h4>
            <p>Moje ime je Milica Stevanić, rođena sam 30.03.1999 godine u Čačku. Osnovnu školu i srednju ekenomsku sam završila u Čačku. FTN u Čačku sam upisala 2018. godine na smer Informacionih tehnologija. U slobodno vreme volim da kuvam i pratim sport, posebno fudbal, takođe sam bila i sudija u Fudbalskom savezu.</p>
          </div>
        </div>
    </div>

    <div class="container mt-5" style="color: white; background-color: #4cb01e; padding: 5%; box-shadow: 0px 0px 32px -16px rgba(0, 0, 0, 0.267);border: 1px solid rgb(241, 241, 241); border-radius: 1rem;">
    <a href="https://drive.google.com/file/d/1NetItFoUUKAmgkExAPtam2eQzaTR4hVV/view?usp=sharing" style="text-decoration:none;color:white"><h2 class="text-center mb-5">Grupa 4 - Klubovi</h1></a>
        <div class="row">
          <div class="text-center col-lg-4">
            <img class="img-fluid" style="height: 150px; border-radius: 50%;border: 1px solid rgb(241, 241, 241);" alt="Marta Mladenovic" src="https://i.imgur.com/sJ4CMN0.jpg">
            <h4 class="mt-2">Marta Mladenović</h4>
            <p>Moje ime je Marta Mladenović, imam 22 godine i završila sam srednju medicincku školu u Čačku. 2018. godine sam upisala Fakultet tehničkih nauka, smer informacione tehnologije. Iz oblasti informacionih tehnologija u budućnosti planiram da se bavim frontend tehnologijama, jer me taj segment najviše interesuje.</p>
          </div>
          <div class="text-center col-lg-4">
            <img class="img-fluid" style="height: 150px; border-radius: 50%;border: 1px solid rgb(241, 241, 241);" alt="Tanja Prodanovic" src="https://i.imgur.com/39pNdHg.jpg">
            <h4 class="mt-2">Tanja Prodanović</h4>
            <p>Zovem se Tanja Prodanovic, osnovnu i srednju skolu zavrsila sam u Lucanima. Nakon toga opredelila sam se za Fakultet tehnickih nauka u Cacku i smer informacione tehnologije.Od svojih hobija mogu izdvojiti da volim da pratim kvizove i provodim sto vise vremena sa drustvom.Trenutno ne radim nigde, ali u skorijoj buducnosti bih volela da se bavim frontend programiranjem.</p>
          </div>
          <div class="text-center col-lg-4">
            <img class="img-fluid" style="height: 150px; border-radius: 50%;border: 1px solid rgb(241, 241, 241);" alt="Zeljko Udovicic" src="https://i.imgur.com/SPoe7QJ.jpg">
            <h4 class="mt-2">Željko Udovičić</h4>
            <p>Moje ime je Željko Udovičić, imam 22 godine i dolazim iz Užica. Završio sam srednju Ekonomsku školu u Užicu smer poslovni administrator. 2018. Upisao sam Fakultet tehničkih nauka u Čačku smer Informacione tehnologije i sada posle 4 godine sam veoma zadovoljan sa izborom fakulteta. U slobodno vreme volim da pratim i takođe trenirao sam košarku 8 godina.</p>
          </div>
        </div>
    </div>




    <?php include "../includes/footer.php" ?>

  </article>

</body>

</html>