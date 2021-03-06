

let _formUpdateIngredient = document.querySelector('.updateIngredientForm');


function displayDessertAdmin(data){
    if(data.error == 0){
        _dessertDiv.innerHTML = "";
        Object.values(data.data).forEach(el=>{

            _dessertDiv.innerHTML +=
                `<div class="element">
                            <div class="imgElement">
                                <img src="/assets/images/upload/${el.url}" alt="Image de ${el.name}">
                            </div>
                            
                            <div class="infoElementAdmin">
                                <span class="nameAdmin">${el.name}</span>
                                <span class="priceAdmin">${el.price / 100}€</span>
                            </div>
                            <div class="btnUpdateModify">
                                <a href="" class="updateDessert update" data-el="dessert" data-id="${el.id}">Update</a><a href="" class="deleteDessert delete" data-el="dessert" data-id="${el.id}">Delete</a>
                            </div>
                        
                        
                        <div class="updateDessertFormn${el.id} hide  updateForm">
                            <form method="post">
                    
                                <input type="text" name="name" placeholder="name" id="newNameDessertn${el.id}" value="${el.name}">
                    
                                <input type="number" step="0.01" name="price" id="newPriceDessertn${el.id}" value="${el.price / 100}">
                    
                                <input type="checkbox" name="newImageDrink" id="isThereANewPhotoDessertn${el.id}">
                                <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
                                Envoyez ce fichier : <input name="image" type="file" id="newFileDessertn${el.id}"/>
                                
                                <input type="submit" value="Modifier">
                            </form>
                        </div>
             </div>
                    `;

            setTimeout(()=>{
                updateDessert(el.id);
            }, 1)
        });

        let _updateBtnDessert = document.querySelectorAll(".updateDessert");
        let _removeBtnDessert = document.querySelectorAll(".deleteDessert");

        _removeBtnDessert.forEach(el=>{
            //console.log('event added');

            el.addEventListener('click', (e)=>{
                e.preventDefault();
                let id = el.dataset.id;
                fetch(`${startingURL.origin}${root()}/back/router.php/dessert/${id}`, {method : 'DELETE'})
                    .then(res => res.json())
                    .then(data => displayDessertAdmin(data, 2))
                    .catch(error => { console.log(error) });

            });
        });

        _updateBtnDessert.forEach((el, id)=>{

            let idUpdate = el.dataset.id;
            el.addEventListener('click', (e)=> {
                e.preventDefault();

                document.querySelector(`.updateDessertFormn${idUpdate}`).classList.toggle('hide');

            })
        })
    } else {
        _dessertDiv.innerHTML = data.text;
    }
}

function displayDrinkAdmin(data){
    if(data.error == 0){
        _drinkDiv.innerHTML = "";
        Object.values(data.data).forEach(el=>{

            _drinkDiv.innerHTML +=
                `<div class="element">
                            <div class="imgElement">
                                <img src="/assets/images/upload/${el.url}" alt="Image de ${el.name}">
                            </div>
                            <div class="infoElementAdmin">
                                <span class="nameAdmin">${el.name}</span>
                                <span class="priceAdmin">${el.price / 100}€</span>
                            </div>
                            <div class="btnUpdateModify">
                                <a href="" class="updateDrink update" data-el="drink" data-id="${el.id}">Update</a><a href="" class="deleteDrink delete" data-el="drink" data-id="${el.id}">Delete</a>
                            </div>
                       
                        
                         <div class="updateDrinkFormn${el.id} hide updateForm">
                            <form method="post">
                    
                                <input type="text" name="name" placeholder="name" id="newNameDrinkn${el.id}" value="${el.name}">
                    
                                <input type="number" step="0.01" name="price" id="newPriceDrinkn${el.id}" value="${el.price / 100}">
                    
                                <input type="checkbox" name="newImageDrink" id="isThereANewPhotoDrinkn${el.id}">
                                <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
                                Envoyez ce fichier : <input name="image" type="file" id="newFileDrinkn${el.id}"/>
                                
                                <input type="submit" value="Modifier">
                            </form>
                        </div>
             </div>
                    `;

            setTimeout(()=>{
                updateDrink(el.id);
            }, 1)
        });

        let _updateBtnDrink = document.querySelectorAll(".updateDrink");
        let _removeBtnDrink = document.querySelectorAll(".deleteDrink");

        _removeBtnDrink.forEach(el=>{
            //console.log('event added');

            el.addEventListener('click', (e)=>{
                e.preventDefault();
                let id = el.dataset.id;
                fetch(`${startingURL.origin}${root()}/back/router.php/drink/${id}`, {method : 'DELETE'})
                    .then(res => res.json())
                    .then(data => displayDrinkAdmin(data))
                    .catch(error => { console.log(error) });

            });
        });

        _updateBtnDrink.forEach((el, id)=>{

            let idUpdate = el.dataset.id;
            el.addEventListener('click', (e)=> {
                e.preventDefault();

                document.querySelector(`.updateDrinkFormn${idUpdate}`).classList.toggle('hide');

            })
        })
    } else {
        _drinkDiv.innerHTML = data.text;
    }
}

function displayIngredientAdmin(data){

    if(data.error == 0){
        _ingredientDiv.innerHTML = "";
        Object.values(data.data).forEach(el=>{


            let toppingS = el.type == "topping" ? "selected" : "";
            let sauceS = el.type == "sauce" ? "selected" : "";
            let doughS = el.type == "dough" ? "selected" : "";
            _ingredientDiv.innerHTML +=
                `<div class="element">
                            <div class="imgElement">
                                <img src="/assets/images/upload/${el.url}" alt="Image de ${el.name}">
                            </div>
                            <div class="infoElementAdmin">
                                <span class="nameAdmin">${el.name}</span>
                                <span class="priceAdmin">${el.price / 100}€</span>
                            </div>
                            <div class="btnUpdateModify">
                                <a href="" class="update updateIngredient" data-el="ingredient" data-id="${el.id}">Update</a><a href="" class="delete deleteIngredient" data-el="ingredient" data-id="${el.id}">Delete</a>
                            </div>
                        
                        
                        <div class="updateIngredientFormn${el.id} hide updateForm">
                            <form>
                    
                                <input type="text" name="name" placeholder="name" id="newNameIngredientn${el.id}" value="${el.name}">
                    
                                <select name="type" id="newTypeIngredientn${el.id}">
                                   
                                    <option value="topping" ${toppingS}>Topping</option>
                                    <option value="sauce" ${sauceS}>Sauce</option>
                                    <option value="dough" ${doughS}>Dough</option>
                                </select>
                    
                                <input type="number" step="0.01" name="price" id="newPriceIngredientn${el.id}" value="${el.price / 100}">
                    
                                <input type="checkbox" name="newImageIngredient" id="isThereANewPhotoIngredientn${el.id}">
                                <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
                                Envoyez ce fichier : <input name="image" type="file" id="newFileIngredientn${el.id}"/>
                                
                                <button type="submit">Modifier</button>
                            </form>
                        </div>
                        </div>
                        
                        
                    `;

            setTimeout(()=>{
                updateIngredient(el.id);
            }, 1)
            //console.log("form", document.querySelector(`.updateIngredientFormn${el.id} form`).innerHTML)

        })


        let _updateBtnIngredient = document.querySelectorAll(".updateIngredient");
        let _removeBtnIngredient = document.querySelectorAll(".deleteIngredient");

        //console.log(_removeBtnIngredient);
        console.log(_updateBtnIngredient);
        _removeBtnIngredient.forEach(el=>{
            //console.log('event added');

            el.addEventListener('click', (e)=>{
                e.preventDefault();
                let id = el.dataset.id;
                fetch(`${startingURL.origin}${root()}/back/router.php/ingredient/${id}`, {method : 'DELETE'})
                    .then(res => res.json())
                    .then(data => displayIngredientAdmin(data))
                    .catch(error => { console.log(error) });

            });
        });


        _updateBtnIngredient.forEach((el, id)=>{

            let idUpdate = el.dataset.id;
            el.addEventListener('click', (e)=> {
                e.preventDefault();
                console.log(`.updateIngredientFormn${idUpdate}`)
                document.querySelector(`.updateIngredientFormn${idUpdate}`).classList.toggle('hide');

            })
        })
    } else {
        _ingredientDiv.innerHTML = data.text;
    }

}



