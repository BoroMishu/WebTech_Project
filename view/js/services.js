document.addEventListener('DOMContentLoaded', () => {
    const serviceLinks = [
        'wedding.php',
        'birthday.php',
        'awardCeremony.php',
        'convocation.php',
        'conference.php',
        'concert.php',
        'festival.php'
    ];

    const serviceCards = document.querySelectorAll('.service-card');

    serviceCards.forEach((card, index) => {
        card.style.cursor = 'pointer';
        card.addEventListener('click', () => {
            if(serviceLinks[index]) {
                window.location.href = serviceLinks[index];
            } else {
                alert('Coming soon!');
            }
        });
    });
});
