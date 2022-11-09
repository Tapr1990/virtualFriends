document.addEventListener("DOMContentLoaded", () =>{
    document.querySelector("#form").addEventListener("submit", e => {

        e.preventDefault();

        let form = document.querySelector("#form");
        const data = new URLSearchParams();
        for(const p of new FormData(form)) {
            data.append(p[0], p[1]);
        }

        fetch("/adminnewuser", {
            method: "POST",
            body: data
        })
        .then(resposne => resposne.text())
        .then(response => {
            console.log(response);
        })
        .catch(error => console.log(error));
    });
               
});
