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

    fetch(`${startingURL.origin}/back/router.php/ingredients/dough`)
        .then(blob => blob.json())
        .then(res => displayDough(res));

    fetch(`${startingURL.origin}/back/router.php/ingredients/sauce`)
        .then(blob => blob.json())
        .then(res => displaySauce(res));

    fetch(`${startingURL.origin}/back/router.php/ingredients/topping`)
        .then(blob => blob.json())
        .then(res => displayTopping(res));

    uploadPizza();


});