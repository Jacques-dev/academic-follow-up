
  <?php
    include("../Controller/AverageManagement.php");
    include("../Controller/Fonctions.php");
    render(false, "Header", ["activePage" => "Ranking"]);
  ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-12" align="center" id="head-column">
          <?php
            if (isset($_SESSION["email"])):
              echo $_SESSION["email"];
            endif;
          ?>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <p><h1>CLASSEMENT</h1></p>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <p>Nom prenom</p>
            <button type="button" name="button">trier par ordre alphabetique</button>
          </div>
          <div class="col-lg-1">
            <p>UE 1</p>
            <button type="button" name="button">trier selon ce critere</button>
          </div>
          <div class="col-lg-1">
            <p>UE 2</p>
            <button type="button" name="button">trier selon ce critere</button>
          </div>
          <div class="col-lg-1">
            <p>UE 3</p>
            <button type="button" name="button">trier selon ce critere</button>
          </div>
          <div class="col-lg-1">
            <p>UE 4</p>
            <button type="button" name="button">trier selon ce critere</button>
          </div>
          <div class="col-lg-1">
            <p>UE 5</p>
            <button type="button" name="button">trier selon ce critere</button>
          </div>
          <div class="col-lg-1">
            <p>UE 6</p>
            <button type="button" name="button">trier selon ce critere</button>
          </div>
          <div class="col-lg-1">
            <p>UE 7</p>
            <button type="button" name="button">trier selon ce critere</button>
          </div>
          <div class="col-lg-1">
            <p>UE 8</p>
            <button type="button" name="button">trier selon ce critere</button>
          </div>
          <div class="col-lg-1">
            <p>UE 9</p>
            <button type="button" name="button">trier selon ce critere</button>
          </div>
          <div class="col-lg-1">
            <p>UE 10</p>
            <button type="button" name="button">trier selon ce critere</button>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <?php for($i = 0; $i < 50; ++$i){ ?>
          <div class="row">
            <div class="col-lg-2">
              Nom Prenom
            </div>
            <div class="col-lg-1">
              une note
            </div>
            <div class="col-lg-1">
              une note
            </div>
            <div class="col-lg-1">
              une note
            </div>
            <div class="col-lg-1">
              une note
            </div>
            <div class="col-lg-1">
              une note
            </div>
            <div class="col-lg-1">
              une note
            </div>
            <div class="col-lg-1">
              une note
            </div>
            <div class="col-lg-1">
              une note
            </div>
            <div class="col-lg-1">
              une note
            </div>
            <div class="col-lg-1">
              une note
            </div>
          </div>
         <?php } ?>
       </div>
      </div>
    </div>

  <?php render(false, "Footer", []); ?>
