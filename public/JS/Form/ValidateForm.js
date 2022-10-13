

const form = document.getElementById("form")

form.addEventListener("input", (event) => {
    if (event.target.value.length >= 3) {
        removeErrorStyling(event.target.id)
    } else {
        event.target.classList.remove("border-green-500")
        event.target.classList.add("border-card-blue")
    }
})

form.addEventListener("submit", (event) => {
    event.preventDefault()
    const errors = validateForm(event)
    errors.forEach(error => {
        addErrorStyling(error)
    })
    if (errors.length === 0) {
        form.submit();
    }
})


function validateForm(e) {
    const formData = new FormData(e.target)
    let errors = [];
    for (const pair of formData.entries()) {
        const key = pair[0];
        const value = pair[1];
        const response = validateField(key, value)
        if (typeof (response) !== "undefined") {
            errors.push(response)
        }
    }
    return errors
}

function validateField(key, value) {
    if (value.length < 2) {
        return key
    } else if (key.includes("email")) {
        if (!value.includes("@")) {
            return key
        }
    }
}

function addErrorStyling(fieldId) {
    const field = document.getElementById(fieldId);
    if (typeof (fieldId) !== "undefined") {
        field.classList.remove("border-card-blue")
        field.classList.add("border-red-500")
        const errorText = document.getElementById(fieldId + "-error")
        errorText.hidden = false
    }
}

function removeErrorStyling(fieldId) {
    const field = document.getElementById(fieldId);
    field.classList.remove("border-card-blue", "border-red-500");
    field.classList.add("border-green-500");
    const errorText = document.getElementById(fieldId + "-error")
    errorText.hidden = true;
}


function testFunction(){
    alert("test");
}