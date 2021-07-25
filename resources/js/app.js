require('./bootstrap');

require('alpinejs');

const categoryMassAction = document.getElementById("categoryMassAction");
let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

categoryMassAction.addEventListener("change", (event) => {
    let action = event.target.value;

    if (action === "delete") {
        if (window.confirm("Êtes-vous sûr de vouloir supprimer cette cétgorie ainsi que l'ensemble des articles se situant à l'intérieur.")) {
            let form = document.getElementById("formMassActions");
            let formData = new FormData(form);
            fetch('/categories/delete', {
                    headers: {
                        "X-CSRF-TOKEN": token
                    },
                    method: 'post',
                    body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    for (item of data) {
                        document.getElementById("cat" + item).innerHTML = "";
                        categoryMassAction.selectedIndex = 0; // On remet à Zéro le Select categoryMassAction
                    }
                } 
                else {
                    return false;
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        }else {
            categoryMassAction.selectedIndex = 0; // On remet à Zéro le Select categoryMassAction
        }
        // alert(formData.entries().next().value);
    } 
    else if (action === "export") {
        window.location.href = "/categories/export";
    }
})
