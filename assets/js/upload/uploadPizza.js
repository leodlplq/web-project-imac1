function uploadPizza(){
    const startingURL = new URL(window.location.href);
    const url = `${startingURL.origin}/back/router.php/pizzas`
    const form = document.querySelector('.pizzaForm');

    form.addEventListener('submit', (e)=>{
        e.preventDefault();

        let dough = document.querySelectorAll('.doughElementInput');
        let sauce = document.querySelectorAll('.sauceElementInput');
        let topping = document.querySelectorAll('.toppingElementInput');
        let name = document.querySelector("#pizzaNameInput").value;

        let selectedDoughId, selectedSauceId;
        let selectedToppingId = [];

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

        const formData = new FormData();

        // Append files to files array
        formData.append('dough', selectedDoughId)
        formData.append('sauce', selectedSauceId)
        formData.append('topping', selectedToppingId)
        formData.append('name', name);


        const input = {
            method: 'POST',
            body: formData,
        }

        fetch(url, input)
            .then(response => response.json())
            .then(data => console.log(data));


    });








}