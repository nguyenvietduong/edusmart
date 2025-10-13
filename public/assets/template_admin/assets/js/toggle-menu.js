const el = document.body; // thay vì document.documentElement

let currentMenu = localStorage.getItem('toggleMenu') || 'default';
el.setAttribute('data-sidebar-size', currentMenu);

togglemenu.addEventListener('click', e => {
    e.preventDefault();
    let newToggleMenu = (currentMenu === 'default') ? 'collapsed' : 'default';
    el.setAttribute('data-sidebar-size', newToggleMenu);
    localStorage.setItem('toggleMenu', newToggleMenu);
    currentMenu = newToggleMenu;
});