const form = document.getElementById("form")

form.addEventListener("input", (event) => {
    if (event.target.value.length >= 3) {
        event.target.classList.remove("border-card-blue")
        event.target.classList.add("border-green-500")
    } else {
        event.target.classList.remove("border-green-500")
        event.target.classList.add("border-card-blue")
    }
})
