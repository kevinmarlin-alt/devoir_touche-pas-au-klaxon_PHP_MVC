const createTravelButton = document.getElementById('createTravelBtn');

createTravelButton.addEventListener('click', showCreateTravelForm);

function showCreateTravelForm(event) {
    event.preventDefault();
    console.log('test')
}