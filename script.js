const defaultScripts = [
  `Hook: "If you have 10 minutes, you can reset your entire day."
Body: "Here are 3 micro-habits I use before noon..."
CTA: "Comment 'RESET' and I'll send my routine."`,
  `Hook: "Most people fail fat loss in week 2 for this reason."
Body: "Stop doing all-or-nothing workouts. Do this instead..."
CTA: "Follow for daily 30-second fitness tips."`,
  `Hook: "This one content framework doubled my DMs."
Body: "Use Problem → Proof → Pitch in every short video..."
CTA: "Save this and send it to a creator friend."`
];

const hookTemplates = [
  'Stop scrolling if you care about {topic}.',
  'Nobody talks about this {topic} trick...',
  'You are one short away from better {topic} results.',
  'Most people get {topic} wrong. Do this instead.'
];

const bodyTemplates = [
  'Here are 3 quick points that make your {topic} content more engaging and easier to create.',
  'Use this simple framework for {topic}: Hook, Value, and One clear next step.',
  'Try this in your next {topic} video: start with a myth, show proof, then reveal the process.'
];

const ctaTemplates = [
  "Comment 'SCRIPT' and I will send more ideas.",
  'Follow for daily viral content formulas.',
  'Save this and share it with a creator friend.'
];

const scriptsList = document.getElementById('scripts-list');
const generatorForm = document.getElementById('generator-form');
const topicInput = document.getElementById('topic-input');
const emailForm = document.getElementById('email-form');
const emailFeedback = document.getElementById('email-feedback');

function randomFrom(array) {
  return array[Math.floor(Math.random() * array.length)];
}

function makeScript(topic, index) {
  const safeTopic = topic || 'content';
  const hook = randomFrom(hookTemplates).replace('{topic}', safeTopic);
  const body = randomFrom(bodyTemplates).replace('{topic}', safeTopic);
  const cta = randomFrom(ctaTemplates);
  return {
    title: `Script #${index + 1}: ${safeTopic.charAt(0).toUpperCase()}${safeTopic.slice(1)}`,
    text: `Hook: "${hook}"\nBody: "${body}"\nCTA: "${cta}"`
  };
}

function renderScripts(scripts) {
  scriptsList.innerHTML = '';
  scripts.forEach((script, i) => {
    const card = document.createElement('article');
    card.className = 'card script-card';

    const title = document.createElement('h3');
    title.textContent = script.title;

    const text = document.createElement('p');
    text.className = 'script-text';
    text.textContent = script.text;

    const button = document.createElement('button');
    button.className = 'btn btn-copy';
    button.textContent = 'Copy Script';
    button.setAttribute('data-copy-target', String(i));

    card.append(title, text, button);
    scriptsList.appendChild(card);
  });
}

async function copyScript(text, button) {
  try {
    await navigator.clipboard.writeText(text);
    const original = button.textContent;
    button.textContent = 'Copied!';
    setTimeout(() => {
      button.textContent = original;
    }, 1400);
  } catch (error) {
    button.textContent = 'Copy failed';
    setTimeout(() => {
      button.textContent = 'Copy Script';
    }, 1400);
  }
}

let activeScripts = defaultScripts.map((text, i) => ({
  title: `Script #${i + 1}`,
  text
}));

scriptsList.addEventListener('click', (event) => {
  const target = event.target;
  if (!(target instanceof HTMLButtonElement)) return;
  const index = Number(target.dataset.copyTarget);
  const selected = activeScripts[index];
  if (!selected) return;
  copyScript(selected.text, target);
});

generatorForm.addEventListener('submit', (event) => {
  event.preventDefault();
  const topic = topicInput.value.trim().toLowerCase();
  activeScripts = [0, 1, 2].map((index) => makeScript(topic, index));
  renderScripts(activeScripts);
});

emailForm.addEventListener('submit', (event) => {
  event.preventDefault();
  const emailValue = document.getElementById('email-input').value.trim();
  if (!emailValue) return;
  emailFeedback.textContent = `Thanks! ${emailValue} was added to the premium waitlist.`;
  emailForm.reset();
});

const revealElements = document.querySelectorAll('.reveal');
const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  },
  { threshold: 0.15 }
);

revealElements.forEach((element) => observer.observe(element));
