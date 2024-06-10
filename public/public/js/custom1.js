
var ctx = document.getElementById('myChart').getContext("2d");


var myChart = new Chart(ctx, {
    type: 'doughnut' ,
    data: {
      labels: ['Python', 'Javascript', 'C++', 'Php', 'Laravel', 'Django'],
      datasets: [{
        label: 'Case Studies',
        data: [4, 9, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    // options: {
    //   scales: {
    //     y: {
    //       beginAtZero: true
    //     }
    //   }
    // }
  });