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

const _ingredientDiv = document.querySelector('.ingredient');
const _dessertDiv = document.querySelector('.dessert');
const _drinkDiv = document.querySelector('.drink');

const startingURL = new URL(window.location.href);

document.ready( () => {

    uploadNewIngredient();
    uploadNewDrink();
    uploadNewDessert();

    fetch(`${startingURL.origin}/back/router.php/ingredients`)
        .then(blob => blob.json())
        .then(res => displayIngredientAdmin(res));

    fetch(`${startingURL.origin}/back/router.php/drinks`)
        .then(blob => blob.json())
        .then(res => displayAdmin(res, 1));

    fetch(`${startingURL.origin}/back/router.php/desserts`)
        .then(blob => blob.json())
        .then(res => displayAdmin(res, 2));
});







