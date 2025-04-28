let cookiesBanner = document.getElementById('cookie-banner')

function acceptCookies(){
    localStorage.setItem('cookieConsent',1);
    cookiesBanner.classList.add('hidden');
}

function declineCookies(){
    localStorage.setItem('cookieConsent',0);
    cookiesBanner.classList.add('hidden');
}

console.log(localStorage.getItem('cookieConsent')==null);

if (localStorage.getItem('cookieConsent')!=null){
    cookiesBanner.classList.add('hidden');
}

var scrollTop = function() {
    window.scrollTo(0, 0);
};
