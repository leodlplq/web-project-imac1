const _orderRecap = document.querySelector('.orderRecap');

function displayOrder(data){

    let _totalHTML =
        `
            <h1 class="titleOrder">YOUR ORDER</h1>
            
            <div class="orderAll">
            <h2 class="titlePizzaOrder">PIZZA</h2>
        `;

    data.data.pizzas.pizza.forEach(pizza=>{

        _totalHTML +=
            `
                <div class="pizzaInOrder">
                    <span class="namePizza">${pizza.name}</span>
                    <span class="pricePizza">${pizza.price/100}€</span>
                    <div class="ingredientsOfPizza">
                    
                    
            `;

        pizza.ingredients.forEach(i => {

            _totalHTML += `
                <div class="ingredientOnPizza">
                    <div>
                        <img src="/assets/images/upload/${i.urlImage}" alt="Image de ${i.name}">
                    </div>
                    <span class="titleIngredientOnPizza">${i.name}</span>
                </div>
            
            `;
        })

        _totalHTML += `
                    </div>
                </div>` });

        if(typeof data.data.drinks == "object") {
            _totalHTML += `
                    <h2 class="titleDrinkOrder">DRINK</h2>
                    <div class="drinkOrder">
                    `

            data.data.drinks.drink.forEach(d => {

                _totalHTML +=
                    `
                    <div class="drinkInOrder">
                        <div>
                            <img src="/assets/images/upload/${d.url}" alt="Image de ${d.name}">
                        </div>
                        <span class="titleDessertInOrder">${d.name}</span>
                    </div>    
                `;
                _totalHTML += `
                        
                    </div>`
            });
        }

        if(typeof data.data.desserts == "object") {
            _totalHTML += `
                <h2 class="titleDessertOrder">DESSERT</h2>
                <div class="dessertOrder">
                `

            data.data.desserts.dessert.forEach(d => {

                _totalHTML +=
                    `
                <div class="dessertInOrder">
                    <div>
                        <img src="/assets/images/upload/${d.url}" alt="Image de ${d.name}">
                    </div>
                    <span class="titleDessertInOrder">${d.name}</span>
                </div>    
            `;
                _totalHTML += `
                    
                </div>`
            });
        }




        _totalHTML += `
            <h2 class="totalPrice">Total price</h2>
            <span class="price">${data.data.price/100}€</span>
            </div>
            <a href="index.php" class="btn-order">PAY AND GO BACK HOME</a>
        `




    _orderRecap.innerHTML = _totalHTML;


}


/*  </div>
    <h1 className="subtitle_create">DRINKS</h1>
    <div className="drink_ordered"></div>
    <h1 className="subtitle_create">DESSERTS</h1>
    <div className="dessert_ordered"></div>*/