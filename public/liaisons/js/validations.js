function ancestor(node, match) {
    if (!node || !node.nodeType || typeof (match) != 'string') {
        return node;
    }
    if ((match = match.split('.')).length === 1) {
        match.push(null);
    } else if (!match[0]) {
        match[0] = null;
    }
    do {
        if ((!match[0] || match[0].toLowerCase() == node.nodeName.toLowerCase()) && (!match[1] || new RegExp('( |^)(' + match[1] + ')( |$)').test(node.className))) {
            break;
        }
    } while (node = node.parentNode);
    return node;
}

var objJSONErreurs =
{
    "nom": {
        "label": "Nom complet",
        "erreurs": {
            "vide": "Entrez votre prénom et nom complet",
            "motif": "Votre prénom et/ou votre nom comporte des caractères non pris en charge."
        }
    },
    "courriel": {
        "label": "Courriel",
        "erreurs": {
            "vide": "Veuillez entrer votre adresse courriel, s'il-vous-plaît.",
            "motif": "Veuillez entrer une adresse courriel valide."
        }
    },
    "responsable_id": {
        "label": "responsable_id",
        "erreurs": {
            "vide": "Sélectionnez un ou une destinataire."
        }
    },
    "sujet": {
        "label": "Sujet",
        "erreurs": {
            "vide": "Entrez le sujet du courriel.",
            "motif": "Le sujet du courriel comporte des caractères non pris en charge."
        }
    },
    "message": {
        "label": "Message",
        "erreurs": {
            "vide": "Votre message est absent!",
            "motif": "Votre message comporte des caractères non pris en charge."
        }
    },
    "humain": {
        "erreurs": {
            "vide": "Êtes-vous un robot?",
            "motif": "Votre réponse n'est pas adéquate! Veuillez recommencer."
        }
    },
    "consentement": {
        "label": "Autorisez-vous le partage de ce numéro?",
        "erreurs": {
            "vide": "Veuillez, s'il-vous-plaît, cocher la boîte pour consentir au partage de votre no cellulaire avec un.e étudiant.e qui vous accueillera lors de cette journée"
        }
    },
    "telephone": {
        "label": "Téléphone",
        "erreurs": {
            "vide": "Entrez votre numéro de téléphone (format:(123) 456-7890)!",
            "motif": "Veuillez entrer un numéro de téléphone dans un format valide: (123) 456-7890"
        }
    },
    "retroactions": {
        "courriel": {
            "completer": "Veuillez compléter le formulaire, s'il-vous-plaît.",
            "envoyer": "Le courriel a été envoyé.",
            "avorter": "L'envoi du courriel a avorté."
        }
    }
}

// Déclaration d'objet(s)    

var page =
{
    //méthodes 
    initialiser: function () {
        // On enlève la validation html5 pour le moment
        event.preventDefault();
        document.querySelector(".soumission").formNoValidate = true;
        if (sessionStorage.getItem('resp') != null) {
            select_resp(sessionStorage.getItem('resp'));
            sessionStorage.removeItem('resp');
        }
    },

    validerNom: function (evenement) {
        // evenement = objet présentant l'ensemble des informations au sujet de l'événement
        evenement.preventDefault();
        var objCible = evenement.currentTarget;
        var monPattern = "^" + objCible.pattern + "$";
        var conteneur = ancestor(objCible, '.ctnForm');
        var motif = new RegExp(monPattern);
        var strChaine = objCible.value;

        if (strChaine != "") {
            console.log(motif.test(strChaine));
            if (motif.test(strChaine) == true) {
                objCible.classList.remove('erreur');
                conteneur.querySelector('.erreur__message').innerHTML = '';
            }
            else {
                objCible.classList.add('erreur');
                conteneur.querySelector('.erreur__message').innerHTML = objJSONErreurs[objCible.id].erreurs.motif + '&nbsp;<span class="user-box user-box--warning"><i class="fa-solid fa-triangle-exclamation" aria-hidden="true" style="color:#FF0000; padding-right:5px"></i></span>';
            }
        }
        else {
            objCible.classList.add('erreur');
            conteneur.querySelector('.erreur__message').innerHTML = objJSONErreurs[objCible.id].erreurs.vide + '&nbsp;<span class="user-box user-box--warning"><i class="fa-solid fa-triangle-exclamation" aria-hidden="true" style="color:#FF0000; padding-right:5px"></i></span>';
        }
    },

    validerChaine: function (evenement) {
        evenement.preventDefault();
        var objCible = evenement.currentTarget;
        var conteneur = ancestor(objCible, '.ctnForm');
        var strChaine = objCible.value;
        console.log(strChaine);

        if (strChaine != "") {
            objCible.classList.remove('erreur');
            conteneur.querySelector('.erreur__message').innerHTML = '';
            if (objCible.id == 'responsable_id') {
                if (objCible.value == '4') {
                    document.getElementById('input-telephone').style.display = 'block';
                }
                else {
                    document.getElementById('input-telephone').style.display = 'none';
                }
            }
        }
        else {
            objCible.classList.add('erreur');
            conteneur.querySelector('.erreur__message').innerHTML = objJSONErreurs[objCible.id].erreurs.vide + '&nbsp;<span class="user-box user-box--warning"><i class="fa-solid fa-triangle-exclamation" aria-hidden="true" style="color:#FF0000; padding-right:5px"></i></span>';
        }
    },

    validerCheck: function (evenement) {
        evenement.preventDefault();
        var objCible = evenement.currentTarget;
        var conteneur = ancestor(objCible, '.ctnForm');

        if (objCible.checked == true) {
            conteneur.querySelector('.erreur__message').innerHTML = '';
        }
        else {
            conteneur.querySelector('.erreur__message').innerHTML = objJSONErreurs[objCible.id].erreurs.vide + '&nbsp;<span class="user-box user-box--warning"><i class="fa-solid fa-triangle-exclamation" aria-hidden="true" style="color:#FF0000; padding-right:5px"></i></span>';
        }
    },

};

function select_resp(num) {
    let options = document.getElementById('responsable_id');
    document.getElementById('input-telephone').style.display = 'none';
    for (let i = 0; i < options.length; i++) {
        options[i].selected = false;
        if (options[i].value == num) {
            options[i].selected = true;
            if (num == '4') {
                document.getElementById('input-telephone').style.display = 'block';
            }
        }
    }
}

function change_page(num) {
    sessionStorage.setItem('resp', num);
    window.location = 'index.php?controleur=contact&action=index';
}

function required() {
    var Nom = ['nom', 'courriel', 'sujet'];
    var Chaine = ['responsable_id', 'message'];
    var isClean = true;

    for (var i = 0; i < Nom.length; i++) {
        var objCible = document.getElementById(Nom[i]);
        var monPattern = "^" + objCible.pattern + "$";
        var conteneur = ancestor(objCible, '.ctnForm');
        var motif = new RegExp(monPattern);
        var strChaine = objCible.value;

        if (strChaine != "") {
            console.log(motif.test(strChaine));
            if (motif.test(strChaine) == true) {
                objCible.classList.remove('erreur');
                conteneur.querySelector('.erreur__message').innerHTML = '';
            }
            else {
                objCible.classList.add('erreur');
                conteneur.querySelector('.erreur__message').innerHTML = objJSONErreurs[objCible.id].erreurs.motif + '&nbsp;<span class="user-box user-box--warning"><i class="fa-solid fa-triangle-exclamation" aria-hidden="true" style="color:#FF0000; padding-right:5px"></i></span>';
                isClean = false;
            }
        }
        else {
            objCible.classList.add('erreur');
            conteneur.querySelector('.erreur__message').innerHTML = objJSONErreurs[objCible.id].erreurs.vide + '&nbsp;<span class="user-box user-box--warning"><i class="fa-solid fa-triangle-exclamation" aria-hidden="true" style="color:#FF0000; padding-right:5px"></i></span>';
            isClean = false;
        }
    }

    var checkbox = null;

    if (document.getElementById("responsable_id").value == '4') {
        Chaine.push('telephone');
        checkbox = document.getElementById('consentement');
    }

    for (var i = 0; i < Chaine.length; i++) {
        var objCible = document.getElementById(Chaine[i]);
        var conteneur = ancestor(objCible, '.ctnForm');
        var strChaine = objCible.value;

        if (strChaine != "") {
            objCible.classList.remove('erreur');
            conteneur.querySelector('.erreur__message').innerHTML = '';
        }
        else {
            objCible.classList.add('erreur');
            conteneur.querySelector('.erreur__message').innerHTML = objJSONErreurs[objCible.id].erreurs.vide + '&nbsp;<span class="user-box user-box--warning"><i class="fa-solid fa-triangle-exclamation" aria-hidden="true" style="color:#FF0000; padding-right:5px"></i></span>';
            isClean = false;
        }
    }

    if (checkbox != null) {
        var objCible = checkbox;
        var conteneur = ancestor(objCible, '.ctnForm');

        if (objCible.checked == true) {
            conteneur.querySelector('.erreur__message').innerHTML = '';
        }
        else {
            isClean = false;
            conteneur.querySelector('.erreur__message').innerHTML = objJSONErreurs[objCible.id].erreurs.vide + '&nbsp;<span class="user-box user-box--warning"><i class="fa-solid fa-triangle-exclamation" aria-hidden="true" style="color:#FF0000; padding-right:5px"></i></span>';
        }
    }


    return isClean;
}



//*******************
// Écouteurs d'événements 
//*******************
window.addEventListener("load", page.initialiser.bind(page));

//validations
document.getElementById("sujet").addEventListener("blur", page.validerNom.bind(page));
document.getElementById("nom").addEventListener("blur", page.validerNom.bind(page));
document.getElementById("courriel").addEventListener("blur", page.validerNom.bind(page));
document.getElementById("telephone").addEventListener("blur", page.validerNom.bind(page));

document.getElementById("consentement").addEventListener("blur", page.validerCheck);
document.getElementById("responsable_id").addEventListener("blur", page.validerChaine);
document.getElementById("message").addEventListener("blur", page.validerChaine);