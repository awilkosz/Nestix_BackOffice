function surligne(champ, erreur){
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}

function verifPseudo(champ){
   if(champ.value.length < 2 || champ.value.length > 25){
      surligne(champ, true);
      return false;
   }
   else{
      surligne(champ, false);
      return true;
   }
}

function verifMail(champ){
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value)){
      surligne(champ, true);
      return false;
   }
   else{
      surligne(champ, false);
      return true;
   }
}

function verifDate(champ){
   var regex =/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;
   if(champ.value == ""){
       return true;
   }
   else if(!regex.test(champ.value)){
      surligne(champ, true);
      return false;
   }
   else{
      surligne(champ, false);
      return true;
   }
}

function verifMdp(champ){
    var regex = /^(?=.{10,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/;
    
    if(!regex.test(champ.value)){
       surligne(champ, true);
       return false;
    }
    else{
       surligne(champ, false);
       return true;
    
      }
}

function verifFormCreation(f){
   var pseudoOk = verifPseudo(f.pseudo);
   var mailOk = verifMail(f.mail);
   //var dateOk = verifDate(f.dob);
   var mdpOk = verifMdp(f.password)
   
   if(pseudoOk && mailOk && dateOk && mdpOk)
      return true;
   else{
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
   
}

function filtreMail()
{
   var adresseEmail = document.getElementById("emailUser").value;
   var regEmail = new RegExp(/^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$/g);

   if(!regEmail.test(adresseEmail))
      {
            document.getElementById("erreurMail").innerHTML = "Adresse email incorrecte";
      }
   else
   {
         document.getElementById("erreurMail").innerHTML = "";
   }
}

function filtreMDP()
{
   var motDePasse = document.getElementById("mdpUser").value;
   var regMDP = new RegExp("^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{10,}$");

   if(!regMDP.test(motDePasse))
   {
         document.getElementById("erreurMDP").innerHTML = "Le mot de passe doit faire au moins 10 caractères, contenir au moins une majuscule et un chiffre";
   }
else
   {
         document.getElementById("erreurMDP").innerHTML = "";
   }
}

function verifierFormulaire()
{
   var errMail = document.querySelector("#erreurMail"),
	   errMDP = document.querySelector("#erreurMDP"),
      leForm = document.querySelector("#formulaireAjout"),
      newPseuo = document.getElementById("pseudoUser"),
      newMail = document.getElementById("emailUser"),
      newMDP = document.getElementById("mdpUser");
	   
	if(errMail.innerHTML !== "" || errMDP.innerHTML !== "")
	{
		alert("Certains champs sont invalides !");
   }
   else if(newPseuo.value === "" || newMail.value === "" || newMDP.value === "")
   {
      alert("Certains champs doivent être remplis");
   }
   else
      leForm.submit();
}

function filtreMDPForReset()
{
   var motDePasse = document.getElementById("newPassword").value;
   var regMDP = new RegExp("^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{10,}$");

   if(!regMDP.test(motDePasse))
   {
         document.getElementById("erreurMDP2").innerHTML = "Le mot de passe doit faire au moins 10 caractères, contenir au moins une majuscule et un chiffre";
   }
else
   {
         document.getElementById("erreurMDP2").innerHTML = "";
   }
}

function validerResetPassword()
{
	var flag = true,
		errMDP = document.querySelector("#erreurMDP2"),
		leForm = document.querySelector("#mdpResetForm"),
		motDePasse = document.getElementById("newPassword").value,
		mdpConfirm = document.getElementById("confirmPassword").value;
		
	if(errMDP.innerHTML !== "")
	{
		alert("Certains champs sont invalides !");
		flag = false;
	}
	
	if(motDePasse !== mdpConfirm)
	{
		alert("Les mots de passe ne correspondent pas !");
		flag = false;
	}
	
	if(flag === true)
		leForm.submit();
}

$(document).ready(function () {
   console.log("ICI");
   $('#rechercheUsersAll').autocomplete({ //Appel de la méthode d'autocomplétion si au moins 2 caractères ont été saisis
   source: './Ajax/rechercheUsersAll.php',
   minLength: 2,
   focus: function (event, ui) {
         console.log(ui.item);
         $("#rechercheUsersAll").val(ui.item.user_pseudo); //Gère le focus sur un pseudo
         return false;
   },
   select: function (event, ui) {
         console.log(ui.item);
         $('#rechercheUsersAll').html(ui.item.user_pseudo); //Récupère le pseudo sélectionné
   }
   });

   
});
