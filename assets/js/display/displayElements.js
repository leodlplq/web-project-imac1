

const _doughForm = document.querySelector('.doughContainer');
const _sauceForm = document.querySelector('.sauceContainer');
const _toppingForm = document.querySelector('.toppingContainer');

function displayDough(data){


    console.log(data)
    if(data.error == 0){
        _doughForm.innerHTML = "";
        Object.values(data.data).forEach(el=>{

            _doughForm.innerHTML += `
                <div class="doughElement">
                    <img src="/assets/images/upload/${el.url}" alt="Image de ${el.name}">
                    <label for="doughElement${el.id}">${el.name}</label>
                    <input type="radio" name="dough" id="doughElement${el.id}" class="doughElementInput" data-id="${el.id}" required>
                    <span class="priceElement">${el.price/100}€</span>
                </div>
            
            `;
        });


    } else {
        _doughForm.innerHTML = `<span class="error">Error - No data given</span>`;
    }

}

function displaySauce(data){


    console.log(data)
    if(data.error == 0){
        _sauceForm.innerHTML = "";
        Object.values(data.data).forEach(el=>{

            _sauceForm.innerHTML += `
                <div class="sauceElement">
                    <img src="/assets/images/upload/${el.url}" alt="Image de ${el.name}">
                    <label for="sauceElement${el.id}">${el.name}</label>
                    <input type="radio" name="sauce" id="sauceElement${el.id}" class="sauceElementInput" data-id="${el.id}" required>
                    <span class="priceElement">${el.price/100}€</span>
                </div>
            
            `;
        });


    } else {
        _sauceForm.innerHTML = `<span class="error">Error - No data given</span>`;
    }

}

function displayTopping(data){


    console.log(data)

    let i = 0;
    if(data.error == 0){
        _toppingForm.innerHTML = "";
        Object.values(data.data).forEach(el=>{

            _toppingForm.innerHTML += `
                <div class="toppingElement">
                    <img src="/assets/images/upload/${el.url}" alt="Image de ${el.name}">
                    <label for="toppingElement${el.id}">${el.name}</label>
                    <input type="checkbox" name="sauce${i}" id="toppingElement${el.id}" class="toppingElementInput" data-id="${el.id}">
                    <span class="priceElement">${el.price/100}€</span>
                </div>
            
            `;
        });

        i++;


    } else {
        _sauceForm.innerHTML = `<span class="error">Error - No data given</span>`;
    }

}