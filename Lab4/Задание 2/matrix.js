let matrixField = document.querySelector('.matrix');
let body = document.querySelector('body');
let matrixElements;

let getNumber = function(min, max) {
    return Math.floor(Math.random() * (max - min) + min);
};
let initMatrix = function (matrixElements) {
    matrixElements = new Array(10);
    for (let i = 0; i < 10; i++) {
        matrixElements[i] = new Array(10);
        for (let j = 0; j < 10; j++) {
            matrixElements[i][j] = 0;
        }
    }
    return matrixElements;

};

let generateMatrix = function(matrixElements) {

    matrixElements = new Array(10);
    for (let i = 0; i < 10; i++) {
        matrixElements[i] = new Array(10);
        for(let j = 0; j < 10; j++) {
            matrixElements[i][j] = getNumber(0, 100);
        }
    }
    updateMatrix();
    return matrixElements;
};

let updateMatrix = function() {

    matrixField.innerHTML = '';

    for(let i = 0; i < 10; i++) {
        
        let trTable = document.createElement('tr');

        for(let j = 0; j < 10; j++) {

            let tdTable = document.createElement('td');
            tdTable.classList.add('matrix-elem');
            let inputTable = document.createElement('input');

            inputTable.type = 'text';
            inputTable.readOnly = true;
            inputTable.value = matrixElements[i][j];

            tdTable.appendChild(inputTable);
            trTable.appendChild(tdTable);
        }
    
        matrixField.appendChild(trTable);
    }
};

let sortMatrix = function(matrixElements) {
    for(let i = 0; i < 10; i++) {
        if (i % 2 === 0) {
            for(let j = 0; j < 10; j++) {
                for(let k = j; k < 10; k++) {
                    if(matrixElements[i][k] < matrixElements[i][j]) {
                        let temp = matrixElements[i][k];
                        matrixElements[i][k] = matrixElements[i][j];
                        matrixElements[i][j] = temp;
                    }
                }
            }
        } else {
            for(let j = 0; j < 10; j++) {
                for(let k = j; k < 10; k++) {
                    if(matrixElements[i][k] > matrixElements[i][j]) {
                        let temp = matrixElements[i][k];
                        matrixElements[i][k] = matrixElements[i][j];
                        matrixElements[i][j] = temp;
                    }
                }
            }
        }
    }
    updateMatrix();
    return matrixElements;
};

let buttonSort = document.createElement('button');
buttonSort.textContent = 'Сортировать';
buttonSort.disabled = true;
buttonSort.classList.add('sort-button');
buttonSort.addEventListener('click', function() {
    matrixElements = sortMatrix(matrixElements);

})
body.appendChild(buttonSort);

let buttonGen = document.createElement('button');
buttonGen.textContent = 'Сгенерировать';
buttonGen.classList.add('sort-button');
buttonGen.addEventListener('click', function() {
    matrixElements = generateMatrix(matrixElements);

    buttonSort.disabled = false;
})
body.appendChild(buttonGen);