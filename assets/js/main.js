window.addEventListener('load', app);

function app () {
    const body = document.querySelector('body');
    let chaine =[];
    let toMatch= 'pizza';
    let toMatchTab = [];
    for(let i =0; i < toMatch.length; i++){
        toMatchTab.push(toMatch[i]);
    };
    body.onkeydown = function worldskills (e) {
        chaine.push(e.key)

        for(let i =0; i < chaine.length; i++){
            if(chaine[i] === toMatchTab[i]){
                let verif = chaine.join('');
                if(verif == toMatch){
                    alert('PIZZAYOLO LUL ');
                    chaine = [];
                }

            }
            else{
                chaine = [];
            }
        }



    }
}