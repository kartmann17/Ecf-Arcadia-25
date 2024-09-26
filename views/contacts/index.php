<link rel="stylesheet" href="../Asset/css/contact.css">
<div class="vide"></div>


<form action="contacts/ajoutMessage" class="formulaire m-auto mb-5" method="post">
  <h1 class="text-center">Écrivez-nous</h1>

  <div class="mb-3">
    <label for="nom" class="form-label"></label>
    <input id="nom" class="form-control" type="text" name="nom" placeholder="Nom" />
  </div>

  <div class="mb-3">
    <label for="email" class="form-label"></label>
    <input id="email" class="form-control" type="email" name="email" placeholder="Email" />
  </div>

  <div class="mb-3">
    <label for="message" class="form-label"></label>
    <textarea id="message" class="form-control" name="message" rows="6" placeholder="Message"></textarea>
  </div>


  <div class="d-flex justify-content-center">
    <button class="btn btn-primary d-block w-60" type="submit">Envoyer</button>
  </div>
</form>

