let title = document.getElementById('title');
let subtitle = document.getElementById('subtitle');

function randInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

let titles = [
    "Le transport facile",
    "Une nouvelle façon de voyager",
    "Une nouvelle vision du transport",
    "Le voyage sous tous ses bons côtés",
    "Voyagez autrement aujourd'hui",
    "La mobilité réinventée",
    "Votre aventure commence ici",
    "Explorez sans limites",
    "Le futur du déplacement",
    "Déplacez-vous avec style"
];

let subtitles = [
    "Voyagez d'une nouvelle façon avec Localux",
    "Prenez du bon temps, simplement",
    "Déplacez-vous en toute liberté",
    "La route est à vous",
    "Facilitez vos trajets quotidiens",
    "Chaque voyage compte",
    "Laissez-vous transporter",
    "Des trajets qui donnent le sourire"
];

title.textContent = titles[randInt(0,titles.length-1)];
subtitle.textContent = subtitles[randInt(0,subtitles.length-1)];
