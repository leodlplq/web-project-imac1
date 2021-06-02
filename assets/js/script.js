
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

const _divPizza = document.querySelector('.pizza');
const _divDrink = document.querySelector('.drink');
const _divDessert = document.querySelector('.dessert');

const _btnNext1 = document.querySelector('#nextBtn1');
const _btnNext2 = document.querySelector('#nextBtn2');

const _btnPrev1 = document.querySelector('#prevBtn1');
const _btnPrev2 = document.querySelector('#prevBtn2');



document.ready( () => {

    fetch(`${startingURL.origin}${root()}/back/router.php/ingredients/dough`)
        .then(blob => blob.json())
        .then(res => displayDough(res));

    fetch(`${startingURL.origin}${root()}/back/router.php/ingredients/sauce`)
        .then(blob => blob.json())
        .then(res => displaySauce(res));

    fetch(`${startingURL.origin}${root()}/back/router.php/ingredients/topping`)
        .then(blob => blob.json())
        .then(res => displayTopping(res));

    fetch(`${startingURL.origin}${root()}/back/router.php/drinks`)
        .then(blob => blob.json())
        .then(res => displayDrink(res));

    fetch(`${startingURL.origin}${root()}/back/router.php/desserts`)
        .then(blob => blob.json())
        .then(res => displayDessert(res));

    _btnNext1.addEventListener('click', (e)=>{
        e.preventDefault();
        const idUser = document.querySelector('.idUser').dataset.id;
        const doughE = document.querySelectorAll('.doughElementInput');
        const sauceE = document.querySelectorAll('.sauceElementInput');
        const nameP = document.querySelector('#pizzaNameInput')

        let selectedDoughId = -1;
        let selectedSauceId = -1;

        doughE.forEach(el=>{
            if(el.checked){
                selectedDoughId = el.dataset.id;
            }
        });

        sauceE.forEach(el=>{
            if(el.checked){
                selectedSauceId = el.dataset.id;
            }
        })

        console.log(nameP.value)
        if(selectedDoughId == -1 || selectedSauceId == -1 || nameP.value == ""){
            alert('plz fill at least sauce, dough and name...');
        } else {
            _divPizza.classList.add("hide");
            _divDrink.classList.remove("hide");
        }


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


    uploadOrder();



});

