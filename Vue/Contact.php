


<form class="container h-100" method="post" action="../Controller/Contact.php" id="contactForm">

  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-lg-4">
      <div class="row">
        <input type="text" name="contactName" placeholder="Nom">
      </div>
      <div class="row">
        <input type="text" name="contactEmail" placeholder="Email">
      </div>
      <div class="row">
        <input type="text" name="contactTopic" placeholder="Sujet">
      </div>
      <div class="row">
        <button class="learn-more btn-1" type="submit" name="button">
          <span class="circle" aria-hidden="true">
            <span class="icon arrow"></span>
          </span>
          <span class="button-text">Envoyer</span>
        </button>
      </div>
    </div>
    <div class="col-lg-6">
      <textarea name="name" rows="8" cols="80" placeholder="Message"></textarea>
    </div>
  </div>

</form>
