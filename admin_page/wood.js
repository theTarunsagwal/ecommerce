let menu_bar = document.querySelector('.menu_box');
let menu=()=>{
    menu_bar.classList.toggle('menu_active');
    console.log(menu_bar)
}

document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', function () {
        let row = this.closest('tr');
        row.querySelectorAll('input').forEach(input => {
            input.removeAttribute('readonly');
        });
        row.querySelector('.save-btn').style.display = 'inline-block';
        this.style.display = 'none';
    });
});


function enableEditing(button) {
    // Get the parent form and toggle input fields and buttons
    const form = button.closest('form');
    const inputs = form.querySelectorAll('input[type="text"]');
    const saveBtn = form.querySelector('.save-btn');
    
    inputs.forEach(input => input.readOnly = false);
    button.style.display = 'none';
    saveBtn.style.display = 'inline-block';
}


