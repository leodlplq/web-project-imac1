function uploadOrder(){
    const startingURL = new URL(window.location.href);
    const url = `${startingURL.origin}${root()}/back/router.php/orders`

    const form = document.querySelector('.orderForm');
    const idUser = document.querySelector('.idUser').dataset.id;


    form.addEventListener('submit', (e)=>{
        e.preventDefault();

        let time = Math.floor(new Date().getTime()/10000000);
        let random = Math.floor(Math.random() * (9999 - 1000) + 1000);
        let idPizza = `${idUser}${time}${random}`;// We create a unique ID for each pizza created // using id of user, date, random number.
        let idOrder = `${random}${idUser}${time}`;

        let dough = document.querySelectorAll('.doughElementInput');
        let sauce = document.querySelectorAll('.sauceElementInput');
        let topping = document.querySelectorAll('.toppingElementInput');
        let name = document.querySelector("#pizzaNameInput").value;
        let drink = document.querySelectorAll('.drinkElementInput');
        let dessert = document.querySelectorAll('.dessertElementInput');

        let selectedDoughId, selectedSauceId;
        let selectedToppingId = [];
        let selectedDrinkId = [];
        let selectedDessertId = [];

        dough.forEach(el=>{
            if(el.checked){
                selectedDoughId = el.dataset.id;
            }
        });

        sauce.forEach(el=>{
            if(el.checked){
                selectedSauceId = el.dataset.id;
            }
        })

        topping.forEach(el=>{
            if(el.checked){
                selectedToppingId.push(el.dataset.id);
            }
        })

        drink.forEach(el=>{
            if(el.checked){
                selectedDrinkId.push(el.dataset.id);
            }
        })

        dessert.forEach(el=>{
            if(el.checked){
                selectedDessertId.push(el.dataset.id);
            }
        })

        const formData = new FormData()


        // Append files to files array
        formData.append('idPizza', idPizza)
        formData.append('idOrder', idOrder)
        formData.append('idClient', idUser);
        formData.append('dough', selectedDoughId)
        formData.append('sauce', selectedSauceId)
        formData.append('topping', selectedToppingId)
        formData.append('name', name);
        formData.append('drink', selectedDrinkId)
        formData.append('dessert', selectedDessertId)


        const input = {
            method: 'POST',
            body: formData,
        }

        fetch(url, input)
            .then(response => response.json())
            .then(data => console.log(data))

    });








}