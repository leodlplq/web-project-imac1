let _formUpdateIngredient = document.querySelector('.updateIngredientForm');


function displayAdmin(data, element){

    console.log(data);
    if(data.nb != 0){

        switch (element){
            case 0:

                _ingredientDiv.innerHTML = "";
                Object.values(data.data).forEach(el=>{


                    let toppingS = el.type == "topping" ? "selected" : "";
                    let sauceS = el.type == "sauce" ? "selected" : "";
                    let doughS = el.type == "dough" ? "selected" : "";
                        _ingredientDiv.innerHTML +=
                        `<div class="element">
                            <img src="/assets/images/upload/${el.url}" alt="Image de ${el.name}">
                            <span>${el.name}</span>
                            <span>${el.price / 100}€</span>
                            <div class="btnUpdateModify">
                                <a href="" class="update updateIngredient" data-el="ingredient" data-id="${el.id}">Update</a><a href="" class="delete deleteIngredient" data-el="ingredient" data-id="${el.id}">Delete</a>
                            </div>
                        </div>
                        
                        <div class="updateIngredientFormn${el.id} hide">
                            <form method="post">
                    
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
                                
                                <input type="submit" value="Modifier">
                            </form>
                        </div>
                        
                    `;

                    updateIngredient(el.id);
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
                        fetch(`${startingURL.origin}/back/router.php/ingredient/${id}`, {method : 'DELETE'})
                            .then(res => res.json())
                            .then(data => displayAdmin(data, 0))
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



                break;

            case 1:

                _drinkDiv.innerHTML = "";
                Object.values(data.data).forEach(el=>{

                    _drinkDiv.innerHTML +=
                        `<div class="element">
                            <img src="/assets/images/upload/${el.url}" alt="Image de ${el.name}">
                            <span>${el.name}</span>
                            <span>${el.price  / 100}€</span>
                            <div class="btnUpdateModify">
                                <a href="" class="updateDrink update" data-el="drink" data-id="${el.id}">Update</a><a href="" class="deleteDrink delete" data-el="drink" data-id="${el.id}">Delete</a>
                            </div>
                        </div>
                        
                         <div class="updateDrinkFormn${el.id} hide">
                            <form method="post">
                    
                                <input type="text" name="name" placeholder="name" id="newNameDrinkn${el.id}" value="${el.name}">
                    
                                <input type="number" step="0.01" name="price" id="newPriceDrinkn${el.id}" value="${el.price / 100}">
                    
                                <input type="checkbox" name="newImageDrink" id="isThereANewPhotoDrinkn${el.id}">
                                <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
                                Envoyez ce fichier : <input name="image" type="file" id="newFileDrinkn${el.id}"/>
                                
                                <input type="submit" value="Modifier">
                            </form>
                        </div>
            
                    `;

                    updateDrink(el.id);
                });

                let _updateBtnDrink = document.querySelectorAll(".updateDrink");
                let _removeBtnDrink = document.querySelectorAll(".deleteDrink");

                _removeBtnDrink.forEach(el=>{
                    //console.log('event added');

                    el.addEventListener('click', (e)=>{
                        e.preventDefault();
                        let id = el.dataset.id;
                        fetch(`${startingURL.origin}/back/router.php/drink/${id}`, {method : 'DELETE'})
                            .then(res => res.json())
                            .then(data => displayAdmin(data, 1))
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

                break;

            case 2:

                _dessertDiv.innerHTML = "";
                Object.values(data.data).forEach(el=>{

                    _dessertDiv.innerHTML +=
                        `<div class="element">
                            <img src="/assets/images/upload/${el.url}" alt="Image de ${el.name}">
                            <span>${el.name}</span>
                            <span>${el.price / 100}€</span>
                            <div class="btnUpdateModify">
                                <a href="" class="updateDessert update" data-el="dessert" data-id="${el.id}">Update</a><a href="" class="deleteDessert delete" data-el="dessert" data-id="${el.id}">Delete</a>
                            </div>
                        </div>
                        
                        <div class="updateDessertFormn${el.id} hide">
                            <form method="post">
                    
                                <input type="text" name="name" placeholder="name" id="newNameDessertn${el.id}" value="${el.name}">
                    
                                <input type="number" step="0.01" name="price" id="newPriceDessertn${el.id}" value="${el.price / 100}">
                    
                                <input type="checkbox" name="newImageDrink" id="isThereANewPhotoDessertn${el.id}">
                                <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
                                Envoyez ce fichier : <input name="image" type="file" id="newFileDessertn${el.id}"/>
                                
                                <input type="submit" value="Modifier">
                            </form>
                        </div>
            
                    `;

                    updateDessert(el.id);
                });

                let _updateBtnDessert = document.querySelectorAll(".updateDessert");
                let _removeBtnDessert = document.querySelectorAll(".deleteDessert");

                _removeBtnDessert.forEach(el=>{
                    //console.log('event added');

                    el.addEventListener('click', (e)=>{
                        e.preventDefault();
                        let id = el.dataset.id;
                        fetch(`${startingURL.origin}/back/router.php/dessert/${id}`, {method : 'DELETE'})
                            .then(res => res.json())
                            .then(data => displayAdmin(data, 2))
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

                break;

        }
    } else {
        switch (element){
            case 0:

                _ingredientDiv.innerHTML = "no ingredient";
                break;

            case 1:

                _drinkDiv.innerHTML = "no desserts";
                break;

            case 2:

                _dessertDiv.innerHTML = "no drinks";
                break;
        }
    }


}

