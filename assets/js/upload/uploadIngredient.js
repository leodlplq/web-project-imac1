

function uploadNewIngredient(){
    // Define processing URL and form element
    const startingURL = new URL(window.location.href);
    const url = `${startingURL.origin}${root()}/back/router.php/ingredients`
    const form = document.querySelector('.formNewIngredient')

    // Listen for form submit
    form.addEventListener('submit', (e) => {
        e.preventDefault()

        // Gather files and begin FormData
        const image = document.querySelector('#fileNewIngredient').files[0];
        const name = document.querySelector('#nameNewIngredient').value;
        const type = document.querySelector('#typeNewIngredient').value;
        const price = document.querySelector('#priceNewIngredient').value;

        const formData = new FormData();

        // Append files to files array
        formData.append('image', image)
        formData.append('name', name)
        formData.append('type', type)
        formData.append('price', price)

        const input = {
            method: 'POST',
            body: formData,
        }


        fetch(url, input)
            .then(response => response.json())
            .then(data => displayAdmin(data, 0));

    })
}


function updateIngredient(id){
    // Define processing URL and form element
    const startingURL = new URL(window.location.href);
    const url = `${startingURL.origin}${root()}/back/router.php/ingredient/${id}`
    const form = document.querySelector(`.updateIngredientFormn${id} form`);

    console.log('ingredient', id);
    // Listen for form submit
    form.addEventListener('submit', (e) => {

        e.preventDefault()
        console.log('heurr?')

        // Gather files and begin FormData
        let image = document.querySelector(`#newFileIngredientn${id}`).files[0];
        image = image == undefined ? "" : image;
        const name = document.querySelector(`#newNameIngredientn${id}`).value;
        const type = document.querySelector(`#newTypeIngredientn${id}`).value;
        const price = document.querySelector(`#newPriceIngredientn${id}`).value;
        const isThereImage = document.querySelector(`#isThereANewPhotoIngredientn${id}`).checked;


        const formData = new FormData();

        // Append files to files array
        formData.append('image', image)
        formData.append('newName', name)
        formData.append('newType', type)
        formData.append('newPrice', price)
        formData.append('newImage', isThereImage);

        const input = {
            method: 'POST',
            body: formData,
        }


        fetch(url, input)
            .then(response => response.json())
            .then(data => displayIngredientAdmin(data));

    })
}