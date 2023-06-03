var myPieChart, myLineChart, myBarChart;


var depenses = [700, 600, 750, 800, 850, 550, 650, 750, 850, 800, 650, 700];
var moyennes = [483, 483, 483, 483, 483, 483, 483, 483, 483, 483, 483, 483];

function recup_depenses(event) {
    event.preventDefault();  // Cela évite le rafraîchissement de la page lors de la soumission du formulaire

    var depenses = {
        Loyer: document.getElementById('loyer').value,
        Services_Publics: document.getElementById('services_publics').value,
        Alimentation: document.getElementById('alimentation').value,
        Hygiene: document.getElementById('hygiene').value,
        Abonnements: document.getElementById('abonnements').value,
        Assurances: document.getElementById('assurances').value,
        Transports: document.getElementById('transport').value,
        Divertissements: document.getElementById('divertissement').value,
        Autre_Depenses: document.getElementById('autre_depenses').value
    };

    // Appelle la fonction d'affichage du diagramme avec les dépenses récupérées en argument
    affiche_camembert(depenses);

    affiche_barChart(depenses);
}

window.onload = function() {
    var btnCalculerDepenses = document.getElementById('calculer_depenses');
    var btnCalculerRevenus = document.getElementById('calculer_revenus');
}





function affiche_barChart(depenses) {
    var ctx = document.getElementById('barChart').getContext('2d');
    
    const existingValues = [400, 180, 320, 140, 70, 120, 80, 110, 60]; // Remplacer par les valeurs moyennes réelles

    // Si un graphique existe déjà, le détruire avant de créer un nouveau
    if (myBarChart) {
        myBarChart.destroy();
    }

    myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(depenses),
            datasets: [
                {
                    label: 'Vos dépenses',
                    data: Object.values(depenses),
                    backgroundColor: 'rgba(0, 123, 255, 0.5)'
                },
                {
                    label: 'Moyenne des dépenses',
                    data: existingValues,
                    backgroundColor: 'rgba(220, 53, 69, 0.5)'
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: { },
                y: { 
                    beginAtZero: true
                }
            }
        }
    });
}


function affiche_camembert(depenses) {
    var ctx = document.getElementById('depensesChart').getContext('2d');

    // Si un graphique existe déjà, le détruire avant de créer un nouveau
    if (myPieChart) {
        myPieChart.destroy();
    }

    // Calculer le total des dépenses
    var totalDepenses = Object.values(depenses).reduce(function(a, b) { return parseFloat(a) + parseFloat(b); }, 0);

    myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: Object.keys(depenses),
            datasets: [{
                data: Object.values(depenses),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',  // couleur pour Loyer
                    'rgba(54, 162, 235, 0.2)',  // couleur pour Services_Publics
                    'rgba(255, 206, 86, 0.2)',  // couleur pour Alimentation
                    'rgba(75, 192, 192, 0.2)',  // couleur pour Hygiene
                    'rgba(153, 102, 255, 0.2)',  // couleur pour Abonnements
                    'rgba(255, 159, 64, 0.2)',  // couleur pour Assurances
                    'rgba(255, 99, 132, 0.2)',  // couleur pour Transports
                    'rgba(54, 162, 235, 0.2)',  // couleur pour Divertissements
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

    // Appelle la fonction d'affichage du graphique linéaire avec le total des dépenses
    repereDepensesTotal(totalDepenses);
}


function repereDepensesTotal(totalDepenses) {
    var ctx = document.getElementById('repereDepensesChart').getContext('2d');
    var depenses = Array(12).fill(totalDepenses);

    var depensesDetaillees = [700, 600, 750, 800, 850, 550, 650, 750, 850, 800, 650, 700];  // Ajoutez votre liste de dépenses détaillées ici

    // Si un graphique existe déjà, le détruire avant de créer un nouveau
    if (myLineChart) {
        myLineChart.destroy();
    }

    myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Total Dépenses',
                data: depenses,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 1
            },
            {
                label: 'Dépenses détaillées',
                data: depensesDetaillees,  // Utilisez la liste de dépenses détaillées ici
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}













var revenus = [1200, 1200, 1200, 1200, 1200, 1200, 1200, 1200, 1200, 1200, 1200, 1200];



// Fonction pour récupérer les revenus
function recup_revenus(event) {
    event.preventDefault();

    var revenusData = {
        Salaire: Number(document.getElementById('salaire').value),
        Aides_Sociales: Number(document.getElementById('aides_sociales').value),
        Bourse: Number(document.getElementById('bourse').value),
        Investissement: Number(document.getElementById('investissement').value),
        Locatif: Number(document.getElementById('locatif').value),
        Autre_Revenus: Number(document.getElementById('autre_revenus').value)
    };

    var totalRevenus = Object.values(revenusData).reduce((acc, val) => acc + val, 0);
    
    var totalRevenusElement = document.getElementById('totalRevenus');
    if (totalRevenusElement) {
        totalRevenusElement.innerText = "Total Revenus : " + totalRevenus;
    } else {
        console.log('Élément "totalRevenus" introuvable.');
    }

    // Appelle la fonction d'affichage du diagramme avec les revenus récupérés en argument
    affiche_camembert_revenus(revenusData, totalRevenus);
    affiche_barChart_revenus(revenusData);
}

// Fonction pour afficher le camembert des revenus
function affiche_camembert_revenus(revenusData, totalRevenus) {
    var ctx = document.getElementById('revenuesChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: Object.keys(revenusData),
            datasets: [{
                data: Object.values(revenusData),
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
    repereRevenusTotal(totalRevenus, revenusData);
}



var myRevenuesPieChart, myRevenuesLineChart, myRevenuesBarChart;

// Fonction pour afficher le graphique à barres des revenus
function affiche_barChart_revenus(revenusData) {
    var ctx = document.getElementById('revenuesBarChart').getContext('2d');

    const existingValues = [400, 180, 320, 140, 70, 120, 80]; // Remplacer par les valeurs moyennes réelles

    // Si un graphique existe déjà, le détruire avant de créer un nouveau
    if (myRevenuesBarChart) {
        myRevenuesBarChart.destroy();
    }

    myRevenuesBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(revenusData),
            datasets: [
                {
                    label: 'Vos revenus',
                    data: Object.values(revenusData),
                    backgroundColor: 'rgba(0, 123, 255, 0.5)'
                },
                {
                    label: 'Moyenne des revenus',
                    data: existingValues,
                    backgroundColor: 'rgba(220, 53, 69, 0.5)'
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: { },
                y: { 
                    beginAtZero: true
                }
            }
        }
    });
}


// Variable globale pour les données de la deuxième courbe de revenus
var revenus = [1250, 1100, 1125, 1300, 1200, 1215, 1210, 1110, 1216, 1170, 1190, 1230];

var myChart = null;

// Fonction pour afficher le total des revenus sur un graphique linéaire
function repereRevenusTotal(totalRevenus, revenusData) {
    var ctx = document.getElementById('repereRevenusChart').getContext('2d');

    // Si le graphique existe déjà, le détruire
    if (myChart !== null) {
        myChart.destroy();
    }

    myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: 'Revenus total',
                    data: Array(12).fill(totalRevenus),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Revenus',
                    data: revenus,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}









document.addEventListener('DOMContentLoaded', (event) => {
    repereRevenusTotal('repereRevenuesChart');
    repereDepensesTotal('repereDepensesChart');
});