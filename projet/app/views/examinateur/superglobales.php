<h2 class="text-danger mb-3">SuperGlobales (Cookies et Sessions)</h2>

<h5>$_COOKIE</h5>
<pre class="bg-dark text-light p-3 rounded"><?= htmlspecialchars(print_r($cookies, true)) ?></pre>

<h5 class="mt-4">$_SESSION</h5>
<pre class="bg-dark text-light p-3 rounded"><?= htmlspecialchars(print_r($sessions, true)) ?></pre>
