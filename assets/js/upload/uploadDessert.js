


function uploadNewDessert(){
    // Define processing URL and form element
    const startingURL = new URL(window.location.href);
    const url = `${startingURL.origin}/back/router.php/desserts`
    const form = document.querySelector('.formNewDessert')

    // Listen for form submit
    form.addEventListener('submit', (e) => {
        e.preventDefault()

        // Gather files and begin FormData
        const image = document.querySelector('#fileNewDessert').files[0];
        const name = document.querySelector('#nameNewDessert').value;
        const price = document.querySelector('#priceNewDessert').value;




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
            .then(data => displayAdmin(data, 2));

    })
}


function updateDessert(id){
    // Define processing URL and form element
    const startingURL = new URL(window.location.href);
    const url = `${startingURL.origin}/back/router.php/dessert/${id}`
    const form = document.querySelector(`.updateDessertFormn${id} form`);


    console.log(form);
    // Listen for form submit
    form.addEventListener('submit', (e) => {
        e.preventDefault()

        // Gather files and begin FormData
        let image = document.querySelector(`#newFileDessertn${id}`).files[0];
        image = image == undefined ? "" : image;
        const name = document.querySelector(`#newNameDessertn${id}`).value;
        const price = document.querySelector(`#newPriceDessertn${id}`).value;
        const isThereImage = document.querySelector(`#isThereANewPhotoDessertn${id}`).checked;


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
            .then(data => displayAdmin(data,2));

    })
}