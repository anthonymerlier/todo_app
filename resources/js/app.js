require('./bootstrap');

require('alpinejs');

// onclick boxicon
const arrayChecks = Array.from(document.getElementsByClassName("checking"));

arrayChecks.forEach((check) => {
    check.onclick = () => {
        console.log(check.id);
        let editBtn = check.id.replace("check", "edit");
        let trashBtn = check.id.replace("check", "trash");
        document.getElementById(editBtn).remove();
        document.getElementById(trashBtn).remove();

        check.setAttribute("color", "green")
        check.parentElement.parentElement.parentElement.classList.remove("hover:bg-gray-50", "bg-gray-100")
        check.parentElement.parentElement.parentElement.classList.add("bg-purple-700", "hover:bg-purple-400")
    }
})