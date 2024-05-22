let reviews = [];
let headerColor = "серый";

for(i=0; i<100; i++) {
    if(Boolean(Math.round(Math.random())) === true) {
        reviews.push('положительный');
    }
    else {
        reviews.push('отрицательный');
    }
}

function DetermineHeaderColor(reviews) {
    let countPositive = 0;
    let countNegative = 0;

    for(i = 0; i < reviews.length; i++) {
        if(reviews[i] === 'положительный') {
            countPositive++;
        }
        else {
            countNegative++;
        }
    }

    console.log("положительных: " + countPositive);
    console.log("отрицательных: " + countNegative);

    if(countPositive === countNegative) {
        return "оранжевый";
    }
    return countPositive > countNegative ? "зеленый" : "красный";
}

console.log("Цвет заголовка: " + DetermineHeaderColor(reviews));