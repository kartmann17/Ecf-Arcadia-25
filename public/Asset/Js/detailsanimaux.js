
function showModal(name, age, race, habitat, description, imgSrc) {

    document.getElementById('modal-animal-name').innerText = name;
    document.getElementById('modal-animal-age').innerText = age;
    document.getElementById('modal-animal-race').innerText = race;
    document.getElementById('modal-animal-habitat').innerText = habitat;
    document.getElementById('modal-animal-description').innerText = description;
    document.getElementById('modal-animal-img').src = imgSrc;

    var myModal = new bootstrap.Modal(document.getElementById('animalModal'));
    myModal.show();
}