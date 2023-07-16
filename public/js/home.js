window.addEventListener('DOMContentLoaded', function() {
    let elements = document.querySelectorAll('.completed');
    
    console.log(elements);

    for(let i = 0; i < elements.length; i++){
        let element = elements[i];
        let buttons = element.getElementsByTagName('button');

        for(let j = 0; j < buttons.length; j++){
            if(buttons[j].classList.contains('bg-gray-600')){
                buttons[j].disabled = true;
                buttons[j].classList.remove('bg-gray-600');
                buttons[j].classList.add('bg-green-600');
            }

             
        }
    }
    
});



function createTodo(form, event){
    event.preventDefault();

    let url = form.action;
    let csrfToken = form.querySelector('input[name="_token"]').value;
    let text = form.querySelector('input[name="text"]').value;



    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json', 
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            text: text
        })
    })
    .then(response => {
        if(response.ok){
            console.log('Success');
        } else {
            console.log('Error');
        }
    })
    .catch(error => {
        console.error('Erros', error);
    })
}



function markAsCompleted(form, event) {
    
    event.preventDefault();

    let url = form.action;
    let csrfToken = form.querySelector('input[name="_token"]').value;

    fetch(url, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({})
    })
    .then(response => {
        if(response.ok){
            let row = form.closest('tr');
            row.classList.add('completed');
        } else {
            console.log('Erro');
        }
    })
    .catch(error => {
        console.error('Erros', error);
    })

    
    let button = form.querySelector('button');
    button.disabled = true; // Desabilita o botão clicado
    button.classList.remove('bg-gray-600');
    button.classList.add('bg-green-600');
    

    


}