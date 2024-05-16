function GenerateNumLine() {
    let lineLength = Math.floor(Math.random() * 94) + 7;
    let line = "";

    for (let i = 0; i < lineLength; i++) {
        line += Math.round(Math.random()).toString();
    }

    return line;
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
        if(count == 7) {
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
console.log(line);
console.log(CheckIfSituationIsDangerous(line));