</article>
<footer class="bg-orange-500 text-white">
  <div class="container mx-auto text-center py-8 px-6 md:px-0">
    <p class="mb-4">
      <a href="/" class="bg-white text-orange-500 py-1 px-2 rounded inline-block text-xs hover:underline">HOME</a>
    </p>
    <p class="text-sm mb-1 font-bold uppercase">João Luiz Vicente Junior &copy; 2025. Todos os direitos reservados.</p>
    <p class="text-xs text-orange-200">
      <a href="/" class="hover:underline">Desenvolvimento Web 2 - Gestão de Tecnologia - IFPR - Campus Pinhais</a>
    </p>
  </div>
</footer>

</main>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const btn = document.querySelector('.toggleMenu');
    const menu = document.getElementById('main-menu');
    document.querySelectorAll('.toggleMenu').forEach((btn) => {
      btn.addEventListener('click', () => {
        const menu = document.getElementById('main-menu');
        menu.classList.toggle('hidden');
      });
    });
  });
</script>

<?php if (isset($configuration['hasBootstrap'])): ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<?php endif; ?>

</body>

</html>