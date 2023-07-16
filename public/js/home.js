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


function markAsCompleted(form) {
    var button = form.querySelector('button');
    button.disabled = true; // Desabilita o botão clicado
    button.classList.remove('bg-gray-600');
    button.classList.add('bg-green-600');
    return true;
}