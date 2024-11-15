
/// Montrer les sites d'un clients 
///
function MontrerSitesDeClients(id) {
    var tableau = document.getElementById(id);
    if (tableau.hidden=false) {
        tableau.hidden=true;
    } else {
        tableau.hidden=false;
    }
}