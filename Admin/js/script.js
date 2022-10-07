{
    let sideBar = document.querySelector('.side-bar');
    let arrowCollapse=document.querySelector('#logo-name-icon');
    sideBar.onclick=()=>{
        sideBar.classList.toggle('collapse');
        arrowCollapse.classList.toggle('collapse');
        if (arrowCollapse.classList.contains('collapse')) {
            arrowCollapse.classList='fa-solid fa-right-to-bracket logo-name-icon collapse';
            
        }
        else{
            arrowCollapse.classList='fa-solid fa-right-to-bracket logo-name-icon';
        }
    };
}