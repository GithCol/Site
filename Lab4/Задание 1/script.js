let fooWindow = function() {
    let c = 0;
    let j = 0;
    let cells = document.getElementById("windowProp");
    for (let i in window) {
        cells.append(j + ": " + i);
        c = c + 1;
        if (c < 2) {
            cells.append("\n");
            c = 0;
            j = j + 1;
        }
    }
};

let fooDocument = function() {
    let c = 0;
    let j = 0;
    let cells = document.getElementById("documentProp");
    for (let i in document) {
        cells.append(j + ": " + i);
        c = c + 1;
        if (c < 2) {
            cells.append("\n");
            c = 0;
            j = j + 1;
        }
    }
};

let fooLocation = function() {
    let c = 0;
    let j = 0;
    let cells = document.getElementById("locationProp");
    for (let i in location) {
        cells.append(j + ": " + i);
        c = c + 1;
        if (c < 2) {
            cells.append("\n");
            c = 0;
            j = j + 1;
        }
    }
};

let fooNavigator = function() {
    let c = 0;
    let j = 0;
    let cells = document.getElementById("navigatorProp");
    for (let i in navigator) {
        cells.append(j + ": " + i);
        c = c + 1;
        if (c < 2) {
            cells.append("\n");
            c = 0;
            j = j + 1;
        }
    }
};