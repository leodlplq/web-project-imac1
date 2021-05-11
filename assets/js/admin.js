
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

const _ingredientDiv = document.querySelector('.ingredient_admin');
const _dessertDiv = document.querySelector('.dessert_admin');
const _drinkDiv = document.querySelector('.drink_admin');

const startingURL = new URL(window.location.href);



document.ready( () => {

    uploadNewIngredient();
    uploadNewDrink();
    uploadNewDessert();

    fetch(`${startingURL.origin}${root()}/back/router.php/ingredients`)
        .then(blob => blob.json())
        .then(res => displayIngredientAdmin(res));

    fetch(`${startingURL.origin}${root()}/back/router.php/drinks`)
        .then(blob => blob.json())
        .then(res => displayDrinkAdmin(res));

    fetch(`${startingURL.origin}${root()}/back/router.php/desserts`)
        .then(blob => blob.json())
        .then(res => displayDessertAdmin(res));
});







