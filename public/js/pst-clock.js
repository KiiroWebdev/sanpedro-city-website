
(function () {
    function updatePhilippineTime() {
        const clock = document.getElementById('pst-datetime');

        if (!clock) {
            return;
        }

        const now = new Date();

        clock.textContent = new Intl.DateTimeFormat('en-PH', {
            timeZone: 'Asia/Manila',
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: true
        }).format(now);
    }

    function startClock() {
        updatePhilippineTime();
        setInterval(updatePhilippineTime, 1000);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', startClock);
    } else {
        startClock();
    }
})();
