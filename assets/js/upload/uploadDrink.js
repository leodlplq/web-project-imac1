


function uploadNewDrink(){
    // Define processing URL and form element
    const startingURL = new URL(window.location.href);
    const url = `${startingURL.origin}${root()}/back/router.php/drinks`
    const form = document.querySelector('.formNewDrink')

    // Listen for form submit
    form.addEventListener('submit', (e) => {
        e.preventDefault()

        // Gather files and begin FormData
        const image = document.querySelector('#fileNewDrink').files[0];
        const name = document.querySelector('#nameNewDrink').value;
        const price = document.querySelector('#priceNewDrink').value;




        const formData = new FormData();

        // Append files to files array
        formData.append('image', image)
        formData.append('name', name)
        formData.append('price', price)

        const input = {
            method: 'POST',
            body: formData,
        }


        fetch(url, input)
            .then(response => response.json())
            .then(data => displayAdmin(data, 1));

    })
}


function updateDrink(id){
    // Define processing URL and form element
    const startingURL = new URL(window.location.href);
    const url = `${startingURL.origin}${root()}/back/router.php/drink/${id}`
    const form = document.querySelector(`.updateDrinkFormn${id} form`);



    // Listen for form submit
    form.addEventListener('submit', (e) => {
        e.preventDefault()

        // Gather files and begin FormData
        let image = document.querySelector(`#newFileDrinkn${id}`).files[0];
        image = image == undefined ? "" : image;
        const name = document.querySelector(`#newNameDrinkn${id}`).value;
        const price = document.querySelector(`#newPriceDrinkn${id}`).value;
        const isThereImage = document.querySelector(`#isThereANewPhotoDrinkn${id}`).checked;




        const formData = new FormData();

        // Append files to files array
        formData.append('image', image)
        formData.append('newName', name)
        formData.append('newPrice', price)
        formData.append('newImage', isThereImage);

        const input = {
            method: 'POST',
            body: formData,
        }


        fetch(url, input)
            .then(response => response.json())
            .then(data => displayAdmin(data,1));

    })
}