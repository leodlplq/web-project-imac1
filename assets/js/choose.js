
// document ready in ES6
// here we recreate the famous and wonderful document.ready offered by JQuery !!

Document.prototype.ready = callback => {
    if(callback && typeof callback === 'function') {
        document.addEventListener("DOMContentLoaded", () =>  {
            if(document.readyState === "interactive" || document.readyState === "complete") {
                return callback();
            }
        });
    }
};

const startingURL = new URL(window.location.href);



document.ready( () => {

    const _divPizza = document.querySelector('.vitrine_carroussel');
    const _divDrink = document.querySelector('.drink');
    const _divDessert = document.querySelector('.dessert');

    const _btnNext1 = document.querySelector('#nextBtn1');
    const _btnNext2 = document.querySelector('#nextBtn2');

    const _btnPrev1 = document.querySelector('#prevBtn1');
    const _btnPrev2 = document.querySelector('#prevBtn2');

    const _btnOrder = document.querySelector('.btn-submit');

    fetch(`${startingURL.origin}${root()}/back/router.php/pizzas/existing`)
        .then(blob => blob.json())
        .then(res => displayPizzaSplide(res))
        .then(()=>{
            new Splide( '.splide' ).mount();
        })

    fetch(`${startingURL.origin}${root()}/back/router.php/drinks`)
        .then(blob => blob.json())
        .then(res => displayDrink(res));

    fetch(`${startingURL.origin}${root()}/back/router.php/desserts`)
        .then(blob => blob.json())
        .then(res => displayDessert(res));

    _btnNext1.addEventListener('click', (e)=>{
        e.preventDefault();

        _divPizza.classList.add("hide");
        _divDrink.classList.remove("hide");



    })

    _btnNext2.addEventListener('click', (e)=>{
        e.preventDefault();
        _divDrink.classList.add("hide");
        _divDessert.classList.remove("hide");
    })

    _btnPrev1.addEventListener('click', (e)=>{
        e.preventDefault();
        _divDrink.classList.add("hide");
        _divPizza.classList.remove("hide");
    })

    _btnPrev2.addEventListener('click', (e)=>{
        e.preventDefault();
        _divDrink.classList.remove("hide");
        _divDessert.classList.add("hide");
    })

    _btnOrder.addEventListener('click', (e)=>{
        e.preventDefault();

        orderExisting();
    })




});

function displayPizzaSplide(data){


    let html ="";
    data.data.forEach(pizza=>{

        html += `
        <li class="splide__slide" data-id="${pizza.id}">
        <img alt="img1" src="/assets/images/${pizza.url}">
            <div class="vitrine_pizza">
                <h2 class="vitrine_pizza_name">${pizza.name}</h2>
                <p class="vitrine_pizza_price">${pizza.price/100}€</p>
                <p class="vitrine_pizza_description">
                    Composition : `

        pizza.ingredients.forEach(i=>{
            html += `${i.name}, `
        })

        html += `
                    </p>
                </div>
            </li>`

    })

    document.querySelector('.splide__list').innerHTML = html;
}

function orderExisting(){

    const idUser = document.querySelector('.idUser').dataset.id;
    const startingURL = new URL(window.location.href);
    const url = `${startingURL.origin}${root()}/back/router.php/orders/existing`
    const _divChoice = document.querySelector('.vitrine');

    let time = Math.floor(new Date().getTime()/10000000);
    let random = Math.floor(Math.random() * (9999 - 1000) + 1000);
    let idOrder = `${random}${idUser}${time}`;

    let idPizza = document.querySelector('.is-visible').dataset.id;
    let drink = document.querySelectorAll('.drinkElementInput');
    let dessert = document.querySelectorAll('.dessertElementInput');

    let selectedDrinkId = [];
    let selectedDessertId = [];

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
    console.log(idPizza)

    // Append files to files array
    formData.append('idPizza', idPizza)
    formData.append('idOrder', idOrder)
    formData.append('idClient', idUser)
    formData.append('drink', selectedDrinkId)
    formData.append('dessert', selectedDessertId)


    const input = {
        method: 'POST',
        body: formData,
    }

    fetch(url, input)
        .then(response => response.json())
        .then(data => {
            _divChoice.classList.add('hide');
            console.log(data)
            displayOrder(data);
        })
}