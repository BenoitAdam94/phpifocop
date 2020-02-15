function sommaireAutomatique(numerofixe){

	document.addEventListener("DOMContentLoaded", function(event) { 
	var liens = '';
	var all = document.getElementsByTagName("h2"); // console.log(all);
	var h1 = document.getElementsByTagName("h1"); //console.log(h1);
	var numero = 1;
	var prefixeNumero = ''; 
	// var attr = '';
	for (var i = 0; i < all.length; i++) {
		// attr = all[i].getAttribute("id");
		// console.log(attr);
		// console.log(all[i].innerHTML);
		// liens += "<a href=\"#"+attr+"\" title=\"Accéder au chapitre n°"+ numerofixe+"."+numero+"\">" + numerofixe+"."+numero+ " " + all[i].innerHTML + "</a>";
		if(numero < 10) var prefixeNumero = 0; else var prefixeNumero = ''; 
		
		liens += "<a href=\"#"+sujet+numerofixe+'.'+prefixeNumero+numero+"\" title=\"Accéder au chapitre n°"+ numerofixe+"."+prefixeNumero+numero+"\">" + numerofixe+"."+prefixeNumero+numero+ "  &nbsp; " + all[i].innerHTML + "</a>";
		// all[i].innerHTML = '<h2 id="'+attr+'">'+numerofixe+'. '+numero+' '+all[i].innerHTML+'</h2>';
		
		document.getElementsByTagName("h2")[i].innerHTML = '<span class="petitnumero">'+numerofixe+'.'+prefixeNumero+numero+'</span><span class="isocele"></span> <span class="contenu-h2">'+all[i].innerHTML+'</span>';
		document.getElementsByTagName("h2")[i].setAttribute("id", sujet+numerofixe+'.'+prefixeNumero+numero);			
		++numero;
	}
		document.getElementById('sommaire').innerHTML = '<span class="sommaire">Sommaire</span><span class="lead">'+numerofixe+'. '+h1[0].innerHTML+'</span>' + liens;
		
	// url = document.URL;// href.substr(href.lastIndexOf('/') + 1)

	});


}

