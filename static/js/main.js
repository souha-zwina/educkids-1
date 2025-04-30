// Attendre que le DOM soit chargé
document.addEventListener('DOMContentLoaded', function() {
    // Ajouter des animations aux cartes
    const cards = document.querySelectorAll('.category-card');
    cards.forEach(card => {
        card.addEventListener('mouseover', function() {
            this.classList.add('animated');
        });
        card.addEventListener('mouseout', function() {
            this.classList.remove('animated');
        });
    });

    // Ajouter des effets sonores pour les boutons
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            playSound('click');
        });
    });

    // Fonction pour jouer des sons
    function playSound(type) {
        const audio = new Audio();
        switch(type) {
            case 'click':
                audio.src = '/static/sounds/click.mp3';
                break;
            case 'success':
                audio.src = '/static/sounds/success.mp3';
                break;
            case 'error':
                audio.src = '/static/sounds/error.mp3';
                break;
        }
        audio.play();
    }

    // Ajouter des effets de survol aux images
    const images = document.querySelectorAll('.element-image');
    images.forEach(image => {
        image.addEventListener('mouseover', function() {
            this.style.transform = 'scale(1.1)';
            this.style.transition = 'transform 0.3s ease';
        });
        image.addEventListener('mouseout', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // Ajouter des messages d'encouragement
    const messages = [
        "Bravo !",
        "Excellent !",
        "Super travail !",
        "Continue comme ça !",
        "Tu es génial !"
    ];

    function showEncouragement() {
        const message = messages[Math.floor(Math.random() * messages.length)];
        const div = document.createElement('div');
        div.className = 'encouragement';
        div.textContent = message;
        document.body.appendChild(div);
        
        setTimeout(() => {
            div.remove();
        }, 2000);
    }

    // Ajouter des événements pour déclencher les messages d'encouragement
    document.querySelectorAll('a, button').forEach(element => {
        element.addEventListener('click', showEncouragement);
    });
}); 