const alertContainer = document.getElementById("alertContainer");
const cancelIcon = document.querySelector(".cancel-icon");
const alertIcon = document.querySelector(".icon");
const alertText = document.querySelector(".alert-text");

console.log(alertIcon);
console.log(cancelIcon);

console.log(alertContainer);

const alertColors = {
    success: "alert-success",
    info: "alert-info",
    error: "alert-danger",
    warning: "alert-warning",
};

//using phosphor icon
const alertIcons = {
    success: "ph-check-circle",
    info: "ph-info",
    error: "ph-warning-circle",
};

//create alert element
let alert = document.createElement("div");
alert.setAttribute("class", "alert p-3 mb-4");

fetch("/alert/session_status.php")
    .then((response) => response.json())
    .then((data) => {
        if (data.alert) {

            alertContainer.classList.add("visible")
            let { message, type } = data.alert;

            //if we have multible message to desplay
            if (Array.isArray(message)) {
                alertText.appendChild(arrayAlert(message));
            }
            else {
                alertText.textContent = message;
            }

            //set backgroud alert
            alertContainer.classList.add(alertColors[type]);

            //set icon alert 
            alertIcon.classList.add(alertIcons[type]);

            //remove alert
            cancelIcon.addEventListener("click", () => {
                removeSession();
            })

            setTimeout(() => {
                removeSession();
            }, 5000);
        } else {
            console.log("La session 'notification' n'existe pas");
        }
    })
    .catch((error) => {
        console.error("Erreur lors de la vérification de la session:", error);
    });


//delete the session and alert
function removeSession() {
    alertContainer.classList.remove("visible")
    fetch("/alert/clear_alert.php", { method: "POST" })
        .then(() => {
            // console.log("Session 'notification' supprimée avec succès");
        })
        .catch((error) => {
            // console.error("Erreur lors de la suppression de la session:", error);
        });
}


// handler multible message in alert
function arrayAlert(messages) {

    //create UL
    const ul = document.createElement('ul');

    messages.forEach(message => {
        //create LI
        const li = document.createElement('li');

        //add message to even li
        li.appendChild(document.createTextNode(message));

        //add li to ul
        ul.appendChild(li);
    })

    return ul;
}
