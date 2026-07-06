import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

let lastHome = null;
let lastAway = null;

function animate(id) {

    const el = document.getElementById(id);

    if (!el) return;

    el.classList.remove('score-pop');

    void el.offsetWidth;

    el.classList.add('score-pop');

}

function checkScores() {

    const home = document.getElementById('home-score');
    const away = document.getElementById('away-score');

    if (!home || !away) {
        return;
    }

    const homeValue = home.innerText.trim();
    const awayValue = away.innerText.trim();

    if (lastHome === null) {
        lastHome = homeValue;
    }

    if (lastAway === null) {
        lastAway = awayValue;
    }

    if (homeValue !== lastHome) {

        lastHome = homeValue;

        animate('home-score');

    }

    if (awayValue !== lastAway) {

        lastAway = awayValue;

        animate('away-score');

    }

}

document.addEventListener('livewire:init', () => {

    Livewire.hook('commit', () => {

        setTimeout(checkScores, 10);

    });

});

document.addEventListener('DOMContentLoaded', checkScores);