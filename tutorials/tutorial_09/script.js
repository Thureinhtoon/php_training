const ctx = document.querySelector('#myChart').getContext('2d');
const cities = document.querySelectorAll('.city');
let cityArr = [];
let mandalay = 0;
let yangon = 0;
let others = 0;
for (i = 0; i < cities.length; i++) {
    cityArr.push(cities[i].textContent);
}

for (i = 0; i < cityArr.length; i++) {
    if (cityArr[i] === "Mandalay") {
        console.log(cityArr[i]);
        mandalay += 1;
    }
    else if (cityArr[i] === "Yangon") {
        console.log(cityArr[i]);
        yangon += 1;
    }
    else {
        console.log(cityArr[i]);
        others += 1;
    }
}

const labels = ['Yangon', 'Mandalay', 'Others',];

const data = {
    labels,
    datasets: [{
        data: [yangon, mandalay, others],
        label: "Cities in Myanmar",
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
        ],
        borderColor: [
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgb(255, 192, 192, 0.6)',
        ],
        borderWidth: 1,
        inflateAmount: 1,
    },],
};

const config = {
    type: 'bar',
    data: data,
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    },
};

const myChart = new Chart(ctx, config);
