

const _doughForm = document.querySelector('.doughContainer');
const _sauceForm = document.querySelector('.sauceContainer');
const _toppingForm = document.querySelector('.toppingContainer');
const _drinkForm = document.querySelector('.drinkContainer');
const _dessertForm = document.querySelector('.dessertContainer');

function displayDough(data){


    console.log(data)
    if(data.error == 0){
        _doughForm.innerHTML = "";
        Object.values(data.data).forEach(el=>{

            _doughForm.innerHTML += `
                <div class="doughElement">
                    
                    <label for="doughElement${el.id}" class="imgElement">
                        <img src="/assets/images/upload/${el.url}" alt="Image de ${el.name}">
                    </label>
                    <div class="titleElement">
                        <input type="radio" name="dough" id="doughElement${el.id}" class="doughElementInput" data-id="${el.id}" required>
                        <label for="doughElement${el.id}">${el.name}</label>
                    </div>
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
                
                    <label for="sauceElement${el.id}" class="imgElement">
                        <img src="/assets/images/upload/${el.url}" alt="Image de ${el.name}">
                    </label>
                   
                    <div class="titleElement">
                        <input type="radio" name="sauce" id="sauceElement${el.id}" class="sauceElementInput" data-id="${el.id}" required>
                        <label for="sauceElement${el.id}">${el.name}</label>
                    </div>
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
                    
                    <label for="toppingElement${el.id}" class="imgElement">
                        <img src="/assets/images/upload/${el.url}" alt="Image de ${el.name}">
                    </label>
                    
                    <div class="titleElement">
                        <input type="checkbox" name="topping${i}" id="toppingElement${el.id}" class="toppingElementInput" data-id="${el.id}">
                        <label for="toppingElement${el.id}">${el.name}</label>
                    </div>
                    
                    
                    <span class="priceElement">${el.price/100}€</span>
                </div>
            
            `;
        });

        i++;


    } else {
        _toppingForm.innerHTML = `<span class="error">Error - No data given</span>`;
    }

}

function displayDrink(data){
    console.log(data);
    let i = 0;
    if(data.error == 0){
        _drinkForm.innerHTML = "";
        Object.values(data.data).forEach(el=>{

            _drinkForm.innerHTML += `
                <div class="drinkElement">
                    <label for="drinkElement${el.id}" class="imgElement">
                        <img src="/assets/images/upload/${el.url}" alt="Image de ${el.name}">
                    </label>
                    
                    <div class="titleElement">
                        <input type="checkbox" name="drink${i}" id="drinkElement${el.id}" class="drinkElementInput" data-id="${el.id}">
                        <label for="drinkElement${el.id}">${el.name}</label>
                    </div>
                    
                    
                    <span class="priceElement">${el.price/100}€</span>
                </div>
            
            `;
        });

        i++;


    } else {
        _drinkForm.innerHTML = `<span class="error">Error - No data given</span>`;
    }
}

function displayDessert(data){
    console.log(data);
    let i = 0;
    if(data.error == 0){
        _dessertForm.innerHTML = "";
        Object.values(data.data).forEach(el=>{

            _dessertForm.innerHTML += `
                <div class="dessertElement">
                    <label for="dessertElement${el.id}" class="imgElement">
                        <img src="/assets/images/upload/${el.url}" alt="Image de ${el.name}">
                    </label>
                    
                    <div class="titleElement">
                         <input type="checkbox" name="dessert${i}" id="dessertElement${el.id}" class="dessertElementInput" data-id="${el.id}">
                         <label for="dessertElement${el.id}">${el.name}</label>
                    </div>
                   
                    
                    <span class="priceElement">${el.price/100}€</span>
                </div>
            
            `;
        });

        i++;


    } else {
        _dessertForm.innerHTML = `<span class="error">Error - No data given</span>`;
    }
}


