function recup_depenses(event) {
    event.preventDefault();  // Cela évite le rafraîchissement de la page lors de la soumission du formulaire
    var Loyer = document.getElementById('loyer').value;
    var Services_Publics = document.getElementById('services_publics').value;
    var Alimentation = document.getElementById('alimentation').value;
    var Hygiene = document.getElementById('hygiene').value;
    var Abonnements = document.getElementById('abonnements').value;
    var Assurances = document.getElementById('assurances').value;
    var Transports = document.getElementById('transport').value;
    var Divertissements = document.getElementById('divertissement').value;
    var Remboursement = document.getElementById('remboursement').value;
    var Autre_Depenses = document.getElementById('autre_depenses').value;

    var ctx = document.getElementById('myChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Loyer', 'Services_Publics', 'Alimentation', 'Hygiène', 'Abonnements', 'Assurances', 'Transports', 'Divertissements', 'Remboursement', 'Autre_Depenses'],
            datasets: [{
                data: [Loyer, Services_Publics, Alimentation, Hygiene, Abonnements, Assurances, Transports, Divertissements, Remboursement, Autre_Depenses],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',  // couleur pour Loyer
                    'rgba(54, 162, 235, 0.2)',  // couleur pour Services_Publics
                    'rgba(255, 206, 86, 0.2)',  // couleur pour Alimentation
                    'rgba(75, 192, 192, 0.2)',  // couleur pour Hygiene
                    'rgba(153, 102, 255, 0.2)',  // couleur pour Abonnements
                    'rgba(255, 159, 64, 0.2)',  // couleur pour Assurances
                    'rgba(255, 99, 132, 0.2)',  // couleur pour Transports
                    'rgba(54, 162, 235, 0.2)',  // couleur pour Divertissements
                    'rgba(255, 206, 86, 0.2)',  // couleur pour Remboursement
                    'rgba(75, 192, 192, 0.2)'  // couleur pour Autre_Depenses
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
            }
        }
    });
}






function recup_revenus(event) {
    event.preventDefault();
    var Salaire = Number(document.getElementById('salaire').value);
    var Aides_Sociales = Number(document.getElementById('aides_sociales').value);
    var Bourse = Number(document.getElementById('bourse').value);
    var Investissement = Number(document.getElementById('investissement').value);
    var Locatif = Number(document.getElementById('locatif').value);
    var Autre_Revenus = Number(document.getElementById('autre_revenus').value);

    var totalRevenus = Salaire + Aides_Sociales + Bourse + Investissement + Locatif + Autre_Revenus;

    var totalRevenusElement = document.getElementById('totalRevenus');
    if (totalRevenusElement) {  // Vérifiez si l'élément existe avant d'essayer de définir ses propriétés
        totalRevenusElement.innerText = "Total Revenus : " + totalRevenus;
    } else {
        console.log('Élément "totalRevenus" introuvable.');
    }

    var ctx = document.getElementById('revenuesChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Salaire', 'Aides Sociales', 'Bourse', 'Investissement', 'Locatif', 'Autres Revenus'],
            datasets: [{
                data: [Salaire, Aides_Sociales, Bourse, Investissement, Locatif, Autre_Revenus],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        }
    });
}
