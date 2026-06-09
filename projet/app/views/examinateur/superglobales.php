<div class="card">
  <div class="card-body bg-info">
    <h5 class="card-title">SuperGlobales (Cookies et Sessions)</h5>
    <div class="mx-lg-3 mt-3 bg-light p-3 rounded">
      <div class="alert alert-primary"><strong>$_COOKIE</strong></div>
      <pre><?= htmlspecialchars(print_r($cookies, true)) ?></pre>
      <div class="alert alert-primary mt-4"><strong>$_SESSION</strong></div>
      <pre class="mb-0"><?= htmlspecialchars(print_r($sessions, true)) ?></pre>
    </div>
  </div>
</div>
