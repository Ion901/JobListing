
// Password strength meter
const passwordInput = document.getElementById('password');
const confirmInput = document.getElementById('password_confirmation');
const bars = [
    document.getElementById('bar-1'),
    document.getElementById('bar-2'),
    document.getElementById('bar-3'),
    document.getElementById('bar-4'),
];
const strengthLabel = document.getElementById('strength-label');
const matchMsg = document.getElementById('match-msg');

const levels = [
    { color: 'bg-red-400', text: 'Weak', count: 1 },
    { color: 'bg-amber-400', text: 'Fair', count: 2 },
    { color: 'bg-yellow-400', text: 'Good', count: 3 },
    { color: 'bg-green-500', text: 'Strong', count: 4 },
];

function getStrength(val) {
    let score = 0;
    if (val.length >= 8) score++;
    if (/[A-Z]/.test(val)) score++;
    if (/[0-9]/.test(val)) score++;
    if (/[^A-Za-z0-9]/.test(val)) score++;
    return score;
}

passwordInput.addEventListener('input', () => {
    const val = passwordInput.value;
    const score = val.length === 0 ? 0 : getStrength(val);
    bars.forEach(b => b.className = 'h-1 flex-1 rounded-full bg-stone-200 transition-colors duration-300');
    if (score > 0) {
        const level = levels[score - 1];
        for (let i = 0; i < level.count; i++) {
            bars[i].classList.remove('bg-stone-200');
            bars[i].classList.add(level.color);
        }
        strengthLabel.textContent = level.text + ' password';
        strengthLabel.className = `text-xs ${score <= 1 ? 'text-red-500' : score === 2 ? 'text-amber-500' : score === 3 ? 'text-yellow-600' : 'text-green-600'}`;
    } else {
        strengthLabel.textContent = 'Use 8+ characters with letters, numbers & symbols.';
        strengthLabel.className = 'text-xs text-stone-400';
    }
    checkMatch();
});

confirmInput.addEventListener('input', checkMatch);

function checkMatch() {
    const pw = passwordInput.value;
    const conf = confirmInput.value;
    if (conf.length === 0) { matchMsg.classList.add('hidden'); return; }
    matchMsg.classList.remove('hidden');
    if (pw === conf) {
        matchMsg.textContent = 'Passwords match';
        matchMsg.className = 'text-xs text-green-600';
    } else {
        matchMsg.textContent = 'Passwords do not match';
        matchMsg.className = 'text-xs text-red-500';
    }
}
