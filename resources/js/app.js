import './bootstrap';
import '~resources/scss/app.scss';
import '~icons/bootstrap-icons.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


const buttons = document.querySelectorAll('.delete-project')

buttons.forEach((button) => {
    
    button.addEventListener('click', function (e) {
        
        e.preventDefault();

        const modal = document.getElementById('deleteProjectModal');

        const bootstrap_modal = new bootstrap.Modal(modal);

        bootstrap_modal.show();

        document.querySelector('.confirm_delete').addEventListener('click', function () {
            
            button.parentElement.submit();
        })
    });
});
