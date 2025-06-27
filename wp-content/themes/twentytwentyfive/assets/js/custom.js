document.querySelectorAll('.services-nav .nav-link[data-toggle="collapse"]').forEach(link=>{
link.addEventListener('click',function(e){
    e.preventDefault();
    const targetId=this.getAttribute('data-target')||this.getAttribute('href'),
        target=document.querySelector(targetId),
        arrowIcon=this.querySelector('.rotate-icon');
    if(!target)return;
    const isOpen=target.classList.contains('show');
    document.querySelectorAll('.services-nav .collapse').forEach(div=>div.classList.remove('show'));
    document.querySelectorAll('.services-nav .nav-link[aria-expanded]').forEach(l=>{
    l.setAttribute('aria-expanded','false');
    const icon=l.querySelector('.rotate-icon');
    if(icon)icon.classList.remove('rotated');
    });
    if(!isOpen){
    target.classList.add('show');
    this.setAttribute('aria-expanded','true');
    if(arrowIcon)arrowIcon.classList.add('rotated');
    }
});
});
// Open submenu of active page on load
document.addEventListener('DOMContentLoaded',()=>{
const url=window.location.href;
document.querySelectorAll('.services-nav .collapse .nav-link').forEach(link=>{
    if(url.includes(link.getAttribute('href'))){
    const collapseDiv=link.closest('.collapse');
    if(collapseDiv){
        collapseDiv.classList.add('show');
        const toggle=document.querySelector(`[data-target="#${collapseDiv.id}"]`);
        if(toggle){
        toggle.setAttribute('aria-expanded','true');
        toggle.classList.add('active');
        const icon=toggle.querySelector('.rotate-icon');
        if(icon)icon.classList.add('rotated');
        }
    }
    }
});
});
