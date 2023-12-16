const topButton = document.getElementById('top-button');
const title = document.querySelector('.title');

// Εμφάνιση/Απόκρυψη κουμπιού και τίτλου
function toggleTopButton() {
    if (window.scrollY > 100) {
        topButton.style.opacity = '1';
        title.style.display = 'none';
    } else {
        topButton.style.opacity = '0';
        title.style.display = 'block';
    }
}

// Κύλιση προς την κορυφή
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

window.addEventListener('scroll', toggleTopButton);
topButton.addEventListener('click', scrollToTop);
toggleTopButton(); // Για να ελέγχει την αρχική εμφάνιση του κουμπιού

function addGoalField() {
    const goalsContainer = document.getElementById("goals-container");
    const newGoalInput = document.createElement("input");
    const newRemoveButton = document.createElement("button");
    newGoalInput.type = "text";
    newGoalInput.name = "goals[]";
    newGoalInput.required = true;
    goalsContainer.appendChild(newGoalInput);
    newRemoveButton.type = "button";
    newRemoveButton.class = "remove-field";
    newRemoveButton.textContent = "Αφαίρεση";
    newRemoveButton.onclick = function() {
        removeGoalField(newRemoveButton);
    };
    goalsContainer.appendChild(newRemoveButton);
}

function addRequirementField() {
    const requirementsContainer = document.getElementById("requirements-container");
    const newRequirementInput = document.createElement("input");
    const newRemoveButton = document.createElement("button");
    newRequirementInput.type = "text";
    newRequirementInput.name = "requirements[]";
    newRequirementInput.required = true;
    requirementsContainer.appendChild(newRequirementInput);
    newRemoveButton.type = "button";
    newRemoveButton.class = "remove-field";
    newRemoveButton.textContent = "Αφαίρεση";
    newRemoveButton.onclick = function() {
        removeRequirementField(newRemoveButton);
    };
    requirementsContainer.appendChild(newRemoveButton);
}

function removeGoalField(button) {
    const goalsContainer = document.getElementById("goals-container");
    goalsContainer.removeChild(button.previousSibling); // Remove input field
    goalsContainer.removeChild(button); // Remove remove button
}

function removeRequirementField(button) {
    const requirementContainer = document.getElementById("requirements-container");
    requirementContainer.removeChild(button.previousSibling); // Remove input field
    requirementContainer.removeChild(button); // Remove remove button
}
