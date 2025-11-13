// Minimal JS placeholder
// You can add enhancements like copy-to-clipboard or AJAX later.
document.addEventListener('click', (e) => {
  const btn = e.target.closest('[data-confirm]');
  if (btn) {
    const msg = btn.getAttribute('data-confirm');
    if (!confirm(msg || 'Are you sure?')) e.preventDefault();
  }
});

