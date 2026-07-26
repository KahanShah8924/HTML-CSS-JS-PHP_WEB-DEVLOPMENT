// Live table search and simple confirmation modal handler (no external libs)
document.addEventListener('DOMContentLoaded', function(){
  // Live search: any input with data-search-target will filter rows in target table body
  document.querySelectorAll('input[data-search-target]').forEach(function(inp){
    inp.addEventListener('input', function(){
      const selector = inp.dataset.searchTarget;
      const q = inp.value.trim().toLowerCase();
      const rows = document.querySelectorAll(selector + ' tr');
      rows.forEach(function(r, idx){
        if(idx===0) return; // keep header if included
        const text = r.textContent.trim().toLowerCase();
        r.style.display = text.indexOf(q) !== -1 ? '' : 'none';
      });
    });
  });

  // Confirmation modal: open modal when element with data-confirm attribute clicked
  document.querySelectorAll('[data-confirm]').forEach(function(el){
    el.addEventListener('click', function(e){
      e.preventDefault();
      const href = el.getAttribute('href');
      const msg = el.datasetConfirm || el.getAttribute('data-confirm') || 'Are you sure?';
      showConfirmModal(msg, function(ok){
        if(ok && href) window.location = href;
      });
    });
  });

  // delegate for elements created later
  document.body.addEventListener('click', function(e){
    const tgt = e.target.closest('[data-confirm]');
    if(!tgt) return;
    e.preventDefault();
    const href = tgt.getAttribute('href');
    const msg = tgt.datasetConfirm || tgt.getAttribute('data-confirm') || 'Are you sure?';
    showConfirmModal(msg, function(ok){
      if(ok && href) window.location = href;
    });
  });

});

function showConfirmModal(message, cb){
  let backdrop = document.getElementById('confirm-backdrop');
  if(!backdrop){
    backdrop = document.createElement('div');
    backdrop.id = 'confirm-backdrop';
    backdrop.className = 'modal-backdrop';
    backdrop.innerHTML = '<div class="modal"><h3>Confirm</h3><p id="confirm-msg"></p><div class="row"><button id="confirm-no" class="btn outline">No</button><button id="confirm-yes" class="btn">Yes</button></div></div>';
    document.body.appendChild(backdrop);
  }
  document.getElementById('confirm-msg').textContent = message;
  backdrop.style.display = 'flex';
  document.getElementById('confirm-no').focus();
  function clean(ok){
    backdrop.style.display='none';
    document.getElementById('confirm-yes').removeEventListener('click', onYes);
    document.getElementById('confirm-no').removeEventListener('click', onNo);
    cb(ok);
  }
  function onYes(){ clean(true); }
  function onNo(){ clean(false); }
  document.getElementById('confirm-yes').addEventListener('click', onYes);
  document.getElementById('confirm-no').addEventListener('click', onNo);
}
