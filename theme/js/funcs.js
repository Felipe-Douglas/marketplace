function tabNavigation() {
    //var
    const html = {
        links: [...document.querySelector(".tabs").children],
        screens: [...document.querySelector(".screens").children],
        openTab: document.querySelector("[data-open]"),
    }

    function hideAll(){
        html.screens.forEach(section => {
            section.style.display = "none";
        });

    }

    function removeAllClassActive() {
        html.links.forEach(tab => {
            tab.className = tab.className.replace(" active", "");
        });
    }

    function showCurrentTab(id) {
        const tabcontent = document.querySelector("#" + id);
        const cart =document.querySelector(".cart");
        tabcontent.style.display = "block";
        cart.style.display = "block";
    }

    function selectTab(event) {
        hideAll();
        removeAllClassActive();
        const target = event.currentTarget;
        showCurrentTab(target.dataset.id);
        target.className += " active";
    }

    function listenForChange() {
        html.links.forEach(tab => {
            tab.addEventListener("click", selectTab)
        });
    }

    function init() {
        hideAll();
        listenForChange();
        html.openTab.click();
    }

    return {
        init
    }
}

window.addEventListener("load", () => {
    const TabNavigation = tabNavigation();
    const selectValid = makeValidCardSelect();

    TabNavigation.init();
    selectValid.init();
})

function makeValidCardSelect () {

    var month = document.querySelector("#month");
    var year = document.querySelector("#year");
    var today = new Date();


    function selectMonth() {
        for (i = 1; i <= 12; i++) {
            month.innerHTML += `<option value="${i.toString().padStart(2, '0')}">${i.toString().padStart(2, '0')}</option>`;
        }
    }

    function selectYear() {
        for (i = today.getFullYear(); i <= today.getFullYear() + 10; i++) {
            year.innerHTML += `<option value="${i}">${i}</option>`;
        }
    }

    function init() {
        selectMonth();
        selectYear();
    }

    return {
        init
    }

    //
    //     <option value="01">01</option>
    //     <option value="02">02</option>
    //     <option value="03">03</option>
    //     <option value="04">04</option>
    //
    //
    // <select name="" id="year">
    //     <option value="2023">2023</option>
    //     <option value="2024">2024</option>
    //     <option value="2025">2025</option>
    //     <option value="2026">2026</option>
    // </select>
}

