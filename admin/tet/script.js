const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

// theme mode
function applyTheme(theme){
    document.body.classList.remove("theme-auto","theme-light","theme-dark");
    document.body.classList.add(`theme-${theme}`);
}

document.addEventListener("DOMContentLoaded", () => {
    const saveTheme = localStorage.getItem('theme') || "auto";

    applyTheme(saveTheme)

    for(const opationElement of document.querySelectorAll('#selTheme option')){
        opationElement.selected = saveTheme === opationElement.value
    }
    document.querySelector('#selTheme').addEventListener("change", function () {
        localStorage.setItem("theme", this.value)
        applyTheme(this.value)
    })
})


// active 
let lastClickedItem = null;
const sidebarItems = document.querySelectorAll('.li-hover');
sidebarItems.forEach(function(item) {
    item.addEventListener('click', function() {
        if (lastClickedItem === item) {
            return;
        }
        if (lastClickedItem) {
            lastClickedItem.classList.remove('active');
        }
        item.classList.add('active');
        lastClickedItem = item;
    });
});


let childItem = null;
const childItemSidebar = document.querySelectorAll('.li-child');
childItemSidebar.forEach(function(item) {
    item.addEventListener('click', function() {
        if (childItem === item) {
            return;
        }
        if (childItem) {
            childItem.classList.remove('activeChild');
        }
        item.classList.add('activeChild');
        childItem = item;
    });
});

// start loading full screen 
function showLoadingOverlay() {
    var overlay = document.getElementById('loadingOverlay');
    if (overlay) {
        overlay.style.display = 'flex';
    }
}

function hideLoadingOverlay() {
    var overlay = document.getElementById('loadingOverlay');
    if (overlay) {
        overlay.style.display = 'none';
    }
} 
// end loading full screen