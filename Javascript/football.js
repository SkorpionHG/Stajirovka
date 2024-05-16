function GenerateNumLine() {
    let lineLength = Math.floor(Math.random() * 94) + 7;
    let line = "";

    for (let i = 0; i < lineLength; i++) {
        line += Math.round(Math.random()).toString();
    }

    if(CheckForOnesAndZeros === true) {
        return line;
    }
    else GenerateNumLine();
}

function CheckForOnesAndZeros(line) {
    let has0 = false;
    let has1 = false;
    for (let i = 0; i < line.length; i++) {
        if(line[i] === "0" && has0 === false) {
            has0 = true;
        }
        else if (line[i] === "1" && has1 === false) {
            has1 = true;
        }
        if(has0 === true && has1 === true) {
            return true;
        }
    }
    return false;
}

function CheckIfSituationIsDangerous(line) {
    let count = 0;
    let dangerous = false;
    for (let i = 0; i < line.length; i++) {
        switch (line[i]) {
            case "1":
                count++;
                break;
            case "0":
                count = 0;
                break;
        }
        if(count === 7) {
            dangerous = true;
            break;
        }
    }
    if(dangerous) {
        return "YES";
    }
    return "NO";
}

let line = GenerateNumLine();
console.log(CheckIfSituationIsDangerous(line));