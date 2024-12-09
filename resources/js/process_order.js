const address_input = document.querySelector('#address');
const add_address = document.querySelector('#add_address');

address_input.addEventListener('change', evt => {
    if(address_input.value == "") {
        add_address.style.display = "block";
    } else {
        add_address.style.display = "none";
    }
});
