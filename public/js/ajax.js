function onClickBtnLike(event) {
    event.preventDefault();


    const url = this.href;
    const spanCount = this.querySelector('span.js-likes');
    const icone = this.querySelector('i');

    // envoie de l'url via axios
    axios.get(url).then(function (response) {
        // la classe js-likes permet de determiner le nombre de likes*
        //recuperation du nombre de like et injection dans le span

        spanCount.textContent = response.data.likes;

        //si l'icone est rempli alors en remplace par l'icone vide 
        if (icone.classList.contains('fas')) {
            icone.classList.replace('fas', 'far');
        }
        else {
            icone.classList.replace('far', 'fas');
        }

    })
}


// selection de tous les 'a' qui on la classe js-like
document.querySelectorAll('a.js-like').forEach(function (link) {

    link.addEventListener('click', onClickBtnLike);

});