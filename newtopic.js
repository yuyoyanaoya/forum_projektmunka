const modal = document.getElementById('newTopicModal');
const openBtn = document.querySelector('.btn-new-topic');
const closeBtn = document.getElementById('closeModalBtn');
const cancelBtn = document.getElementById('cancelModalBtn');
const newTopicForm = document.getElementById('newTopicForm');
const topicsStack = document.querySelector('.topics-stack');

function openModal() {
  modal.classList.add('active');
  document.getElementById('topicTitleInput').focus();
}

function closeModal() {
  modal.classList.remove('active');
  newTopicForm.reset();
}

openBtn.addEventListener('click', openModal);
closeBtn.addEventListener('click', closeModal);
cancelBtn.addEventListener('click', closeModal);

modal.addEventListener('click', (e) => {
  if (e.target === modal) closeModal();
});

window.addEventListener('keydown', (e) => {
  if (e.key === 'Escape' && modal.classList.contains('active')) {
    closeModal();
  }
});

newTopicForm.addEventListener('submit', (e) => {
  e.preventDefault();

  const title = document.getElementById('topicTitleInput').value.trim();
  const author = document.getElementById('topicAuthorInput').value.trim();
  const desc = document.getElementById('topicDescInput').value.trim();

  if (!title || !author || !desc) return;

  const now = new Date();
  const timeStr = [now.getHours(), now.getMinutes(), now.getSeconds()]
    .map(unit => String(unit).padStart(2, '0'))
    .join(':');

  const newCard = document.createElement('a');
  newCard.href = '#';
  newCard.className = 'topic-card';
  newCard.innerHTML = `
    <div class="topic-main-info">
      <h3 class="topic-name">${title}</h3>
      <p class="topic-excerpt">${desc}</p>
      <div class="topic-meta">
        <span>Nyitotta: <strong class="author">${author}</strong></span>
        <span class="dot-divider">•</span>
        <span>Időpont: ${timeStr}</span>
      </div>
    </div>
    <div class="topic-stats">
      <div class="stats-info">
        <span class="post-count">1 hozzászólás</span>
        <span class="last-post-time">Utolsó: ${timeStr}</span>
      </div>
      <span class="chevron-arrow">&#10095;</span>
    </div>
  `;

  topicsStack.prepend(newCard);

  closeModal();
});