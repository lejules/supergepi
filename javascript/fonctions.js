function observeur(){
  Event.observe(document, 'click', traiterEvenement);
  Event.observe(document, 'keydown', func_KeyDown);
}
function traiterEvenement(event){
  var elementCliquer = Event.element(event);
  var premierSelectCliquer = Event.findElement(event,"p") ? Event.findElement(event,"p") : null;
  var cliquerTd = Event.findElement(event,"td") ? Event.findElement(event,"td") : null;
  var affPremierSelectCliquer = premierSelectCliquer ? premierSelectCliquer.id : 'aucun';
  var tab = new Array('liste_etab', 'ajout_etab', 'liste_base', 'modif_user');
  for(i = 0; i < tab.length ; i++){
    if (tab[i] == affPremierSelectCliquer){
      ajaxUpdater('divdroite', 'admin', affPremierSelectCliquer, 'index_ajax.php');
    }
  }
  if (cliquerTd !== null){
    //alert("STOP ! "+cliquerTd.id+" = id");
    ajaxUpdater('divdroite', 'admin', cliquerTd.id, 'index_ajax.php');
  }
}
function func_KeyDown(event, script, type){
  TouchKeyDown = (window.Event) ? event.which : event.keyDown;
  if (TouchKeyDown == 13) {
    if (script == 1) {
      gestionaffAbs('aff_result', type, 'parametrage_ajax.php');
    }
  }else if(TouchKeyDown == 113){
    inverserDiv('idAidAbs');
  }else if(TouchKeyDown == 17){
    var insertion = new Insertion.After('divgauche', '<br />On appuie sur le touche CTRL, argh !!');
  }
}
function afficherDiv(id){Element.show(id);}
function cacherDiv(id){Element.hide(id);}
function inverserDiv(id){Element.toggle(id);}
// Fonction qui permet de cocher / décocher tous les checkbox de l'élément dont le name = nouvelle_periode
function CocheCase(boul) {

	nbelements = document.nouvelle_periode.elements.length;
		for (i = 0 ; i < nbelements ; i++) {
			if (document.nouvelle_periode.elements[i].type =='checkbox')
			document.nouvelle_periode.elements[i].checked = boul ;
		}
}
// Fonctions Ajax se basant sur Prototype
function ajaxUpdater(id, type, info, url){
	elementHTML = $(id);
	o_options = new Object();
	o_options = {postBody: '_id='+info+'&type='+type, onComplete:afficherDiv(id)};
	var laRequete = new Ajax.Updater(elementHTML,url,o_options);
}
function donnerFocus(nom) {
	document.forms[0].elements[nom].focus();
}